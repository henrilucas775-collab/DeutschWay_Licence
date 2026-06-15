<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ListElevenLabsVoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elevenlabs:voices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Affiche la liste des voix disponibles sur votre compte ElevenLabs avec leurs IDs.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = config('services.elevenlabs.api_key', env('ELEVENLABS_API_KEY'));

        if (empty($apiKey)) {
            $this->error("Clé API introuvable. Vérifiez que ELEVENLABS_API_KEY est bien dans votre .env");
            return Command::FAILURE;
        }

        $this->info("Connexion à ElevenLabs...");

        try {
            $response = Http::timeout(15)->withHeaders([
                'xi-api-key' => $apiKey,
                'Accept' => 'application/json'
            ])->get('https://api.elevenlabs.io/v1/voices');

            if ($response->successful()) {
                $voices = $response->json()['voices'] ?? [];

                if (empty($voices)) {
                    $this->warn("Aucune voix trouvée pour ce compte.");
                    return Command::SUCCESS;
                }

                // Préparation des données pour le tableau
                $rows = collect($voices)->map(function ($voice) {
                    $accent = $voice['labels']['accent'] ?? '-';
                    $gender = $voice['labels']['gender'] ?? '-';
                    
                    return [
                        $voice['name'],
                        $voice['voice_id'],
                        $voice['category'],
                        ucfirst($gender) . ' / ' . ucfirst($accent)
                    ];
                })->toArray();

                $this->table(
                    ['Nom de la voix', 'Voice ID (à copier dans le .env)', 'Catégorie', 'Type'],
                    $rows
                );

                $this->newLine();
                $this->info("💡 Astuce : Copiez le 'Voice ID' qui vous plaît et mettez-le dans ELEVENLABS_VOICE_ID=... dans votre fichier .env");

                return Command::SUCCESS;
            }

            $this->error("Erreur de l'API : " . $response->body());
        } catch (\Exception $e) {
            $this->error("Erreur de connexion : " . $e->getMessage());
        }

        return Command::FAILURE;
    }
}
