<div class="lab-account-shell">
    <aside class="lab-account-snav-wrap">
        <nav class="lab-account-snav" aria-label="{{ __('Settings navigation') }}">
            <span class="lab-account-snav-label">{{ __('Sections') }}</span>
            <a
                href="{{ route('profile.edit') }}"
                wire:navigate
                @click="mobileNavOpen = false"
                class="lab-account-snav-item {{ request()->routeIs('profile.edit') ? 'is-active' : '' }}"
            >
                <svg class="lab-account-snav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                {{ __('Profile') }}
            </a>
            <a
                href="{{ route('security.edit') }}"
                wire:navigate
                @click="mobileNavOpen = false"
                class="lab-account-snav-item {{ request()->routeIs('security.edit') ? 'is-active' : '' }}"
            >
                <svg class="lab-account-snav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
                {{ __('Security') }}
            </a>
            <a
                href="{{ route('appearance.edit') }}"
                wire:navigate
                @click="mobileNavOpen = false"
                class="lab-account-snav-item {{ request()->routeIs('appearance.edit') ? 'is-active' : '' }}"
            >
                <svg class="lab-account-snav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8v4l3 3" />
                </svg>
                {{ __('Appearance') }}
            </a>
        </nav>
    </aside>

    <div class="lab-account-panel">
        {{ $slot }}
    </div>
</div>
