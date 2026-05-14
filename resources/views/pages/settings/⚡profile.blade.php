<?php

use App\Concerns\ProfileValidationRules;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Profile settings')] class extends Component {
    use ProfileValidationRules;

    public string $name = '';

    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate($this->profileRules($user->id));

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Flux::toast(variant: 'success', text: __('Profile updated.'));
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Flux::toast(text: __('A new verification link has been sent to your email address.'));
    }

    #[Computed]
    public function hasUnverifiedEmail(): bool
    {
        return Auth::user() instanceof MustVerifyEmail && ! Auth::user()->hasVerifiedEmail();
    }

    #[Computed]
    public function showDeleteUser(): bool
    {
        return ! Auth::user() instanceof MustVerifyEmail
            || (Auth::user() instanceof MustVerifyEmail && Auth::user()->hasVerifiedEmail());
    }
}; ?>

<section class="lab-account-theme w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Profile settings') }}</flux:heading>

    <x-pages::settings.layout>
        <div class="lab-account-card">
            <div class="lab-account-card-header">
                <div class="lab-account-card-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    {{ __('Personal information') }}
                </div>
                <p class="lab-account-card-desc">{{ __('This information may be visible to instructors or support when you contact us.') }}</p>
            </div>
            <div class="lab-account-card-body">
                <div class="lab-account-avatar-row">
                    <div class="lab-account-avatar-lg" aria-hidden="true">{{ auth()->user()->initials() }}</div>
                    <div class="lab-account-avatar-meta">
                        <div class="lab-account-avatar-name">{{ auth()->user()->name }}</div>
                        <div class="lab-account-avatar-email">{{ auth()->user()->email }}</div>
                        <span class="lab-account-photo-btn" title="{{ __('Coming soon') }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="17 8 12 3 7 8" />
                                <line x1="12" x2="12" y1="3" y2="15" />
                            </svg>
                            {{ __('Change photo') }}
                        </span>
                    </div>
                </div>

                <div class="lab-account-divider"></div>

                <form wire:submit="updateProfileInformation" class="space-y-6">
                    <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

                    <div>
                        <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                        @if ($this->hasUnverifiedEmail)
                            <flux:text class="mt-4">
                                {{ __('Your email address is unverified.') }}

                                <flux:link class="cursor-pointer text-sm" wire:click.prevent="resendVerificationNotification">
                                    {{ __('Click here to re-send the verification email.') }}
                                </flux:link>
                            </flux:text>
                        @endif
                    </div>

                    <div class="lab-account-form-actions">
                        <flux:button variant="primary" type="submit" data-test="update-profile-button">
                            {{ __('Save') }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>

        @if ($this->showDeleteUser)
            <livewire:pages::settings.delete-user-form />
        @endif
    </x-pages::settings.layout>
</section>
