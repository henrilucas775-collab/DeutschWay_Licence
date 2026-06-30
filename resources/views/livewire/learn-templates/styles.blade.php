<style>
    /* Global Container */
    .learn-space-container { animation: fadeUp 0.4s ease both; max-width: 100%; margin: 0 auto; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }

    /* Header */
    .back-btn { display: flex; align-items: center; gap: 8px; font-family: 'DM Mono', monospace; font-size: 12px; color: var(--lab-charcoal-light); cursor: pointer; background: none; border: none; margin-bottom: 32px; padding: 0; transition: color 0.15s; text-decoration: none; }
    .back-btn:hover { color: var(--lab-ink); }
    .learn-header { display: flex; justify-content: space-between; align-items: flex-start; gap: 24px; margin-bottom: 32px; flex-wrap: wrap; }
    .learn-eyebrow { font-family: 'DM Mono', monospace; font-size: 10px; color: var(--lab-accent); letter-spacing: 0.18em; text-transform: uppercase; margin-bottom: 8px; }
    .learn-title { font-size: 24px; font-weight: 800; color: var(--lab-ink); margin: 0; letter-spacing: -0.02em; }
    .learn-desc { color: var(--lab-charcoal-light); margin-top: 8px; font-family: 'DM Mono', monospace; font-size: 12px; max-width: 400px; }

    /* Chiffres */
    .grid-chiffres { display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 12px; margin-bottom: 32px; }
    .card-chiffres { padding: 16px; background: var(--lab-surface); border-radius: 16px; border: 1px solid var(--lab-glass-border); text-align: center; cursor: pointer; transition: all 0.2s; box-shadow: 0 2px 8px var(--lab-shadow-color); width: 100%; }
    .card-chiffres:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-color: var(--lab-accent); }
    .card-chiffres.is-playing { border-color: var(--lab-accent); box-shadow: 0 0 0 2px var(--lab-accent-glow); }
    .chiffre-num { font-size: 26px; font-weight: 800; color: var(--lab-ink); margin-bottom: 4px; }
    .chiffre-de { font-family: 'DM Mono', monospace; font-size: 13px; color: var(--lab-charcoal-mid); font-weight: 600; }

    /* Couleurs */
    .grid-couleurs { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 14px; }
    .card-couleurs { border-radius: 18px; overflow: hidden; border: 1px solid var(--lab-glass-border); background: var(--lab-surface); cursor: pointer; transition: all 0.2s; padding: 0; width: 100%; text-align: left; }
    .card-couleurs:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .card-couleurs.is-playing { box-shadow: 0 0 0 2px var(--lab-accent); }
    .couleur-preview { height: 70px; width: 100%; }
    .couleur-body { padding: 12px 16px; }
    .couleur-de { font-size: 14px; font-weight: 700; color: var(--lab-ink); margin-bottom: 2px; }
    .couleur-fr { font-family: 'DM Mono', monospace; font-size: 11px; color: var(--lab-charcoal-light); }

    /* Standard */
    .grid-standard { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 14px; }
    .card-standard { padding: 18px 20px; background: var(--lab-surface); border-radius: 18px; border: 1px solid var(--lab-glass-border); cursor: pointer; text-align: left; transition: all 0.2s; display: block; width: 100%; box-shadow: 0 2px 8px var(--lab-shadow-color); }
    .card-standard:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-color: var(--lab-accent); }
    .card-standard.is-playing { border-color: var(--lab-accent); box-shadow: 0 0 0 2px var(--lab-accent-glow); }
    .card-standard-header { display: flex; align-items: baseline; gap: 10px; margin-bottom: 8px; }
    .card-standard-de { font-size: 14px; font-weight: 700; color: var(--lab-ink); }
    .card-standard-icon { margin-left: auto; opacity: 0.4; transition: opacity 0.2s; }
    .card-standard.is-playing .card-standard-icon { opacity: 1; color: var(--lab-accent); }
    .card-standard-example { font-family: 'DM Mono', monospace; font-size: 12px; color: var(--lab-charcoal-mid); margin-bottom: 2px; }
    .card-standard-fr { font-family: 'DM Mono', monospace; font-size: 10px; color: var(--lab-charcoal-light); }

    /* Quotidien */
    .qd-controls { display: flex; gap: 1rem; flex-wrap: wrap; align-items: center; margin-bottom: 1.5rem; }
    .qd-filter-group { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .qd-filter-btn { padding: 0.4rem 0.9rem; font-size: 12px; font-weight: 500; border: 1.5px solid var(--lab-glass-border); background: var(--lab-surface); border-radius: 8px; cursor: pointer; color: var(--lab-charcoal-mid); transition: all 0.2s ease; font-family: 'DM Sans', sans-serif; }
    .qd-filter-btn:hover { border-color: var(--lab-accent); color: var(--lab-accent); }
    .qd-filter-btn.active { background: var(--lab-accent); color: #fff; border-color: var(--lab-accent); }
    .qd-search { display: flex; align-items: center; gap: 0.5rem; background: var(--lab-surface); border: 1.5px solid var(--lab-glass-border); border-radius: 8px; padding: 0.4rem 0.8rem; flex: 1; max-width: 340px; transition: border-color 0.2s; }
    .qd-search:focus-within { border-color: var(--lab-accent); }
    .qd-search input { border: none; outline: none; font-size: 13px; width: 100%; font-family: 'DM Sans', sans-serif; background: transparent; color: var(--lab-ink); }
    .qd-search svg { flex-shrink: 0; color: var(--lab-charcoal-light); }

    .qd-category-section { margin-bottom: 2.5rem; }
    .qd-category-title { font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--lab-accent); font-family: 'DM Mono', monospace; margin-bottom: 1rem; padding-bottom: 0.4rem; border-bottom: 1px solid var(--lab-glass-border); }
    .qd-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 14px; }
    .qd-card { background: var(--lab-surface); border: 1px solid var(--lab-glass-border); border-radius: 12px; overflow: hidden; cursor: pointer; transition: all 0.25s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; flex-direction: column; height: 220px; position: relative; }
    .qd-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); border-color: var(--lab-accent); }
    .qd-card.is-playing { border-color: var(--lab-accent); background: var(--lab-accent-dim); }
    .qd-card-img { width: 100%; height: 110px; object-fit: cover; background: var(--lab-stone); display: block; }
    .qd-card-img-placeholder { width: 100%; height: 110px; background: linear-gradient(135deg, var(--lab-stone), var(--lab-clay)); display: flex; align-items: center; justify-content: center; color: var(--lab-charcoal-light); font-size: 28px; }
    .qd-card-body { padding: 8px 10px; flex: 1; display: flex; flex-direction: column; gap: 3px; }
    .qd-article { font-size: 10px; font-weight: 700; color: #185FA5; background: #E6F1FB; padding: 1px 5px; border-radius: 4px; width: fit-content; font-family: 'DM Mono', monospace; }
    .qd-word { font-size: 15px; font-weight: 700; color: var(--lab-ink); font-family: 'Playfair Display', serif; }
    .qd-fr { font-size: 11px; color: var(--lab-charcoal-light); font-style: italic; }
    .qd-listen-btn { position: absolute; bottom: 8px; right: 8px; width: 28px; height: 28px; border-radius: 50%; border: 1px solid #1D9E75; background: #E1F5EE; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; padding: 0; color: #1D9E75; }
    .qd-listen-btn:hover { background: #1D9E75; color: #fff; }
    .qd-listen-btn.playing { background: #1D9E75; color: #fff; }
    .qd-empty { text-align: center; padding: 3rem; color: var(--lab-charcoal-light); font-family: 'DM Mono', monospace; font-size: 13px; }

    /* Pagination */
    .fc-pagination { display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 3rem; }
    .fc-page-btn { min-width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--lab-glass-border); background: var(--lab-surface); border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 500; transition: all 0.2s; font-family: 'DM Sans', sans-serif; color: var(--lab-ink); }
    .fc-page-btn:hover:not(:disabled) { border-color: var(--lab-accent); color: var(--lab-accent); }
    .fc-page-btn.active { background: var(--lab-accent); color: #fff; border-color: var(--lab-accent); }
    .fc-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
</style>
