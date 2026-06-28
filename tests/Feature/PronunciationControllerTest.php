<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Testing\TextResponseFake;

test('pronunciation evaluate endpoint parses azure scores correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    // Mock Azure Speech API response
    Http::fake([
        '*.stt.speech.microsoft.com/*' => Http::response([
            'RecognitionStatus' => 'Success',
            'Offset' => 400000,
            'Duration' => 1700000,
            'NBest' => [
                [
                    'Confidence' => 0.9,
                    'Lexical' => 'guten tag',
                    'ITN' => 'guten tag',
                    'MaskedITN' => 'guten tag',
                    'Display' => 'Guten Tag.',
                    'PronunciationAssessment' => [
                        'AccuracyScore' => 95.0,
                        'FluencyScore' => 88.0,
                        'CompletenessScore' => 100.0,
                        'PronScore' => 91.0,
                    ],
                ],
            ],
        ], 200),
    ]);

    // Mock Prism/Gemini response
    Prism::fake([
        TextResponseFake::make()
            ->withText('Très bonne prononciation de "Guten Tag", bravo !'),
    ]);

    // Create a dummy audio file
    $audio = UploadedFile::fake()->create('record.webm', 100, 'audio/webm');

    $response = $this->postJson(route('pronunciation.evaluate'), [
        'audio' => $audio,
        'phrase' => 'Guten Tag',
    ]);

    $response->assertOk();
    $response->assertJson([
        'scorePercent' => 91,
        'accuracyScore' => 95,
        'fluencyScore' => 88,
        'completenessScore' => 100,
        'feedbackText' => 'Très bonne prononciation de "Guten Tag", bravo !',
    ]);
});
