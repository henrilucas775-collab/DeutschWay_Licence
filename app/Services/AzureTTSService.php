<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AzureTTSService
{
    protected string $apiKey;

    protected string $region;

    protected string $voiceName;

    public function __construct()
    {
        $this->apiKey = env('AZURE_SPEECH_KEY', '');
        $this->region = env('AZURE_SPEECH_REGION', 'francecentral');
        // Voix neurale très claire pour l'allemand par défaut (Conrad ou Katja)
        $this->voiceName = env('AZURE_VOICE_NAME', 'de-DE-ConradNeural');
    }

    /**
     * Génère l'audio depuis Azure TTS et retourne les bytes du fichier MP3.
     */
    public function generateAudio(string $text, string $lang = 'de-DE', ?string $voiceName = null): ?string
    {
        if (empty($this->apiKey) || empty($this->region)) {
            Log::error('Clé ou région Azure Speech non configurée.');

            return null;
        }

        $voiceName ??= match ($lang) {
            'fr-FR' => env('AZURE_VOICE_NAME_FR', 'fr-FR-DeniseNeural'),
            default => $this->voiceName,
        };

        $url = "https://{$this->region}.tts.speech.microsoft.com/cognitiveservices/v1";

        $cleanText = htmlspecialchars($text);

        $ssml = "<speak version='1.0' xml:lang='{$lang}'>
                    <voice xml:lang='{$lang}' name='{$voiceName}'>
                        {$cleanText}
                    </voice>
                 </speak>";

        try {
            $response = Http::timeout(30)->withHeaders([
                'Ocp-Apim-Subscription-Key' => $this->apiKey,
                'Content-Type' => 'application/ssml+xml',
                // Format de sortie très compressé et qualitatif pour le web
                'X-Microsoft-OutputFormat' => 'audio-24khz-48kbitrate-mono-mp3',
                'User-Agent' => 'DeutschWayApp',
            ])->send('POST', $url, [
                'body' => $ssml,
            ]);

            if ($response->successful()) {
                return $response->body(); // Retourne les bytes bruts du MP3
            }

            Log::error('Erreur Azure TTS : '.$response->body());
        } catch (\Exception $e) {
            Log::error('Exception Azure TTS : '.$e->getMessage());
        }

        return null;
    }
}
