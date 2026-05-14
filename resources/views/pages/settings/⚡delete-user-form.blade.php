<?php

use Livewire\Component;

new class extends Component {}; ?>

<div class="lab-account-danger-card">
    <div class="lab-account-danger-header">
        <div class="lab-account-danger-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                <line x1="12" y1="9" x2="12" y2="13" />
                <line x1="12" y1="17" x2="12.01" y2="17" />
            </svg>
        </div>
        <div>
            <div class="lab-account-danger-title">{{ __('Delete account') }}</div>
            <p class="lab-account-danger-desc">{{ __('Deleting your account is permanent. Your courses, progress, and data will be removed.') }}</p>
        </div>
    </div>
    <div class="lab-account-danger-body">
        <flux:modal.trigger name="confirm-user-deletion">
            <flux:button variant="danger" data-test="delete-user-button">
                {{ __('Delete account') }}
            </flux:button>
        </flux:modal.trigger>

        <livewire:pages::settings.delete-user-modal />
    </div>
</div>
