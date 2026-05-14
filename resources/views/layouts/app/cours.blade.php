<x-layouts::app :title="__('Cours')">
    <div class="lab-section-header">
        <div class="lab-section-eyebrow">Section active</div>
        <div class="lab-section-title">Cours</div>
    </div>

    <div class="lab-wip-container">
        <div class="lab-ring-deco"></div>

        <div class="lab-wip-card">
            <div class="lab-wip-badge">
                <span class="lab-wip-badge-dot"></span>
                BIBLIOTHÈQUE DE COURS
            </div>
            <div class="lab-wip-title">
                <span>Accédez à vos cours structurés et à vos fiches</span>
            </div>
            <p class="lab-wip-desc">
                Ici s’affichera la liste de vos parcours, unités<br/>
                et ressources téléchargeables pour consolider<br/>
                chaque niveau dans le lab.
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
                    Lab · Cours
                </div>
                <div class="lab-chip">
                    <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                    Contenu à venir
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
