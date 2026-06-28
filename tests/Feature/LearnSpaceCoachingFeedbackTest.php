<?php

use App\Livewire\LearnSpace;
use App\Models\Chapitre;
use App\Models\Lecon;
use App\Models\Parcours;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Testing\TextResponseFake;

test('learn space generate coaching feedback returns pronunciation scores', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $parcours = Parcours::create([
        'slug' => 'niveau-zero',
        'titre' => 'Niveau Zéro',
    ]);

    $chapitre = Chapitre::create([
        'parcours_id' => $parcours->id,
        'slug' => 'test-revision',
        'titre' => 'Test Révision',
        'sur_titre' => 'A1.1',
        'template_vue' => 'standard',
        'ordre' => 1,
    ]);

    Lecon::create([
        'chapitre_id' => $chapitre->id,
        'mot_allemand' => 'Guten Tag',
        'traduction_francaise' => 'Bonjour',
        'ordre' => 1,
    ]);

    Prism::fake([
        TextResponseFake::make()
            ->withText('Très bonne prononciation de "Guten Tag", bravo !'),
    ]);

    Livewire::test(LearnSpace::class, [
        'chapitreSlug' => 'test-revision',
        'isRevision' => true,
    ])
        ->call('generateCoachingFeedback', 'Guten Tag', 91, 95, 88, 100)
        ->assertReturned([
            'scorePercent' => 91,
            'accuracyScore' => 95,
            'fluencyScore' => 88,
            'completenessScore' => 100,
            'feedbackText' => 'Très bonne prononciation de "Guten Tag", bravo !',
            'themeColorClass' => 'teal',
            'teacherInitials' => 'ML',
            'teacherName' => 'Marie Lefebvre',
            'goodChips' => ['Fluidité', 'Prononciation'],
            'warnChips' => [],
        ]);
});

test('learn space synthesize coach speech returns azure tts audio', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $parcours = Parcours::create([
        'slug' => 'niveau-zero',
        'titre' => 'Niveau Zéro',
    ]);

    $chapitre = Chapitre::create([
        'parcours_id' => $parcours->id,
        'slug' => 'test-revision-tts',
        'titre' => 'Test Révision TTS',
        'sur_titre' => 'A1.1',
        'template_vue' => 'standard',
        'ordre' => 1,
    ]);

    Lecon::create([
        'chapitre_id' => $chapitre->id,
        'mot_allemand' => 'Guten Tag',
        'traduction_francaise' => 'Bonjour',
        'ordre' => 1,
    ]);

    Http::fake([
        '*.tts.speech.microsoft.com/*' => Http::response('fake-mp3-audio-bytes', 200, [
            'Content-Type' => 'audio/mpeg',
        ]),
    ]);

    Livewire::test(LearnSpace::class, [
        'chapitreSlug' => 'test-revision-tts',
        'isRevision' => true,
    ])
        ->call('synthesizeCoachSpeech', 'Très bonne prononciation, continue comme ça !')
        ->assertReturned([
            'audioBase64' => base64_encode('fake-mp3-audio-bytes'),
            'mimeType' => 'audio/mpeg',
        ]);
});

test('revision page includes azure speech sdk and livewire coaching hook', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $parcours = Parcours::create([
        'slug' => 'niveau-zero',
        'titre' => 'Niveau Zéro',
    ]);

    $chapitre = Chapitre::create([
        'parcours_id' => $parcours->id,
        'slug' => 'test-revision-ui',
        'titre' => 'Test Révision UI',
        'sur_titre' => 'A1.1',
        'template_vue' => 'standard',
        'ordre' => 1,
    ]);

    Lecon::create([
        'chapitre_id' => $chapitre->id,
        'mot_allemand' => 'Guten Tag',
        'traduction_francaise' => 'Bonjour',
        'ordre' => 1,
    ]);

    $response = $this->get(route('lab.apprendre.revision', ['chapitre' => 'test-revision-ui']));

    $response->assertSuccessful();
    $response->assertSee('microsoft-cognitiveservices-speech-sdk', false);
    $response->assertSee('synthesizeCoachSpeech', false);
    $response->assertSee('_playAzureSpeech', false);
    $response->assertSee('revisionLab', false);
    $response->assertSee('rev-lab', false);
    $response->assertSee('rev-nav-btn', false);
    $response->assertDontSee('dark:text-zinc-100', false);
    $response->assertDontSee('/api/pronunciation/evaluate', false);
});
