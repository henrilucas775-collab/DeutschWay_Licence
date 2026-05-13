/**
 * DEUTSCHWAY PHP - ADAPTED LOGIC SYSTEM
 * High-fidelity adaptation for PHP multi-page structure
 */

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

/** Animation feuille de route orbitale (Niveau Zéro) */
let niveauZeroOrbitalRafId = null;

function stopNiveauZeroOrbital() {
    if (niveauZeroOrbitalRafId != null) {
        cancelAnimationFrame(niveauZeroOrbitalRafId);
        niveauZeroOrbitalRafId = null;
    }
}

window.initNiveauZeroOrbital = function() {
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

window.toggleMobileMenu = function() {
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

function showNotification(message, type = 'success') {
    const toast = document.getElementById('notification');
    if (!toast) return;
    toast.textContent = message;
    toast.style.background = type === 'success' ? 'var(--primary)' : '#ff3333';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
}

// --- TYPEWRITER EFFECT ---

async function typewriter(element, text, speed = 25) {
    if (!element) return;
    element.innerHTML = '';
    for (let i = 0; i <= text.length; i++) {
        element.textContent = text.substring(0, i);
        await new Promise(r => setTimeout(r, speed));
    }
}

// --- LEVEL SELECTOR WIDGET (HOME) ---

const levels = [
    { id: 0, title: "Niveau Zéro", subtitle: "Le Départ", description: "Le point de départ absolu pour ceux qui n'ont aucune base en allemand.", icon: "NZ", url: "/niveau-zero" },
    { id: 1, title: "Fondation", subtitle: "Les Bases essentiels", description: "Maîtrisez les fondamentaux A1/A2 nécessaires pour votre survie en Allemagne.", icon: "Fd", url: "/fondations" },
    { id: 2, title: "Immersion", subtitle: "La Fluidité", description: "Vivez l'expérience allemande en conditions réelles et atteignez le niveau B1+.", icon: "Im", url: "/immersion" }
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
        const linkEl = widget.querySelector('.level-link');
        const dots = widget.querySelectorAll('.dot');

        iconEl.textContent = level.icon;
        if (linkEl) linkEl.setAttribute('href', level.url);
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

window.openModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.add('active');
}

window.closeModal = function() {
    document.querySelectorAll('.modal-backdrop').forEach(m => m.classList.remove('active'));
}

// --- INITIALIZATION & SPA HANDLING ---

function initApp() {
    // Detect current page
    const path = window.location.pathname;
    const segments = path.split("/").filter(Boolean);
    const page = segments.length > 0 ? segments[segments.length - 1] : 'home';

    // Reset active links
    document.querySelectorAll('.nav-links a').forEach(link => link.classList.remove('active'));

    // Set active link
    if (page === 'home' || path === '/') {
        initLevelSelector();
        const homeLink = document.getElementById('nav-home');
        if (homeLink) homeLink.classList.add('active');
    } else {
        const activeLink = document.getElementById(`nav-${page}`);
        if (activeLink) activeLink.classList.add('active');
    }

    if (page === 'niveau-zero') {
        initNiveauZeroOrbital();
    }

    // Form handling
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.onsubmit = (e) => {
            // Only prevent if it doesn't have an action (like our mock forms)
            if (!form.getAttribute('action')) {
                e.preventDefault();
                showNotification('Opération réussie !');
            }
        };
    });
}

// Handle mobile menu resize
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        const navLinks = document.querySelector('.nav-links');
        const authButtons = document.querySelector('.auth-buttons');
        if (navLinks) navLinks.classList.remove('mobile-active');
        if (authButtons) authButtons.classList.remove('mobile-active');
    }
});

// SPA Lifecycle - Re-run init on each navigation
document.addEventListener('livewire:navigated', () => {
    // Stop any running animations/intervals from previous page
    stopNiveauZeroOrbital();
    if (levelTimer) clearInterval(levelTimer);
    
    // Re-initialize for new page
    initApp();
});

