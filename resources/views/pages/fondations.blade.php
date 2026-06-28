<x-layouts.cyber 
    title="Parcours Fondation | DeutschWay"
    description="Maîtrisez les bases A1-B1 pour votre vie en Allemagne."
>
    <!-- PAGE FONDATIONS -->
    <section class="animate-fade starfield-bg" style="min-height:100vh; padding:6rem 1rem 4rem;">
        <div class="container">
            <!-- Hero -->
            <div class="hero-grid mb-16">
                <div>
                    <p class="text-secondary font-mono uppercase tracking-widest mb-4" style="font-size:.75rem;">DEUTSCHWAY</p>
                    <h1 class="font-mono leading-tight mb-6" style="font-size:clamp(2.5rem,6vw,4rem);">
                        <span class="block">Parcours</span>
                        <span class="block neon-glow">FONDATIONS</span>
                    </h1>
                    <p class="text-muted font-mono leading-relaxed mb-8" style="font-size:1.05rem; max-width:480px;">
                        Suivez notre programme structuré selon les niveaux du CECRL. Du débutant à l'expert, progressez à
                        votre rythme avec des objectifs pédagogiques clairs.
                    </p>
                </div>
                <div class="hidden-mobile flex justify-center" style="padding-left:19rem">
                    <div class="FormDoc-card light">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>
                                    <svg viewBox="0 0 24 24" class="svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" /></svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" /></svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">FONDATIONS (A1-B1)</span>
                            <span class="desc">Comprendre et utiliser des expressions quotidiennes et des phrases simples.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Verb</span><span class="regular-text">verbe</span></div>
                                <div class="item"><span class="big-text">Sein</span><span class="regular-text">être</span></div>
                                <div class="item"><span class="big-text">Haben</span><span class="regular-text">avoir</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline CECRL -->
            <h2 class="text-center mb-12 uppercase tracking-widest">PARCOURS FONDATIONS</h2>
            <div class="timeline-container" style="overflow-x:auto; padding-bottom:2rem; -webkit-overflow-scrolling: touch;">
                <div class="flex items-end" style="gap:2rem; position:relative; min-width:1800px; padding: 2rem;">
                    <div style="position:absolute;bottom:22px;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(221,0,0,.3),rgba(221,0,0,.5),rgba(221,0,0,.3),transparent);z-index:0;"></div>

                    <!-- Levels A1 to C2 -->
                    @foreach(['A1 DÉBUTANT' => 'primary', 'A2 ÉLÉMENTAIRE' => 'secondary', 'B1 SEUIL' => 'primary', 'B2 AVANCÉ' => 'secondary', 'C1 AUTONOME' => 'primary', 'C2 MAÎTRISE' => 'secondary'] as $label => $type)
                        <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                            <div class="FormDoc-card {{ $type == 'secondary' ? 'secondary' : '' }}">
                                <div class="top-section">
                                    <div class="corner-border"></div>
                                    <div class="icons">
                                        <div class="logo">
                                            <svg viewBox="0 0 24 24" class="svg" style="{{ $type == 'secondary' ? 'fill: var(--primary);' : '' }}">
                                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                            </svg>
                                        </div>
                                        <div class="level-badge">
                                            <svg viewBox="0 0 24 24" class="svg"><circle cx="12" cy="12" r="10" /></svg>
                                            <svg viewBox="0 0 24 24" class="svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" /></svg>
                                        </div>
                                    </div>
                                    <div class="main-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" /></svg>
                                    </div>
                                </div>
                                <div class="bottom-section">
                                    <span class="title">{{ $label }}</span>
                                    <span class="desc">Commencez à explorer le module {{ explode(' ', $label)[0] }}.</span>
                                    <div class="row">
                                        <div class="item"><span class="big-text">Test</span><span class="regular-text">test</span></div>
                                        <div class="item"><span class="big-text">Quiz</span><span class="regular-text">quiz</span></div>
                                        <div class="item"><span class="big-text">Live</span><span class="regular-text">live</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-node active" style="{{ $type == 'secondary' ? 'border-color:var(--secondary);' : '' }}"></div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA -->
            <div class="card glass neon-box text-center mt-20" style="padding:4rem 2rem; border-radius:1.5rem;">
                <h2 class="glow-text mb-4 uppercase">TESTEZ VOTRE NIVEAU</h2>
                <p class="text-muted mb-8 font-mono mx-auto" style="max-width:36rem; line-height:1.7;">Vous ne savez pas par
                    où commencer ? Passez notre test de positionnement gratuit.</p>
                <button class="btn btn-secondary neon-box-secondary" style="padding:1.1rem 2.5rem;">PASSER LE TEST (15 MIN)</button>
            </div>
        </div>
    </section>
</x-layouts.cyber>
