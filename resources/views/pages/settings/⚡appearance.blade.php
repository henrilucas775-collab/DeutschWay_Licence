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
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" >
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4l3 3" />
                    </svg>
                    {{ __('Appearance') }}
                </div>
                <p class="lab-account-card-desc">{{ __('Choose how DeutschWay Lab looks on this device. System follows your operating system setting.') }}</p>
            </div>
            <div class="lab-account-card-body">
                <div style="display:flex;align-items:center;justify-content:space-between" x-data="{
                    isDark: document.documentElement.classList.contains('dark'),
                    toggle() {
                        this.isDark = !this.isDark;
                        try {
                            if (typeof $flux !== 'undefined') $flux.appearance = this.isDark ? 'dark' : 'light';
                        } catch(e) {}
                        if (this.isDark) document.documentElement.classList.add('dark');
                        else document.documentElement.classList.remove('dark');
                        localStorage.setItem('flux.appearance', this.isDark ? 'dark' : 'light');
                    }
                }">
                  <div>
                    <div style="font-size:.875rem;font-weight:600;color:var(--text-primary)">Thème sombre</div>
                    <div style="font-size:.78rem;color:var(--text-muted);margin-top:2px">Active le mode nuit pour l'interface.</div>
                  </div>
                  <label style="position:relative;display:block;width:40px;height:22px;flex-shrink:0;cursor:pointer;">
                    <input type="checkbox" style="position:absolute;opacity:0;width:0;height:0" x-model="isDark" @change="toggle()">
                    <span style="position:absolute;inset:0;background:#d1d5db;border-radius:22px;transition:.3s" :style="isDark ? 'background:var(--lab-accent,#5b7fff)' : 'background:#d1d5db'"></span>
                    <span style="position:absolute;left:3px;top:3px;width:16px;height:16px;background:#fff;border-radius:50%;transition:.3s;pointer-events:none" :style="isDark ? 'transform:translateX(18px)' : 'transform:translateX(0)'"></span>
                  </label>
                </div>

                <div class="lab-account-divider my-6" style="height:1px; background:rgba(255,255,255,0.08);"></div>
                
                <div>
                  <div style="font-size:.875rem;font-weight:600;color:var(--text-primary);margin-bottom:10px">{{ __("Couleur d'accentuation") }}</div>
                  <div style="display:flex;gap:10px;flex-wrap:wrap" x-data="{
                      colors: ['#dd0000', '#5b7fff', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'],
                      activeColor: localStorage.getItem('accentColor') || '#dd0000',
                      setAccent(color) {
                          this.activeColor = color;
                          document.documentElement.style.setProperty('--color-primary', color);
                          document.documentElement.style.setProperty('--color-accent', color);
                          document.documentElement.style.setProperty('--lab-accent', color);
                          document.documentElement.style.setProperty('--lab-ui-accent', color);
                          localStorage.setItem('accentColor', color);
                      }
                  }" x-init="if (activeColor !== '#dd0000') setAccent(activeColor)">
                    <template x-for="color in colors">
                        <div @click="setAccent(color)" 
                             :style="`width:28px;height:28px;border-radius:50%;background:${color};cursor:pointer;border:3px solid #fff;`"
                             :class="{ 'ring-2 ring-white ring-offset-2 ring-offset-black': activeColor === color }"></div>
                    </template>
                  </div>
                </div>
            </div>
        </div>
    </x-pages::settings.layout>
</section>
