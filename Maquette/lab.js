/* ============================================================
   LAB — Static JS mockup of src/pages/lab/
   ============================================================ */

(function () {
  'use strict';

  const SECTIONS = ['Accueil', 'Cours', 'Apprendre', 'Explorer', 'Progression', 'Account'];

  // ─── State ───────────────────────────────────────────────────
  let activeSection = 'Accueil';
  let isSidebarCollapsed = false;
  let navContext = null;
  let navView = null;

  // ─── DOM refs ────────────────────────────────────────────────
  const contentEl = document.getElementById('sectionContent');
  const navItems = document.querySelectorAll('.navItem');
  const breadcrumbCurrent = document.getElementById('breadcrumbCurrent');
  const sidebarEl = document.querySelector('.lab');
  const toggleBtn = document.querySelector('.sidebarToggle');

  // ─── Navigation ──────────────────────────────────────────────
  function navigateTo(section, context, view) {
    navContext = context || null;
    navView = view || null;
    setActiveSection(section);
  }
  window.navigateTo = navigateTo; // expose for inline onclick

  function setActiveSection(section) {
    activeSection = section;

    // Update nav items
    navItems.forEach(function (item) {
      var id = item.getAttribute('data-section');
      if (id === section) {
        item.classList.add('navItemActive');
      } else {
        item.classList.remove('navItemActive');
      }
    });

    // Update breadcrumb
    breadcrumbCurrent.textContent = section;

    // Update URL
    var params = new URLSearchParams();
    params.set('section', section);
    if (navContext) params.set('context', navContext);
    if (navView) params.set('view', navView);
    window.history.replaceState({}, '', '/lab?' + params.toString());

    // Render section
    renderSection();
  }

  // ─── Section Renderers ──────────────────────────────────────

  function renderSection() {
    switch (activeSection) {
      case 'Accueil': renderAccueil(); break;
      case 'Cours': renderCours(); break;
      case 'Apprendre': renderApprendre(); break;
      case 'Explorer': renderExplorer(); break;
      case 'Progression': renderProgression(); break;
      case 'Account': renderAccount(); break;
      default: renderAccueil();
    }
  }

  // ─── Accueil ─────────────────────────────────────────────────
  function renderAccueil() {
    var levels = [
      { name: 'Niv 0', full: 'Niveau Zéro', desc: 'Point de départ', tips: 'Alphabet, chiffres, couleurs et vocabulaire du quotidien.', progress: 0.0, unlocked: true },
      { name: 'A1.1', full: 'Fondation A1.1', desc: 'Introduction', tips: 'Conjugaison de sein & haben, premiers mots.', progress: 0.0833, unlocked: false },
      { name: 'A1.2', full: 'Fondation A1.2', desc: 'Découverte', tips: 'Phrases simples, famille, objets.', progress: 0.1666, unlocked: false },
      { name: 'A2.1', full: 'Fondation A2.1', desc: 'Survie', tips: 'Achats, directions, routine quotidienne.', progress: 0.25, unlocked: false },
      { name: 'A2.2', full: 'Fondation A2.2', desc: 'Fonctionnel', tips: 'Exprimer des opinions simples, décrire.', progress: 0.3333, unlocked: false },
      { name: 'B1.1', full: 'Immersion B1.1', desc: 'Seuil', tips: 'Conversations, loisirs, récits.', progress: 0.4166, unlocked: false },
      { name: 'B1.2', full: 'Immersion B1.2', desc: 'Autonomie', tips: 'Débattre, sentiments, textes clairs.', progress: 0.5, unlocked: false },
      { name: 'B2.1', full: 'Immersion B2.1', desc: 'Avancé', tips: 'Textes complexes, argumentation.', progress: 0.5833, unlocked: false },
      { name: 'B2.2', full: 'Immersion B2.2', desc: 'Opérationnel', tips: 'Nuances, langage pro, précision.', progress: 0.6666, unlocked: false },
      { name: 'C1.1', full: 'Avancé C1.1', desc: 'Autonome', tips: 'Fluidité, idiomes, style.', progress: 0.75, unlocked: false },
      { name: 'C1.2', full: 'Avancé C1.2', desc: 'Expérimenté', tips: 'Registres variés, spontanéité.', progress: 0.8333, unlocked: false },
      { name: 'C2', full: 'Maîtrise C2', desc: 'Maîtrise totale', tips: 'Nuances fines, aisance quasi-native.', progress: 0.9166, unlocked: false },
    ];

    var currentUserProgress = 0.25; // A2.1
    var resolvedLevels = levels.map(function (lv) {
      return { ...lv, unlocked: lv.progress <= currentUserProgress + 0.0001 };
    });

    var recentActivity = [
      { label: 'Quiz : Der/Die/Das', time: 'Hier · 18 min', score: '8/10', pass: true },
      { label: 'Leçon : Salutations', time: 'Il y a 2 jours · 12 min', score: '5/5', pass: true },
      { label: 'Prononciation B', time: 'Il y a 3 jours · 9 min', score: '3/5', pass: false },
    ];

    var html = '<div style="animation: fadeUp 0.5s ease both;">';

    // Greeting card
    html += '<div class="greeting-card">' +
      '<div>' +
        '<div class="greeting-eyebrow">Tableau de bord</div>' +
        '<h1 class="greeting-title">Bienvenue, Alex <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="vertical-align:middle;margin-left:4px"><path d="M18 11v2a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4v-2"/><path d="M14 21h-4"/><path d="M12 3v8"/><path d="m15 8-3 3-3-3"/></svg></h1>' +
        '<p class="greeting-sub">Continuez votre progression vers l\'Allemagne.</p>' +
      '</div>' +
      '<div class="greeting-flag"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#4F5D75" stroke-width="1.8"><rect x="4" y="4" width="18" height="16" rx="2"/><path d="M4 9h18"/><path d="M4 15h18"/></svg></div>' +
    '</div>';

    // Spiral + Levels
    html += '<div class="content-area">' +
      '<div class="spiral-container">' +
        '<div class="spiral-wrapper" id="spiralWrapper">' +
          '<canvas id="spiralCanvas" width="520" height="520"></canvas>' +
          '<div class="spiral-tooltip" id="spiralTooltip" style="display:none"></div>' +
        '</div>' +
      '</div>' +
      '<div class="levels-panel">' +
        '<div class="levels-header">Parcours linguistique</div>' +
        '<div class="levels-list" id="levelsList">';

    resolvedLevels.forEach(function (lv) {
      html += '<div class="level-item ' + (lv.unlocked ? 'unlocked' : 'disabled') + '" data-level="' + lv.name + '">' +
        '<span style="font-weight:700">' + lv.name + '</span>' +
        '<span class="lock-icon">' + (lv.unlocked
          ? '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>'
          : '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>') +
        '</span>' +
      '</div>';
    });

    html += '</div></div></div>';

    // Recent activity
    html += '<div>' +
      '<div class="activity-label">Activité récente</div>' +
      '<div class="activity-list">';

    recentActivity.forEach(function (item, i) {
      html += '<div class="activity-item">' +
        '<div style="display:flex;align-items:center;gap:14px">' +
          '<div class="activity-dot" style="background:' + (item.pass ? '#8B9A8B' : '#C4816B') + '"></div>' +
          '<div>' +
            '<div class="activity-name">' + item.label + '</div>' +
            '<div class="activity-time">' + item.time + '</div>' +
          '</div>' +
        '</div>' +
        '<div class="activity-score" style="color:' + (item.pass ? '#8B9A8B' : '#C4816B') + ';background:' + (item.pass ? 'rgba(139,154,139,0.1)' : 'rgba(196,129,107,0.1)') + '">' + item.score + '</div>' +
      '</div>';
    });

    html += '</div></div></div>';

    contentEl.innerHTML = html;

    // Draw spiral
    setTimeout(function () {
      drawSpiral(resolvedLevels);
      setupSpiralInteractions(resolvedLevels, levels);
      setupLevelsListClicks(resolvedLevels);
    }, 50);
  }

  // ─── Spiral Canvas ──────────────────────────────────────────
  function drawSpiral(levels) {
    var canvas = document.getElementById('spiralCanvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    if (!ctx) return;

    var size = 520;
    var cx = size / 2;
    var cy = size / 2;
    var R_MIN = 5;
    var R_MAX = 230;
    var TURNS = 5.0;

    var bandColors = [
      { pos: 0.0, color: '#D3D3D3' },
      { pos: 0.08, color: '#4A90E2' },
      { pos: 0.16, color: '#50E3C2' },
      { pos: 0.25, color: '#7ED321' },
      { pos: 0.34, color: '#B8E986' },
      { pos: 0.43, color: '#F8E71C' },
      { pos: 0.52, color: '#F5A623' },
      { pos: 0.62, color: '#FF8C00' },
      { pos: 0.72, color: '#D0021B' },
      { pos: 0.82, color: '#9013FE' },
      { pos: 0.91, color: '#BD10E0' },
      { pos: 1.0, color: '#FFD700' },
    ];

    function spiralPoint(progress) {
      var r = R_MIN + (R_MAX - R_MIN) * Math.pow(progress, 1.15);
      var angle = -Math.PI / 4 + progress * (TURNS * 2 * Math.PI);
      return { x: cx + r * Math.cos(angle), y: cy + r * Math.sin(angle) };
    }

    function getBandWidth(progress) {
      var minW = 18;
      var maxW = 44;
      return minW + (maxW - minW) * Math.pow(progress, 0.92);
    }

    function toRgb(hex) {
      var h = hex.slice(1);
      if (h.length === 3) h = h.split('').map(function (ch) { return ch + ch; }).join('');
      var intv = parseInt(h, 16);
      return { r: (intv >> 16) & 255, g: (intv >> 8) & 255, b: intv & 255 };
    }

    function interpolateColor(c1, c2, t) {
      var rgb1 = toRgb(c1);
      var rgb2 = toRgb(c2);
      var r = Math.floor(rgb1.r + (rgb2.r - rgb1.r) * t);
      var g = Math.floor(rgb1.g + (rgb2.g - rgb1.g) * t);
      var b = Math.floor(rgb1.b + (rgb2.b - rgb1.b) * t);
      return 'rgb(' + r + ',' + g + ',' + b + ')';
    }

    function getColorByProgress(progress) {
      if (progress <= 0) return bandColors[0].color;
      if (progress >= 1) return bandColors[bandColors.length - 1].color;
      for (var i = 0; i < bandColors.length - 1; i += 1) {
        if (progress >= bandColors[i].pos && progress <= bandColors[i + 1].pos) {
          var t = (progress - bandColors[i].pos) / (bandColors[i + 1].pos - bandColors[i].pos);
          return interpolateColor(bandColors[i].color, bandColors[i + 1].color, t);
        }
      }
      return bandColors[0].color;
    }

    var pts = levels.map(function (lv) { return spiralPoint(lv.progress); });

    // Background
    ctx.clearRect(0, 0, size, size);
    for (var i = 1; i <= 6; i += 1) {
      var rad = 40 + i * 32;
      ctx.beginPath();
      ctx.arc(cx, cy, rad, 0, Math.PI * 2);
      ctx.strokeStyle = 'rgba(0, 0, 0, 0.04)';
      ctx.lineWidth = 1;
      ctx.stroke();
    }

    var steps = 620;

    // Spiral bands
    for (i = 0; i < steps; i += 1) {
      var t1 = i / steps;
      var t2 = (i + 1) / steps;
      var p1 = spiralPoint(t1);
      var p2 = spiralPoint(t2);
      var mid = (t1 + t2) / 2;
      var width = getBandWidth(mid);
      var color = getColorByProgress(mid);
      ctx.beginPath();
      ctx.moveTo(p1.x, p1.y);
      ctx.lineTo(p2.x, p2.y);
      ctx.strokeStyle = color;
      ctx.lineWidth = width;
      ctx.lineCap = 'round';
      ctx.lineJoin = 'round';
      ctx.shadowBlur = 2;
      ctx.shadowColor = 'rgba(87, 76, 76, 0.15)';
      ctx.stroke();
    }
    ctx.shadowBlur = 0;

    // Centerline
    for (i = 0; i < steps; i += 1) {
      t1 = i / steps;
      t2 = (i + 1) / steps;
      p1 = spiralPoint(t1);
      p2 = spiralPoint(t2);
      ctx.beginPath();
      ctx.moveTo(p1.x, p1.y);
      ctx.lineTo(p2.x, p2.y);
      ctx.strokeStyle = '#2d5a8c';
      ctx.lineWidth = 2.2;
      ctx.lineCap = 'round';
      ctx.shadowBlur = 1.5;
      ctx.shadowColor = 'rgba(0,0,0,0.3)';
      ctx.stroke();
    }
    ctx.shadowBlur = 0;

    // Level nodes
    for (i = 0; i < levels.length; i += 1) {
      var p = pts[i];
      var lv = levels[i];
      var baseRad = 12 + lv.progress * 10;
      var radius = Math.min(baseRad, 24);
      color = getColorByProgress(lv.progress);
      ctx.shadowBlur = 5;
      ctx.shadowColor = 'rgba(0,0,0,0.35)';
      ctx.beginPath();
      ctx.arc(p.x, p.y, radius, 0, Math.PI * 2);
      ctx.fillStyle = color;
      ctx.fill();
      ctx.beginPath();
      ctx.arc(p.x, p.y, radius - 0.8, 0, Math.PI * 2);
      ctx.strokeStyle = '#fffae8';
      ctx.lineWidth = 1.8;
      ctx.stroke();
      ctx.shadowBlur = 0;

      if (lv.unlocked) {
        var fontSize = 10;
        if (lv.name.length >= 4) fontSize = 9;
        if (radius > 22) fontSize = 11;
        ctx.font = 'bold ' + fontSize + 'px "Segoe UI"';
        ctx.fillStyle = '#1e262f';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(lv.name, p.x, p.y);
      } else {
        var s = radius * 0.6;
        ctx.strokeStyle = '#fff';
        ctx.lineWidth = 1.6;
        ctx.lineCap = 'round';
        ctx.beginPath();
        ctx.arc(p.x, p.y - s * 0.1, s * 0.25, Math.PI, 0);
        ctx.stroke();
        ctx.fillStyle = '#fff';
        ctx.beginPath();
        ctx.rect(p.x - s * 0.35, p.y - s * 0.1, s * 0.7, s * 0.55);
        ctx.fill();
      }

      // Store click zone
      p._radius = radius + 7;
      p._levelName = lv.name;
    }

    // Origin marker
    var origin = pts[0];
    ctx.beginPath();
    ctx.arc(origin.x, origin.y, 17, 0, Math.PI * 2);
    ctx.fillStyle = '#e9c48b';
    ctx.shadowBlur = 8;
    ctx.fill();
    ctx.beginPath();
    ctx.arc(origin.x, origin.y, 8, 0, Math.PI * 2);
    ctx.fillStyle = '#d6aa60';
    ctx.fill();
    ctx.shadowBlur = 0;

    // Store points for interaction
    canvas._pts = pts;
    canvas._resolvedLevels = levels;
    canvas._allLevelsData = levels;
  }

  function setupSpiralInteractions(resolvedLevels, allLevelsData) {
    var canvas = document.getElementById('spiralCanvas');
    if (!canvas) return;

    canvas.addEventListener('mousemove', function (e) {
      var rect = canvas.getBoundingClientRect();
      var sx = canvas.width / rect.width;
      var sy = canvas.height / rect.height;
      var mx = (e.clientX - rect.left) * sx;
      var my = (e.clientY - rect.top) * sy;
      var pts = canvas._pts || [];
      var hit = null;
      for (var i = 0; i < pts.length; i++) {
        var dx = pts[i].x - mx;
        var dy = pts[i].y - my;
        if (Math.sqrt(dx * dx + dy * dy) < pts[i]._radius) {
          hit = pts[i];
          break;
        }
      }
      if (hit) {
        canvas.style.cursor = 'pointer';
        var lv = resolvedLevels.find(function (l) { return l.name === hit._levelName; });
        if (lv) {
          var tooltip = document.getElementById('spiralTooltip');
          if (tooltip) {
            tooltip.style.display = 'block';
            tooltip.style.left = (e.clientX - rect.left + 16) + 'px';
            tooltip.style.top = (e.clientY - rect.top - 12) + 'px';
            tooltip.innerHTML =
              '<div style="color:#2d5a8c;font-weight:700;font-size:14px;margin-bottom:4px">' + lv.full + '</div>' +
              '<div style="color:var(--charcoal-mid);font-size:12px;line-height:1.5">' + lv.tips + '</div>' +
              (lv.unlocked
                ? '<div style="margin-top:6px;color:#8fd67a;font-size:10px;font-weight:600;display:flex;align-items:center;gap:4px"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg> Cliquer pour accéder</div>'
                : '<div style="margin-top:6px;color:rgba(255,255,255,0.35);font-size:10px;display:flex;align-items:center;gap:4px"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Niveau verrouillé</div>'
              );
          }
        }
      } else {
        canvas.style.cursor = 'default';
        var tooltip = document.getElementById('spiralTooltip');
        if (tooltip) tooltip.style.display = 'none';
      }
    });

    canvas.addEventListener('mouseleave', function () {
      var tooltip = document.getElementById('spiralTooltip');
      if (tooltip) tooltip.style.display = 'none';
      canvas.style.cursor = 'default';
    });

    canvas.addEventListener('click', function (e) {
      var rect = canvas.getBoundingClientRect();
      var sx = canvas.width / rect.width;
      var sy = canvas.height / rect.height;
      var mx = (e.clientX - rect.left) * sx;
      var my = (e.clientY - rect.top) * sy;
      var pts = canvas._pts || [];
      var hit = null;
      for (var i = 0; i < pts.length; i++) {
        var dx = pts[i].x - mx;
        var dy = pts[i].y - my;
        if (Math.sqrt(dx * dx + dy * dy) < pts[i]._radius) {
          hit = pts[i];
          break;
        }
      }
      if (hit) {
        var lv = resolvedLevels.find(function (l) { return l.name === hit._levelName; });
        if (lv && lv.unlocked) {
          var navMap = {
            'Niv 0': { context: 'niveau-zero' },
            'A1.1': { context: 'fondation', view: 'a11' },
            'A1.2': { context: 'fondation' },
            'A2.1': { context: 'fondation' },
            'A2.2': { context: 'fondation' },
            'B1.1': { context: 'fondation' },
            'B1.2': { context: 'fondation' },
            'B2.1': { context: 'fondation' },
            'B2.2': { context: 'fondation' },
            'C1.1': { context: 'fondation' },
            'C1.2': { context: 'fondation' },
            'C2': { context: 'fondation' },
          };
          var nav = navMap[lv.name];
          if (nav) navigateTo('Apprendre', nav.context, nav.view);
        }
      }
    });
  }

  function setupLevelsListClicks(resolvedLevels) {
    var items = document.querySelectorAll('.level-item');
    items.forEach(function (item) {
      item.addEventListener('click', function () {
        var name = item.getAttribute('data-level');
        var lv = resolvedLevels.find(function (l) { return l.name === name; });
        if (lv && lv.unlocked) {
          var navMap = {
            'Niv 0': { context: 'niveau-zero' },
            'A1.1': { context: 'fondation', view: 'a11' },
            'A1.2': { context: 'fondation' },
            'A2.1': { context: 'fondation' },
            'A2.2': { context: 'fondation' },
            'B1.1': { context: 'fondation' },
            'B1.2': { context: 'fondation' },
            'B2.1': { context: 'fondation' },
            'B2.2': { context: 'fondation' },
            'C1.1': { context: 'fondation' },
            'C1.2': { context: 'fondation' },
            'C2': { context: 'fondation' },
          };
          var nav = navMap[name];
          if (nav) navigateTo('Apprendre', nav.context, nav.view);
        }
      });
      item.addEventListener('mouseenter', function () {
        var name = item.getAttribute('data-level');
        var lv = resolvedLevels.find(function (l) { return l.name === name; });
        var hoveredCanvas = document.getElementById('spiralCanvas');
        if (hoveredCanvas) {
          // Highlight the corresponding level in canvas (we can't easily re-draw, but we update the levels list highlight)
          var allItems = document.querySelectorAll('.level-item');
          allItems.forEach(function (el) { el.style.background = ''; el.style.transform = ''; });
          if (lv && lv.unlocked) {
            item.style.background = '#ffe6c7';
            item.style.transform = 'translateX(5px)';
          }
        }
      });
      item.addEventListener('mouseleave', function () {
        var allItems = document.querySelectorAll('.level-item');
        allItems.forEach(function (el) { el.style.background = ''; el.style.transform = ''; });
      });
    });
  }

  // ─── Cours ───────────────────────────────────────────────────
  function renderCours() {
    var levels = [
      { id: 'niveau-zero', title: 'Niveau Zéro', subtitle: 'Fondamentaux absolus', desc: 'Alphabet, chiffres, couleurs et base du quotidien. Parfait pour les débutants complets.', tag: 'Disponible', available: true, color: '#8B9A8B' },
      { id: 'fondation', title: 'Parcours Fondations', subtitle: 'Niveau A1 → A2', desc: 'Grammaire, conjugaison et vocabulaire essentiel pour construire des phrases complètes.', tag: 'Disponible', available: true, color: '#9B9BB4' },
      { id: 'immersion', title: 'Parcours Immersion', subtitle: 'Niveau B1 → B2', desc: 'Conversations avancées, culture allemande et préparation à la vie en Allemagne.', tag: 'Bientôt', available: false, color: '#B4A08B' },
      { id: 'future', title: 'Future – Avancé', subtitle: 'Niveau C1 → C2', desc: 'Maîtrise complète de l\'allemand, littérature, argot et nuances professionnelles.', tag: 'Futur', available: false, color: '#8BB4B0' },
    ];

    var html = '<div style="animation: fadeUp 0.5s ease both;">' +
      '<div style="margin-bottom:40px">' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Parcours</div>' +
        '<h1 style="font-size:28px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Choisissez votre parcours</h1>' +
        '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:13px">Chaque parcours est conçu pour un niveau spécifique de maîtrise de l\'allemand.</p>' +
      '</div>' +
      '<div class="cours-grid">';

    levels.forEach(function (lv) {
      var cardStyle = 'border:1px solid ' + (lv.available ? lv.color + '50' : 'var(--glass-border)') + ';';
      html += '<div class="cours-card' + (lv.available ? '' : ' disabled') + '" data-cours="' + lv.id + '" style="' + cardStyle + '">' +
        '<div class="cours-card-accent" style="background:' + (lv.available ? lv.color : 'var(--clay)') + '"></div>' +
        '<div class="cours-card-icon" style="background:' + lv.color + '15;color:' + lv.color + '">' +
          getCoursIcon(lv.id, lv.color) +
        '</div>' +
        '<span class="cours-tag" style="color:' + (lv.available ? lv.color : 'var(--charcoal-light)') + ';background:' + (lv.available ? lv.color + '15' : 'var(--stone)') + ';border:1px solid ' + (lv.available ? lv.color + '35' : 'transparent') + '">' + lv.tag + '</span>' +
        '<div class="cours-title">' + lv.title + '</div>' +
        '<div class="cours-subtitle" style="color:' + lv.color + '">' + lv.subtitle + '</div>' +
        '<div class="cours-desc">' + lv.desc + '</div>' +
        (lv.available ? '<div class="cours-cta" style="color:' + lv.color + '"><span>Commencer</span><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M2 7h10M8 3l4 4-4 4"/></svg></div>' : '') +
      '</div>';
    });

    html += '</div></div>';
    contentEl.innerHTML = html;

    // Add click handlers
    document.querySelectorAll('.cours-card:not(.disabled)').forEach(function (card) {
      card.addEventListener('click', function () {
        var id = card.getAttribute('data-cours');
        navigateTo('Apprendre', id);
      });
    });
    document.querySelectorAll('.cours-card').forEach(function (card) {
      card.addEventListener('mouseenter', function () {
        if (!card.classList.contains('disabled')) {
          card.style.transform = 'translateY(-3px)';
          var color = card.getAttribute('data-cours') === 'niveau-zero' ? '#8B9A8B' : card.getAttribute('data-cours') === 'fondation' ? '#9B9BB4' : '#B4A08B';
          card.style.boxShadow = '0 12px 32px ' + color + '20';
        }
      });
      card.addEventListener('mouseleave', function () {
        card.style.transform = 'translateY(0)';
        card.style.boxShadow = '0 2px 8px rgba(0,0,0,0.02)';
      });
    });
  }

  function getCoursIcon(id, color) {
    if (id === 'niveau-zero') {
      return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="14" cy="14" r="10"/><path d="M10 14h8M14 10v8"/></svg>';
    } else if (id === 'fondation') {
      return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="16" width="20" height="8" rx="2"/><rect x="8" y="9" width="12" height="7" rx="1.5"/><rect x="12" y="4" width="4" height="5" rx="1"/></svg>';
    } else if (id === 'immersion') {
      return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20 Q14 4 24 20"/><path d="M8 20 Q14 10 20 20"/><line x1="4" y1="20" x2="24" y2="20"/></svg>';
    } else {
      return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="14,3 17,10 24,10 19,15 21,22 14,18 7,22 9,15 4,10 11,10"/></svg>';
    }
  }

  // ─── Apprendre ──────────────────────────────────────────────
  function renderApprendre() {
    if (navContext === 'niveau-zero') {
      renderNiveauZero();
      return;
    }
    if (navContext === 'fondation') {
      renderFondation();
      return;
    }

    var html = '<div style="animation: fadeUp 0.5s ease both;">' +
      '<div style="margin-bottom:36px">' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Exercices</div>' +
        '<h1 style="font-size:28px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Apprendre</h1>' +
        '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:13px">Accédez aux modules depuis vos parcours.</p>' +
      '</div>' +
      '<div class="apprendre-empty">' +
        '<div class="apprendre-empty-text">Sélectionnez un parcours dans la section <strong>Cours</strong><br />pour accéder aux exercices correspondants.</div>' +
      '</div>' +
    '</div>';
    contentEl.innerHTML = html;
  }

  function renderNiveauZero() {
    var topics = [
      { id: 'alphabet', title: 'Alphabet', desc: 'Les 30 lettres de l\'alphabet allemand et leur prononciation.', highlight: false },
      { id: 'chiffres', title: 'Chiffres', desc: 'De 0 à 100+, les nombres essentiels avec quiz interactif.', highlight: false },
      { id: 'couleurs', title: 'Couleurs', desc: 'Toutes les couleurs et leur équivalent en français.', highlight: false },
      { id: 'salutations', title: 'Salutation et politesse', desc: 'Remerciements, réponses de politesse et formules quotidiennes.', highlight: false },
      { id: 'base', title: 'Base Quotidienne', desc: 'Corps humain, jours, saisons, météo et objets courants.', highlight: false },
      { id: 'journey', title: 'Exercice Du Niveau Zéro', desc: 'Le parcours guidé en 3 étapes : Prononciation, Dictée et Quiz.', highlight: true },
    ];

    var html = '<div style="animation: fadeUp 0.4s ease both;">';

    if (navView === 'alphabet') { html += renderAlphabetView(); html += '</div>'; contentEl.innerHTML = html; return; }
    if (navView === 'chiffres') { html += renderChiffresView(); html += '</div>'; contentEl.innerHTML = html; return; }
    if (navView === 'couleurs') { html += renderCouleursView(); html += '</div>'; contentEl.innerHTML = html; return; }
    if (navView === 'salutations') { html += renderSalutationsView(); html += '</div>'; contentEl.innerHTML = html; return; }

    html += renderBackButton(function () { navigateTo('Apprendre', null, null); });

    html += '<div style="margin-bottom:36px">' +
      '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Niveau Zéro</div>' +
      '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Choisissez un thème</h2>' +
      '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:12px">Les fondamentaux absolus pour démarrer l\'allemand.</p>' +
    '</div>' +
    '<div class="apprendre-topics">';

    topics.forEach(function (topic) {
      html += '<div class="apprendre-topic' + (topic.highlight ? ' highlight' : '') + '" data-topic="' + topic.id + '">' +
        (topic.highlight ? '<div class="popular-badge">Populaire</div>' : '') +
        '<div class="apprendre-topic-icon">' + getTopicIcon(topic.id) + '</div>' +
        '<div>' +
          '<div class="apprendre-topic-title">' + topic.title + '</div>' +
          '<div class="apprendre-topic-desc">' + topic.desc + '</div>' +
        '</div>' +
        '<div class="apprendre-topic-cta">Ouvrir <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M2 6h8M6 2l4 4-4 4"/></svg></div>' +
      '</div>';
    });

    html += '</div></div>';
    contentEl.innerHTML = html;

    // Click handlers
    document.querySelectorAll('.apprendre-topic').forEach(function (el) {
      el.addEventListener('click', function () {
        var id = el.getAttribute('data-topic');
        if (id === 'journey') {
          navView = 'journey';
          renderJourneyView();
        } else {
          navView = id;
          renderNiveauZero();
        }
      });
      el.addEventListener('mouseenter', function () {
        el.style.borderColor = 'var(--accent)';
        el.style.transform = 'translateY(-2px)';
      });
      el.addEventListener('mouseleave', function () {
        el.style.borderColor = el.classList.contains('highlight') ? 'var(--accent)' : 'var(--glass-border)';
        el.style.transform = 'translateY(0)';
      });
    });
  }

  function renderFondation() {
    if (navView === 'a11') {
      var html = '<div style="animation: fadeUp 0.4s ease both;">' +
        renderBackButton(function () { navigateTo('Apprendre', 'fondation', null); }) +
        '<div style="margin-bottom:32px;max-width:800px">' +
          '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Fondation - Niveau A1.1</div>' +
          '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em;display:flex;align-items:center;gap:12px">Conjugaison : sein & haben</h2>' +
          '<p style="color:var(--charcoal-light);margin-top:8px;font-size:14px;line-height:1.6">Apprenez la conjugaison des deux auxiliaires principaux au présent (Präsens).</p>' +
        '</div>' +
        renderConjugationTable('sein (être)', conjugaisonSein) +
        renderConjugationTable('haben (avoir)', conjugaisonHaben) +
      '</div>';
      contentEl.innerHTML = html;
      return;
    }

    var html = '<div style="animation: fadeUp 0.4s ease both;">' +
      renderBackButton(function () { navigateTo('Apprendre', null, null); }) +
      '<div style="margin-bottom:36px">' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Parcours</div>' +
        '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Fondations</h2>' +
        '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:12px">Grammaire, conjugaison et vocabulaire essentiel.</p>' +
      '</div>' +
      '<div class="apprendre-topics">' +
        '<div class="apprendre-topic" data-view="a11">' +
          '<div class="apprendre-topic-icon"><span style="font-family:\'DM Mono\',monospace;font-weight:800;font-size:16px">A1.1</span></div>' +
          '<div>' +
            '<div class="apprendre-topic-title">Niveau A1.1</div>' +
            '<div class="apprendre-topic-desc">Apprenez la conjugaison des verbes sein et haben au présent.</div>' +
          '</div>' +
          '<div class="apprendre-topic-cta">Commencer <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M2 6h8M6 2l4 4-4 4"/></svg></div>' +
        '</div>' +
      '</div>' +
    '</div>';
    contentEl.innerHTML = html;

    document.querySelector('.apprendre-topic').addEventListener('click', function () {
      navView = 'a11';
      renderFondation();
    });
  }

  var conjugaisonSein = [
    { pronom: 'ich (je)', verbe: 'bin', phrase: 'ich bin' },
    { pronom: 'du (tu)', verbe: 'bist', phrase: 'du bist' },
    { pronom: 'er/sie/es (il/elle/on)', verbe: 'ist', phrase: 'er ist' },
    { pronom: 'wir (nous)', verbe: 'sind', phrase: 'wir sind' },
    { pronom: 'ihr (vous)', verbe: 'seid', phrase: 'ihr seid' },
    { pronom: 'sie/Sie (ils/elles/Vous)', verbe: 'sind', phrase: 'sie sind' },
  ];

  var conjugaisonHaben = [
    { pronom: 'ich (je)', verbe: 'habe', phrase: 'ich habe' },
    { pronom: 'du (tu)', verbe: 'hast', phrase: 'du hast' },
    { pronom: 'er/sie/es (il/elle/on)', verbe: 'hat', phrase: 'er hat' },
    { pronom: 'wir (nous)', verbe: 'haben', phrase: 'wir haben' },
    { pronom: 'ihr (vous)', verbe: 'habt', phrase: 'ihr habt' },
    { pronom: 'sie/Sie (ils/elles/Vous)', verbe: 'haben', phrase: 'sie haben' },
  ];

  function renderConjugationTable(title, data) {
    var rows = '';
    data.forEach(function (row) {
      rows += '<tr style="border-bottom:1px solid var(--glass-border)">' +
        '<td style="padding:16px 24px;font-family:\'DM Mono\',monospace;font-size:14px;color:var(--charcoal-mid)">' + row.pronom + '</td>' +
        '<td style="padding:16px 24px;font-weight:800;font-size:18px;color:var(--ink)">' + row.verbe + '</td>' +
        '<td style="padding:16px 24px;text-align:center">' +
          '<button onclick="speakPhrase(\'' + row.phrase + '\')" style="padding:10px;border-radius:50%;background:rgba(139,154,139,0.15);color:var(--accent);border:1px solid rgba(139,154,139,0.3);cursor:pointer;transition:all 0.2s">' +
            '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>' +
          '</button>' +
        '</td>' +
        '<td style="padding:16px 24px;text-align:center">' +
          '<button onclick="startVoiceTest(\'' + row.phrase + '\')" style="padding:10px 18px;border-radius:40px;background:rgba(139,154,139,0.1);color:var(--accent);border:1px solid rgba(139,154,139,0.25);cursor:pointer;font-family:\'DM Mono\',monospace;font-size:11px;font-weight:600;transition:all 0.2s">Test</button>' +
        '</td>' +
      '</tr>';
    });

    return '<div style="margin-bottom:40px;max-width:900px">' +
      '<h3 style="font-size:20px;font-weight:700;font-family:\'DM Mono\',monospace;color:var(--ink);margin-bottom:16px;display:flex;align-items:center;gap:10px">' +
        '<span style="display:inline-block;width:4px;height:20px;background:var(--accent);border-radius:2px"></span>' +
        title +
      '</h3>' +
      '<div style="overflow-x:auto;background:white;border-radius:20px;border:1px solid var(--glass-border);box-shadow:0 4px 20px rgba(0,0,0,0.03)">' +
        '<table style="width:100%;border-collapse:collapse;text-align:left;min-width:600px">' +
          '<thead><tr style="background:#f8fafc;border-bottom:1px solid var(--glass-border)">' +
            '<th style="padding:16px 24px;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:0.05em;color:var(--charcoal-mid)">Pronom</th>' +
            '<th style="padding:16px 24px;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:0.05em;color:var(--charcoal-mid)">Verbe</th>' +
            '<th style="padding:16px 24px;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:0.05em;color:var(--charcoal-mid);text-align:center">Prononciation</th>' +
            '<th style="padding:16px 24px;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:0.05em;color:var(--charcoal-mid);text-align:center">Test</th>' +
          '</tr></thead>' +
          '<tbody>' + rows + '</tbody>' +
        '</table>' +
      '</div>' +
    '</div>';
  }

  // Simple voice test simulation
  window.speakPhrase = function (phrase) {
    if (!window.speechSynthesis) return;
    window.speechSynthesis.cancel();
    var utterance = new SpeechSynthesisUtterance(phrase);
    utterance.lang = 'de-DE';
    utterance.rate = 0.8;
    window.speechSynthesis.speak(utterance);
  };

  window.startVoiceTest = function (expected) {
    if (!window.speechSynthesis) { alert('Voix non disponible'); return; }
    window.speechSynthesis.cancel();
    var utterance = new SpeechSynthesisUtterance(expected);
    utterance.lang = 'de-DE';
    utterance.rate = 0.8;
    window.speechSynthesis.speak(utterance);
  };

  // ─── Journey View (simplified) ──────────────────────────────
  function renderJourneyView() {
    var html = '<div style="min-height:100vh;background:linear-gradient(135deg,rgba(139,154,139,0.15),rgba(139,154,139,0.08));display:flex;align-items:center;justify-content:center;padding:40px 20px;animation:fadeIn 0.8s ease">' +
      '<div style="text-align:center;max-width:500px">' +
        '<div style="width:140px;height:140px;margin:0 auto 40px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#7aa67a);display:grid;place-items:center;box-shadow:0 30px 60px rgba(139,154,139,0.4)">' +
          '<svg width="60" height="60" viewBox="0 0 24 24" fill="white"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>' +
        '</div>' +
        '<h1 style="font-size:48px;font-weight:950;margin:0 0 16px 0;background:linear-gradient(135deg,var(--accent),#7aa67a);background-clip:text;-webkit-background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:-0.02em">Quête Complétée !</h1>' +
        '<p style="font-size:18px;color:var(--charcoal-light);margin-bottom:40px;line-height:1.7;font-family:\'Outfit\',sans-serif">Vous avez maîtrisé le Niveau Zéro de l\'allemand. Prêt pour le défi suivant ?</p>' +
        '<button onclick="navigateTo(\'Apprendre\', \'niveau-zero\', null)" style="padding:16px 40px;background:var(--accent);color:white;border:none;border-radius:50px;font-size:15px;font-weight:800;cursor:pointer;box-shadow:0 15px 35px rgba(139,154,139,0.4);font-family:\'Outfit\',sans-serif;letter-spacing:0.05em">Retour au Lab</button>' +
      '</div>' +
    '</div>';
    contentEl.innerHTML = html;
  }

  // ─── Alphabet, Chiffres, Couleurs, Salutations Views (simplified) ──
  function renderAlphabetView() {
    var letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZÄÖÜß'.split('').map(function (l, i) {
      return { letter: l, sound: '/' + l.toLowerCase() + '/', example: l === 'Ä' ? 'Äpfel' : l === 'Ö' ? 'Öl' : l === 'Ü' ? 'Über' : l === 'ß' ? 'Straße' : 'Beispiel', fr: l === 'Ä' ? 'pomme' : l === 'Ö' ? 'huile' : l === 'Ü' ? 'au-dessus' : l === 'ß' ? 'rue' : 'exemple' };
    });
    return renderSubView('Alphabet Allemand', 'L\'Alphabet Allemand', 'Cliquez sur une carte pour écouter sa prononciation.', letters, 'letter');
  }

  function renderChiffresView() {
    var nums = [];
    for (var i = 0; i <= 20; i++) {
      var names = ['null','eins','zwei','drei','vier','fünf','sechs','sieben','acht','neun','zehn','elf','zwölf','dreizehn','vierzehn','fünfzehn','sechzehn','siebzehn','achtzehn','neunzehn','zwanzig'];
      nums.push({ num: i, de: names[i] });
    }
    // Simple render
    var html = '<div style="animation: fadeUp 0.4s ease both;">' +
      renderBackButton(function () { navView = null; renderNiveauZero(); }) +
      '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:32px;flex-wrap:wrap">' +
        '<div>' +
          '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Niveau Zéro</div>' +
          '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Les Chiffres</h2>' +
          '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:12px">Apprenez à compter en allemand.</p>' +
        '</div>' +
      '</div>' +
      '<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:12px;margin-bottom:32px">';
    nums.forEach(function (n) {
      html += '<button onclick="speakPhrase(\'' + n.de + '\')" style="padding:16px;background:white;border-radius:16px;border:1px solid var(--glass-border);text-align:center;cursor:pointer;transition:all 0.2s;box-shadow:0 2px 8px rgba(0,0,0,0.02)">' +
        '<div style="font-size:26px;font-weight:800;color:var(--ink);margin-bottom:4px">' + n.num + '</div>' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:13px;color:var(--charcoal-mid);font-weight:600">' + n.de + '</div>' +
      '</button>';
    });
    html += '</div></div>';
    return html;
  }

  function renderCouleursView() {
    var couleurs = [
      { de: 'Rot', fr: 'Rouge', hex: '#E74C3C' },
      { de: 'Blau', fr: 'Bleu', hex: '#3498DB' },
      { de: 'Grün', fr: 'Vert', hex: '#2ECC71' },
      { de: 'Gelb', fr: 'Jaune', hex: '#F1C40F' },
      { de: 'Orange', fr: 'Orange', hex: '#F39C12' },
      { de: 'Lila', fr: 'Violet', hex: '#9B59B6' },
      { de: 'Schwarz', fr: 'Noir', hex: '#2C3E50' },
      { de: 'Weiß', fr: 'Blanc', hex: '#ECF0F1' },
      { de: 'Grau', fr: 'Gris', hex: '#95A5A6' },
      { de: 'Braun', fr: 'Brun', hex: '#8B4513' },
    ];
    var html = '<div style="animation: fadeUp 0.4s ease both;">' +
      renderBackButton(function () { navView = null; renderNiveauZero(); }) +
      '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:32px;flex-wrap:wrap">' +
        '<div>' +
          '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Niveau Zéro</div>' +
          '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Les Couleurs</h2>' +
          '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:12px">Écoutez et mémorisez les couleurs en allemand.</p>' +
        '</div>' +
      '</div>' +
      '<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:14px">';
    couleurs.forEach(function (c) {
      html += '<button onclick="speakPhrase(\'' + c.de + '\')" style="border-radius:18px;overflow:hidden;border:1px solid var(--glass-border);background:white;cursor:pointer;transition:all 0.2s;padding:0">' +
        '<div style="height:70px;background:' + c.hex + ';border-bottom:' + (c.hex === '#ECF0F1' || c.hex === '#F5F0E8' ? '1px solid var(--glass-border)' : 'none') + '"></div>' +
        '<div style="padding:12px 16px;text-align:left">' +
          '<div style="font-size:14px;font-weight:700;color:var(--ink);margin-bottom:2px">' + c.de + '</div>' +
          '<div style="font-family:\'DM Mono\',monospace;font-size:11px;color:var(--charcoal-light)">' + c.fr + '</div>' +
        '</div>' +
      '</button>';
    });
    html += '</div></div>';
    return html;
  }

  function renderSalutationsView() {
    var items = [
      { de: 'Hallo', fr: 'Bonjour' },
      { de: 'Tschüss', fr: 'Au revoir' },
      { de: 'Guten Morgen', fr: 'Bonjour (matin)' },
      { de: 'Guten Abend', fr: 'Bonsoir' },
      { de: 'Danke', fr: 'Merci' },
      { de: 'Bitte', fr: 'S\'il vous plaît / De rien' },
      { de: 'Entschuldigung', fr: 'Pardon / Excusez-moi' },
      { de: 'Ja', fr: 'Oui' },
      { de: 'Nein', fr: 'Non' },
      { de: 'Wie geht\'s?', fr: 'Comment ça va ?' },
    ];
    var html = '<div style="animation: fadeUp 0.4s ease both;">' +
      renderBackButton(function () { navView = null; renderNiveauZero(); }) +
      '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:32px;flex-wrap:wrap">' +
        '<div>' +
          '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Niveau Zéro</div>' +
          '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Salutation et politesse</h2>' +
          '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:12px">Écoutez et mémorisez les formules de politesse essentielles.</p>' +
        '</div>' +
      '</div>' +
      '<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:14px">';
    items.forEach(function (item) {
      html += '<button onclick="speakPhrase(\'' + item.de + '\')" style="padding:18px 20px;background:white;border-radius:18px;border:1px solid var(--glass-border);cursor:pointer;text-align:left;transition:all 0.2s;display:block;width:100%">' +
        '<div style="display:flex;align-items:baseline;gap:10px;margin-bottom:8px">' +
          '<span style="font-size:20px;font-weight:800;color:var(--ink)">' + item.de + '</span>' +
          '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left:auto;opacity:0.4"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>' +
        '</div>' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:12px;color:var(--charcoal-mid)">' + item.fr + '</div>' +
      '</button>';
    });
    html += '</div></div>';
    return html;
  }

  function renderSubView(title, heading, desc, items, keyField) {
    var html = '<div style="animation: fadeUp 0.4s ease both;">' +
      renderBackButton(function () { navView = null; renderNiveauZero(); }) +
      '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:32px;flex-wrap:wrap">' +
        '<div>' +
          '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Niveau Zéro</div>' +
          '<h2 style="font-size:24px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">' + heading + '</h2>' +
          '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:12px;max-width:400px">' + desc + '</p>' +
        '</div>' +
      '</div>' +
      '<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:14px">';
    items.forEach(function (item, idx) {
      html += '<button onclick="speakPhrase(\'' + item[keyField] + '\')" style="padding:18px 20px;background:white;border-radius:18px;border:1px solid var(--glass-border);cursor:pointer;text-align:left;transition:all 0.2s;display:block;width:100%;box-shadow:0 2px 8px rgba(0,0,0,0.02)">' +
        '<div style="display:flex;align-items:baseline;gap:10px;margin-bottom:8px">' +
          '<span style="font-size:22px;font-weight:800;color:var(--ink)">' + item[keyField] + '</span>' +
          '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left:auto;opacity:0.4"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>' +
        '</div>' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:12px;color:var(--charcoal-mid);margin-bottom:2px">' + (item.example || '') + '</div>' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--charcoal-light)">' + (item.fr || '') + '</div>' +
      '</button>';
    });
    html += '</div></div>';
    return html;
  }

  function getTopicIcon(id) {
    if (id === 'alphabet') return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22L12 6L20 22"/><path d="M7 16h10"/><path d="M22 10 Q26 8 24 14 Q26 20 22 18"/></svg>';
    if (id === 'chiffres') return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="4" y="4" width="8" height="8" rx="2"/><rect x="16" y="4" width="8" height="8" rx="2"/><rect x="4" y="16" width="8" height="8" rx="2"/><rect x="16" y="16" width="8" height="8" rx="2"/></svg>';
    if (id === 'couleurs') return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="12" r="6"/><circle cx="18" cy="12" r="6"/><circle cx="14" cy="19" r="6"/></svg>';
    return '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 8h20M4 14h14M4 20h10"/><circle cx="24" cy="20" r="3"/><path d="M22 18l4 4M26 18l-4 4"/></svg>';
  }

  function renderBackButton(onClick) {
    return '<button onclick="window._backHandler()" style="display:flex;align-items:center;gap:8px;font-family:\'DM Mono\',monospace;font-size:12px;color:var(--charcoal-light);cursor:pointer;background:none;border:none;margin-bottom:32px;padding:0;transition:color 0.15s" onmouseenter="this.style.color=\'var(--ink)\'" onmouseleave="this.style.color=\'var(--charcoal-light)\'">' +
      '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M10 3L5 8l5 5"/></svg> Retour</button>';
  }

  // ─── Explorer ────────────────────────────────────────────────
  function renderExplorer() {
    var categories = [
      {
        label: 'Podcasts & Audio', color: '#8B9A8B',
        items: [
          { title: 'Slow German', desc: 'Podcast lent pour débutants', tag: 'Gratuit' },
          { title: 'Deutschlandradio', desc: 'Radio nationale allemande', tag: 'A2+' },
        ],
      },
      {
        label: 'Vidéos & Chaînes', color: '#9B9BB4',
        items: [
          { title: 'Easy German', desc: 'Interviews dans la rue avec sous-titres', tag: 'YouTube' },
          { title: 'DW Deutsch lernen', desc: 'Cours officiels de la chaîne DW', tag: 'Officiel' },
        ],
      },
      {
        label: 'Lecture & Presse', color: '#B4A08B',
        items: [
          { title: 'Der Spiegel', desc: 'Magazine d\'actualité allemand', tag: 'B1+' },
          { title: 'Nachrichtenleicht', desc: 'Actualités simplifiées A2/B1', tag: 'Simplifié' },
        ],
      },
    ];

    var culturalFacts = [
      { title: 'Brezel', text: 'Le Bretzel, originaire de Bavière, est un symbole fort de la culture culinaire allemande.' },
      { title: 'Pünktlichkeit', text: 'La ponctualité est très valorisée en Allemagne, notamment dans le monde professionnel.' },
      { title: 'Weihnachtsmarkt', text: 'Les marchés de Noël allemands (Weihnachtsmarkt) sont connus dans le monde entier.' },
    ];

    var html = '<div style="animation: fadeUp 0.5s ease both;">' +
      '<div style="margin-bottom:36px">' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Ressources</div>' +
        '<h1 style="font-size:28px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Explorer</h1>' +
        '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:13px">Découvrez des ressources complémentaires pour immerger dans la langue et la culture allemande.</p>' +
      '</div>' +
      '<div style="display:flex;flex-direction:column;gap:28px;margin-bottom:40px">';

    categories.forEach(function (cat) {
      html += '<div class="explorer-category">' +
        '<div class="explorer-category-header">' +
          '<div class="explorer-category-bar" style="background:' + cat.color + '"></div>' +
          '<div class="explorer-category-label">' + cat.label + '</div>' +
        '</div>' +
        '<div class="explorer-items">';
      cat.items.forEach(function (item) {
        html += '<div class="explorer-item">' +
          '<div class="explorer-item-header">' +
            '<div>' +
              '<div class="explorer-item-title">' + item.title + '</div>' +
              '<div class="explorer-item-desc">' + item.desc + '</div>' +
            '</div>' +
            '<span class="explorer-tag" style="color:' + cat.color + ';background:' + cat.color + '12;border:1px solid ' + cat.color + '30">' + item.tag + '</span>' +
          '</div>' +
          '<button class="explorer-btn" style="color:' + cat.color + ';background:' + cat.color + '10;border:1px solid ' + cat.color + '30"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg> Ouvrir la ressource</button>' +
        '</div>';
      });
      html += '</div></div>';
    });

    html += '</div>' +
      '<div>' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--charcoal-light);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:16px">' +
          '<span style="display:inline-flex;align-items:center;gap:6px">Coin Culture <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="4" width="18" height="16" rx="2"/><path d="M4 9h18"/><path d="M4 15h18"/></svg></span>' +
        '</div>' +
        '<div class="culture-grid">';

    culturalFacts.forEach(function (fact) {
      html += '<div class="culture-card">' +
        '<div class="culture-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#51606F" stroke-width="1.9"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>' +
        '<div class="culture-title">' + fact.title + '</div>' +
        '<div class="culture-text">' + fact.text + '</div>' +
      '</div>';
    });

    html += '</div></div></div>';
    contentEl.innerHTML = html;
  }

  // ─── Progression ────────────────────────────────────────────
  function renderProgression() {
    var skills = [
      { label: 'Vocabulaire', pct: 42, color: '#8B9A8B' },
      { label: 'Grammaire', pct: 28, color: '#9B9BB4' },
      { label: 'Prononciation', pct: 55, color: '#B4A08B' },
      { label: 'Compréhension orale', pct: 35, color: '#A08BB4' },
      { label: 'Expression écrite', pct: 19, color: '#8BB4B0' },
    ];

    var badges = [
      { label: 'Première leçon', earned: true },
      { label: '10 leçons', earned: true },
      { label: '7 jours de suite', earned: true },
      { label: 'Score parfait', earned: false },
      { label: 'Module A1 complet', earned: false },
      { label: 'Niveau A2 atteint', earned: false },
    ];

    var weekActivity = [
      { day: 'Lun', minutes: 18 },
      { day: 'Mar', minutes: 12 },
      { day: 'Mer', minutes: 25 },
      { day: 'Jeu', minutes: 0 },
      { day: 'Ven', minutes: 30 },
      { day: 'Sam', minutes: 15 },
      { day: 'Dim', minutes: 22 },
    ];

    var maxMin = Math.max.apply(null, weekActivity.map(function (d) { return d.minutes; }));
    var totalMin = weekActivity.reduce(function (s, d) { return s + d.minutes; }, 0);

    var html = '<div style="animation: fadeUp 0.5s ease both;">' +
      '<div style="margin-bottom:36px">' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Statistiques</div>' +
        '<h1 style="font-size:28px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Ma Progression</h1>' +
        '<p style="color:var(--charcoal-light);margin-top:8px;font-family:\'DM Mono\',monospace;font-size:13px">Suivez votre niveau, vos séries et vos compétences.</p>' +
      '</div>' +
      '<div class="stats-grid">';

    var stats = [
      { icon: '🔥', label: 'Série actuelle', value: '7 jours', color: '#C4816B' },
      { icon: '🎯', label: 'Niveau actuel', value: 'A1 · 34%', color: '#8B9A8B' },
      { icon: '🏆', label: 'Points XP', value: '1 240', color: '#B4A08B' },
    ];

    stats.forEach(function (stat) {
      html += '<div class="stat-card">' +
        '<div class="stat-icon" style="background:' + stat.color + '15">' +
          '<span style="font-size:22px">' + stat.icon + '</span>' +
        '</div>' +
        '<div>' +
          '<div class="stat-value">' + stat.value + '</div>' +
          '<div class="stat-label">' + stat.label + '</div>' +
        '</div>' +
      '</div>';
    });

    html += '</div><div class="prog-grid">' +
      '<div class="prog-panel">' +
        '<div class="prog-panel-title">Compétences</div>';

    skills.forEach(function (skill) {
      html += '<div class="skill-row">' +
        '<div class="skill-header">' +
          '<span class="skill-name">' + skill.label + '</span>' +
          '<span class="skill-pct" style="color:' + skill.color + '">' + skill.pct + '%</span>' +
        '</div>' +
        '<div class="skill-bar">' +
          '<div class="skill-bar-fill" style="width:' + skill.pct + '%;background:' + skill.color + '"></div>' +
        '</div>' +
      '</div>';
    });

    html += '</div>' +
      '<div class="prog-panel">' +
        '<div class="prog-panel-title">Cette semaine</div>' +
        '<div class="week-chart">';

    weekActivity.forEach(function (d) {
      var h = maxMin > 0 ? (d.minutes / maxMin) * 90 : 4;
      html += '<div class="week-col">' +
        '<div class="week-bar" style="height:' + Math.max(h, 4) + '%;background:' + (d.minutes > 0 ? '#8B9A8B' : 'var(--clay)') + '"></div>' +
        '<div class="week-label">' + d.day + '</div>' +
      '</div>';
    });

    html += '</div>' +
      '<div class="week-total">Total : ' + totalMin + ' min cette semaine</div>' +
      '</div></div>' +
      '<div>' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--charcoal-light);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:16px">Badges & Récompenses</div>' +
        '<div class="badges-grid">';

    badges.forEach(function (badge) {
      html += '<div class="badge-item ' + (badge.earned ? 'earned' : 'locked') + '">' +
        '<div class="badge-icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="' + (badge.earned ? '#5d6b79' : '#8f98a3') + '" stroke-width="1.8"><circle cx="12" cy="8" r="6"/><path d="M12 14v6"/><path d="M8 18h8"/></svg></div>' +
        '<div class="badge-label ' + (badge.earned ? 'earned' : 'locked') + '">' + badge.label + '</div>' +
      '</div>';
    });

    html += '</div></div></div>';
    contentEl.innerHTML = html;
  }

  // ─── Account ────────────────────────────────────────────────
  function renderAccount() {
    var html = '<div class="account-wrap" style="animation: fadeUp 0.5s ease both;">' +
      '<div style="margin-bottom:36px">' +
        '<div style="font-family:\'DM Mono\',monospace;font-size:10px;color:var(--accent);letter-spacing:0.18em;text-transform:uppercase;margin-bottom:8px">Paramètres</div>' +
        '<h1 style="font-size:28px;font-weight:800;color:var(--ink);margin:0;letter-spacing:-0.02em">Mon Compte</h1>' +
      '</div>' +
      '<div class="profile-card">' +
        '<div class="profile-avatar">AL</div>' +
        '<div>' +
          '<div class="profile-name">Alex</div>' +
          '<div class="profile-email"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> alex@example.com</div>' +
          '<div class="profile-level">Niveau A1 · Apprenant</div>' +
        '</div>' +
      '</div>' +
      '<div class="info-card">' +
        '<div class="info-row">' +
          '<div class="info-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--charcoal-mid)" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>' +
          '<div><div class="info-label">Nom complet</div><div class="info-value">Alex</div></div>' +
        '</div>' +
        '<div class="info-row">' +
          '<div class="info-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--charcoal-mid)" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>' +
          '<div><div class="info-label">Adresse email</div><div class="info-value">alex@example.com</div></div>' +
        '</div>' +
      '</div>' +
      '<div class="toggle-card">' +
        '<div class="toggle-left">' +
          '<div class="toggle-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--charcoal-mid)" stroke-width="1.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></div>' +
          '<div><div class="toggle-label">Notifications</div><div class="toggle-desc">Rappels de pratique quotidienne</div></div>' +
        '</div>' +
        '<div class="toggle-switch active" id="notifToggle">' +
          '<div class="toggle-knob" style="left:24px"></div>' +
        '</div>' +
      '</div>' +
      '<div class="toggle-card">' +
        '<div class="toggle-left">' +
          '<div class="toggle-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--charcoal-mid)" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>' +
          '<div><div class="toggle-label">Changer le mot de passe</div><div class="toggle-desc">Dernière modification : jamais</div></div>' +
        '</div>' +
        '<button style="font-family:\'DM Mono\',monospace;font-size:11px;color:#8B9A8B;background:rgba(139,154,139,0.1);border:1px solid rgba(139,154,139,0.25);border-radius:40px;padding:7px 16px;cursor:pointer">Modifier</button>' +
      '</div>' +
      '<button class="logout-btn" onclick="handleLogout()"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg> Se déconnecter</button>' +
    '</div>';

    contentEl.innerHTML = html;

    // Toggle switch
    var toggle = document.getElementById('notifToggle');
    if (toggle) {
      toggle.addEventListener('click', function () {
        var isActive = toggle.classList.toggle('active');
        toggle.classList.remove('active', 'inactive');
        toggle.classList.add(isActive ? 'active' : 'inactive');
        var knob = toggle.querySelector('.toggle-knob');
        if (knob) knob.style.left = isActive ? '24px' : '4px';
      });
    }
  }

  // ─── Global handlers ────────────────────────────────────────
  window.handleLogout = function () {
    if (confirm('Se déconnecter ?')) {
      window.location.href = '/';
    }
  };

  // ─── Sidebar toggle ─────────────────────────────────────────
  if (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
      isSidebarCollapsed = !isSidebarCollapsed;
      if (isSidebarCollapsed) {
        sidebarEl.classList.add('sidebarCollapsed');
      } else {
        sidebarEl.classList.remove('sidebarCollapsed');
      }
    });
  }

  // ─── Nav item clicks ────────────────────────────────────────
  navItems.forEach(function (item) {
    item.addEventListener('click', function () {
      var section = item.getAttribute('data-section');
      navContext = null;
      navView = null;
      setActiveSection(section);
    });
  });

  // ─── Back handler ───────────────────────────────────────────
  window._backHandler = function () {
    // In most cases we go back to the previous context
    if (navContext === 'niveau-zero') {
      navContext = null;
      navView = null;
      setActiveSection('Apprendre');
    } else if (navContext === 'fondation') {
      if (navView) {
        navView = null;
        renderFondation();
      } else {
        navContext = null;
        setActiveSection('Apprendre');
      }
    } else {
      setActiveSection('Apprendre');
    }
  };

  // ─── Init from URL params ───────────────────────────────────
  function initFromURL() {
    var params = new URLSearchParams(window.location.search);
    var sectionParam = params.get('section');
    var contextParam = params.get('context');
    var viewParam = params.get('view');

    if (sectionParam && SECTIONS.indexOf(sectionParam) !== -1) {
      activeSection = sectionParam;
      navContext = contextParam;
      navView = viewParam;
    }
    setActiveSection(activeSection);

    // Back to home link
    var homeLink = document.querySelector('.breadcrumb span:first-child');
    if (homeLink) {
      homeLink.addEventListener('click', function () {
        window.location.href = '/';
      });
    }

    // User chip logout
    var userChip = document.querySelector('.userChip');
    if (userChip) {
      userChip.addEventListener('click', handleLogout);
    }
  }

  initFromURL();

})();
