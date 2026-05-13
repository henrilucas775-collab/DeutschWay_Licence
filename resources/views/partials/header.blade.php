<header>
  <nav style="padding: 0.5rem 5%;">
    <a href="{{ route('home') }}" class="logo text-primary">DEUTSCH<span
        class="text-white">WAY</span></a>

    <button class="mobile-menu-toggle show-mobile" onclick="toggleMobileMenu()" aria-label="Ouvrir le menu" aria-expanded="false">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </button>

    <ul class="nav-links">
      <li><a href="{{ route('home') }}" id="nav-home" wire:navigate.hover>ACCUEIL</a></li>
      <li class="dropdown">
        <a href="#" id="nav-parcours" onclick="return false;" aria-haspopup="true" aria-expanded="false">PARCOURS ▾</a>
        <div class="dropdown-content glass" role="menu">
          <a href="{{ route('niveau-zero') }}" wire:navigate.hover>NIVEAU ZÉRO </a>
          <a href="{{ route('fondations') }}" wire:navigate.hover>FONDATIONS (A1-B1)</a>
          <a href="{{ route('immersion') }}" wire:navigate.hover>IMMERSION (B2-C1)</a>
        </div>
      </li>
      <li><a href="{{ route('community') }}" id="nav-communaute" wire:navigate.hover>COMMUNAUTÉ</a></li>
      <li><a href="{{ route('about') }}" id="nav-apropos" wire:navigate.hover>À PROPOS</a></li>
    </ul>

    <div class="auth-buttons">
      @guest
        <a href="{{ route('login') }}" class="btn" style="border: none;" wire:navigate.hover>CONNEXION</a>
        <a href="{{ route('register') }}" class="btn btn-primary neon-box" wire:navigate.hover>S'INSCRIRE</a>
      @endguest

      @auth
        <flux:dropdown position="bottom" align="end">
          <flux:profile
            :initials="auth()->user()->initials()"
            icon-trailing="chevron-down"
            class="cursor-pointer"
          />

          <flux:menu class="min-w-64">
            <div class="flex items-center gap-2 px-3 py-2 text-start">
              <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />
              <div class="grid flex-1 text-start text-sm leading-tight">
                <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                <flux:text class="truncate text-xs">{{ auth()->user()->email }}</flux:text>
              </div>
            </div>

            <flux:menu.separator />

            <flux:menu.item icon="layout-grid" :href="route('dashboard')" wire:navigate>
              Accède à mon Lab
            </flux:menu.item>

            <flux:menu.item icon="cog" :href="route('profile.edit')" wire:navigate>
              Paramètres
            </flux:menu.item>

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}" class="w-full">
              @csrf
              <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                Déconnecté
              </flux:menu.item>
            </form>

          </flux:menu>
        </flux:dropdown>
      @endauth
    </div>

  </nav>
</header>

