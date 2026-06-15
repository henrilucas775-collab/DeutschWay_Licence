<style>
  :root {
    --sein:    #6D28D9;
    --sein-lt: #EDE9FE;
    --sein-md: #C4B5FD;
    --sein-brd:#A78BFA;
    --haben:   #BE185D;
    --haben-lt:#FCE7F3;
    --haben-md:#F9A8D4;
    --haben-brd:#F472B6;
    --paper2:  #F5F0EB;
  }

  /* ── LESSON 1: STRUCTURE ── */
  .structure-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 32px; }
  @media (max-width: 768px) { .structure-grid { grid-template-columns: 1fr; } }
  .structure-card { background: white; border: 1px solid var(--glass-border, #e2e8f0); border-radius: 12px; padding: 20px; text-align: center; }
  .structure-card.subject { border-top: 3px solid var(--sein); }
  .structure-card.verb { border-top: 3px solid var(--haben); }
  .structure-card.complement { border-top: 3px solid var(--success, #10B981); }
  .structure-label { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: .1em; color: var(--charcoal-light, #64748b); margin-bottom: 12px; }
  .structure-title { font-family: 'Lora', serif; font-size: 18px; font-weight: 700; margin-bottom: 16px; color: var(--ink, #0f172a); }
  .structure-items { display: flex; flex-direction: column; gap: 8px; }
  .structure-item { background: #f8fafc; padding: 10px 12px; border-radius: 8px; font-size: 13px; color: var(--charcoal-mid, #475569); border-left: 3px solid var(--glass-border, #e2e8f0); transition: all .2s ease; }
  .structure-item:hover { border-left-color: var(--sein); background: var(--sein-lt); }
  .structure-item-de { font-family: 'Lora', serif; font-weight: 600; color: var(--ink, #0f172a); margin-top: 4px; }
  .structure-item-fr { font-size: 11px; color: var(--charcoal-light, #64748b); margin-top: 2px; }

  /* ── EXAMPLE SECTION ── */
  .example-section { background: var(--sein-lt); border: 1px solid var(--sein-brd); border-radius: 12px; padding: 24px; margin-bottom: 32px; }
  .example-title { font-family: 'Lora', serif; font-size: 16px; font-weight: 700; color: var(--sein); margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
  .example-row { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 12px; }
  @media (max-width: 600px) { .example-row { grid-template-columns: 1fr; } }
  .example-cell { background: white; padding: 12px; border-radius: 8px; border: 1px solid var(--sein-brd); }
  .example-cell-label { font-size: 10px; font-weight: 600; text-transform: uppercase; color: var(--sein); margin-bottom: 6px; letter-spacing: .05em; }
  .example-cell-text { font-family: 'Lora', serif; font-size: 15px; font-weight: 600; color: var(--ink, #0f172a); }
  .example-cell-fr { font-size: 11px; color: var(--charcoal-light, #64748b); margin-top: 4px; }

  /* ── SECTION LABEL ── */
  .section-label { display: flex; align-items: center; gap: 10px; font-size: 11px; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: var(--charcoal-light, #64748b); padding: 28px 0 12px; }
  .section-label::after { content:''; flex:1; height:1px; background:var(--glass-border, #e2e8f0); }

  /* ── CONJUGAISON TABLES ── */
  .cj-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  @media (max-width: 560px) { .cj-grid { grid-template-columns: 1fr; } }
  .cj-card { border-radius: 12px; overflow: hidden; border: 1px solid var(--glass-border, #e2e8f0); background: white; }
  .cj-head { display: flex; align-items: center; gap: 10px; padding: 12px 14px; }
  .cj-head-verb { font-family: 'Lora', serif; font-size: 20px; font-weight: 700; }
  .cj-head-fr { font-size: 12px; font-weight: 500; opacity: .65; flex: 1; }
  .cj-head-btn { width: 30px; height: 30px; border-radius: 50%; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 13px; transition: transform .12s, opacity .15s; flex-shrink: 0; }
  .cj-head-btn:hover { opacity: .8; } .cj-head-btn:active { transform: scale(.9); }
  .sein-theme .cj-head { background: var(--sein-lt); color: var(--sein); }
  .sein-theme .cj-head-btn { background: var(--sein); color: white; }
  .haben-theme .cj-head { background: var(--haben-lt); color: var(--haben); }
  .haben-theme .cj-head-btn { background: var(--haben); color: white; }

  .cj-table { width: 100%; border-collapse: collapse; }
  .cj-table thead th { font-size: 10px; font-weight: 600; letter-spacing: .07em; text-transform: uppercase; color: var(--charcoal-light, #64748b); background: #f8fafc; padding: 7px 12px; border-bottom: 1px solid var(--glass-border, #e2e8f0); text-align: left; }
  .cj-row { cursor: pointer; transition: background .12s; }
  .cj-row:not(:last-child) td { border-bottom: 1px solid var(--glass-border, #e2e8f0); }
  .cj-row td { padding: 9px 12px; vertical-align: middle; }
  .cj-pro-cell { width: 42%; border-right: 1px solid var(--glass-border, #e2e8f0); }
  .cj-pro { font-size: 13px; color: var(--charcoal-mid, #475569); }
  .cj-pro-fr { font-size: 11px; color: var(--charcoal-light, #64748b); margin-top: 1px; }
  .cj-form { font-family: 'Lora', serif; font-size: 15px; font-weight: 600; }
  .sein-theme .cj-form { color: var(--sein); }
  .sein-theme .cj-row:hover { background: #F5F1FF; }
  .sein-theme .cj-row.lit { background: var(--sein-lt); }
  .haben-theme .cj-form { color: var(--haben); }
  .haben-theme .cj-row:hover { background: #FDF2F8; }
  .haben-theme .cj-row.lit { background: var(--haben-lt); }
  .cj-play-td { width: 32px; text-align: right; }
  
  .mini-play { width: 24px; height: 24px; border-radius: 50%; border: none; background: transparent; cursor: pointer; color: var(--charcoal-light, #64748b); display: flex; align-items: center; justify-content: center; transition: color .15s, transform .1s; padding: 0; margin-left: auto; font-size: 15px; }
  .sein-theme .mini-play:hover, .sein-theme .mini-play.playing { color: var(--sein); }
  .haben-theme .mini-play:hover, .haben-theme .mini-play.playing { color: var(--haben); }
  .mini-play:active { transform: scale(.88); }

  /* ── TRANSITION ── */
  .transition-block { margin: 28px 0 0; background: #f8fafc; border: 1px solid var(--glass-border, #e2e8f0); border-left: 3px solid var(--sein); border-radius: 0 12px 12px 0; padding: 16px 18px; }
  .transition-block p { font-family: 'Lora', serif; font-size: 14px; font-style: italic; color: var(--charcoal-mid, #475569); line-height: 1.7; }
  .transition-block strong { font-style: normal; color: var(--ink, #0f172a); }

  /* ── PHRASE TABLE ── */
  .pl-outer { padding: 0; }
  .pl-verb-block { margin-bottom: 24px; background: white; border-radius: 12px; }
  .pl-verb-title { display: flex; align-items: center; gap: 10px; padding: 14px 14px 10px; border-radius: 12px 12px 0 0; border: 1px solid var(--glass-border, #e2e8f0); border-bottom: none; }
  .pl-verb-title .vt-de { font-family: 'Lora', serif; font-size: 17px; font-weight: 700; }
  .pl-verb-title .vt-fr { font-size: 12px; font-weight: 500; opacity: .65; flex:1; }
  .pl-verb-title .vt-btn { width: 28px; height: 28px; border-radius: 50%; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 12px; transition: transform .12s, opacity .15s; }
  .pl-verb-title .vt-btn:hover { opacity: .8; } .pl-verb-title .vt-btn:active { transform: scale(.9); }
  
  .sein-ph .pl-verb-title { background: var(--sein-lt); color: var(--sein); }
  .sein-ph .pl-verb-title .vt-btn { background: var(--sein); color: white; }
  .haben-ph .pl-verb-title { background: var(--haben-lt); color: var(--haben); }
  .haben-ph .pl-verb-title .vt-btn { background: var(--haben); color: white; }

  .pl-grid { display: grid; grid-template-columns: repeat(4, 1fr); border: 1px solid var(--glass-border, #e2e8f0); border-radius: 0 0 12px 12px; overflow: visible; }
  @media (max-width: 900px) { .pl-grid { grid-template-columns: repeat(2, 1fr); } }
  @media (max-width: 500px) { .pl-grid { grid-template-columns: 1fr; } }

  .pl-item { display: flex; align-items: center; justify-content: space-between; padding: 8px 8px 8px 10px; gap: 5px; cursor: pointer; transition: background .12s; border-bottom: 1px solid var(--glass-border, #e2e8f0); }
  .pl-item:not(:nth-child(4n)) { border-right: 1px solid var(--glass-border, #e2e8f0); }
  @media (max-width: 900px) { .pl-item:not(:nth-child(2n)) { border-right: 1px solid var(--glass-border, #e2e8f0); } .pl-item:nth-child(2n) { border-right: none; } }
  
  .pl-text { flex:1; min-width:0; pointer-events:none; }
  .pl-fr { font-size: 10.5px; color: var(--charcoal-light, #64748b); margin-bottom: 2px; }
  .pl-de { font-family: 'Lora', serif; font-size: 13px; font-weight: 600; }

  .sein-ph .pl-de { color: var(--sein); }
  .sein-ph .pl-item:hover { background: #F5F1FF; }
  .sein-ph .pl-item.lit { background: var(--sein-lt); }
  .haben-ph .pl-de { color: var(--haben); }
  .haben-ph .pl-item:hover { background: #FDF2F8; }
  .haben-ph .pl-item.lit { background: var(--haben-lt); }

  .pl-acts { display: flex; align-items: center; gap: 4px; flex-shrink: 0; }
  .act-play { width: 26px; height: 26px; border-radius: 50%; border: none; background: transparent; cursor: pointer; color: var(--charcoal-light, #64748b); display: flex; align-items: center; justify-content: center; font-size: 15px; transition: color .15s, transform .1s; padding: 0; }
  .act-play:active { transform: scale(.88); }
  .sein-ph .act-play:hover, .sein-ph .act-play.playing { color: var(--sein); }
  .haben-ph .act-play:hover, .haben-ph .act-play.playing { color: var(--haben); }

  .act-mic { width: 24px; height: 24px; border-radius: 50%; border: 1px solid; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 11px; transition: transform .1s, background .15s; }
  .act-mic:active { transform: scale(.88); }
  .sein-ph .act-mic { background: var(--sein-lt); border-color: var(--sein-brd); color: var(--sein); }
  .sein-ph .act-mic:hover { background: var(--sein-md); }
  .sein-ph .act-mic.recording { background: var(--sein); color: white; animation: blink .7s infinite alternate; }
  .haben-ph .act-mic { background: var(--haben-lt); border-color: var(--haben-brd); color: var(--haben); }
  .haben-ph .act-mic:hover { background: var(--haben-md); }
  .haben-ph .act-mic.recording { background: var(--haben); color: white; animation: blink .7s infinite alternate; }
  @keyframes blink { from{opacity:1} to{opacity:.45} }

  /* Mini badges + tooltip */
  .mini-wrap { position:relative; display:inline-block; z-index: 10; margin-left: 8px;}
  .mini-badge { width:34px; height:34px; border-radius:50%; display:flex; flex-direction:column; align-items:center; justify-content:center; cursor:pointer; border:1.5px solid transparent; transition:transform .2s; }
  .mini-badge:hover { transform:scale(1.1); }
  .mini-badge .num { font-size:11px; font-weight:700; line-height:1; }

  /* Colors used in HTML */
  .mini-badge.purple, .t-avatar.purple { background:#EEEDFE; border-color:#AFA9EC; color:#3C3489; }
  .mini-badge.purple .num, .t-score-val.purple { color:#534AB7; }
  
  .mini-badge.teal, .t-avatar.teal { background:#E1F5EE; border-color:#5DCAA5; color:#085041; }
  .mini-badge.teal .num, .t-score-val.teal { color:#0F6E56; }
  
  .mini-badge.amber, .t-avatar.amber { background:#FAEEDA; border-color:#EF9F27; color:#633806; }
  .mini-badge.amber .num, .t-score-val.amber { color:#854F0B; }

  /* Tooltip panel */
  .mini-tooltip {
    position:absolute; bottom:calc(100% + 14px); right: 0;
    transform:scale(.9); transform-origin:bottom right; width:260px;
    background:#fff; border:0.5px solid #cbd5e1; border-radius:12px;
    padding:.85rem .9rem .8rem; opacity:0; pointer-events:none;
    transition:opacity .2s,transform .2s; z-index:20; box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  }
  .mini-wrap:hover .mini-tooltip { opacity:1; transform:scale(1); }
  .mini-tooltip::after { content:''; position:absolute; top:100%; right:14px; border:7px solid transparent; border-top-color:#cbd5e1; }
  .mini-tooltip::before { content:''; position:absolute; top:100%; right:15px; border:6px solid transparent; border-top-color:#fff; z-index:1; }

  /* Tooltip content */
  .t-head { display:flex; align-items:center; gap:8px; margin-bottom:10px; padding-bottom:10px; border-bottom:0.5px solid #e2e8f0; }
  .t-avatar { width:32px; height:32px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; flex-shrink:0; }
  .t-meta { flex:1; text-align: left; }
  .t-name { font-size:13px; font-weight:600; color:#0f172a; line-height:1.2; }
  .t-role { font-size:11px; color:#64748b; }

  .t-score-row { display:flex; align-items:center; gap:8px; margin-bottom:8px; }
  .t-score-val { font-size:20px; font-weight:700; }
  
  .t-bar-track { height:4px; background:#f1f5f9; border-radius:2px; flex:1; overflow:hidden; }
  .t-bar-fill { height:100%; border-radius:2px; transition:width .4s; }
  .fill-purple { background:#7F77DD; }
  .fill-teal { background:#1D9E75; }
  .fill-amber { background:#BA7517; }

  .t-text { font-size:12px; color:#475569; line-height:1.5; margin-bottom:10px; text-align: left; white-space: normal; }
  .t-text strong { font-weight:600; color:#0f172a; }

  .t-chips { display:flex; gap:6px; flex-wrap:wrap; }
  .chip { font-size:10px; padding:3px 9px; border-radius:20px; font-weight:600; }
  .chip.good { background:#E1F5EE; color:#085041; }
  .chip.warn { background:#FAEEDA; color:#633806; }

  /* ── NAVIGATION ── */
  .lesson-nav { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin: 40px 0 0; padding-top: 24px; border-top: 1px solid var(--glass-border, #e2e8f0); }
  .nav-btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: var(--sein); color: white; text-decoration: none; font-weight: 600; font-size: 14px; border-radius: 30px; border: none; cursor: pointer; transition: transform .2s, box-shadow .2s; box-shadow: 0 4px 12px rgba(109, 40, 217, 0.2); }
  .nav-btn:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(109, 40, 217, 0.3); }
  .nav-btn:active:not(:disabled) { transform: translateY(0); }
  .nav-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .nav-btn.secondary { background: transparent; color: var(--sein); border: 2px solid var(--sein); box-shadow: none; }
  .nav-btn.secondary:hover:not(:disabled) { background: var(--sein-lt); }
  .nav-spacer { flex: 1; }
</style>
