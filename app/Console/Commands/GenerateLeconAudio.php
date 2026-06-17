<?php

namespace App\Console\Commands;

use App\Models\Lecon;
use App\Services\AzureTTSService;
use App\Services\ElevenLabsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenerateLeconAudio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deutschway:generate-audio {--force : Régénérer même si l\'audio existe} {--engine=azure : Le moteur TTS (azure ou elevenlabs)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génère les audios TTS pour les leçons (mots/phrases) via Azure ou ElevenLabs.';

    /**
     * Execute the console command.
     */
    public function handle(ElevenLabsService $elevenLabsService, AzureTTSService $azureService)
    {
        $engine = strtolower($this->option('engine'));
        if (!in_array($engine, ['azure', 'elevenlabs'])) {
            $this->error('L\'option --engine doit être "azure" ou "elevenlabs".');
            return Command::FAILURE;
        }

        $ttsService = $engine === 'azure' ? $azureService : $elevenLabsService;
        $this->info("Moteur sélectionné : " . strtoupper($engine));

        $query = Lecon::query();

        if (!$this->option('force')) {
            $query->whereNull('chemin_audio')
                  ->orWhere('chemin_audio', '');
        }

        $lecons = $query->get();

        if ($lecons->isEmpty()) {
            $this->info('Toutes les leçons ont déjà un audio ! (Utilisez --force pour tout régénérer)');
            return Command::SUCCESS;
        }

        $this->info("Génération de l'audio pour {$lecons->count()} leçon(s)...");

        $bar = $this->output->createProgressBar($lecons->count());
        $bar->start();

        foreach ($lecons as $lecon) {
            // Logique intelligente pour construire le texte à prononcer
            $categorie = $lecon->categorie ?? '';

            if (str_starts_with($categorie, 'conjugaison-')) {
                // ex: "ich" + " " + "bin"
                $texte = trim($lecon->mot_allemand . ' ' . $lecon->exemple);
            } elseif (str_starts_with($categorie, 'phrase-')) {
                // ex: "Ich bin Student" (ignorer l'article 'sein')
                $texte = trim($lecon->mot_allemand);
            } else {
                // Vocabulaire standard : article + mot
                $texte = trim($lecon->mot_allemand);
                if (!empty($lecon->article)) {
                    $texte = trim($lecon->article . ' ' . $texte);
                }
            }

            $audioBytes = $ttsService->generateAudio($texte);

            if ($audioBytes) {
                // Nom de fichier unique : lecon_{id}_{slug}.mp3
                $safeName = Str::slug(Str::limit($texte, 30, ''));
                $filename = "audios/lecon_{$lecon->id}_{$safeName}.mp3";

                // Sauvegarder sur le disque public
                Storage::disk('public')->put($filename, $audioBytes);

                // Mettre à jour la DB
                $lecon->update([
                    'chemin_audio' => $filename
                ]);
            } else {
                $this->error("\nÉchec pour la leçon ID: {$lecon->id} ($texte)");
            }

            $bar->advance();
            
            // Petite pause pour respecter les limites de l'API ElevenLabs (Rate Limiting)
            usleep(200000); // 0.2 secondes
        }

        $bar->finish();
        $this->newLine();
        $this->info('Génération terminée avec succès !');

        return Command::SUCCESS;
    }
}
