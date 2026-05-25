<x-layouts::app :title="isset($chapitreSlug) ? 'Apprendre - ' . ucfirst($chapitreSlug) : __('Apprendre')">
    @if(isset($chapitreSlug))
        @livewire('learn-space', ['chapitreSlug' => $chapitreSlug])
    @else
        <div class="lab-section-header">
            <div class="lab-section-eyebrow">Section active</div>
            <div class="lab-section-title">Apprendre</div>
        </div>

        <div class="lab-wip-container">
            <div class="lab-ring-deco"></div>

            <div class="lab-wip-card">
                <div class="lab-wip-badge">
                    <span class="lab-wip-badge-dot"></span>
                    PARCOURS D’APPRENTISSAGE
                </div>
                <div class="lab-wip-title">
                    <span>Repérez vos leçons et vos objectifs du moment</span>
                </div>
                <p class="lab-wip-desc">
                    Cette zone regroupera bientôt vos modules, rappels<br/>
                    et prochaines étapes pour avancer pas à pas<br/>
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
                        Lab · Apprendre
                    </div>
                    <div class="lab-chip">
                        <svg width="7" height="7" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" stroke="currentColor" fill="none"/></svg>
                        Contenu à venir
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-layouts::app>
