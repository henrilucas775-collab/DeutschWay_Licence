<?php

test('public layout includes mobile drawer navigation markup', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)->toContain('public-mobile-root')
        ->and($html)->toContain('public-nav-overlay')
        ->and($html)->toContain('public-nav-drawer')
        ->and($html)->toContain('mobile-menu-toggle')
        ->and($html)->toContain('id="app" class="min-w-0 max-w-full overflow-x-hidden"');
});
