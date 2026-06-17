<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Prism\Prism\Facades\Prism;

class PronunciationController extends Controller
{
    public function getToken()
    {
        $azureKey = env('AZURE_SPEECH_KEY');
        $azureRegion = env('AZURE_SPEECH_REGION', 'francecentral');

        if (!$azureKey) {
            return response()->json(['error' => 'Clé Azure non configurée dans le fichier .env'], 500);
        }

        $url = "https://{$azureRegion}.api.cognitive.microsoft.com/sts/v1.0/issueToken";

        $response = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => $azureKey
        ])->post($url);

        if (!$response->successful()) {
            return response()->json(['error' => 'Erreur lors de la génération du token Azure'], 500);
        }

        return response()->json([
            'token' => $response->body(),
            'region' => $azureRegion
        ]);
    }

    public function evaluate(Request $request)
    {
        $request->validate([
            'audio' => 'required|file',
            'phrase' => 'required|string',
        ]);

        $audioFile = $request->file('audio');
        $targetPhrase = $request->input('phrase');

        // 1. Configuration Azure
        $azureKey = env('AZURE_SPEECH_KEY');
        $azureRegion = env('AZURE_SPEECH_REGION', 'francecentral'); // ex: francecentral, westeurope

        if (!$azureKey) {
            return response()->json(['error' => 'Clé Azure non configurée dans le fichier .env'], 500);
        }

        // 2. Appel à l'API Azure Speech (REST)
        $url = "https://{$azureRegion}.stt.speech.microsoft.com/speech/recognition/conversation/cognitiveservices/v1?language=de-DE";

        $pronunciationParams = base64_encode(json_encode([
            'ReferenceText' => $targetPhrase,
            'GradingSystem' => 'HundredMark',
            'Granularity' => 'Phoneme',
            'Dimension' => 'Comprehensive'
        ]));

        $azureResponse = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => $azureKey,
            'Content-Type' => $audioFile->getClientMimeType() ?: 'audio/webm',
            'Accept' => 'application/json',
            'Pronunciation-Assessment' => $pronunciationParams
        ])->send('POST', $url, [
            'body' => file_get_contents($audioFile->getRealPath())
        ]);

        if (!$azureResponse->successful()) {
            return response()->json(['error' => 'Erreur lors de l\'analyse Azure', 'details' => $azureResponse->json()], 500);
        }

        $azureData = $azureResponse->json();
        
        // 3. Extraction du score Azure
        $scorePercent = $azureData['NBest'][0]['PronunciationAssessment']['PronScore'] ?? 0;

        // Configuration visuelle par défaut
        $themeColorClass = 'amber';
        $teacherInitials = 'KS';
        $teacherName = 'Klaus Schneider';
        $goodChips = [];
        $warnChips = [];

        if ($scorePercent >= 80) {
            $themeColorClass = 'teal';
            $teacherInitials = 'ML';
            $teacherName = 'Marie Lefebvre';
            $goodChips = ['Fluidité', 'Prononciation'];
        } elseif ($scorePercent >= 65) {
            $themeColorClass = 'purple';
            $goodChips = ['Effort'];
            $warnChips = ['Articulations'];
        } else {
            $warnChips = ['Syllabes', 'Rythme'];
        }

        // 4. Appel à Gemini via Prism
        // On génère un contexte pour le LLM
        $erreurs = "Le score global est de {$scorePercent}/100.";
        
        // (Optionnel) Ici tu pourrais extraire les phonèmes précis d'Azure
        // $erreurs .= json_encode($azureData['NBest'][0]['Words'] ?? []);

        try {
            $prismResponse = Prism::text()
                ->using('gemini', 'gemini-2.5-flash')
                ->withSystemPrompt("Tu es {$teacherName}, un professeur d'allemand strict mais très encourageant. Ton élève francophone a essayé de prononcer une phrase. Sois bref (1 ou 2 phrases max) et donne un conseil PRATIQUE sur la prononciation.")
                ->withPrompt("La phrase cible était : '{$targetPhrase}'. \nVoici l'évaluation technique : {$erreurs}")
                ->generate();

            $feedbackText = $prismResponse->text;
        } catch (\Exception $e) {
            // Fallback si l'API Gemini échoue ou n'est pas configurée
            $feedbackText = "Bon effort ! Essaie d'écouter la prononciation native encore une fois et de bien détacher les syllabes.";
        }

        // 5. Retour des données au frontend Alpine.js
        return response()->json([
            'scorePercent' => round($scorePercent),
            'themeColorClass' => $themeColorClass,
            'teacherInitials' => $teacherInitials,
            'teacherName' => $teacherName,
            'feedbackText' => $feedbackText,
            'goodChips' => $goodChips,
            'warnChips' => $warnChips
        ]);
    }
}
