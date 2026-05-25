<div>
    <style>
        .learn-space-container {
            animation: fadeUp 0.4s ease both;
            max-width: 100%;
            margin: 0 auto;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: var(--charcoal-light, #64748b);
            cursor: pointer;
            background: none;
            border: none;
            margin-bottom: 32px;
            padding: 0;
            transition: color 0.15s;
            text-decoration: none;
        }

        .back-btn:hover {
            color: var(--ink, #0f172a);
        }

        .learn-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 24px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .learn-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            color: var(--accent, #3b82f6);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .learn-title {
            font-size: 24px;
            font-weight: 800;
            color: var(--ink, #0f172a);
            margin: 0;
            letter-spacing: -0.02em;
        }

        .learn-desc {
            color: var(--charcoal-light, #64748b);
            margin-top: 8px;
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            max-width: 400px;
        }

        /* Chiffres Grid */
        .grid-chiffres {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 12px;
            margin-bottom: 32px;
        }

        .card-chiffres {
            padding: 16px;
            background: white;
            border-radius: 16px;
            border: 1px solid var(--glass-border, #e2e8f0);
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
            width: 100%;
        }

        .card-chiffres:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border-color: var(--accent, #3b82f6);
        }

        .card-chiffres.is-playing {
            border-color: var(--accent, #3b82f6);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        .chiffre-num {
            font-size: 26px;
            font-weight: 800;
            color: var(--ink, #0f172a);
            margin-bottom: 4px;
        }

        .chiffre-de {
            font-family: 'DM Mono', monospace;
            font-size: 13px;
            color: var(--charcoal-mid, #475569);
            font-weight: 600;
        }

        /* Couleurs Grid */
        .grid-couleurs {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 14px;
        }

        .card-couleurs {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid var(--glass-border, #e2e8f0);
            background: white;
            cursor: pointer;
            transition: all 0.2s;
            padding: 0;
            width: 100%;
            text-align: left;
        }

        .card-couleurs:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .card-couleurs.is-playing {
            box-shadow: 0 0 0 2px var(--accent, #3b82f6);
        }

        .couleur-preview {
            height: 70px;
            width: 100%;
        }

        .couleur-body {
            padding: 12px 16px;
        }

        .couleur-de {
            font-size: 14px;
            font-weight: 700;
            color: var(--ink, #0f172a);
            margin-bottom: 2px;
        }

        .couleur-fr {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--charcoal-light, #64748b);
        }

        /* Standard/Salutations/Alphabet Grid */
        .grid-standard {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 14px;
        }

        .card-standard {
            padding: 18px 20px;
            background: white;
            border-radius: 18px;
            border: 1px solid var(--glass-border, #e2e8f0);
            cursor: pointer;
            text-align: left;
            transition: all 0.2s;
            display: block;
            width: 100%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }

        .card-standard:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border-color: var(--accent, #3b82f6);
        }

        .card-standard.is-playing {
            border-color: var(--accent, #3b82f6);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        .card-standard-header {
            display: flex;
            align-items: baseline;
            gap: 10px;
            margin-bottom: 8px;
        }

        .card-standard-de {
            font-size: 18px;
            font-weight: 800;
            color: var(--ink, #0f172a);
        }

        .card-standard-icon {
            margin-left: auto;
            opacity: 0.4;
            transition: opacity 0.2s;
        }

        .card-standard.is-playing .card-standard-icon {
            opacity: 1;
            color: var(--accent, #3b82f6);
        }

        .card-standard-example {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: var(--charcoal-mid, #475569);
            margin-bottom: 2px;
        }

        .card-standard-fr {
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            color: var(--charcoal-light, #64748b);
        }
    </style>

    <div class="learn-space-container">
        <!-- Back Button -->
        <a href="{{ route('lab.cours.chapitres', ['slug' => $parcoursSlug]) }}" class="back-btn" wire:navigate>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                <path d="M10 3L5 8l5 5"/>
            </svg> 
            Retour
        </a>

        <!-- Header -->
        <div class="learn-header">
            <div>
                <div class="learn-eyebrow">{{ $chapitreData['sur_titre'] }}</div>
                <h2 class="learn-title">{{ $chapitreData['titre'] }}</h2>
                <p class="learn-desc">{{ $chapitreData['description'] }}</p>
            </div>
        </div>

        <!-- Dynamic Grid Content based on templateType -->
        @if ($templateType === 'chiffres')
            <div class="grid-chiffres">
                @foreach ($items as $index => $item)
                    <button 
                        class="card-chiffres"
                        x-data="{ playing: false }"
                        @click="
                            playing = true; 
                            $wire.markAsHeard({{ $index }});
                            // Temporaire: simulation audio ou appel à une vraie API text-to-speech
                            setTimeout(() => playing = false, 1000);
                        "
                        :class="{ 'is-playing': playing }"
                    >
                        <div class="chiffre-num">{{ $item['num'] }}</div>
                        <div class="chiffre-de">{{ $item['de'] }}</div>
                    </button>
                @endforeach
            </div>
        @elseif ($templateType === 'couleurs')
            <div class="grid-couleurs">
                @foreach ($items as $index => $item)
                    <button 
                        class="card-couleurs"
                        x-data="{ playing: false }"
                        @click="
                            playing = true; 
                            $wire.markAsHeard({{ $index }});
                            setTimeout(() => playing = false, 1000);
                        "
                        :class="{ 'is-playing': playing }"
                    >
                        <div class="couleur-preview" style="background: {{ $item['hex'] }}; border-bottom: {{ in_array($item['hex'], ['#ECF0F1', '#F5F0E8']) ? '1px solid var(--glass-border, #e2e8f0)' : 'none' }}"></div>
                        <div class="couleur-body">
                            <div class="couleur-de">{{ $item['de'] }}</div>
                            <div class="couleur-fr">{{ $item['fr'] }}</div>
                        </div>
                    </button>
                @endforeach
            </div>
        @else
            <!-- Alphabet, Salutations and Standard -->
            <div class="grid-standard">
                @foreach ($items as $index => $item)
                    <button 
                        class="card-standard"
                        x-data="{ playing: false }"
                        @click="
                            playing = true; 
                            $wire.markAsHeard({{ $index }});
                            setTimeout(() => playing = false, 1000);
                        "
                        :class="{ 'is-playing': playing }"
                    >
                        <div class="card-standard-header">
                            <span class="card-standard-de" style="{{ $templateType === 'alphabet' ? 'font-size: 22px;' : '' }}">
                                {{ $item['de'] }}
                            </span>
                            <svg class="card-standard-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 5L6 9H2v6h4l5 4V5z"/>
                                <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/>
                            </svg>
                        </div>
                        @if (isset($item['example']))
                            <div class="card-standard-example">{{ $item['example'] }}</div>
                        @endif
                        @if (isset($item['fr']))
                            <div class="card-standard-fr" style="{{ $templateType === 'salutations' ? 'font-size: 12px;' : '' }}">
                                {{ $item['fr'] }}
                            </div>
                        @endif
                    </button>
                @endforeach
            </div>
        @endif
    </div>
</div>
