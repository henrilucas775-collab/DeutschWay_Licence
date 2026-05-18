<?php

use App\Models\User;

test('public layout includes mobile drawer navigation markup', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)->toContain('public-mobile-root')
        ->and($html)->toContain('public-nav-overlay')
        ->and($html)->toContain('public-nav-drawer')
        ->and($html)->toContain('mobile-menu-toggle')
        ->and($html)->toContain('id="app" class="min-w-0 max-w-full overflow-x-hidden"');
});

test('public header shows user name and email on profile control when authenticated', function () {
    $user = User::factory()->create([
        'name' => 'Header Auth User',
        'email' => 'header-auth-profile@example.test',
    ]);

    $html = $this->actingAs($user)->get(route('home'))->assertOk()->getContent();

    expect($html)->toContain('Header Auth User')
        ->and($html)->toContain('header-auth-profile@example.test')
        ->and($html)->toContain('data-flux-profile');
});
