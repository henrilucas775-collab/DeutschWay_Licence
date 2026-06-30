<?php

use App\Livewire\LearnSpace;
use App\Models\Chapitre;
use App\Models\Lecon;
use App\Models\Parcours;
use App\Models\User;
use Livewire\Livewire;

function seedLabParcoursCatalog(): Parcours
{
    foreach ([
        ['slug' => 'niveau-zero', 'titre' => 'Niveau Zéro'],
        ['slug' => 'fondations', 'titre' => 'Fondations'],
        ['slug' => 'immersion', 'titre' => 'Immersion'],
    ] as $data) {
        Parcours::create([
            ...$data,
            'description' => 'Description test',
            'difficulte' => 'Débutant',
        ]);
    }

    return Parcours::where('slug', 'niveau-zero')->firstOrFail();
}

function seedLabChapitre(Parcours $parcours, string $slug, string $template = 'standard'): Chapitre
{
    $chapitre = Chapitre::create([
        'parcours_id' => $parcours->id,
        'slug' => $slug,
        'titre' => 'Chapitre test',
        'sur_titre' => 'A1',
        'template_vue' => $template,
        'ordre' => 1,
    ]);

    Lecon::create([
        'chapitre_id' => $chapitre->id,
        'mot_allemand' => 'Hallo',
        'traduction_francaise' => 'Bonjour',
        'ordre' => 1,
    ]);

    return $chapitre;
}

test('guests are redirected to the login page for lab views', function (string $routeName) {
    $response = $this->get(route($routeName));

    $response->assertRedirect(route('login'));
})->with([
    'apprendre' => 'lab.apprendre',
    'cours' => 'lab.cours',
    'explorer' => 'lab.explorer',
    'progression' => 'lab.progression',
]);

test('authenticated users can visit lab views', function (string $routeName) {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route($routeName));

    $response->assertSuccessful();
})->with([
    'apprendre' => 'lab.apprendre',
    'cours' => 'lab.cours',
    'explorer' => 'lab.explorer',
    'progression' => 'lab.progression',
]);

test('cours page displays parchemins for each parcours', function () {
    seedLabParcoursCatalog();

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('lab.cours'));

    $response->assertSuccessful();
    $response->assertSee('Choisissez votre parcours DeutschWay', false);
    $response->assertSee('Niveau Zéro', false);
    $response->assertSee('Fondations', false);
    $response->assertSee('Immersion', false);
    $response->assertSee('Avancé', false);
    $response->assertSee('parchemin-card', false);
});

test('guests are redirected to login for parcours chapters view', function () {
    $response = $this->get(route('lab.cours.chapitres', ['slug' => 'niveau-zero']));

    $response->assertRedirect(route('login'));
});

test('authenticated users can visit parcours chapters view', function () {
    $parcours = seedLabParcoursCatalog();
    seedLabChapitre($parcours, 'alphabet');

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('lab.cours.chapitres', ['slug' => 'niveau-zero']));

    $response->assertSuccessful();
});

test('lab learn views use theme tokens instead of hardcoded white surfaces', function () {
    $styleFiles = [
        'views/livewire/learn-templates/styles.blade.php',
        'views/livewire/learn-templates/styles-grammaire.blade.php',
        'views/livewire/learn-templates/styles-revision.blade.php',
        'views/livewire/parcours-chapitres.blade.php',
        'views/app/cours.blade.php',
    ];

    foreach ($styleFiles as $file) {
        $content = file_get_contents(resource_path($file));

        expect($content)
            ->not->toMatch('/background:\s*white\b/')
            ->not->toMatch('/background:\s*#fff\b/');
    }

    expect(file_get_contents(resource_path('views/livewire/learn-templates/styles.blade.php')))
        ->toContain('var(--lab-surface)');

    expect(file_get_contents(resource_path('views/app/cours.blade.php')))
        ->toContain('var(--lab-stone)')
        ->toContain('var(--lab-paper)');
});

test('learn space revision template renders lab surface styles', function () {
    $parcours = seedLabParcoursCatalog();
    seedLabChapitre($parcours, 'test-revision-ui', 'revision');

    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(LearnSpace::class, [
        'chapitreSlug' => 'test-revision-ui',
        'isRevision' => true,
    ])
        ->assertSee('var(--lab-surface)', false);
});
