<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen">
        <div class="lab-shell">
            <div class="lab-blob lab-blob-1"></div>
            <div class="lab-blob lab-blob-2"></div>
            <div class="lab-blob lab-blob-3"></div>

            <!-- SIDEBAR CLAIRE -->
            <aside class="lab-sidebar">
                <div class="lab-sidebar-brand">
                    <div class="lab-brand-badge">
                        <div class="lab-brand-icon">
                            <svg width="22" height="22" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                <path d="M3 7L10 2L17 7L10 12L3 7Z" />
                                <path d="M3 12L10 17L17 12" />
                                <path d="M3 7L3 12" />
                                <path d="M17 7L17 12" />
                            </svg>
                        </div>
                        <div>
                            <div class="lab-brand-name">DEUTSCHWAY</div>
                            <div class="lab-brand-tag">lab · version claire</div>
                        </div>
                    </div>
                </div>

                <nav class="lab-nav">
                    <div class="lab-nav-label">Espace</div>

                    <ul class="lab-nav-list">
                        <li>
                            <a href="{{ route('dashboard') }}" class="lab-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" wire:navigate>
                                <svg class="lab-nav-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M3 9L10 3L17 9V16C17 16.6 16.6 17 16 17H13V12H7V17H4C3.4 17 3 16.6 3 16V9Z" />
                                </svg>
                                <span class="lab-nav-text">Accueil</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('niveau-zero') }}" class="lab-nav-item {{ request()->routeIs('niveau-zero') ? 'active' : '' }}" wire:navigate >
                                <svg class="lab-nav-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M3 6L10 2L17 6L10 10L3 6Z" />
                                    <path d="M3 10L10 14L17 10" />
                                    <path d="M10 14L10 18" />
                                    <path d="M7 12L7 16" />
                                    <path d="M13 12L13 16" />
                                </svg>
                                <span class="lab-nav-text">Apprendre</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('fondations') }}" class="lab-nav-item {{ request()->routeIs('fondations') ? 'active' : '' }}" wire:navigate>
                                <svg class="lab-nav-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="4" width="14" height="12" rx="1.5" />
                                    <path d="M7 8H13M7 11H11" />
                                </svg>
                                <span class="lab-nav-text">Cours</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('immersion') }}" class="lab-nav-item {{ request()->routeIs('immersion') ? 'active' : '' }}" wire:navigate>
                                <svg class="lab-nav-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="10" cy="10" r="7" />
                                    <path d="M13 7L8 13M8 7L13 13" />
                                </svg>
                                <span class="lab-nav-text">Explorer</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="lab-nav-item" wire:navigate>
                                <svg class="lab-nav-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M3 16L6 10L9 13L13 6L16 8" />
                                    <circle cx="6" cy="10" r="1.2" fill="currentColor" stroke="none" />
                                    <circle cx="9" cy="13" r="1.2" fill="currentColor" stroke="none" />
                                    <circle cx="13" cy="6" r="1.2" fill="currentColor" stroke="none" />
                                    <circle cx="16" cy="8" r="1.2" fill="currentColor" stroke="none" />
                                </svg>
                                <span class="lab-nav-text">Progression</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('profile.edit') }}" class="lab-nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}" wire:navigate>
                                <svg class="lab-nav-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="10" cy="7" r="3.5" />
                                    <path d="M3 17C3 13.7 6.1 11 10 11C13.9 11 17 13.7 17 17" />
                                </svg>
                                <span class="lab-nav-text">Account</span>
                            </a>
                        </li>
                    </ul>
                </nav>


                <div class="lab-sidebar-footer">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
                        @csrf
                    </form>
                    <div class="lab-user-chip" onclick="document.getElementById('logout-form').submit();" title="Déconnexion">
                        <div class="lab-user-avatar">
                            {{ auth()->user()->initials() }}
                        </div>
                        <div class="lab-user-meta">
                            <div class="lab-user-name">{{ auth()->user()->name }}</div>
                            <div class="lab-user-role">élève · lab</div>
                        </div>
                        <div class="status-dot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--lab-accent); box-shadow: 0 0 6px var(--lab-accent);"></div>
                    </div>
                </div>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="lab-main">
                <header class="lab-topbar">
                    <div class="lab-topbar-left">
                        <div class="lab-breadcrumb">
                            <span>Lab</span>
                            <span>›</span>
                            <span class="lab-breadcrumb-current">
                                @if(request()->routeIs('dashboard')) Accueil
                                @elseif(request()->routeIs('niveau-zero')) Apprendre
                                @elseif(request()->routeIs('fondations')) Cours
                                @elseif(request()->routeIs('immersion')) Explorer
                                @elseif(request()->routeIs('profile.edit')) Mon Compte
                                @else Navigation
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="lab-topbar-actions" style="display: flex; gap: 12px;">
                        <a href="{{ route('home') }}" class="btn-ghost" style="text-decoration: none; display: flex; align-items: center; gap: 8px; padding: 8px 16px; border: 1px solid var(--lab-glass-border); border-radius: 40px; background: white; color: var(--lab-charcoal-mid); font-size: 12px; font-weight: 500; cursor: pointer; transition: all 0.2s;" wire:navigate>
                            <svg width="12" height="12" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Retour au site
                        </a>
                    </div>
                </header>

                <div class="lab-content">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
