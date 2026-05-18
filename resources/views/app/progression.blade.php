<x-layouts::app :title="__('Progression')">
    <div class="lab-section-header">
        <div class="lab-section-eyebrow">Section active</div>
        <div class="lab-section-title">Progression</div>
    </div>

    <div class="lab-wip-container">
        <div class="lab-ring-deco"></div>

        <div class="lab-wip-card">
            <div class="lab-wip-badge">
                <span class="lab-wip-badge-dot"></span>
                SUIVI & MOTIVATION
            </div>
            <div class="lab-wip-title">
                <span>Visualisez vos accomplissements et votre rythme</span>
            </div>
            <p class="lab-wip-desc">
                Bientôt : graphiques, jalons, série d’études<br/>
                et rappels pour garder le cap sur vos objectifs<br/>
                dans l’atelier DeutschWay Lab.
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
                    Lab · Progression
                </div>
                <div class="lab-chip">
                    <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                    Contenu à venir
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
