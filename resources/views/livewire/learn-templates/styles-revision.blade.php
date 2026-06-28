<style>
    [x-cloak] { display: none !important; }

    .rev-lab {
        width: 100%;
        margin-top: 24px;
        color: var(--lab-ink, #1E262F);
        font-family: 'Syne', sans-serif;
    }

    .rev-layout {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 32px;
        width: 100%;
    }

    @media (min-width: 1024px) {
        .rev-layout { flex-direction: row; }
    }

    .rev-nav {
        width: 100%;
        flex-shrink: 0;
        padding-bottom: 16px;
    }

    @media (min-width: 1024px) {
        .rev-nav { width: 224px; }
    }

    .rev-nav-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .rev-nav-btn {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 8px;
        border: none;
        border-radius: 10px;
        padding: 10px 12px;
        text-align: left;
        font-size: 13px;
        font-weight: 500;
        color: var(--lab-charcoal-mid, #5B5F69);
        background: transparent;
        cursor: pointer;
        transition: background 0.15s, color 0.15s;
    }

    .rev-nav-btn:hover {
        background: var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
        color: var(--lab-ink, #1E262F);
    }

    .rev-nav-btn.is-active {
        background: var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
        color: var(--lab-ink, #1E262F);
        font-weight: 600;
    }

    .rev-nav-btn svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .rev-nav-divider {
        margin: 16px 0;
        width: 100%;
        border: none;
        border-top: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
    }

    @media (min-width: 1024px) {
        .rev-nav-divider { display: none; }
    }

    .rev-main {
        flex: 1;
        min-width: 0;
        width: 100%;
    }

    @media (max-width: 1023px) {
        .rev-main { padding-top: 8px; }
    }

    .rev-home-title {
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: var(--lab-ink, #1E262F);
        margin: 0;
    }

    .rev-home-desc {
        margin-top: 6px;
        font-family: 'DM Mono', monospace;
        font-size: 12px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-grid {
        display: grid;
        gap: 16px;
        margin-top: 32px;
    }

    @media (min-width: 768px) {
        .rev-grid { grid-template-columns: repeat(2, 1fr); }
    }

    .rev-home-card {
        display: block;
        width: 100%;
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 16px;
        padding: 24px;
        text-align: left;
        background: white;
        cursor: pointer;
        transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
    }

    .rev-home-card:hover {
        border-color: var(--lab-accent, #8B9A8B);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        transform: translateY(-2px);
    }

    .rev-home-card-inner {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .rev-home-card-icon {
        border-radius: 10px;
        padding: 12px;
        background: var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
        color: var(--lab-accent, #8B9A8B);
    }

    .rev-home-card-icon svg {
        width: 24px;
        height: 24px;
    }

    .rev-home-card-title {
        font-size: 17px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
        margin: 0;
        transition: color 0.2s;
    }

    .rev-home-card:hover .rev-home-card-title {
        color: var(--lab-accent, #8B9A8B);
    }

    .rev-home-card-text {
        margin-top: 4px;
        font-size: 13px;
        color: var(--lab-charcoal-light, #6A6E79);
        line-height: 1.5;
    }

    .rev-section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
    }

    .rev-section-heading {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .rev-section-heading svg {
        width: 24px;
        height: 24px;
        color: var(--lab-accent, #8B9A8B);
        flex-shrink: 0;
    }

    .rev-section-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
        margin: 0;
    }

    .rev-section-subtitle {
        font-family: 'DM Mono', monospace;
        font-size: 12px;
        color: var(--lab-charcoal-light, #6A6E79);
        margin: 2px 0 0;
    }

    .rev-badge {
        border-radius: 999px;
        padding: 4px 10px;
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        font-weight: 600;
        color: var(--lab-charcoal-mid, #5B5F69);
        background: var(--lab-stone, #E8EDF2);
        white-space: nowrap;
    }

    .rev-empty {
        margin-top: 24px;
        font-family: 'DM Mono', monospace;
        font-size: 13px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-panel {
        margin-top: 24px;
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 18px;
        background: white;
        padding: 32px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
    }

    .rev-panel.is-centered { text-align: center; }

    .rev-eyebrow {
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-phrase-de {
        margin-top: 12px;
        font-size: 28px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
    }

    .rev-phrase-fr {
        margin-top: 8px;
        font-size: 14px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-top: 24px;
    }

    .rev-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: opacity 0.15s, transform 0.15s, background 0.15s;
    }

    .rev-btn svg {
        width: 16px;
        height: 16px;
    }

    .rev-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .rev-btn-primary {
        background: var(--lab-accent, #8B9A8B);
        color: white;
    }

    .rev-btn-primary:hover:not(:disabled) {
        opacity: 0.92;
    }

    .rev-btn-primary.is-recording {
        box-shadow: 0 0 0 2px white, 0 0 0 4px #ef4444;
        animation: rev-pulse 1.2s ease-in-out infinite;
    }

    @keyframes rev-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.85; }
    }

    .rev-btn-secondary {
        background: var(--lab-stone, #E8EDF2);
        color: var(--lab-ink, #1E262F);
    }

    .rev-btn-secondary:hover:not(:disabled) {
        background: var(--lab-clay, #D9DFE8);
    }

    .rev-btn-ghost {
        background: transparent;
        color: var(--lab-charcoal-mid, #5B5F69);
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
    }

    .rev-btn-ghost:hover:not(:disabled) {
        background: var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
        color: var(--lab-ink, #1E262F);
    }

    .rev-link-btn {
        border: none;
        background: none;
        padding: 0;
        font-size: 13px;
        color: var(--lab-charcoal-mid, #5B5F69);
        cursor: pointer;
        transition: color 0.15s;
    }

    .rev-link-btn:hover {
        color: var(--lab-ink, #1E262F);
    }

    .rev-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 16px;
    }

    .rev-toolbar-note {
        font-family: 'DM Mono', monospace;
        font-size: 12px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-toolbar-note strong {
        color: var(--lab-ink, #1E262F);
    }

    .rev-question {
        margin-top: 12px;
        font-size: 22px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
        line-height: 1.4;
    }

    .rev-question em {
        font-style: normal;
        color: var(--lab-accent, #8B9A8B);
    }

    .rev-quiz-grid {
        display: grid;
        gap: 12px;
        margin-top: 32px;
    }

    @media (min-width: 640px) {
        .rev-quiz-grid { grid-template-columns: repeat(2, 1fr); }
    }

    .rev-quiz-opt {
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 14px;
        padding: 16px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        background: white;
        color: var(--lab-ink, #1E262F);
        cursor: pointer;
        transition: border-color 0.15s, background 0.15s;
    }

    .rev-quiz-opt:hover:not(:disabled) {
        border-color: var(--lab-accent, #8B9A8B);
        background: var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
    }

    .rev-quiz-opt.is-correct {
        border-color: #1D9E75;
        background: #E1F5EE;
        color: #085041;
    }

    .rev-quiz-opt.is-wrong {
        border-color: #E24B4A;
        background: #FCEBEB;
        color: #712727;
    }

    .rev-quiz-opt.is-muted {
        border-color: var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        background: var(--lab-stone, #E8EDF2);
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-quiz-footer {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        margin-top: 32px;
    }

    @media (min-width: 640px) {
        .rev-quiz-footer {
            flex-direction: row;
            justify-content: space-between;
        }
    }

    .rev-status {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
    }

    .rev-status.is-success { color: #0F6E56; }
    .rev-status.is-error { color: #A32D2D; }

    .rev-status svg {
        width: 20px;
        height: 20px;
    }

    .rev-form {
        max-width: 36rem;
        margin: 32px auto 0;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .rev-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--lab-ink, #1E262F);
        margin-bottom: 6px;
    }

    .rev-input {
        width: 100%;
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 14px;
        font-family: 'Syne', sans-serif;
        color: var(--lab-ink, #1E262F);
        background: white;
        transition: border-color 0.15s, box-shadow 0.15s;
    }

    .rev-input:focus {
        outline: none;
        border-color: var(--lab-accent, #8B9A8B);
        box-shadow: 0 0 0 3px var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
    }

    .rev-form-actions {
        display: flex;
        justify-content: flex-end;
    }

    .rev-feedback {
        max-width: 36rem;
        margin: 24px auto 0;
        border-radius: 14px;
        padding: 16px;
        border: 1px solid;
    }

    .rev-feedback.is-success {
        border-color: #5DCAA5;
        background: #E1F5EE;
    }

    .rev-feedback.is-error {
        border-color: #E24B4A;
        background: #FCEBEB;
    }

    .rev-feedback-title {
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    .rev-feedback.is-success .rev-feedback-title { color: #085041; }
    .rev-feedback.is-error .rev-feedback-title { color: #712727; }

    .rev-feedback-expected {
        margin-top: 12px;
    }

    .rev-feedback-expected-label {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-feedback-expected-value {
        margin-top: 4px;
        font-weight: 600;
        color: var(--lab-ink, #1E262F);
    }

    .rev-pagination {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 32px;
        padding-top: 16px;
        border-top: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
    }

    .rev-pagination-note {
        font-family: 'DM Mono', monospace;
        font-size: 12px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-page-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        border: none;
        background: none;
        padding: 0;
        font-size: 13px;
        font-weight: 500;
        color: var(--lab-charcoal-mid, #5B5F69);
        cursor: pointer;
        transition: color 0.15s;
    }

    .rev-page-btn:hover:not(:disabled) {
        color: var(--lab-ink, #1E262F);
    }

    .rev-page-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .rev-page-btn svg {
        width: 16px;
        height: 16px;
    }

    .rev-loading {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 24px;
        font-family: 'DM Mono', monospace;
        font-size: 13px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-loading svg {
        width: 20px;
        height: 20px;
        animation: rev-spin 1s linear infinite;
    }

    @keyframes rev-spin {
        to { transform: rotate(360deg); }
    }

    .rev-results-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
        margin: 0 0 16px;
    }

    .rev-scores-grid {
        display: grid;
        gap: 12px;
    }

    @media (min-width: 640px) {
        .rev-scores-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (min-width: 1024px) {
        .rev-scores-grid { grid-template-columns: repeat(4, 1fr); }
    }

    .rev-score-card {
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 14px;
        padding: 16px;
        background: white;
    }

    .rev-score-label {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-score-value {
        margin-top: 4px;
        font-size: 24px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
    }

    .rev-score-value.is-good { color: #0F6E56; }
    .rev-score-value.is-warn { color: #854F0B; }

    .rev-recognized {
        margin-top: 16px;
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 14px;
        padding: 16px;
        background: white;
    }

    .rev-recognized-text {
        margin-top: 4px;
        font-weight: 600;
        color: var(--lab-ink, #1E262F);
    }

    .rev-coach {
        margin-top: 16px;
        border: 1px solid var(--lab-glass-border, rgba(106, 110, 121, 0.2));
        border-radius: 18px;
        padding: 20px;
        background: white;
    }

    .rev-coach-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
    }

    .rev-coach-intro {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        min-width: 0;
    }

    .rev-coach-icon {
        margin-top: 2px;
        border-radius: 10px;
        padding: 8px;
        background: var(--lab-accent-dim, rgba(139, 154, 139, 0.12));
        color: var(--lab-accent, #8B9A8B);
    }

    .rev-coach-icon svg {
        width: 20px;
        height: 20px;
    }

    .rev-coach-title {
        font-size: 17px;
        font-weight: 700;
        color: var(--lab-ink, #1E262F);
        margin: 0;
    }

    .rev-coach-desc {
        margin-top: 4px;
        font-size: 13px;
        color: var(--lab-charcoal-light, #6A6E79);
    }

    .rev-coach-text {
        margin-top: 16px;
        font-size: 14px;
        line-height: 1.6;
        color: var(--lab-charcoal-mid, #5B5F69);
    }
</style>
