<script src="https://cdn.jsdelivr.net/npm/microsoft-cognitiveservices-speech-sdk@latest/distrib/browser/microsoft.cognitiveservices.speech.sdk.bundle-min.js"></script>
@include('livewire.learn-templates.styles-grammaire')

@php
// Mapper dynamiquement les $items venus de la base de données vers la structure de la vue
$conjData = [];
$phrasesData = [];

// 1. Extraction des conjugaisons
$conjItems = collect($items)->filter(fn($item) => str_starts_with($item['categorie'], 'conjugaison-'))->groupBy('article');
foreach ($conjItems as $article => $rows) {
    $firstRow = $rows->first();
    $conjData[] = [
        'de' => $article,
        'fr' => $firstRow['fr'],
        'theme' => $article . '-theme',
        'rows' => $rows->map(function($r) {
            return [
                'pro'   => $r['de'],
                'proFr' => $r['hex'],
                'form'  => $r['example'],
                'audio' => $r['audio'] ? Storage::url($r['audio']) : null,
            ];
        })->toArray()
    ];
}

// 2. Extraction des phrases d'exemple
$phraseItems = collect($items)->filter(fn($item) => str_starts_with($item['categorie'], 'phrase-'))->groupBy('article');
foreach ($phraseItems as $article => $rows) {
    $firstRow = $rows->first();
    $phrasesData[] = [
        'de' => $article,
        'fr' => $firstRow['fr'] ?? '',
        'theme' => $firstRow['hex'] ?? $article . '-ph',
        'items' => $rows->map(function($r) {
            return [
                'de'    => $r['de'],
                'fr'    => $r['fr'],
                'audio' => $r['audio'] ? Storage::url($r['audio']) : null,
            ];
        })->toArray()
    ];
}
@endphp

<div x-data="grammarLesson()">
    
    <!-- LESSON 1: STRUCTURE DE PHRASE -->
    <div x-show="step === 1" x-transition.opacity.duration.300ms>
        <h3 class="lesson-subtitle" style="margin-bottom: 24px; color: var(--charcoal-mid);">Apprenez la construction fondamentale d'une phrase allemande avec la structure Sujet-Verbe-Complément. Découvrez les pronoms personnels et les verbes essentiels.</h3>

        <div class="structure-grid">
            <!-- SUBJECT -->
            <div class="structure-card subject">
                <div class="structure-label">Sujet</div>
                <div class="structure-title">Pronoms</div>
                <div class="structure-items">
                    <div class="structure-item"><div class="structure-item-de">ich</div><div class="structure-item-fr">je</div></div>
                    <div class="structure-item"><div class="structure-item-de">du</div><div class="structure-item-fr">tu</div></div>
                    <div class="structure-item"><div class="structure-item-de">er / sie / es</div><div class="structure-item-fr">il / elle / c'est</div></div>
                    <div class="structure-item"><div class="structure-item-de">wir</div><div class="structure-item-fr">nous</div></div>
                    <div class="structure-item"><div class="structure-item-de">ihr</div><div class="structure-item-fr">vous</div></div>
                    <div class="structure-item"><div class="structure-item-de">sie / Sie</div><div class="structure-item-fr">ils / vous (formel)</div></div>
                </div>
            </div>

            <!-- VERB -->
            <div class="structure-card verb">
                <div class="structure-label">Verbe</div>
                <div class="structure-title">Verbes de base</div>
                <div class="structure-items">
                    <div class="structure-item"><div class="structure-item-de">sein</div><div class="structure-item-fr">être</div></div>
                    <div class="structure-item"><div class="structure-item-de">haben</div><div class="structure-item-fr">avoir</div></div>
                    <div class="structure-item"><div class="structure-item-fr" style="margin-top:0;">Conjugaison au présent</div></div>
                    <div class="structure-item"><div class="structure-item-fr" style="margin-top:0;">Accord avec le sujet</div></div>
                </div>
            </div>

            <!-- COMPLEMENT -->
            <div class="structure-card complement">
                <div class="structure-label">Complément</div>
                <div class="structure-title">Attribut ou objet</div>
                <div class="structure-items">
                    <div class="structure-item"><div class="structure-item-de">Substantif</div><div class="structure-item-fr">nom / profession</div></div>
                    <div class="structure-item"><div class="structure-item-de">Adjectif</div><div class="structure-item-fr">état / qualité</div></div>
                    <div class="structure-item"><div class="structure-item-de">Adverbe</div><div class="structure-item-fr">lieu / temps</div></div>
                </div>
            </div>
        </div>

        <div class="example-section">
            <div class="example-title">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18h6m-3-13a5 5 0 0 0-5 5c0 2 1.5 3 2 5h6c.5-2 2-3 2-5a5 5 0 0 0-5-5z"/></svg>
                Exemple : Structure Sujet-Verbe-Complément
            </div>
            
            <div class="example-row">
                <div class="example-cell"><div class="example-cell-label">Sujet</div><div class="example-cell-text">Ich</div><div class="example-cell-fr">Je</div></div>
                <div class="example-cell"><div class="example-cell-label">Verbe</div><div class="example-cell-text">bin</div><div class="example-cell-fr">suis</div></div>
                <div class="example-cell"><div class="example-cell-label">Complément</div><div class="example-cell-text">Student</div><div class="example-cell-fr">étudiant</div></div>
            </div>

            <div class="example-row">
                <div class="example-cell"><div class="example-cell-label">Sujet</div><div class="example-cell-text">Du</div><div class="example-cell-fr">Tu</div></div>
                <div class="example-cell"><div class="example-cell-label">Verbe</div><div class="example-cell-text">hast</div><div class="example-cell-fr">as</div></div>
                <div class="example-cell"><div class="example-cell-label">Complément</div><div class="example-cell-text">Hunger</div><div class="example-cell-fr">faim</div></div>
            </div>
        </div>

        <div class="lesson-nav">
            <button class="nav-btn secondary" disabled>Précédent</button>
            <div class="nav-spacer"></div>
            <button class="nav-btn" @click="step = 2; window.scrollTo({top:0, behavior:'smooth'})">Suivant <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg></button>
        </div>
    </div>

    <!-- LESSON 2: CONJUGAISON & PHRASES -->
    <div x-show="step === 2" x-transition.opacity.duration.300ms style="display: none;">
        <h3 class="lesson-subtitle" style="margin-bottom: 24px; color: var(--charcoal-mid);">Maîtrisez la conjugaison des verbes "être" et "avoir" au présent, puis testez votre prononciation.</h3>

        <div class="section-label">Conjugaison — présent de l'indicatif</div>
        
        <div class="cj-grid">
            @foreach($conjData as $verb)
            <div class="cj-card {{ $verb['theme'] }}">
                <div class="cj-head">
                    <span class="cj-head-verb">{{ $verb['de'] }}</span>
                    <span class="cj-head-fr">— {{ $verb['fr'] }}</span>
                    <button class="cj-head-btn" @click="speakAll('{{ $verb['de'] }}', {{ json_encode(array_map(fn($r) => $r['pro'] . ' ' . $r['form'], $verb['rows'])) }})">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                </div>
                <table class="cj-table">
                    <thead><tr><th>Pronom</th><th>Forme</th><th></th></tr></thead>
                    <tbody>
                        @foreach($verb['rows'] as $r)
                        <tr class="cj-row" @click="playAudio('{{ $r['audio'] }}', '{{ addslashes($r['pro'] . ' ' . $r['form']) }}')">
                            <td class="cj-pro-cell">
                                <div class="cj-pro">{{ $r['pro'] }}</div>
                                <div class="cj-pro-fr">{{ $r['proFr'] }}</div>
                            </td>
                            <td><span class="cj-form">{{ $r['form'] }}</span></td>
                            <td class="cj-play-td">
                                <button class="mini-play" @click.stop="playAudio('{{ $r['audio'] }}', '{{ addslashes($r['pro'] . ' ' . $r['form']) }}')"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>

        <div class="transition-block">
            <p>Mettez-la en pratique avec des <strong>phrases du quotidien</strong>. Cliquez sur le microphone pour tester votre prononciation et recevoir l'aide de notre IA.</p>
        </div>

        <div class="section-label" style="padding-top:28px">Phrases simple</div>
        
        <div class="pl-outer">
            @foreach($phrasesData as $section)
            <div class="pl-verb-block {{ $section['theme'] }}">
                <div class="pl-verb-title">
                    <span class="vt-de">{{ $section['de'] }}</span>
                </div>
                <div class="pl-grid">
                    @foreach($section['items'] as $p)
                    <div class="pl-item" x-data="pronunciationTester('{{ addslashes($p['de']) }}')" @click="if(!isRecording) playAudio('{{ $p['audio'] ?? '' }}', '{{ addslashes($p['de']) }}')">
                        <div class="pl-text">
                            <div class="pl-fr">{{ $p['fr'] }}</div>
                            <div class="pl-de">{{ $p['de'] }}</div>
                        </div>
                        <div class="pl-acts">
                            <!-- Play -->
                            <button class="act-play" @click.stop="playAudio('{{ $p['audio'] ?? '' }}', '{{ addslashes($p['de']) }}')">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
                            </button>
                            <!-- Mic / Stop / Loading -->
                            <button class="act-mic" x-show="!hasResult" :class="{'recording': isRecording}" @click.stop="toggleRecording()" :disabled="isLoading && !isRecording">
                                <!-- Default Mic -->
                                <svg x-show="!isRecording && !isLoading" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2M12 19v4M8 23h8"/></svg>
                                
                                <!-- Recording (Stop Icon) -->
                                <svg x-show="isRecording" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><rect x="6" y="6" width="12" height="12" rx="2"/></svg>
                                
                                <!-- Loading (3 dots) -->
                                <svg x-show="isLoading && !isRecording" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="4" cy="12" r="3"><animate attributeName="opacity" values="1;.2;1" dur="1s" begin="0" repeatCount="indefinite" /></circle>
                                    <circle cx="12" cy="12" r="3"><animate attributeName="opacity" values="1;.2;1" dur="1s" begin=".33" repeatCount="indefinite" /></circle>
                                    <circle cx="20" cy="12" r="3"><animate attributeName="opacity" values="1;.2;1" dur="1s" begin=".66" repeatCount="indefinite" /></circle>
                                </svg>
                            </button>
                            <div class="mini-wrap" x-show="hasResult && !isLoading" style="display:none;">
                                <div class="mini-badge" :class="themeColorClass" @click.stop="resetTest()">
                                    <span class="num" x-text="scorePercent + '%'"></span>
                                </div>
                                <div class="mini-tooltip">
                                    <div class="t-head">
                                        <div class="t-avatar" :class="themeColorClass" x-text="teacherInitials"></div>
                                        <div class="t-meta">
                                            <div class="t-name" x-text="teacherName"></div>
                                            <div class="t-role">Prononciation</div>
                                        </div>
                                    </div>
                                    <div class="t-score-row">
                                        <span class="t-score-val" :class="themeColorClass" x-text="scorePercent + '/100'"></span>
                                        <div class="t-bar-track">
                                            <div class="t-bar-fill" :class="'fill-' + themeColorClass" :style="'width:' + scorePercent + '%'"></div>
                                        </div>
                                    </div>
                                    <p class="t-text" x-html="feedbackText"></p>
                                    <div class="t-chips">
                                        <template x-for="chip in goodChips">
                                            <span class="chip good" x-text="chip"></span>
                                        </template>
                                        <template x-for="chip in warnChips">
                                            <span class="chip warn" x-text="chip"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="lesson-nav">
            <button class="nav-btn secondary" @click="step = 1; window.scrollTo({top:0, behavior:'smooth'})">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg> Précédent
            </button>
            <div class="nav-spacer"></div>
            <button class="nav-btn" disabled>Terminer</button>
        </div>
    </div>

</div>

<script>
    function initGrammarComponents() {
        if (!window.Alpine) return;
        
        // Empêche la double-déclaration si on revient sur la page
        if (!window.grammarComponentsLoaded) {
            Alpine.data('grammarLesson', () => ({
            step: 1,
            playAudio(url, fallbackText) {
                // Si un fichier audio ElevenLabs est disponible, on le joue
                if (url) {
                    const audio = new Audio(url);
                    audio.play().catch(() => this._tts(fallbackText));
                } else {
                    this._tts(fallbackText);
                }
            },
            _tts(text) {
                if (!window.speechSynthesis) return;
                speechSynthesis.cancel();
                const u = new SpeechSynthesisUtterance(text);
                u.lang = 'de-DE'; u.rate = 0.85;
                speechSynthesis.speak(u);
            }
        }));

        // Individual Pronunciation Tester (Phase 2 real Azure client-side)
        Alpine.data('pronunciationTester', (targetPhrase) => ({
            isRecording: false,
            isLoading: false,
            hasResult: false,
            scorePercent: 0,
            themeColorClass: '',
            teacherInitials: '',
            teacherName: '',
            feedbackText: '',
            goodChips: [],
            warnChips: [],
            recognizer: null,

            async toggleRecording() {
                if (this.isRecording) {
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
                
                try {
                    this.isLoading = true;
                    this.hasResult = false;
                    
                    // Récupérer le token depuis Laravel
                    const tokenResponse = await fetch('/api/pronunciation/token');
                    if (!tokenResponse.ok) throw new Error("Erreur token Azure");
                    const tokenData = await tokenResponse.json();

                    const speechConfig = SpeechSDK.SpeechConfig.fromAuthorizationToken(tokenData.token, tokenData.region);
                    speechConfig.speechRecognitionLanguage = "de-DE";

                    const audioConfig = SpeechSDK.AudioConfig.fromDefaultMicrophoneInput();
                    this.recognizer = new SpeechSDK.SpeechRecognizer(speechConfig, audioConfig);

                    const pronAssessmentConfig = new SpeechSDK.PronunciationAssessmentConfig(
                        targetPhrase,
                        SpeechSDK.PronunciationAssessmentGradingSystem.HundredMark,
                        SpeechSDK.PronunciationAssessmentGranularity.Phoneme,
                        true
                    );
                    pronAssessmentConfig.applyTo(this.recognizer);

                    this.isRecording = true;
                    this.isLoading = false;

                    this.recognizer.recognizeOnceAsync(
                        async (result) => {
                            this.isRecording = false;
                            this.isLoading = true;
                            
                            if (result.reason === SpeechSDK.ResultReason.RecognizedSpeech) {
                                const pronResult = SpeechSDK.PronunciationAssessmentResult.fromResult(result);
                                const score = pronResult.pronunciationScore;
                                
                                // Appel Livewire (backend Laravel)
                                try {
                                    // Utilisation de $wire fourni par Livewire
                                    const data = await this.$wire.generateCoachingFeedback(targetPhrase, score);
                                    
                                    this.scorePercent = data.scorePercent;
                                    this.themeColorClass = data.themeColorClass;
                                    this.teacherInitials = data.teacherInitials;
                                    this.teacherName = data.teacherName;
                                    this.feedbackText = data.feedbackText;
                                    this.goodChips = data.goodChips;
                                    this.warnChips = data.warnChips;
                                    this.hasResult = true;
                                } catch (error) {
                                    console.error("Erreur Livewire:", error);
                                    alert("Erreur lors de la génération du feedback de coaching.");
                                }
                            } else {
                                console.error("Reconnaissance non réussie :", result.reason);
                                alert("Nous n'avons pas pu reconnaître votre prononciation. Veuillez réessayer.");
                            }
                            
                            this.isLoading = false;
                            if (this.recognizer) {
                                this.recognizer.close();
                                this.recognizer = null;
                            }
                        },
                        (err) => {
                            console.error("Erreur de reconnaissance :", err);
                            this.isRecording = false;
                            this.isLoading = false;
                            if (this.recognizer) {
                                this.recognizer.close();
                                this.recognizer = null;
                            }
                        }
                    );
                } catch (err) {
                    console.error("Erreur d'accès", err);
                    alert("Erreur de configuration du microphone ou d'Azure.");
                    this.isLoading = false;
                    this.isRecording = false;
                }
            },

            stopRecording() {
                if (this.recognizer && this.isRecording) {
                    this.isRecording = false;
                    this.isLoading = true; // On affiche les 3 petits points
                    
                    // On demande l'arrêt au SDK Azure, il déclenchera le callback recognized peu après
                    try {
                        this.recognizer.stopContinuousRecognitionAsync();
                    } catch(e) {
                        // ignore if it doesn't support manual stop
                    }
                }
            },

            resetTest() {
                this.hasResult = false;
                this.scorePercent = 0;
            }
        }));

        window.grammarComponentsLoaded = true;
        }
    }

    // Si on arrive sur la page normalement (1er chargement)
    document.addEventListener('alpine:init', initGrammarComponents);
    
    // Si Alpine est DÉJÀ chargé (Livewire / wire:navigate / composant dynamique)
    if (window.Alpine) {
        initGrammarComponents();
    }
</script>
