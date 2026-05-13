<?php
$pageTitle = "DeutschWay | Apprendre l'Allemand en Immersion";
$pageDescription = "La plateforme ultime pour maîtriser l'allemand avec un parcours immersif et un design cyberpunk.";
include 'includes/head.php';
include 'includes/header.php';
?>

<!-- PAGE ACCUEIL -->
<section class="animate-fade starfield-bg"
    style="min-height:100vh; display:flex; align-items:center; padding: 6rem 1rem 4rem;">
    <div class="container">
        <div class="hero-grid">
            <!-- Colonne gauche : texte -->
            <div>
                <p class="text-secondary font-mono uppercase tracking-widest mb-4" style="font-size:.75rem;">La
                    passerelle vers l"Allemagne</p>
                <h1 class="font-mono leading-tight mb-6" style="font-size:clamp(2.1rem,5vw,3.8rem);">
                    <span class="neon-glow animate-pulse">Prépare-toi</span><br>
                    pour l'<span class="text-secondary neon-glow-sec">Allemagne</span>
                </h1>
                <p class="text-muted mb-4 font-mono" style="font-size:1.05rem; line-height:1.7; max-width:480px;">
                    DeutschWay ne se limite pas à un cours de langue classique.
                    <br>
                    La plateforme va bien au-delà de l'apprentissage traditionnel en vous offrant une préparation
                    complète et immersive.
                </p>
                <p class="text-muted mb-8 font-mono" style="font-size:1.05rem; line-height:1.7; max-width:480px;">
                    Elle constitue votre véritable passerelle vers une nouvelle vie en Allemagne.
                    Vous y maîtrisez non seulement la langue, mais aussi la culture et les codes sociaux indispensables
                    pour réussir
                    pleinement votre intégration professionnelle et personnelle.
                </p>
                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="signup.php" class="btn btn-primary neon-box"
                        style="padding:1.1rem 2.2rem; font-size:1rem;">
                        Commencer maintenant
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a href="apropos.php" class="btn btn-secondary neon-box-secondary"
                        style="padding:1.1rem 2.2rem; font-size:1rem;">
                        En savoir plus
                    </a>
                </div>
            </div>

            <!-- Colonne droite : widget niveau -->
            <div class="hidden-mobile flex justify-center" id="level-selector-widget" style="padding-left: 11rem;">
                <div class="relative flex flex-col items-center" style="width:100%; max-width:320px;">
                    <!-- Carte principale -->
                    <div class="glass neon-box w-full"
                        style="border-radius:1.5rem; padding:2rem; min-height:240px; position:relative;">
                        <div class="level-icon">NZ</div>
                        <div class="level-title text-primary font-mono font-bold uppercase tracking-widest mb-2"
                            style="font-size:.75rem; min-height:1.2rem;"></div>
                        <div style="min-height:90px;">
                            <span class="level-subtitle block font-bold text-foreground mb-2"
                                style="font-size:1.05rem;"></span>
                            <span class="level-desc text-muted" style="font-size:.875rem; line-height:1.6;"></span>
                        </div>
                        <!-- Pointe bas -->
                        <div
                            style="position:absolute;bottom:-10px;left:50%;transform:translateX(-50%);width:0;height:0;border-left:10px solid transparent;border-right:10px solid transparent;border-top:10px solid var(--primary);opacity:.5;">
                        </div>
                    </div>

                    <!-- Ligne connecteur -->
                    <div
                        style="width:2px;height:36px;background:linear-gradient(to bottom,var(--primary),transparent);margin-top:.75rem;position:relative;">
                        <div class="animate-pulse"
                            style="position:absolute;bottom:-4px;left:50%;transform:translateX(-50%);width:8px;height:8px;background:var(--primary);border-radius:50%;box-shadow:var(--glow);">
                        </div>
                    </div>

                    <!-- Spinner décoratif -->
                    <div class="flex items-center justify-center mt-4">
                        <div class="animate-spin"
                            style="width:72px;height:72px;border:2px solid var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;position:relative;">
                            <div
                                style="position:absolute;inset:.5rem;border:1px dashed rgba(221,0,0,.4);border-radius:50%;animation:spin 6s linear infinite reverse;">
                            </div>
                            <div
                                style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--secondary));box-shadow:var(--glow);">
                            </div>
                        </div>
                    </div>

                    <!-- Boutons nav -->
                    <div class="flex justify-between w-full mt-6" style="font-size:.7rem;">
                        <button
                            class="prev-btn text-secondary font-mono font-bold uppercase tracking-wider transition-colors"
                            style="background:none;border:none;">◀ PRÉCÉDENT</button>
                        <button
                            class="next-btn text-secondary font-mono font-bold uppercase tracking-wider transition-colors"
                            style="background:none;border:none;">SUIVANT ▶</button>
                    </div>

                    <!-- Points pagination -->
                    <div class="flex gap-2 justify-center mt-3">
                        <div class="dot"></div>
                        <div class="dot active"></div>
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi DeutschWay -->
<section class="py-20" style="background:rgba(0,0,0,.4);">
    <div class="container">
        <h2 class="text-center mb-12" style="font-size:2.5rem;">Pourquoi <span
                class="text-secondary neon-glow-sec">DeutschWay</span> ?</h2>
        <div class="grid-2 gap-6">
            <div class="card glass">
                <div class="flex items-start gap-4">
                    <div class="neon-box-secondary text-secondary flex items-center justify-center rounded-lg flex-shrink-0"
                        style="width:48px;height:48px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M12 18V5" />
                            <path d="M15 13a4.17 4.17 0 0 1-3-4 4.17 4.17 0 0 1-3 4" />
                            <circle cx="12" cy="5" r="3" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2">IA Intelligente</h3>
                        <p class="text-muted">Un coach personnel qui s'adapte à ton niveau et détecte tes blocages.</p>
                    </div>
                </div>
            </div>
            <div class="card glass">
                <div class="flex items-start gap-4">
                    <div class="neon-box text-primary flex items-center justify-center rounded-lg flex-shrink-0"
                        style="width:48px;height:48px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2">Prononciation</h3>
                        <p class="text-muted">Correction en temps réel pour maîtriser les sons allemands.</p>
                    </div>
                </div>
            </div>
            <div class="card glass">
                <div class="flex items-start gap-4">
                    <div class="neon-box-secondary text-secondary flex items-center justify-center rounded-lg flex-shrink-0"
                        style="width:48px;height:48px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2">Micro-learning</h3>
                        <p class="text-muted">Modules courts et progressifs pour un apprentissage efficace.</p>
                    </div>
                </div>
            </div>
            <div class="card glass">
                <div class="flex items-start gap-4">
                    <div class="neon-box text-primary flex items-center justify-center rounded-lg flex-shrink-0"
                        style="width:48px;height:48px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2">Communauté</h3>
                        <p class="text-muted">Connecte-toi avec d'autres apprenants et partage tes expériences.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Témoignages -->
<section class="py-20">
    <div class="container">
        <h2 class="text-center mb-4" style="font-size:2.5rem;">Ils nous font <span
                class="text-secondary neon-glow-sec">confiance</span></h2>
        <p class="text-muted text-center font-mono mb-12" style="max-width:40rem; margin-left:auto; margin-right:auto;">
            Découvre comment DeutschWay a transformé le parcours de nos utilisateurs à Madagascar.
        </p>
        <div class="grid-3 gap-6">
            <div class="card glass">
                <div class="flex items-center gap-4 mb-4">
                    <div class="rounded-full flex items-center justify-center font-bold flex-shrink-0"
                        style="width:48px;height:48px;background:var(--primary);font-size:1.2rem;">S</div>
                    <div>
                        <div class="font-bold">Sarah Connor</div>
                        <div class="text-primary font-mono" style="font-size:.75rem;">Berlin · Niveau A2</div>
                    </div>
                </div>
                <p class="italic text-muted" style="line-height:1.7;">"DeutschWay m'a permis de maîtriser les bases en
                    un temps record."</p>
            </div>
            <div class="card glass neon-box-secondary">
                <div class="flex items-center gap-4 mb-4">
                    <div class="rounded-full flex items-center justify-center font-bold flex-shrink-0"
                        style="width:48px;height:48px;background:var(--secondary);color:#000;font-size:1.2rem;">J</div>
                    <div>
                        <div class="font-bold">Jean-Luc Picard</div>
                        <div class="text-secondary font-mono" style="font-size:.75rem;">Paris · Niveau A1</div>
                    </div>
                </div>
                <p class="italic text-muted" style="line-height:1.7;">"Une expérience immersive unique pour apprendre
                    l'allemand avec style."</p>
            </div>
            <div class="card glass">
                <div class="flex items-center gap-4 mb-4">
                    <div class="rounded-full flex items-center justify-center font-bold flex-shrink-0"
                        style="width:48px;height:48px;background:var(--primary);font-size:1.2rem;">N</div>
                    <div>
                        <div class="font-bold">Nadia R.</div>
                        <div class="text-primary font-mono" style="font-size:.75rem;">Toliara · Niveau B1</div>
                    </div>
                </div>
                <p class="italic text-muted" style="line-height:1.7;">"Le module Choc Culturel est incroyable et
                    indispensable pour mon départ."</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-20 text-center">
    <div class="container">
        <div class="glass neon-box mx-auto" style="padding:4rem 2rem; border-radius:1.5rem; max-width:56rem;">
            <h2 class="mb-6" style="font-size:clamp(1.8rem,4vw,3rem);">Prêt à <span class="neon-glow">transformer</span>
                l'avenir ?</h2>
            <p class="text-muted font-mono mb-4"
                style="font-size:1.1rem; line-height:1.75; max-width:36rem; margin-left:auto; margin-right:auto;">
                Vous n'êtes plus seul dans votre projet d'intégration.
            </p>
            <p class="text-muted font-mono mb-5"
                style="font-size:1.1rem; line-height:1.75; max-width:36rem; margin-left:auto; margin-right:auto;">
                Rejoignez une communauté dynamique de milliers d'apprenants qui avancent chaque jour vers le même
                objectif : parler allemand avec aisance,
                comprendre les codes culturels et gagner la confiance nécessaire pour réussir leur installation en
                Allemagne.
            </p>
            <p class="text-muted font-mono mb-8"
                style="font-size:1.1rem; line-height:1.75; max-width:36rem; margin-left:auto; margin-right:auto;">
                Que vous partiez pour étudier, travailler ou construire une nouvelle vie, vous progressez avec un cadre
                motivant, des ressources concrètes et des personnes qui traversent les mêmes défis que vous. Ensemble,
                nous faisons de l'apprentissage une aventure collective tournée vers un avenir solide.
            </p>
            <a href="signup.php" class="btn btn-secondary neon-box-secondary"
                style="padding:1.2rem 3rem; font-size:1rem;">
                COMMENCER GRATUITEMENT
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
