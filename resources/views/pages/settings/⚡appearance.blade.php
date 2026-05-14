<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Appearance settings')] class extends Component {
    //
}; ?>

<section class="lab-account-theme w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Appearance settings') }}</flux:heading>

    <x-pages::settings.layout>
        <div class="lab-account-card">
            <div class="lab-account-card-header">
                <div class="lab-account-card-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4l3 3" />
                    </svg>
                    {{ __('Appearance') }}
                </div>
                <p class="lab-account-card-desc">{{ __('Choose how DeutschWay Lab looks on this device. System follows your operating system setting.') }}</p>
            </div>
            <div class="lab-account-card-body">
                <flux:heading size="sm" class="mb-1">{{ __('Theme') }}</flux:heading>
                <flux:subheading size="sm" class="mb-5">{{ __('You can change this at any time; it applies only to your session in the browser.') }}</flux:subheading>

                <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                    <flux:radio value="light" icon="sun">{{ __('Light') }}</flux:radio>
                    <flux:radio value="dark" icon="moon">{{ __('Dark') }}</flux:radio>
                    <flux:radio value="system" icon="computer-desktop">{{ __('System') }}</flux:radio>
                </flux:radio.group>
            </div>
        </div>
    </x-pages::settings.layout>
</section>
