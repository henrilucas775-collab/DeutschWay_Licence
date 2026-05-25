<?php

use App\Models\User;

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
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('lab.cours.chapitres', ['slug' => 'niveau-zero']));

    $response->assertSuccessful();
});
