<x-layouts::app :title="__('Dashboard')">
    <div class="lab-section-header">
        <div class="lab-section-eyebrow">Section active</div>
        <div class="lab-section-title">Tableau de Bord</div>
    </div>

    <div class="lab-wip-container">
        <div class="lab-ring-deco"></div>

        <div class="lab-wip-card">
            <div class="lab-wip-badge">
                <span class="lab-wip-badge-dot"></span>
                STATION DE TRAVAIL PRÊTE
            </div>
            <div class="lab-wip-title">
                <span>Bienvenue, {{ auth()->user()->name }}</span>
            </div>
            <p class="lab-wip-desc">
                C'est ici que commence votre immersion.<br/>
                Explorez vos modules d'apprentissage ou consultez<br/>
                votre progression dans le menu latéral.
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
                    Interface Active
                </div>
                <div class="lab-chip">
                    <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                    Système OK
                </div>
                <div class="lab-chip">
                    <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                    DeutschWay Lab
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
