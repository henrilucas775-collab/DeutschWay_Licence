/**
 * DEUTSCHWAY SPA - ADVANCED LOGIC SYSTEM
 * High-fidelity adaptation from React source
 */

const pages = {
    'home': 'pages/home.html',
    'login': 'pages/login.html',
    'signup': 'pages/signup.html',
    'apropos': 'pages/apropos.html',
    'communaute': 'pages/communaute.html',
    'niveau-zero': 'pages/niveau-zero.html',
    'parcours-fondation': 'pages/parcours-fondation.html',
    'immersion': 'pages/immersion.html'
};

const pageMetadata = {
    'home': {
        title: 'DeutschWay | Apprendre l\'Allemand en Immersion',
        description: 'La plateforme ultime pour maîtriser l\'allemand avec un parcours immersif et un design cyberpunk.'
    },
    'login': {
        title: 'Connexion | DeutschWay',
        description: 'Accédez à votre espace personnel DeutschWay.'
    },
    'signup': {
        title: 'Inscription | DeutschWay',
        description: 'Rejoignez la communauté DeutschWay et commencez votre apprentissage.'
    },
    'apropos': {
        title: 'À Propos | DeutschWay',
        description: 'Découvrez l\'équipe derrière DeutschWay et notre mission.'
    },
    'communaute': {
        title: 'Communauté | DeutschWay',
        description: 'Échangez avec d\'autres apprenants et trouvez des partenaires d\'étude.'
    },
    'niveau-zero': {
        title: 'Niveau Zéro | DeutschWay',
        description: 'Le point de départ idéal pour les débutants complets en allemand.'
    },
    'parcours-fondation': {
        title: 'Parcours Fondation | DeutschWay',
        description: 'Maîtrisez les bases A1-B1 pour votre vie en Allemagne.'
    },
    'immersion': {
        title: 'Parcours Immersion | DeutschWay',
        description: 'Vivez l\'expérience allemande réelle et atteignez la fluidité B2-C1.'
    }
};

const contentArea = document.getElementById('main-content');
const siteFooter = document.getElementById('site-footer');
const announcer = document.createElement('div');
announcer.setAttribute('aria-live', 'polite');
announcer.setAttribute('aria-atomic', 'true');
announcer.classList.add('sr-only');
document.body.appendChild(announcer);

const defaultFooterHTML = siteFooter ? siteFooter.innerHTML : '';
const defaultFooterClassName = siteFooter ? siteFooter.className : '';
const defaultFooterStyle = siteFooter ? siteFooter.getAttribute('style') : '';
let currentPage = '';

/** Animation feuille de route orbitale (Niveau Zéro) */
let niveauZeroOrbitalRafId = null;

function stopNiveauZeroOrbital() {
    if (niveauZeroOrbitalRafId != null) {
        cancelAnimationFrame(niveauZeroOrbitalRafId);
        niveauZeroOrbitalRafId = null;
    }
}

function initNiveauZeroOrbital() {
    stopNiveauZeroOrbital();

    const root = document.getElementById('orbital-roadmap');
    if (!root) return;

    const nodes = Array.from(root.querySelectorAll('.orbital-node'));
    const bg = document.getElementById('orbital-roadmap-bg');
    if (!nodes.length) return;

    const n = nodes.length;
    let rotation = 0;
    let autoRotate = true;
    let expandedId = null;
    let lastTs = 0;

    /** Alignement fluide sur un nœud (~ duration-700, esprit React / Tailwind) */
    const ORBIT_ALIGN_MS = 700;
    let rotationAnim = null;

    function normalizeDeg(d) {
        return ((d % 360) + 360) % 360;
    }

    function shortestAngleDelta(fromDeg, toDeg) {
        const f = normalizeDeg(fromDeg);
        const t = normalizeDeg(toDeg);
        let d = t - f;
        if (d > 180) d -= 360;
        if (d < -180) d += 360;
        return d;
    }

    /** Courbe proche de ease-out “snap” (proche cubic-bezier(0.16, 1, 0.3, 1)) */
    function easeOrbitalAlignSimple(t) {
        if (t <= 0) return 0;
        if (t >= 1) return 1;
        return 1 - Math.pow(1 - t, 3) * (1 - 0.1 * t);
    }

    function centerRotationForIndex(idx) {
        return normalizeDeg(270 - (idx / n) * 360);
    }

    function startRotationAlign(toRotation) {
        const target = normalizeDeg(toRotation);
        rotationAnim = {
            startAngle: rotation,
            delta: shortestAngleDelta(rotation, target),
            startTime: performance.now(),
            duration: ORBIT_ALIGN_MS
        };
        root.classList.add('orbital-roadmap--aligning');
    }

    function getRadius() {
        return window.innerWidth <= 768 ? 128 : 200;
    }

    function parseRelated(el) {
        const raw = el.getAttribute('data-related');
        if (!raw) return [];
        return raw.split(',').map((s) => parseInt(s.trim(), 10)).filter(Number.isFinite);
    }

    function setPulseFor(activeId) {
        if (!activeId) {
            nodes.forEach((el) => el.classList.remove('orbital-node--pulse'));
            return;
        }
        const activeEl = nodes.find((el) => parseInt(el.dataset.id, 10) === activeId);
        const related = activeEl ? parseRelated(activeEl) : [];
        nodes.forEach((el) => {
            const id = parseInt(el.dataset.id, 10);
            el.classList.toggle('orbital-node--pulse', related.includes(id));
        });
    }

    function applyExpandedClass(activeId) {
        nodes.forEach((el) => {
            const id = parseInt(el.dataset.id, 10);
            const on = id === activeId;
            el.classList.toggle('orbital-node--expanded', on);
            const btn = el.querySelector('.orbital-node__orb');
            if (btn) btn.setAttribute('aria-expanded', on ? 'true' : 'false');
        });
    }

    function collapseOrbital() {
        expandedId = null;
        autoRotate = true;
        rotationAnim = null;
        root.classList.remove('orbital-roadmap--aligning');
        setPulseFor(null);
        applyExpandedClass(null);
    }

    function expandOrbital(id) {
        expandedId = id;
        autoRotate = false;
        const idx = nodes.findIndex((el) => parseInt(el.dataset.id, 10) === id);
        if (idx >= 0) {
            startRotationAlign(centerRotationForIndex(idx));
        }
        setPulseFor(id);
        applyExpandedClass(id);
    }

    function toggleOrbital(id) {
        if (expandedId === id) {
            collapseOrbital();
        } else {
            expandOrbital(id);
        }
    }

    function updateNodePositions() {
        const radius = getRadius();
        nodes.forEach((el, i) => {
            const angleDeg = (i / n) * 360 + rotation;
            const rad = (angleDeg * Math.PI) / 180;
            const x = radius * Math.cos(rad);
            const y = radius * Math.sin(rad);
            const z = Math.round(100 + 50 * Math.cos(rad));
            const opacity = Math.max(0.48, Math.min(1, 0.48 + 0.52 * ((1 + Math.sin(rad)) / 2)));
            const expanded = expandedId === parseInt(el.dataset.id, 10);
            el.style.transform = `translate(calc(-50% + ${x}px), calc(-50% + ${y}px))`;
            el.style.zIndex = expanded ? 220 : String(z);
            el.style.opacity = expanded ? '1' : String(opacity);
        });
    }

    function tick(ts) {
        if (!root.isConnected) {
            stopNiveauZeroOrbital();
            return;
        }

        if (rotationAnim) {
            const elapsed = ts - rotationAnim.startTime;
            const t = Math.min(1, elapsed / rotationAnim.duration);
            const eased = easeOrbitalAlignSimple(t);
            rotation = rotationAnim.startAngle + rotationAnim.delta * eased;
            if (t >= 1) {
                rotation = normalizeDeg(rotationAnim.startAngle + rotationAnim.delta);
                rotationAnim = null;
                root.classList.remove('orbital-roadmap--aligning');
            }
        } else if (autoRotate && expandedId === null) {
            const dt = lastTs ? ts - lastTs : 16.67;
            rotation += 0.3 * (dt / 50);
            rotation = normalizeDeg(rotation);
        }

        lastTs = ts;
        updateNodePositions();
        niveauZeroOrbitalRafId = requestAnimationFrame(tick);
    }

    nodes.forEach((el) => {
        const btn = el.querySelector('.orbital-node__orb');
        if (!btn) return;
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleOrbital(parseInt(el.dataset.id, 10));
        });
    });

    root.querySelectorAll('.orbital-node__card').forEach((card) => {
        card.addEventListener('click', (e) => e.stopPropagation());
    });

    root.querySelectorAll('.orbital-jump-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const targetId = parseInt(btn.getAttribute('data-orbit-jump'), 10);
            const target = nodes.find((el) => parseInt(el.dataset.id, 10) === targetId);
            if (!target) return;
            expandOrbital(targetId);
            target.querySelector('.orbital-node__orb')?.focus();
        });
    });

    root.querySelectorAll('.orbital-node__open-modal').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const modalId = btn.getAttribute('data-modal');
            if (modalId) openModal(modalId);
        });
    });

    if (bg) {
        bg.addEventListener('click', () => collapseOrbital());
        bg.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                collapseOrbital();
            }
        });
    }

    updateNodePositions();
    niveauZeroOrbitalRafId = requestAnimationFrame(tick);
}

// --- NAVIGATION SYSTEM ---

async function navigateTo(pageName, addToHistory = true) {
    if (currentPage === pageName && pageName !== 'home') return;
    
    // Mise à jour de l'historique du navigateur
    if (addToHistory) {
        history.pushState({ page: pageName }, "", "#" + pageName);
    }
    
    contentArea.style.opacity = '0';
    contentArea.style.transform = 'translateY(10px)';
    
    try {
        const response = await fetch(pages[pageName]);
        if (!response.ok) throw new Error('Page non trouvée');
        
        const html = await response.text();
        
        setTimeout(() => {
            stopNiveauZeroOrbital();
            contentArea.innerHTML = html;
            contentArea.style.opacity = '1';
            contentArea.style.transform = 'translateY(0)';
            currentPage = pageName;
            
            updateActiveLink(pageName);
            updateFooterForPage(pageName);
            updateSEOMetadata(pageName);
            announcePageLoad(pageName);
            window.scrollTo(0, 0);
            initPageScripts(pageName);
            
            // Fermer le menu mobile après navigation
            document.querySelector('.nav-links').classList.remove('mobile-active');
            document.querySelector('.auth-buttons').classList.remove('mobile-active');
        }, 300);

    } catch (error) {
        console.error('Erreur de navigation:', error);
        showNotification('Erreur lors du chargement', 'error');
    }
}

function updateActiveLink(pageName) {
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.classList.remove('active');
        if (link.id === `nav-${pageName}`) {
            link.classList.add('active');
        }
    });
}

function updateFooterForPage(pageName) {
    if (!siteFooter) return;

    const isAuthPage = pageName === 'login' || pageName === 'signup';
    if (isAuthPage) {
        siteFooter.className = '';
        siteFooter.setAttribute('style', 'background: #0a0a0a; border-top: 1px solid var(--border);');
        siteFooter.innerHTML = `
            <div class="container footer-simple-line">
                <p>&copy; 2026 DEUTSCHWAY. TOUS DROITS RÉSERVÉS. | <a href="#">Mentions Légales</a></p>
            </div>
        `;
        return;
    }

    siteFooter.className = defaultFooterClassName;
    siteFooter.setAttribute('style', defaultFooterStyle || '');
    siteFooter.innerHTML = defaultFooterHTML;
}

function announcePageLoad(pageName) {
    const meta = pageMetadata[pageName];
    if (meta) {
        announcer.textContent = `Page ${meta.title} chargée.`;
    }
}

function updateSEOMetadata(pageName) {
    const meta = pageMetadata[pageName];
    if (!meta) return;

    // Mise à jour du titre
    document.title = meta.title;

    // Mise à jour de la description
    const metaDescription = document.getElementById('meta-description');
    if (metaDescription) {
        metaDescription.setAttribute('content', meta.description);
    }
}

function toggleMobileMenu() {
    const navLinks = document.querySelector('.nav-links');
    const authButtons = document.querySelector('.auth-buttons');
    const toggleBtn = document.querySelector('.mobile-menu-toggle');
    
    const isExpanded = navLinks.classList.contains('mobile-active');
    
    navLinks.classList.toggle('mobile-active');
    authButtons.classList.toggle('mobile-active');
    
    if (toggleBtn) {
        toggleBtn.setAttribute('aria-expanded', !isExpanded);
        toggleBtn.setAttribute('aria-label', !isExpanded ? 'Fermer le menu' : 'Ouvrir le menu');
    }
}

// Gestion des dropdowns sur mobile
document.addEventListener('click', (e) => {
    if (window.innerWidth <= 768) {
        const dropdown = e.target.closest('.dropdown');
        if (dropdown) {
            const content = dropdown.querySelector('.dropdown-content');
            const isVisible = window.getComputedStyle(content).display !== 'none';
            // On ne fait rien de spécial ici car le CSS gère déjà l'affichage de base, 
            // mais on pourrait ajouter une classe pour forcer l'ouverture si besoin.
        }
    }
});

function showNotification(message, type = 'success') {
    const toast = document.getElementById('notification');
    toast.textContent = message;
    toast.style.background = type === 'success' ? 'var(--primary)' : '#ff3333';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
}

// --- TYPEWRITER EFFECT ---

async function typewriter(element, text, speed = 25) {
    element.innerHTML = '';
    for (let i = 0; i <= text.length; i++) {
        element.textContent = text.substring(0, i);
        await new Promise(r => setTimeout(r, speed));
    }
}

// --- LEVEL SELECTOR WIDGET (HOME) ---

const levels = [
    { id: 0, title: "Niveau Zéro", subtitle: "Le Départ", description: "Le point de départ absolu pour ceux qui n'ont aucune base en allemand.", icon: "NZ" },
    { id: 1, title: "Fondation", subtitle: "Les Bases essentiels", description: "Maîtrisez les fondamentaux A1/A2 nécessaires pour votre survie en Allemagne.", icon: "Fd" },
    { id: 2, title: "Immersion", subtitle: "La Fluidité", description: "Vivez l'expérience allemande en conditions réelles et atteignez le niveau B1+.", icon: "Im" }
];

let currentLevelIndex = 1;
let levelTimer;

function initLevelSelector() {
    const widget = document.getElementById('level-selector-widget');
    if (!widget) return;

    const renderLevel = async (index) => {
        const level = levels[index];
        const iconEl = widget.querySelector('.level-icon');
        const titleEl = widget.querySelector('.level-title');
        const subtitleEl = widget.querySelector('.level-subtitle');
        const descEl = widget.querySelector('.level-desc');
        const dots = widget.querySelectorAll('.dot');

        iconEl.textContent = level.icon;
        dots.forEach((dot, i) => dot.classList.toggle('active', i === index));

        await typewriter(titleEl, level.title, 20);
        await typewriter(subtitleEl, level.subtitle, 20);
        await typewriter(descEl, level.description, 15);
    };

    const next = () => {
        currentLevelIndex = (currentLevelIndex + 1) % levels.length;
        renderLevel(currentLevelIndex);
    };

    const prev = () => {
        currentLevelIndex = (currentLevelIndex - 1 + levels.length) % levels.length;
        renderLevel(currentLevelIndex);
    };

    widget.querySelector('.next-btn').onclick = () => { clearInterval(levelTimer); next(); };
    widget.querySelector('.prev-btn').onclick = () => { clearInterval(levelTimer); prev(); };
    
    renderLevel(currentLevelIndex);
    levelTimer = setInterval(next, 5000);
}

// --- MODAL SYSTEM ---

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.add('active');
}

function closeModal() {
    document.querySelectorAll('.modal-backdrop').forEach(m => m.classList.remove('active'));
}

// --- PAGE SPECIFIC SCRIPTS ---

function initPageScripts(pageName) {
    if (pageName === 'home') {
        initLevelSelector();
    }
    if (pageName === 'niveau-zero') {
        initNiveauZeroOrbital();
    }
    
    // Auto-init form handling
    const forms = contentArea.querySelectorAll('form');
    forms.forEach(form => {
        form.onsubmit = (e) => {
            e.preventDefault();
            showNotification('Opération réussie !');
            if (pageName === 'login' || pageName === 'signup') {
                setTimeout(() => navigateTo('home'), 1000);
            }
        };
    });
}

// --- INITIALIZATION ---

window.onload = () => {
    // Initialisation basée sur l'URL actuelle (hash)
    const initialHash = window.location.hash.substring(1);
    const initialPage = pages[initialHash] ? initialHash : 'home';
    navigateTo(initialPage, false);
    
    // Gestion du bouton précédent/suivant du navigateur
    window.addEventListener('popstate', (event) => {
        if (event.state && event.state.page) {
            navigateTo(event.state.page, false);
        } else {
            const hash = window.location.hash.substring(1);
            if (pages[hash]) navigateTo(hash, false);
        }
    });

    // Fermer le menu mobile si on repasse en desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            document.querySelector('.nav-links').classList.remove('mobile-active');
            document.querySelector('.auth-buttons').classList.remove('mobile-active');
        }
    });
};
