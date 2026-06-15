<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ElevenLabsService
{
    protected string $apiKey;
    protected string $voiceId;
    protected string $modelId;

    public function __construct()
    {
        $this->apiKey = env('ELEVENLABS_API_KEY', '');
        // ID de voix pour "Adam" (très bonne voix multilingue). Vous pourrez le changer.
        $this->voiceId = env('ELEVENLABS_VOICE_ID', 'CwhRBWXzGAHq8TQ4Fs17'); 
        $this->modelId = 'eleven_multilingual_v2';
    }

    /**
     * Génère l'audio TTS pour un texte donné.
     * Retourne les bytes bruts du MP3 ou null en cas d'erreur.
     */
    public function generateAudio(string $text): ?string
    {
        if (empty($this->apiKey)) {
            Log::error('Clé API ElevenLabs non configurée.');
            return null;
        }

        $url = "https://api.elevenlabs.io/v1/text-to-speech/{$this->voiceId}";

        try {
            $response = Http::timeout(60)->withHeaders([
                'xi-api-key' => $this->apiKey,
                'Accept' => 'audio/mpeg',
                'Content-Type' => 'application/json',
            ])->post($url, [
                'text' => $text,
                'model_id' => $this->modelId,
                'voice_settings' => [
                    'stability' => 0.5,
                    'similarity_boost' => 0.75,
                ]
            ]);

            if ($response->successful()) {
                return $response->body();
            }

            Log::error('Erreur ElevenLabs TTS : ' . $response->body());
        } catch (\Exception $e) {
            Log::error('Exception ElevenLabs TTS : ' . $e->getMessage());
        }

        return null;
    }
}
