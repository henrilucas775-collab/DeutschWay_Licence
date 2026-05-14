<?php

use App\Models\User;

test('authenticated lab pages include mobile drawer markup', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $html = $this->get(route('dashboard'))->assertOk()->getContent();

    expect($html)->toContain('lab-mobile-root')
        ->and($html)->toContain('lab-sidebar-overlay')
        ->and($html)->toContain('lab-topbar-hamburger');
});

test('settings account page uses maquette-style account shell', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $html = $this->get(route('profile.edit'))->assertOk()->getContent();

    expect($html)->toContain('lab-account-shell')
        ->and($html)->toContain('lab-account-snav');
});
