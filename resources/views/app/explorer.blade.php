<x-layouts::app :title="__('Explorer')">
    <div class="lab-section-header">
        <div class="lab-section-eyebrow">Section active</div>
        <div class="lab-section-title">Explorer</div>
    </div>

    <div class="lab-wip-container">
        <div class="lab-ring-deco"></div>

        <div class="lab-wip-card">
            <div class="lab-wip-badge">
                <span class="lab-wip-badge-dot"></span>
                IMMERSION & DÉCOUVERTE
            </div>
            <div class="lab-wip-title">
                <span>Sortez des sentiers battus pour pratiquer autrement</span>
            </div>
            <p class="lab-wip-desc">
                Cet espace proposera bientôt des activités,<br/>
                médias et défis pour explorer la langue<br/>
                en contexte réel depuis le lab.
            </p>
            <div class="lab-wip-progress">
                <div class="lab-wip-progress-bar" style="width: 15%"></div>
            </div>
            <div class="lab-wip-progress-label">
                <span>Progression globale</span>
                <span>15%</span>
            </div>
            <div class="lab-chip-container">
                <div class="lab-chip">
                    <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                    Lab · Explorer
                </div>
                <div class="lab-chip">
                    <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                    Contenu à venir
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
