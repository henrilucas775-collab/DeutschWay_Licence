<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Appearance settings')] class extends Component {
    //
}; ?>

<section class="lab-account-theme w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Appearance settings') }}</flux:heading>

    <x-app.settings.layout>
        <div class="lab-account-card">
            <div class="lab-account-card-header">
                <div class="lab-account-card-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" >
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4l3 3" />
                    </svg>
                    {{ __('Appearance') }}
                </div>
                <p class="lab-account-card-desc">{{ __('Personnalisez l\'apparence de l\'atelier DeutschWay Lab sur cet appareil.') }}</p>
            </div>
            <div class="lab-account-card-body">
                @include('partials.lab-appearance-controls')
            </div>
        </div>
    </x-app.settings.layout>
</section>
