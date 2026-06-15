<?php

namespace App\Console\Commands;

use App\Models\Lecon;
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
    protected $signature = 'deutschway:generate-audio {--force : Régénérer même si l\'audio existe}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génère les audios ElevenLabs pour les leçons (mots/phrases).';

    /**
     * Execute the console command.
     */
    public function handle(ElevenLabsService $ttsService)
    {
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
            // Construire le texte (ajouter l'article s'il existe)
            $texte = $lecon->mot_allemand;
            if (!empty($lecon->article)) {
                $texte = $lecon->article . ' ' . $texte;
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
