@php
    $levelLabel = $chapitreData['sur_titre'] ?? 'A1.1';
@endphp

<script src="https://cdn.jsdelivr.net/npm/microsoft-cognitiveservices-speech-sdk@latest/distrib/browser/microsoft.cognitiveservices.speech.sdk.bundle-min.js"></script>
@include('livewire.learn-templates.styles-revision')

<div class="rev-lab"
     x-data="revisionLab(@js($items), @js($levelLabel))"
     x-init="init()">

    <div class="rev-layout">
        <nav class="rev-nav" aria-label="Laboratoire">
            <ul class="rev-nav-list">
                <li>
                    <button type="button" @click="showSection('accueil')" :class="{ 'is-active': activeSection === 'accueil' }" class="rev-nav-btn">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/></svg>
                        Accueil
                    </button>
                </li>
                <li>
                    <button type="button" @click="showSection('pronunciation')" :class="{ 'is-active': activeSection === 'pronunciation' }" class="rev-nav-btn">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z"/></svg>
                        Test de prononciation
                    </button>
                </li>
                <li>
                    <button type="button" @click="showSection('dictation')" :class="{ 'is-active': activeSection === 'dictation' }" class="rev-nav-btn">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                        Dictée
                    </button>
                </li>
                <li>
                    <button type="button" @click="showSection('quiz')" :class="{ 'is-active': activeSection === 'quiz' }" class="rev-nav-btn">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/></svg>
                        Quiz
                    </button>
                </li>
            </ul>
        </nav>

        <hr class="rev-nav-divider">

        <div class="rev-main">
            <section x-show="activeSection === 'accueil'">
                <h1 class="rev-home-title">Laboratoire d'allemand</h1>
                <p class="rev-home-desc">Espace d'expérimentation pour pratiquer l'allemand avec des outils interactifs.</p>

                <div class="rev-grid">
                    <button type="button" @click="showSection('dictation')" class="rev-home-card">
                        <div class="rev-home-card-inner">
                            <div class="rev-home-card-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                            </div>
                            <div>
                                <h2 class="rev-home-card-title">Dictée</h2>
                                <p class="rev-home-card-text">Écoutez une phrase en allemand et écrivez ce que vous entendez.</p>
                            </div>
                        </div>
                    </button>

                    <button type="button" @click="showSection('quiz')" class="rev-home-card">
                        <div class="rev-home-card-inner">
                            <div class="rev-home-card-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/></svg>
                            </div>
                            <div>
                                <h2 class="rev-home-card-title">Quiz</h2>
                                <p class="rev-home-card-text">Testez vos connaissances avec des questions à choix multiples.</p>
                            </div>
                        </div>
                    </button>

                    <button type="button" @click="showSection('pronunciation')" class="rev-home-card">
                        <div class="rev-home-card-inner">
                            <div class="rev-home-card-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z"/></svg>
                            </div>
                            <div>
                                <h2 class="rev-home-card-title">Test de prononciation</h2>
                                <p class="rev-home-card-text">Enregistrez votre voix et recevez un retour instantané grâce à Azure Speech.</p>
                            </div>
                        </div>
                    </button>
                </div>
            </section>

            <section x-show="activeSection === 'quiz'" x-cloak>
                <div class="rev-section-header">
                    <div class="rev-section-heading">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/></svg>
                        <div>
                            <h2 class="rev-section-title">Quiz</h2>
                            <p class="rev-section-subtitle">Choisissez la bonne traduction allemande</p>
                        </div>
                    </div>
                    <span class="rev-badge" x-text="levelLabel"></span>
                </div>

                <template x-if="items.length === 0">
                    <div class="rev-empty">Aucune donnée disponible pour ce quiz.</div>
                </template>

                <template x-if="items.length > 0">
                    <div>
                        <div class="rev-toolbar">
                            <p class="rev-toolbar-note">Score : <strong><span x-text="qScore"></span> / <span x-text="qTotal"></span></strong></p>
                            <button @click="resetQuiz()" type="button" class="rev-link-btn">Réinitialiser</button>
                        </div>

                        <div class="rev-panel">
                            <p class="rev-eyebrow">Question <span x-text="qIndex + 1"></span>/<span x-text="items.length"></span></p>
                            <p class="rev-question">
                                Quelle est la traduction allemande de :
                                <em>« <span x-text="qCurrent?.fr"></span> »</em>
                            </p>

                            <div class="rev-quiz-grid">
                                <template x-for="opt in qOptions" :key="opt.de">
                                    <button type="button" @click="selectAnswer(opt)"
                                            :class="{
                                                'is-correct': qAnswered && opt.de === qCurrent.de,
                                                'is-wrong': qAnswered && qSelected === opt && opt.de !== qCurrent.de,
                                                'is-muted': qAnswered && opt.de !== qCurrent.de && qSelected !== opt
                                            }"
                                            class="rev-quiz-opt"
                                            x-text="opt.de"
                                            :disabled="qAnswered">
                                    </button>
                                </template>
                            </div>

                            <div x-show="qAnswered" x-cloak class="rev-quiz-footer">
                                <div class="rev-status" :class="qSelected?.de === qCurrent?.de ? 'is-success' : 'is-error'">
                                    <svg x-show="qSelected?.de === qCurrent?.de" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                    <svg x-show="qSelected?.de !== qCurrent?.de" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                    <span x-text="qSelected?.de === qCurrent?.de ? 'Bonne réponse !' : 'Mauvaise réponse...'"></span>
                                </div>
                                <button @click="qNext()" :disabled="qIndex === items.length - 1" type="button" class="rev-btn rev-btn-primary">
                                    <span x-text="qIndex === items.length - 1 ? 'Terminé' : 'Question suivante'"></span>
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </section>

            <section x-show="activeSection === 'dictation'" x-cloak>
                <div class="rev-section-header">
                    <div class="rev-section-heading">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                        <div>
                            <h2 class="rev-section-title">Dictée</h2>
                            <p class="rev-section-subtitle">Écoutez la phrase et écrivez ce que vous entendez</p>
                        </div>
                    </div>
                    <span class="rev-badge" x-text="levelLabel"></span>
                </div>

                <template x-if="items.length === 0">
                    <div class="rev-empty">Aucune donnée disponible pour la dictée.</div>
                </template>

                <template x-if="items.length > 0">
                    <div>
                        <div class="rev-panel is-centered">
                            <p class="rev-eyebrow">Phrase dictée</p>
                            <p class="rev-phrase-fr">La phrase n'est pas affichée — écoutez-la puis saisissez votre réponse.</p>

                            <div class="rev-actions">
                                <button @click="playAudio(dCurrent?.audio ? '{{ Storage::url('') }}' + dCurrent.audio : null, dCurrent?.de)" type="button" class="rev-btn rev-btn-primary">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z"/></svg>
                                    Écouter la dictée
                                </button>
                            </div>

                            <div class="rev-form">
                                <label>
                                    <span class="rev-label">Votre réponse</span>
                                    <input
                                        type="text"
                                        x-model="dInput"
                                        @keydown.enter="checkDictation()"
                                        class="rev-input"
                                        placeholder="Tapez la phrase en allemand..."
                                    >
                                </label>
                                <div class="rev-form-actions">
                                    <button @click="checkDictation()" :disabled="!dInput" type="button" class="rev-btn rev-btn-primary">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                        Vérifier
                                    </button>
                                </div>
                            </div>

                            <div x-show="dResult" x-cloak class="rev-feedback" :class="dResult?.isCorrect ? 'is-success' : 'is-error'">
                                <div class="rev-status" :class="dResult?.isCorrect ? 'is-success' : 'is-error'">
                                    <svg x-show="dResult?.isCorrect" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                    <svg x-show="!dResult?.isCorrect" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                    <h3 class="rev-feedback-title" x-text="dResult?.isCorrect ? 'Bravo !' : 'Pas tout à fait...'"></h3>
                                </div>
                                <div x-show="!dResult?.isCorrect" class="rev-feedback-expected">
                                    <p class="rev-feedback-expected-label">Réponse attendue</p>
                                    <p class="rev-feedback-expected-value" x-text="dResult?.expected"></p>
                                </div>
                            </div>
                        </div>

                        <div class="rev-pagination">
                            <button @click="dPrev()" :disabled="dIndex === 0" type="button" class="rev-page-btn">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
                                Phrase précédente
                            </button>
                            <span class="rev-pagination-note"><span x-text="dIndex + 1"></span> / <span x-text="items.length"></span></span>
                            <button @click="dNext()" :disabled="dIndex === items.length - 1" type="button" class="rev-page-btn">
                                Phrase suivante
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                            </button>
                        </div>
                    </div>
                </template>
            </section>

            <section x-show="activeSection === 'pronunciation'" x-cloak>
                <div class="rev-section-header">
                    <div class="rev-section-heading">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z"/></svg>
                        <div>
                            <h2 class="rev-section-title">Test de prononciation</h2>
                            <p class="rev-section-subtitle">Évaluez votre accent allemand avec Azure Speech</p>
                        </div>
                    </div>
                    <span class="rev-badge" x-text="levelLabel"></span>
                </div>

                <template x-if="items.length === 0">
                    <div class="rev-empty">Aucune donnée disponible pour la prononciation.</div>
                </template>

                <template x-if="items.length > 0">
                    <div wire:ignore>
                        <div class="rev-panel is-centered">
                            <p class="rev-eyebrow">Phrase à prononcer</p>
                            <p class="rev-phrase-de" x-text="pCurrent?.de"></p>
                            <p class="rev-phrase-fr" x-text="pCurrent?.fr"></p>

                            <div class="rev-actions">
                                <button @click="playAudio(pCurrent?.audio ? '{{ Storage::url('') }}' + pCurrent.audio : null, pCurrent?.de)" type="button" class="rev-btn rev-btn-ghost">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z"/></svg>
                                    Écouter
                                </button>
                                <button @click="toggleRecording()" type="button" :disabled="pCoachLoading" :class="{ 'is-recording': pIsRecording }" class="rev-btn rev-btn-primary">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z"/></svg>
                                    <span x-text="pIsRecording ? 'Enregistrement...' : 'Enregistrer'"></span>
                                </button>
                            </div>
                        </div>

                        <div x-show="pCoachLoading" class="rev-loading" x-cloak>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Analyse par l'IA en cours...
                        </div>

                        <div x-show="pHasResult" x-cloak>
                            <h3 class="rev-results-title">Résultats</h3>

                            <div class="rev-scores-grid">
                                <div class="rev-score-card">
                                    <p class="rev-score-label">Prononciation</p>
                                    <p class="rev-score-value" :class="pScores?.pronunciation > 75 ? 'is-good' : 'is-warn'" x-text="(pScores?.pronunciation || 0) + '%'"></p>
                                </div>
                                <div class="rev-score-card">
                                    <p class="rev-score-label">Précision</p>
                                    <p class="rev-score-value" x-text="(pScores?.accuracy || 0) + '%'"></p>
                                </div>
                                <div class="rev-score-card">
                                    <p class="rev-score-label">Fluidité</p>
                                    <p class="rev-score-value" x-text="(pScores?.fluency || 0) + '%'"></p>
                                </div>
                                <div class="rev-score-card">
                                    <p class="rev-score-label">Complétude</p>
                                    <p class="rev-score-value" x-text="(pScores?.completeness || 0) + '%'"></p>
                                </div>
                            </div>

                            <div class="rev-recognized">
                                <p class="rev-score-label">Ce que l'IA a entendu</p>
                                <p class="rev-recognized-text" x-text="pRecognized"></p>
                            </div>

                            <div class="rev-coach">
                                <div class="rev-coach-head">
                                    <div class="rev-coach-intro">
                                        <div class="rev-coach-icon">
                                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 0 0-2.455 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"/></svg>
                                        </div>
                                        <div>
                                            <h3 class="rev-coach-title">Coach IA (Gemini)</h3>
                                            <p class="rev-coach-desc">Conseils personnalisés sur votre prononciation.</p>
                                        </div>
                                    </div>
                                    <button @click="_ttsFr(pCoachFeedback)" type="button" class="rev-btn rev-btn-ghost">
                                        Écouter le coach
                                    </button>
                                </div>
                                <p class="rev-coach-text" x-text="pCoachFeedback"></p>
                            </div>
                        </div>

                        <div class="rev-pagination">
                            <button @click="pPrev()" :disabled="pIndex === 0" type="button" class="rev-page-btn">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
                                Phrase précédente
                            </button>
                            <span class="rev-pagination-note"><span x-text="pIndex + 1"></span> / <span x-text="items.length"></span></span>
                            <button @click="pNext()" :disabled="pIndex === items.length - 1" type="button" class="rev-page-btn">
                                Phrase suivante
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                            </button>
                        </div>
                    </div>
                </template>
            </section>
        </div>
    </div>
</div>

<script>
    function initRevisionLab() {
        if (!window.Alpine) return;
        if (window.revisionLabLoaded) return;

        Alpine.data('revisionLab', (rawItems, levelLabel) => {
            let validItems = rawItems.filter(i => {
                if (!i.de || !i.fr) return false;
                if (i.categorie && i.categorie.startsWith('conjugaison')) return false;
                return true;
            });

            if (validItems.length === 0) validItems = rawItems.filter(i => i.de && i.fr);

            return {
                activeSection: 'accueil',
                levelLabel: levelLabel,
                items: validItems,

                dIndex: 0,
                dInput: '',
                dResult: null,
                get dCurrent() { return this.items[this.dIndex]; },

                qIndex: 0,
                qOptions: [],
                qAnswered: false,
                qSelected: null,
                qScore: 0,
                qTotal: 0,
                get qCurrent() { return this.items[this.qIndex]; },

                pIndex: 0,
                pIsRecording: false,
                pHasResult: false,
                pScores: null,
                pRecognized: '',
                pCoachFeedback: '',
                pCoachLoading: false,
                pRecognizer: null,
                _coachAudio: null,
                get pCurrent() { return this.items[this.pIndex]; },

                playAudio(url, fallbackText) {
                    if (url) {
                        const audio = new Audio(url);
                        audio.play().catch(() => this._tts(fallbackText, 'de-DE'));
                    } else {
                        this._tts(fallbackText, 'de-DE');
                    }
                },

                _tts(text, lang) {
                    if (!window.speechSynthesis) return;
                    speechSynthesis.cancel();
                    const u = new SpeechSynthesisUtterance(text);
                    u.lang = lang;
                    u.rate = 0.85;
                    speechSynthesis.speak(u);
                },

                _ttsFr(text) {
                    this._playAzureSpeech(text);
                },

                async _playAzureSpeech(text) {
                    if (!text?.trim()) {
                        return;
                    }

                    if (this._coachAudio) {
                        this._coachAudio.pause();
                        this._coachAudio = null;
                    }

                    try {
                        const data = await this.$wire.synthesizeCoachSpeech(text);

                        if (data?.error || !data?.audioBase64) {
                            console.error('Azure TTS:', data?.error ?? 'Réponse audio invalide');
                            return;
                        }

                        const audio = new Audio(`data:${data.mimeType};base64,${data.audioBase64}`);
                        this._coachAudio = audio;
                        audio.onended = () => {
                            if (this._coachAudio === audio) {
                                this._coachAudio = null;
                            }
                        };
                        await audio.play();
                    } catch (error) {
                        console.error('Erreur Azure TTS:', error);
                    }
                },

                init() {
                    if (this.items.length > 0) {
                        this.generateQuizOptions();
                    }
                },

                showSection(section) {
                    this.activeSection = section;
                },

                generateQuizOptions() {
                    if (!this.qCurrent) return;
                    const correct = this.qCurrent;
                    const others = this.items.filter(i => i.de !== correct.de).sort(() => 0.5 - Math.random()).slice(0, 3);
                    this.qOptions = [correct, ...others].sort(() => 0.5 - Math.random());
                    this.qAnswered = false;
                    this.qSelected = null;
                },

                selectAnswer(opt) {
                    if (this.qAnswered) return;
                    this.qSelected = opt;
                    this.qAnswered = true;
                    this.qTotal++;
                    if (opt.de === this.qCurrent.de) {
                        this.qScore++;
                    }
                },

                qNext() {
                    if (this.qIndex < this.items.length - 1) {
                        this.qIndex++;
                        this.generateQuizOptions();
                    }
                },

                resetQuiz() {
                    this.qScore = 0;
                    this.qTotal = 0;
                    this.qIndex = 0;
                    this.generateQuizOptions();
                },

                checkDictation() {
                    if (!this.dInput) return;
                    const cleanA = this.dInput.toLowerCase().replace(/[^a-zäöüß]/g, '');
                    const cleanB = this.dCurrent.de.toLowerCase().replace(/[^a-zäöüß]/g, '');
                    const isCorrect = cleanA === cleanB;
                    this.dResult = { isCorrect, expected: this.dCurrent.de };
                },

                dNext() {
                    if (this.dIndex < this.items.length - 1) {
                        this.dIndex++;
                        this.dInput = '';
                        this.dResult = null;
                    }
                },

                dPrev() {
                    if (this.dIndex > 0) {
                        this.dIndex--;
                        this.dInput = '';
                        this.dResult = null;
                    }
                },

                async toggleRecording() {
                    if (this.pIsRecording) {
                        this.stopRecording();
                    } else {
                        await this.startRecording();
                    }
                },

                async startRecording() {
                    if (!window.SpeechSDK) {
                        alert("Le SDK Azure Speech n'est pas encore chargé.");
                        return;
                    }

                    const targetPhrase = this.pCurrent?.de;
                    if (!targetPhrase) {
                        return;
                    }

                    try {
                        this.pCoachLoading = true;
                        this.pHasResult = false;
                        this.pScores = null;
                        this.pRecognized = '';
                        this.pCoachFeedback = '';

                        const tokenResponse = await fetch('/api/pronunciation/token');
                        if (!tokenResponse.ok) {
                            throw new Error('Erreur token Azure');
                        }
                        const tokenData = await tokenResponse.json();

                        const speechConfig = SpeechSDK.SpeechConfig.fromAuthorizationToken(tokenData.token, tokenData.region);
                        speechConfig.speechRecognitionLanguage = 'de-DE';

                        const audioConfig = SpeechSDK.AudioConfig.fromDefaultMicrophoneInput();
                        this.pRecognizer = new SpeechSDK.SpeechRecognizer(speechConfig, audioConfig);

                        const pronAssessmentConfig = new SpeechSDK.PronunciationAssessmentConfig(
                            targetPhrase,
                            SpeechSDK.PronunciationAssessmentGradingSystem.HundredMark,
                            SpeechSDK.PronunciationAssessmentGranularity.Phoneme,
                            true
                        );
                        pronAssessmentConfig.applyTo(this.pRecognizer);

                        this.pIsRecording = true;
                        this.pCoachLoading = false;

                        this.pRecognizer.recognizeOnceAsync(
                            async (result) => {
                                this.pIsRecording = false;
                                this.pCoachLoading = true;

                                if (result.reason === SpeechSDK.ResultReason.RecognizedSpeech) {
                                    const pronResult = SpeechSDK.PronunciationAssessmentResult.fromResult(result);
                                    const score = pronResult.pronunciationScore ?? 0;
                                    const accuracy = pronResult.accuracyScore ?? 0;
                                    const fluency = pronResult.fluencyScore ?? 0;
                                    const completeness = pronResult.completenessScore ?? 0;

                                    this.pRecognized = result.text || '';

                                    try {
                                        const data = await this.$wire.generateCoachingFeedback(
                                            targetPhrase, score, accuracy, fluency, completeness
                                        );

                                        this.pHasResult = true;
                                        this.pScores = {
                                            pronunciation: data.scorePercent,
                                            accuracy: data.accuracyScore,
                                            fluency: data.fluencyScore,
                                            completeness: data.completenessScore,
                                        };
                                        this.pCoachFeedback = data.feedbackText || "Bon effort ! Essaie de bien articuler.";
                                        this._ttsFr(this.pCoachFeedback);
                                    } catch (error) {
                                        console.error('Erreur Livewire:', error);
                                        alert('Erreur lors de la génération du feedback de coaching.');
                                    }
                                } else {
                                    console.error('Reconnaissance non réussie :', result.reason);
                                    alert('Nous n\'avons pas pu reconnaître votre prononciation. Veuillez réessayer.');
                                }

                                this.pCoachLoading = false;
                                if (this.pRecognizer) {
                                    this.pRecognizer.close();
                                    this.pRecognizer = null;
                                }
                            },
                            (err) => {
                                console.error('Erreur de reconnaissance :', err);
                                this.pIsRecording = false;
                                this.pCoachLoading = false;
                                if (this.pRecognizer) {
                                    this.pRecognizer.close();
                                    this.pRecognizer = null;
                                }
                            }
                        );
                    } catch (err) {
                        console.error('Erreur d\'accès', err);
                        alert('Erreur de configuration du microphone ou d\'Azure.');
                        this.pCoachLoading = false;
                        this.pIsRecording = false;
                    }
                },

                stopRecording() {
                    if (this.pRecognizer && this.pIsRecording) {
                        this.pIsRecording = false;
                        this.pCoachLoading = true;

                        try {
                            this.pRecognizer.stopContinuousRecognitionAsync();
                        } catch (e) {
                            // recognizeOnceAsync ne supporte pas toujours l'arrêt manuel
                        }
                    }
                },

                _resetPronunciationState() {
                    if (this.pRecognizer) {
                        try {
                            this.pRecognizer.close();
                        } catch (e) {
                            // ignore
                        }
                        this.pRecognizer = null;
                    }

                    this.pIsRecording = false;
                    this.pHasResult = false;
                    this.pCoachFeedback = '';
                    this.pScores = null;
                    this.pRecognized = '';
                    this.pCoachLoading = false;
                },

                pNext() {
                    if (this.pIndex < this.items.length - 1) {
                        this._resetPronunciationState();
                        this.pIndex++;
                    }
                },

                pPrev() {
                    if (this.pIndex > 0) {
                        this._resetPronunciationState();
                        this.pIndex--;
                    }
                }
            };
        });
        window.revisionLabLoaded = true;
    }

    document.addEventListener('alpine:init', initRevisionLab);

    if (window.Alpine) {
        initRevisionLab();
    }
</script>
