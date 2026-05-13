<?php
$pageTitle = "Parcours Fondation | DeutschWay";
$pageDescription = "Maîtrisez les bases A1-B1 pour votre vie en Allemagne.";
include 'includes/head.php';
include 'includes/header.php';
?>

<!-- PAGE FONDATIONS -->
<section class="animate-fade starfield-bg" style="min-height:100vh; padding:6rem 1rem 4rem;">
    <div class="container">
        <!-- Hero -->
        <div class="hero-grid mb-16">
            <div>
                <p class="text-secondary font-mono uppercase tracking-widest mb-4" style="font-size:.75rem;">DEUTSCHWAY
                </p>
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
                                <svg viewBox="0 0 24 24" class="svg">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                <svg viewBox="0 0 24 24" class="svg">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="main-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="bottom-section">
                        <span class="title">FONDATIONS (A1-B1)</span>
                        <span class="desc">Comprendre et utiliser des expressions quotidiennes et des phrases
                            simples.</span>
                        <div class="row">
                            <div class="item"><span class="big-text">Verb</span><span class="regular-text">verbe</span>
                            </div>
                            <div class="item"><span class="big-text">Sein</span><span class="regular-text">être</span>
                            </div>
                            <div class="item"><span class="big-text">Haben</span><span class="regular-text">avoir</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline CECRL -->
        <h2 class="text-center mb-12">PARCOURS CECRL</h2>
        <div class="timeline-container"
            style="overflow-x:auto; padding-bottom:2rem; -webkit-overflow-scrolling: touch;">
            <div class="flex items-end"
                style="gap:2rem; position:relative; min-width:1800px; padding-top: 2rem; padding-left: 2rem; padding-right: 2rem;">
                <div
                    style="position:absolute;bottom:22px;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(221,0,0,.3),rgba(221,0,0,.5),rgba(221,0,0,.3),transparent);z-index:0;">
                </div>

                <!-- A1 -->
                <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;"
                    onclick="openModal('modal-a1')">
                    <div class="FormDoc-card">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">A1 DÉBUTANT</span>
                            <span class="desc">Comprendre et utiliser des expressions familières quotidiennes.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Verb</span><span
                                        class="regular-text">verbe</span></div>
                                <div class="item"><span class="big-text">Sein</span><span
                                        class="regular-text">être</span></div>
                                <div class="item"><span class="big-text">Haben</span><span
                                        class="regular-text">avoir</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-node active"></div>
                </div>

                <!-- A2 -->
                <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                    <div class="FormDoc-card secondary">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg" style="fill: var(--primary);">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">A2 ÉLÉMENTAIRE</span>
                            <span class="desc">Communiquer lors de tâches simples et habituelles.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Préterit</span><span
                                        class="regular-text">Passé</span></div>
                                <div class="item"><span class="big-text">Adjektiv</span><span
                                        class="regular-text">Adjectif</span></div>
                                <div class="item"><span class="big-text">Familie</span><span
                                        class="regular-text">Famille</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-node active" style="border-color:var(--secondary);"></div>
                </div>

                <!-- B1 -->
                <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                    <div class="FormDoc-card">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M18 8h1a4 4 0 0 1 0 8h-1" />
                                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z" />
                                        <line x1="6" y1="1" x2="6" y2="4" />
                                        <line x1="10" y1="1" x2="10" y2="4" />
                                        <line x1="14" y1="1" x2="14" y2="4" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                                </svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">B1 SEUIL</span>
                            <span class="desc">Comprendre les points essentiels d'une conversation courante.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Nebensatz</span><span
                                        class="regular-text">Subordonnée</span></div>
                                <div class="item"><span class="big-text">Meinung</span><span
                                        class="regular-text">Opinion</span></div>
                                <div class="item"><span class="big-text">Reise</span><span
                                        class="regular-text">Voyage</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-node active "></div>
                </div>

                <!-- B2 -->
                <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                    <div class="FormDoc-card secondary">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg" style="fill: var(--primary);">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <circle cx="12" cy="8" r="7" />
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z" />
                                    <path
                                        d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z" />
                                    <path d="M9 12H4s.55-3.03 2-5c1.62-2.2 5-3 5-3" />
                                    <path d="M12 15v5s3.03-.55 5-2c2.2-1.62 3-5 3-5" />
                                </svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">B2 AVANCÉ</span>
                            <span class="desc">Interaction avec aisance et spontanéité.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Passiv</span><span
                                        class="regular-text">Passif</span></div>
                                <div class="item"><span class="big-text">Debatte</span><span
                                        class="regular-text">Débat</span></div>
                                <div class="item"><span class="big-text">Arbeit</span><span
                                        class="regular-text">Travail</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-node active " style="border-color:var(--secondary);"></div>
                </div>

                <!-- C1 -->
                <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                    <div class="FormDoc-card">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <polygon points="12 15 17 21 7 21 12 15" />
                                        <path d="M12 22V15" />
                                        <circle cx="12" cy="12" r="9" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76" />
                                </svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">C1 AUTONOME</span>
                            <span class="desc">S'exprimer de façon nuancée et précise.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Stil</span><span
                                        class="regular-text">Style</span></div>
                                <div class="item"><span class="big-text">Wissenschaft</span><span
                                        class="regular-text">Science</span></div>
                                <div class="item"><span class="big-text">Literatur</span><span
                                        class="regular-text">Littérature</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-node active "></div>
                </div>

                <!-- C2 -->
                <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                    <div class="FormDoc-card secondary">
                        <div class="top-section">
                            <div class="corner-border"></div>
                            <div class="icons">
                                <div class="logo">
                                    <svg viewBox="0 0 24 24" class="svg" style="fill: var(--primary);">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                </div>
                                <div class="level-badge">
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M12 8v8" />
                                        <path d="M8 12h8" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" class="svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="main-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7zm3 16h14" />
                                </svg>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">C2 MAÎTRISE</span>
                            <span class="desc">Compréhension sans effort de tout ce qui est lu ou entendu.</span>
                            <div class="row">
                                <div class="item"><span class="big-text">Nuancen</span><span
                                        class="regular-text">Nuances</span></div>
                                <div class="item"><span class="big-text">Expertise</span><span
                                        class="regular-text">Expert</span></div>
                                <div class="item"><span class="big-text">Philosophie</span><span
                                        class="regular-text">Philosophie</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-node active" style="border-color:var(--secondary);"></div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="card glass neon-box text-center mt-20" style="padding:4rem 2rem; border-radius:1.5rem;">
            <h2 class="glow-text mb-4">TESTEZ VOTRE NIVEAU</h2>
            <p class="text-muted mb-8 font-mono mx-auto" style="max-width:36rem; line-height:1.7;">Vous ne savez pas par
                où commencer ? Passez notre test de positionnement gratuit pour découvrir votre niveau CECRL.</p>
            <button onclick="showNotification('Test de positionnement — bientôt disponible !')"
                class="btn btn-secondary neon-box-secondary" style="padding:1.1rem 2.5rem;">PASSER LE TEST (15
                MIN)</button>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
