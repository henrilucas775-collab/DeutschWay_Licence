<?php

use App\Concerns\PasswordValidationRules;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Security settings')] class extends Component {
    use PasswordValidationRules;

    public string $current_password = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $canManageTwoFactor;

    public bool $twoFactorEnabled;

    public bool $requiresConfirmation;

    /**
     * Mount the component.
     */
    public function mount(DisableTwoFactorAuthentication $disableTwoFactorAuthentication): void
    {
        $this->canManageTwoFactor = Features::canManageTwoFactorAuthentication();

        if ($this->canManageTwoFactor) {
            if (Fortify::confirmsTwoFactorAuthentication() && is_null(auth()->user()->two_factor_confirmed_at)) {
                $disableTwoFactorAuthentication(auth()->user());
            }

            $this->twoFactorEnabled = auth()->user()->hasEnabledTwoFactorAuthentication();
            $this->requiresConfirmation = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirm');
        }
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => $this->currentPasswordRules(),
                'password' => $this->passwordRules(),
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => $validated['password'],
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        Flux::toast(variant: 'success', text: __('Password updated.'));
    }

    /**
     * Handle the two-factor authentication enabled event.
     */
    #[On('two-factor-enabled')]
    public function onTwoFactorEnabled(): void
    {
        $this->twoFactorEnabled = true;
    }

    /**
     * Disable two-factor authentication for the user.
     */
    public function disable(DisableTwoFactorAuthentication $disableTwoFactorAuthentication): void
    {
        $disableTwoFactorAuthentication(auth()->user());

        $this->twoFactorEnabled = false;
    }
}; ?>

<section class="lab-account-theme w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Security settings') }}</flux:heading>

    <x-app.settings.layout>
        <div class="lab-account-card">
            <div class="lab-account-card-header">
                <div class="lab-account-card-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                    {{ __('Security') }}
                </div>
                <p class="lab-account-card-desc">{{ __('Update your password and manage two-factor authentication for this account.') }}</p>
            </div>
            <div class="lab-account-card-body">
                <flux:heading size="sm" class="mb-1">{{ __('Password') }}</flux:heading>
                <flux:subheading size="sm" class="mb-5">
                    {{ __('Use a long, random password that you do not reuse on other websites.') }}
                </flux:subheading>

                <form method="POST" wire:submit="updatePassword" class="space-y-6">
                    <flux:input
                        wire:model="current_password"
                        :label="__('Current password')"
                        type="password"
                        required
                        autocomplete="current-password"
                        viewable
                    />
                    <flux:input
                        wire:model="password"
                        :label="__('New password')"
                        type="password"
                        required
                        autocomplete="new-password"
                        viewable
                    />
                    <flux:input
                        wire:model="password_confirmation"
                        :label="__('Confirm password')"
                        type="password"
                        required
                        autocomplete="new-password"
                        viewable
                    />

                    <div class="lab-account-form-actions">
                        <flux:button variant="primary" type="submit" data-test="update-password-button" style="color: var(--accent);" >
                            {{ __('Save') }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>

        @if ($canManageTwoFactor)
            <div class="lab-account-card">
                <div class="lab-account-card-header">
                    <div class="lab-account-card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                        {{ __('Two-factor authentication') }}
                    </div>
                    <p class="lab-account-card-desc">{{ __('Add a second step at sign-in using an authenticator app on your phone.') }}</p>
                </div>
                <div class="lab-account-card-body">
                    <div class="flex w-full max-w-xl flex-col space-y-6 text-sm" wire:cloak>
                        @if ($twoFactorEnabled)
                            <div class="space-y-4">
                                <flux:text>
                                    {{ __('You will be prompted for a secure, random pin during login, which you can retrieve from the TOTP-supported application on your phone.') }}
                                </flux:text>

                                <div class="flex justify-start">
                                    <flux:button variant="danger" wire:click="disable">
                                        {{ __('Disable 2FA') }}
                                    </flux:button>
                                </div>

                                <livewire:app.settings.two-factor.recovery-codes :$requiresConfirmation />
                            </div>
                        @else
                            <div class="space-y-4">
                                <flux:text variant="subtle">
                                    {{ __('When you enable two-factor authentication, you will be prompted for a secure pin during login. This pin can be retrieved from a TOTP-supported application on your phone.') }}
                                </flux:text>

                                <flux:modal.trigger name="two-factor-setup-modal">
                                    <flux:button variant="primary" wire:click="$dispatch('start-two-factor-setup')">
                                        {{ __('Enable 2FA') }}
                                    </flux:button>
                                </flux:modal.trigger>

                                <livewire:app.settings.two-factor-setup-modal :requires-confirmation="$requiresConfirmation" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </x-app.settings.layout>
</section>
