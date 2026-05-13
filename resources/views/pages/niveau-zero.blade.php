<x-layouts.cyber 
    title="Niveau Zéro | DeutschWay"
    description="Le point de départ idéal pour les débutants complets en allemand."
>
    <!-- PAGE NIVEAU ZÉRO -->
    <section class="animate-fade starfield-bg" style="min-height:100vh; padding:6rem 1rem 4rem;">
        <div class="container">
            <!-- Hero -->
            <div class="hero-grid mb-16">
                <div>
                    <p class="text-secondary font-mono uppercase tracking-widest mb-4" style="font-size:.75rem;">DEUTSCHWAY</p>
                    <h1 class="font-mono leading-tight mb-6" style="font-size:clamp(2.5rem,6vw,4rem);">
                        <span class="block">Parcours</span>
                        <span class="block neon-glow">NIVEAU ZÉRO</span>
                    </h1>
                    <p class="text-muted font-mono leading-relaxed mb-8" style="font-size:1.05rem; max-width:480px;">
                        Débutez avec les fondamentaux : alphabet, chiffres, couleurs et expressions du quotidien.
                        L'initialisation de votre système linguistique commence ici.
                    </p>
                </div>
                <div class="hidden-mobile flex justify-center" style="padding-left: 19rem;">
                    <div class="card glass neon-box"
                        style="border-radius:1.5rem; padding:2rem; max-width:350px; width:100%;">
                        <div class="text-primary mb-3">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                                <path d="M8 7h6M8 11h8" />
                            </svg>
                        </div>
                        <p class="text-primary font-mono uppercase tracking-widest mb-2" style="font-size:.7rem;">MODULE
                            ESSENTIEL</p>
                        <h3 class="mb-2">ALPHABET &amp; SONS</h3>
                        <p class="text-muted" style="font-size:.875rem;">Maîtrisez les 30 lettres et les sons spécifiques de
                            la langue allemande.</p>
                    </div>
                </div>
            </div>

            <!-- Feuille de route orbitale -->
            <h2 class="text-center mb-4">VOTRE FEUILLE DE ROUTE</h2>
            <p class="text-center text-muted font-mono text-sm mb-8 max-w-xl mx-auto" style="line-height:1.6;">
                Les modules tournent en orbite : cliquez sur un nœud pour le détailler et voir les modules liés. Cliquez sur
                le fond pour revenir à la vue pleine carte.
            </p>
            <div class="roadmap-layout">
                <aside class="destination-decor">
                    <article class="destination-decor__card">
                        <img src="https://images.unsplash.com/photo-1467269204594-9661b134dd2b?auto=format&fit=crop&w=900&q=80"
                            alt="Allemagne" class="destination-decor__img">
                        <div class="destination-decor__overlay"></div>
                        <button type="button" class="destination-decor__like-btn" aria-label="Like">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-6.7-4.2-9.3-7.5C.5 10.9 2 6.7 5.8 5.6c2-.6 4.2.1 5.4 1.8 1.2-1.7 3.4-2.4 5.4-1.8 3.8 1.1 5.3 5.3 3.1 7.9C18.7 16.8 12 21 12 21z"></path></svg>
                        </button>
                        <div class="destination-decor__content">
                            <p class="destination-decor__category">- Intégration Allemagne -</p>
                            <h3 class="destination-decor__title">Vie quotidienne</h3>
                        </div>
                    </article>
                </aside>

                <div class="orbital-roadmap" id="orbital-roadmap">
                    <div class="orbital-roadmap__scene">
                        <div class="orbital-roadmap__bg" id="orbital-roadmap-bg" role="button" tabindex="0"></div>
                        <div class="orbital-roadmap__perspective">
                            <div class="orbital-roadmap__center">
                                <span class="orbital-roadmap__center-ring orbital-roadmap__center-ring--outer"></span>
                                <span class="orbital-roadmap__center-ring orbital-roadmap__center-ring--inner"></span>
                                <span class="orbital-roadmap__center-core"></span>
                            </div>
                            <div class="orbital-roadmap__orbit-ring"></div>

                            <!-- Nœud 1 -->
                            <div class="orbital-node" data-id="1" data-related="2,3,5" data-energy="88">
                                <span class="orbital-node__glow"></span>
                                <button type="button" class="orbital-node__orb">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" /></svg>
                                </button>
                                <span class="orbital-node__label font-mono">ALPHABET</span>
                                <div class="orbital-node__card glass neon-box" id="orbital-card-1">
                                    <div class="orbital-node__card-pin"></div>
                                    <div class="orbital-node__card-head">
                                        <span class="orbital-badge orbital-badge--progress">EN COURS</span>
                                        <span class="orbital-node__date font-mono">Étape 1</span>
                                    </div>
                                    <h3 class="orbital-node__card-title">Alphabet &amp; sons</h3>
                                    <p class="orbital-node__card-text text-muted">Lettres, umlauts, ß et prononciation.</p>
                                    <div class="orbital-energy">
                                        <div class="orbital-energy__row">
                                            <span class="font-mono text-xs text-muted">Progression</span>
                                            <span class="font-mono text-xs orbital-energy__val">88%</span>
                                        </div>
                                        <div class="orbital-energy__bar"><span class="orbital-energy__fill" style="width:88%"></span></div>
                                    </div>
                                    <div class="orbital-related">
                                        <div class="orbital-related__btns">
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="2">Chiffres →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="3">Couleurs →</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary w-full mt-4 orbital-node__open-modal">Ouvrir le module</button>
                                </div>
                            </div>
                                   <!-- Nœud 2 : Chiffres -->
                            <div class="orbital-node" data-id="2" data-related="1,3,5" data-energy="42">
                                <span class="orbital-node__glow"></span>
                                <button type="button" class="orbital-node__orb">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1Z" /></svg>
                                </button>
                                <span class="orbital-node__label font-mono">CHIFFRES</span>
                                <div class="orbital-node__card glass neon-box" id="orbital-card-2">
                                    <div class="orbital-node__card-pin"></div>
                                    <div class="orbital-node__card-head">
                                        <span class="orbital-badge orbital-badge--pending">À VENIR</span>
                                        <span class="orbital-node__date font-mono">Étape 2</span>
                                    </div>
                                    <h3 class="orbital-node__card-title">Nombres &amp; quantités</h3>
                                    <p class="orbital-node__card-text text-muted">Compter, les ordres de grandeur et l’usage du nombre dans la vie quotidienne.</p>
                                    <div class="orbital-energy">
                                        <div class="orbital-energy__row">
                                            <span class="font-mono text-xs text-muted">Progression</span>
                                            <span class="font-mono text-xs orbital-energy__val">42%</span>
                                        </div>
                                        <div class="orbital-energy__bar"><span class="orbital-energy__fill" style="width:42%"></span></div>
                                    </div>
                                    <div class="orbital-related">
                                        <p class="orbital-related__title font-mono text-xs text-secondary uppercase tracking-wider mb-2">Modules liés</p>
                                        <div class="orbital-related__btns">
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="1">Alphabet →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="3">Couleurs →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="5">Quotidien →</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nœud 3 : Couleurs -->
                            <div class="orbital-node" data-id="3" data-related="2,4,5" data-energy="56">
                                <span class="orbital-node__glow"></span>
                                <button type="button" class="orbital-node__orb">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 11-6 6v3h9l3-3" /><path d="m22 12-4.6 4.6a2 2 0 0 1-2.8 0l-5.2-5.2a2 2 0 0 1 0-2.8L14 4" /></svg>
                                </button>
                                <span class="orbital-node__label font-mono">COULEURS</span>
                                <div class="orbital-node__card glass neon-box" id="orbital-card-3">
                                    <div class="orbital-node__card-pin"></div>
                                    <div class="orbital-node__card-head">
                                        <span class="orbital-badge orbital-badge--pending">À VENIR</span>
                                        <span class="orbital-node__date font-mono">Étape 3</span>
                                    </div>
                                    <h3 class="orbital-node__card-title">Couleurs &amp; description</h3>
                                    <p class="orbital-node__card-text text-muted">Vocabulaire visuel et accords simples pour décrire ce qui vous entoure.</p>
                                    <div class="orbital-energy">
                                        <div class="orbital-energy__row">
                                            <span class="font-mono text-xs text-muted">Progression</span>
                                            <span class="font-mono text-xs orbital-energy__val">56%</span>
                                        </div>
                                        <div class="orbital-energy__bar"><span class="orbital-energy__fill" style="width:56%"></span></div>
                                    </div>
                                    <div class="orbital-related">
                                        <p class="orbital-related__title font-mono text-xs text-secondary uppercase tracking-wider mb-2">Modules liés</p>
                                        <div class="orbital-related__btns">
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="2">Chiffres →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="4">Politesse →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="5">Quotidien →</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nœud 4 : Politesse -->
                            <div class="orbital-node" data-id="4" data-related="3,5" data-energy="30">
                                <span class="orbital-node__glow"></span>
                                <button type="button" class="orbital-node__orb">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /></svg>
                                </button>
                                <span class="orbital-node__label font-mono">POLITESSE</span>
                                <div class="orbital-node__card glass neon-box" id="orbital-card-4">
                                    <div class="orbital-node__card-pin"></div>
                                    <div class="orbital-node__card-head">
                                        <span class="orbital-badge orbital-badge--pending">À VENIR</span>
                                        <span class="orbital-node__date font-mono">Étape 4</span>
                                    </div>
                                    <h3 class="orbital-node__card-title">Politesse &amp; interactions</h3>
                                    <p class="orbital-node__card-text text-muted">Formules essentielles pour entrer en contact et respecter les codes du quotidien.</p>
                                    <div class="orbital-energy">
                                        <div class="orbital-energy__row">
                                            <span class="font-mono text-xs text-muted">Progression</span>
                                            <span class="font-mono text-xs orbital-energy__val">30%</span>
                                        </div>
                                        <div class="orbital-energy__bar"><span class="orbital-energy__fill" style="width:30%"></span></div>
                                    </div>
                                    <div class="orbital-related">
                                        <p class="orbital-related__title font-mono text-xs text-secondary uppercase tracking-wider mb-2">Modules liés</p>
                                        <div class="orbital-related__btns">
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="3">Couleurs →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="5">Quotidien →</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nœud 5 : Vie quotidienne -->
                            <div class="orbital-node" data-id="5" data-related="2,3,4" data-energy="48">
                                <span class="orbital-node__glow"></span>
                                <button type="button" class="orbital-node__orb">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" /><polyline points="9 22 9 12 15 12 15 22" /></svg>
                                </button>
                                <span class="orbital-node__label font-mono orbital-node__label--long" title="Vie quotidienne">VIE QUOTIDIENNE</span>
                                <div class="orbital-node__card glass neon-box" id="orbital-card-5">
                                    <div class="orbital-node__card-pin"></div>
                                    <div class="orbital-node__card-head">
                                        <span class="orbital-badge orbital-badge--pending">À VENIR</span>
                                        <span class="orbital-node__date font-mono">Étape 5</span>
                                    </div>
                                    <h3 class="orbital-node__card-title">Vie quotidienne</h3>
                                    <p class="orbital-node__card-text text-muted">Courses, transports, logement et habitudes locales : le vocabulaire et les situations que vous croisez chaque jour en Allemagne.</p>
                                    <div class="orbital-energy">
                                        <div class="orbital-energy__row">
                                            <span class="font-mono text-xs text-muted">Progression</span>
                                            <span class="font-mono text-xs orbital-energy__val">48%</span>
                                        </div>
                                        <div class="orbital-energy__bar"><span class="orbital-energy__fill" style="width:48%"></span></div>
                                    </div>
                                    <div class="orbital-related">
                                        <p class="orbital-related__title font-mono text-xs text-secondary uppercase tracking-wider mb-2">Modules liés</p>
                                        <div class="orbital-related__btns">
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="2">Chiffres →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="3">Couleurs →</button>
                                            <button type="button" class="btn orbital-jump-btn" data-orbit-jump="4">Politesse →</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <aside class="destination-decor">
                    <article class="destination-decor__card">
                        <img src="https://images.unsplash.com/photo-1527668752968-14dc70a27c95?auto=format&fit=crop&w=900&q=80"
                            alt="Vivre l'Allemagne" class="destination-decor__img">
                        <div class="destination-decor__overlay"></div>
                        <div class="destination-decor__content">
                            <p class="destination-decor__category">- Culture & Loisirs -</p>
                            <h3 class="destination-decor__title">Vivre l'Allemagne</h3>
                        </div>
                    </article>
                </aside>
            </div>

            <!-- CTA -->
            <div class="card glass neon-box text-center mt-20" style="padding:4rem 2rem; border-radius:1.5rem;">
                <h2 class="glow-text mb-4 uppercase">DÉBLOQUER L'ACCÈS COMPLET</h2>
                <p class="text-muted mb-8 font-mono mx-auto" style="max-width:36rem; line-height:1.7;">Maîtrisez les 5
                    modules du Niveau Zéro et obtenez votre badge de certification.</p>
                <a href="{{ route('register') }}" class="btn btn-primary neon-box" style="padding:1.1rem 2.5rem;" wire:navigate>SOUSCRIRE À L'OFFRE</a>
            </div>
        </div>
    </section>
</x-layouts.cyber>
