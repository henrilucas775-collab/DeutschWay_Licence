<?php

use App\Models\User;

test('appearance settings page can be rendered', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('appearance.edit'))
        ->assertOk()
        ->assertSee('Thème sombre du Lab')
        ->assertSee('setLabTheme')
        ->assertSee('data-lab-theme')
        ->assertSee('lab-theme-toggle');
});

test('appearance settings page requires authentication', function () {
    $this->get(route('appearance.edit'))
        ->assertRedirect(route('login'));
});

test('mon compte pages use lab theme tokens for dark mode', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('profile.edit'))
        ->assertOk()
        ->assertSee('lab-account-theme', false)
        ->assertSee('document.documentElement.setAttribute(\'data-lab-theme\'', false);

    $css = file_get_contents(resource_path('css/style_lab/lab.css'));

    expect($css)
        ->toContain('--lab-ui-surface: var(--lab-surface)')
        ->toContain('color: var(--lab-ink) !important')
        ->not->toContain('color: #000000 !important');
});
