<?php
$pageTitle = "À Propos | DeutschWay";
$pageDescription = "Découvrez l'équipe derrière DeutschWay et notre mission.";
include 'includes/head.php';
include 'includes/header.php';
?>

<!-- Bloc « About » (même structure que le modèle studio — couleurs DeutschWay) -->
<section id="apropos-studio" class="animate-fade" aria-labelledby="apropos-studio-title">
    <div class="blob blob-1" aria-hidden="true"></div>
    <div class="blob blob-2" aria-hidden="true"></div>
    <div class="dot dot-1" aria-hidden="true"></div>
    <div class="dot dot-2" aria-hidden="true"></div>

    <div class="about-studio-container">

        <div class="header">
            <span class="tagline">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                </svg>
                DISCOVER OUR STORY
            </span>
            <h2 id="apropos-studio-title">À propos de nous</h2>
            <div class="underline-bar" role="presentation"></div>
        </div>

        <p class="intro">
        <strong>DeutschWay</strong> n'est pas un simple cours de langue. C'est une passerelle complète vers une nouvelle vie en Allemagne.
        <br>
        Nous préparons les jeunes Malgaches non seulement à parler allemand, mais à vivre, étudier et travailler en Allemagne avec confiance et compétence.
        </p>   
        
        <div class="grid-3">

            <div class="col-services" id="left-col">

                <div class="service-item">
                    <div class="service-header">
                        <div class="icon-wrap">
                            <svg class="main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                            <svg class="badge" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                            </svg>
                        </div>
                        <h3>Interior</h3>
                    </div>
                    <p>Transform your living spaces with our expert interior design services. We blend functionality and aesthetics to create spaces that reflect your unique style and personality.</p>
                </div>

                <div class="service-item">
                    <div class="service-header">
                        <div class="icon-wrap">
                            <svg class="main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                            <svg class="badge" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <polyline points="22 4 12 14.01 9 11.01" />
                            </svg>
                        </div>
                        <h3>Exterior</h3>
                    </div>
                    <p>Make a lasting impression with stunning exterior designs that enhance curb appeal and create harmonious connections between architecture and landscape.</p>
                </div>

                <div class="service-item">
                    <div class="service-header">
                        <div class="icon-wrap">
                            <svg class="main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 19l7-7 3 3-7 7-3-3z" />
                                <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                <path d="M2 2l7.586 7.586" />
                                <circle cx="11" cy="11" r="2" />
                            </svg>
                            <svg class="badge" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                        </div>
                        <h3>Design</h3>
                    </div>
                    <p>Our innovative design process combines creativity with practicality, resulting in spaces that are both beautiful and functional for everyday living.</p>
                </div>

            </div>

            <div class="center-col">
                <div class="img-wrapper">
                    <div class="dot-top" aria-hidden="true"></div>
                    <div class="img-frame">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=600&amp;q=80" width="600" height="800" alt="Modern interior design">
                        <div class="img-overlay">
                            <a href="parcours-fondation.php" class="portfolio-btn">
                                Our Portfolio
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                    <polyline points="12 5 19 12 12 19" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="border-accent" aria-hidden="true"></div>
                    <div class="float-circle-1" aria-hidden="true"></div>
                    <div class="float-circle-2" aria-hidden="true"></div>
                    <div class="dot-bot" aria-hidden="true"></div>
                </div>
            </div>

            <div class="col-services" id="right-col">

                <div class="service-item">
                    <div class="service-header">
                        <div class="icon-wrap">
                            <svg class="main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 11V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v7" />
                                <path d="M3 15h18" />
                                <path d="M21 19H3" />
                                <path d="M10 11v4" />
                                <path d="M14 11v4" />
                            </svg>
                            <svg class="badge" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                            </svg>
                        </div>
                        <h3>Decoration</h3>
                    </div>
                    <p>Elevate your space with our curated decoration services. From color schemes to textiles and accessories, we perfect every detail to bring your vision to life.</p>
                </div>

                <div class="service-item">
                    <div class="service-header">
                        <div class="icon-wrap">
                            <svg class="main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.3 8.7 8.7 21.3c-1 1-2.5 1-3.4 0l-2.6-2.6c-1-1-1-2.5 0-3.4L15.3 2.7c1-1 2.5-1 3.4 0l2.6 2.6c1 1 1 2.5 0 3.4Z" />
                                <path d="m7.5 10.5 2 2" />
                                <path d="m10.5 7.5 2 2" />
                                <path d="m13.5 4.5 2 2" />
                                <path d="m4.5 13.5 2 2" />
                            </svg>
                            <svg class="badge" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <polyline points="22 4 12 14.01 9 11.01" />
                            </svg>
                        </div>
                        <h3>Planning</h3>
                    </div>
                    <p>Our meticulous planning process ensures every project runs smoothly from concept to completion, with careful attention to timelines, budgets, and requirements.</p>
                </div>

                <div class="service-item">
                    <div class="service-header">
                        <div class="icon-wrap">
                            <svg class="main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="2" width="16" height="20" rx="2" />
                                <path d="M9 22v-4h6v4" />
                                <path d="M8 6h.01" />
                                <path d="M16 6h.01" />
                                <path d="M12 6h.01" />
                                <path d="M12 10h.01" />
                                <path d="M12 14h.01" />
                                <path d="M16 10h.01" />
                                <path d="M16 14h.01" />
                                <path d="M8 10h.01" />
                                <path d="M8 14h.01" />
                            </svg>
                            <svg class="badge" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                        </div>
                        <h3>Execution</h3>
                    </div>
                    <p>Watch your dream space come to life through our flawless execution. Our skilled team handles every aspect of implementation with precision and care.</p>
                </div>

            </div>
        </div>

        <div class="stats" id="stats-grid">

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11" />
                    </svg>
                </div>
                <div class="stat-value"><span class="num" data-target="150">0</span><span>+</span></div>
                <p class="stat-label">Projects Completed</p>
                <div class="stat-line"></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div class="stat-value"><span class="num" data-target="1200">0</span><span>+</span></div>
                <p class="stat-label">Happy Clients</p>
                <div class="stat-line"></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                </div>
                <div class="stat-value"><span class="num" data-target="12">0</span><span></span></div>
                <p class="stat-label">Years Experience</p>
                <div class="stat-line"></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <polyline points="16 7 22 7 22 13" />
                    </svg>
                </div>
                <div class="stat-value"><span class="num" data-target="98">0</span><span>%</span></div>
                <p class="stat-label">Satisfaction Rate</p>
                <div class="stat-line"></div>
            </div>

        </div>

        <div class="cta" id="cta-block">
            <div>
                <h3>Ready to transform your space?</h3>
                <p>Let's create something beautiful together.</p>
            </div>
            <a href="signup.php" class="cta-btn">
                Get Started
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>

    </div>
</section>

<section class="animate-fade starfield-bg" style="min-height:100vh; padding:4rem 1rem 4rem;">
    <div class="container">
        <!-- Learning Path Section -->
        <h2 class="text-center mb-12" style="font-size: 2.5rem;">Trois <span class="text-secondary neon-glow-sec">Parcours</span> Structurés</h2>
        <div class="grid-3 gap-6 mb-20">
            <div class="card glass" style="border-color:var(--secondary);">
                <h3 class="text-primary font-mono mb-4">Niveau 0</h3>
                <p class="text-muted text-sm mb-6">Pour les débutants complets (Lire, écouter et écrire l'allemand).</p>
                <ul class="text-xs space-y-2 text-muted" style="list-style: none;">
                    <li><span class="text-primary">▸</span> Alphabet &amp; Chiffres</li>
                    <li><span class="text-primary">▸</span> Couleurs &amp; Base quotidienne</li>
                    <li><span class="text-primary">▸</span> Évaluation finale</li>
                </ul>
            </div>
            <div class="card glass" style="border-color:var(--primary);">
                <h3 class="text-secondary font-mono mb-4">Fondations</h3>
                <p class="text-muted text-sm mb-6">Toutes les bases de l'allemand (A1 → B1).</p>
                <ul class="text-xs space-y-2 text-muted" style="list-style: none;">
                    <li><span class="text-secondary">▸</span> Premières phrases &amp; Quotidien</li>
                    <li><span class="text-secondary">▸</span> Interactions &amp; Situations réelles</li>
                    <li><span class="text-secondary">▸</span> Maîtrise grammaticale complète</li>
                </ul>
            </div>
            <div class="card glass" style="border-color:var(--secondary);">
                <h3 class="text-primary font-mono mb-4">Immersion</h3>
                <p class="text-muted text-sm mb-6">Prépare-toi à vivre en Allemagne (modules pratiques).</p>
                <ul class="text-xs space-y-2 text-muted" style="list-style: none;">
                    <li><span class="text-primary">▸</span> Vie quotidienne &amp; Intégration</li>
                    <li><span class="text-primary">▸</span> Monde professionnel &amp; Entretiens</li>
                    <li><span class="text-primary">▸</span> Culture &amp; Codes sociaux</li>
                </ul>
            </div>
        </div>

        <!-- Differentiators -->
        <h2 class="text-center mb-12" style="font-size: 2.5rem;">Ce qui nous <span class="text-primary neon-glow">Différencie</span></h2>
        <div class="flex flex-col gap-4 mb-20">
            <div class="card glass flex items-start gap-4 transition-colors" style="cursor:pointer;" onmouseenter="this.style.borderColor='var(--primary)'" onmouseleave="this.style.borderColor=''">
                <div class="text-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"></path><path d="M9 18h6"></path><path d="M10 22h4"></path></svg></div>
                <div>
                    <h3 class="font-mono mb-1">IA Personnalisée</h3>
                    <p class="text-muted">Notre système détecte tes hésitations, erreurs fréquentes et blocages pour proposer une progression adaptée à TOI.</p>
                </div>
            </div>
            <div class="card glass flex items-start gap-4 transition-colors" style="cursor:pointer;" onmouseenter="this.style.borderColor='var(--secondary)'" onmouseleave="this.style.borderColor=''">
                <div class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
                <div>
                    <h3 class="font-mono mb-1">Choc Culturel Intégré</h3>
                    <p class="text-muted">Module unique : "Allemagne vs Madagascar". Comprendre les différences culturelles (ponctualité, communication directe) pour éviter les malentendus.</p>
                </div>
            </div>
            <div class="card glass flex items-start gap-4 transition-colors" style="cursor:pointer;" onmouseenter="this.style.borderColor='var(--primary)'" onmouseleave="this.style.borderColor=''">
                <div class="text-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></div>
                <div>
                    <h3 class="font-mono mb-1">Pas Juste de la Langue</h3>
                    <p class="text-muted">Au-delà des verbes et de la grammaire : préparation à la vie réelle en Allemagne (travail, études, intégration sociale).</p>
                </div>
            </div>
        </div>

        <!-- Final CTA -->
        <div class="card glass neon-box text-center mx-auto" style="padding: 4rem 2rem; border-radius: 2rem; max-width:56rem;">
            <h2 class="font-mono mb-6" style="font-size:2.2rem;">Prêt à <span class="text-secondary neon-glow-sec">commencer</span> ?</h2>
            <p class="text-muted font-mono mb-8" style="max-width:36rem; margin:0 auto 2rem;">Rejoins la communauté DeutschWay et prépare ton avenir en Allemagne.</p>
            <a href="signup.php" class="btn btn-primary neon-box" style="padding: 1.2rem 3rem;">S'INSCRIRE MAINTENANT</a>
        </div>
    </div>
</section>

<script>
(function () {
    var root = document.getElementById('apropos-studio');
    if (!root) return;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) e.target.classList.add('visible');
            else e.target.classList.remove('visible');
        });
    }, { threshold: 0.15 });

    root.querySelectorAll('.service-item').forEach(function (el, i) {
        el.style.transitionDelay = (i % 3) * 0.15 + 's';
        observer.observe(el);
    });

    function animateCounter(el) {
        if (!el) return;
        var target = parseInt(el.dataset.target, 10);
        if (isNaN(target)) return;
        var duration = 1200;
        var start = performance.now();
        function step(now) {
            var p = Math.min((now - start) / duration, 1);
            var ease = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.floor(ease * target);
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = String(target);
        }
        requestAnimationFrame(step);
    }

    var statsGrid = document.getElementById('stats-grid');
    var ctaBlock = document.getElementById('cta-block');

    if (statsGrid && ctaBlock) {
        var statsObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    statsGrid.querySelectorAll('.stat-card').forEach(function (card, i) {
                        setTimeout(function () {
                            card.classList.add('visible');
                            animateCounter(card.querySelector('.num'));
                        }, i * 120);
                    });
                    ctaBlock.classList.add('visible');
                } else {
                    statsGrid.querySelectorAll('.stat-card').forEach(function (card) {
                        card.classList.remove('visible');
                        var num = card.querySelector('.num');
                        if (num) num.textContent = '0';
                    });
                    ctaBlock.classList.remove('visible');
                }
            });
        }, { threshold: 0.25 });

        statsObs.observe(statsGrid);
    }

    setTimeout(function () {
        root.querySelectorAll('.service-item').forEach(function (el) {
            var r = el.getBoundingClientRect();
            if (r.top < window.innerHeight) el.classList.add('visible');
        });
    }, 200);
})();
</script>

<?php include 'includes/footer.php'; ?>
