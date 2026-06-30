<div class="lab-appearance-row" x-data="{
    isDark: false,
    init() {
        this.isDark = typeof isLabThemeDark === 'function' ? isLabThemeDark() : false;
    },
    toggle() {
        if (typeof setLabTheme === 'function') {
            setLabTheme(this.isDark ? 'dark' : 'light');
        }
    }
}">
    <div>
        <div class="lab-appearance-copy-title">Thème sombre du Lab</div>
        <div class="lab-appearance-copy-desc">Active le mode nuit pour l'atelier DeutschWay (sans affecter le site public).</div>
    </div>
    <label class="lab-theme-toggle" aria-label="Activer le thème sombre du Lab">
        <input type="checkbox" x-model="isDark" @change="toggle()">
        <span class="lab-theme-toggle-track"></span>
        <span class="lab-theme-toggle-thumb"></span>
    </label>
</div>

<div class="lab-account-divider"></div>

<div>
    <div class="lab-accent-picker-title">{{ __("Couleur d'accentuation") }}</div>
    <div class="lab-accent-picker" x-data="{
        colors: ['#dd0000', '#5b7fff', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6', '#8B9A8B'],
        activeColor: localStorage.getItem('accentColor') || '#8B9A8B',
        setAccent(color) {
            this.activeColor = color;
            localStorage.setItem('accentColor', color);
            if (typeof applyAccentColor === 'function') {
                applyAccentColor();
            }
        }
    }" x-init="if (activeColor !== '#8B9A8B') setAccent(activeColor)">
        <template x-for="color in colors" :key="color">
            <button
                type="button"
                @click="setAccent(color)"
                class="lab-accent-swatch"
                :class="{ 'is-active': activeColor === color }"
                :style="`background:${color}`"
                :aria-label="`Couleur ${color}`"
            ></button>
        </template>
    </div>
</div>
