@php
    $current = $phrases[$phraseIndex];
@endphp

<div
    x-data="pronunciationExercise({
        phrase: @js($current['phrase']),
        tokenUrl: @js(route('azure-speech.token')),
    })"
    x-on:phrase-changed.window="onPhraseChanged($event.detail.phrase)"
>
    <div class="flex items-center justify-between border-b border-zinc-200 pb-4 dark:border-zinc-700">
        <div class="flex items-center gap-3">
            <flux:icon name="microphone" class="size-6 text-blue-600 dark:text-blue-400" />
            <div>
                <flux:heading size="lg">{{ __('Test de prononciation') }}</flux:heading>
                <flux:text class="text-sm">{{ __('Évaluez votre accent allemand avec Azure Speech') }}</flux:text>
            </div>
        </div>
        <flux:badge color="zinc">{{ $current['chapitre'] }}</flux:badge>
    </div>

    <div class="mt-6 rounded-2xl border border-zinc-200 bg-zinc-50 p-8 text-center dark:border-zinc-700 dark:bg-zinc-900/50">
        <flux:text class="text-sm uppercase tracking-wide text-zinc-500">{{ __('Phrase à prononcer') }}</flux:text>
        <p class="mt-3 text-3xl font-semibold text-zinc-900 dark:text-white">{{ $current['phrase'] }}</p>
        <flux:text class="mt-2 text-zinc-500">{{ $current['hint'] }}</flux:text>

        <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
            <flux:button
                variant="ghost"
                icon="speaker-wave"
                x-on:click="playReference()"
                x-bind:disabled="!ready || isPlaying || isRecording"
            >
                {{ __('Écouter') }}
            </flux:button>
            <flux:button
                variant="primary"
                icon="microphone"
                x-on:click="toggleRecording()"
                x-bind:disabled="!ready || isPlaying"
                x-bind:class="isRecording && 'ring-2 ring-red-500 ring-offset-2'"
            >
                <span x-text="isRecording ? '{{ __('Enregistrement...') }}' : '{{ __('Enregistrer') }}'"></span>
            </flux:button>
        </div>
    </div>

    <div wire:ignore>

        <template x-if="!ready && !error">
            <div class="mt-4 flex items-center gap-2 text-sm text-zinc-500">
                <flux:icon name="arrow-path" class="size-4 animate-spin" />
                {{ __('Connexion à Azure Speech...') }}
            </div>
        </template>

        <div x-show="scores" x-cloak class="mt-6 space-y-4">
            <flux:heading size="lg">{{ __('Résultats') }}</flux:heading>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
                    <flux:text class="text-xs uppercase text-zinc-500">{{ __('Prononciation') }}</flux:text>
                    <p class="mt-1 text-2xl font-bold" x-text="scores ? Math.round(scores.pronunciation) + '%' : ''"></p>
                </div>
                <div class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
                    <flux:text class="text-xs uppercase text-zinc-500">{{ __('Précision') }}</flux:text>
                    <p class="mt-1 text-2xl font-bold" x-text="scores ? Math.round(scores.accuracy) + '%' : ''"></p>
                </div>
                <div class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
                    <flux:text class="text-xs uppercase text-zinc-500">{{ __('Fluidité') }}</flux:text>
                    <p class="mt-1 text-2xl font-bold" x-text="scores ? Math.round(scores.fluency) + '%' : ''"></p>
                </div>
                <div class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
                    <flux:text class="text-xs uppercase text-zinc-500">{{ __('Complétude') }}</flux:text>
                    <p class="mt-1 text-2xl font-bold" x-text="scores ? Math.round(scores.completeness) + '%' : ''"></p>
                </div>
            </div>

            <div x-show="recognizedText" class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
                <flux:text class="text-xs uppercase text-zinc-500">{{ __('Ce que Azure a entendu') }}</flux:text>
                <p class="mt-1 text-zinc-900 dark:text-white" x-text="recognizedText"></p>
            </div>

            <div x-show="wordDetails.length" class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-700">
                <flux:text class="text-xs uppercase text-zinc-500">{{ __('Détail par mot') }}</flux:text>
                <div class="mt-3 flex flex-wrap gap-2">
                    <template x-for="word in wordDetails" :key="word.word">
                        <span
                            class="rounded-full px-3 py-1 text-sm font-medium"
                            x-bind:class="word.accuracy >= 80
                                ? 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300'
                                : word.accuracy >= 60
                                    ? 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300'
                                    : 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300'"
                            x-text="word.word + ' (' + Math.round(word.accuracy) + '%)'"
                        ></span>
                    </template>
                </div>
            </div>

            <div class="rounded-2xl border border-zinc-200 bg-white p-5 dark:border-zinc-700 dark:bg-zinc-900/40">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 rounded-lg bg-purple-100 p-2 text-purple-700 dark:bg-purple-900/40 dark:text-purple-300">
                            <flux:icon name="sparkles" class="size-5" />
                        </div>
                        <div class="min-w-0">
                            <flux:heading size="lg">{{ __('Coach IA (Gemini)') }}</flux:heading>
                            <flux:text class="mt-1 text-sm text-zinc-500">
                                {{ __('Conseils personnalisés + voix du coach via Azure Speech.') }}
                            </flux:text>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <flux:button
                            size="sm"
                            variant="ghost"
                            icon="speaker-wave"
                            x-on:click="speakCoachFeedback()"
                            x-bind:disabled="!coachFeedback || isCoachSpeaking || coachLoading"
                        >
                            {{ __('Écouter le coach') }}
                        </flux:button>
                        <flux:button
                            size="sm"
                            variant="ghost"
                            icon="arrow-path"
                            x-on:click="requestCoachFeedback(false)"
                            x-bind:disabled="coachLoading || !scores"
                        >
                            {{ __('Régénérer') }}
                        </flux:button>
                    </div>
                </div>

                <div x-show="coachLoading" class="mt-4 flex items-center gap-2 text-sm text-zinc-500">
                    <flux:icon name="arrow-path" class="size-4 animate-spin" />
                    {{ __('Le coach analyse ton enregistrement...') }}
                </div>

                <div x-show="coachFeedback && !coachLoading" class="mt-4 whitespace-pre-wrap text-sm leading-relaxed text-zinc-900 dark:text-white" x-text="coachFeedback"></div>

                <div x-show="!coachFeedback && !coachLoading" class="mt-4 text-sm text-zinc-500">
                    {{ __('Le feedback apparaîtra ici après ton enregistrement.') }}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 flex items-center justify-between border-t border-zinc-200 pt-4 dark:border-zinc-700">
        <flux:button variant="ghost" icon="chevron-left" wire:click="previousPhrase">
            {{ __('Phrase précédente') }}
        </flux:button>
        <flux:text class="text-sm text-zinc-500">
            {{ $phraseIndex + 1 }} / {{ count($phrases) }}
        </flux:text>
        <flux:button variant="ghost" icon-trailing="chevron-right" wire:click="nextPhrase">
            {{ __('Phrase suivante') }}
        </flux:button>
    </div>

    {{-- Bulle coach flottante --}}
    <div
        wire:ignore
        x-show="coachBubbleVisible"
        x-cloak
        class="coach-bubble-container"
        x-bind:class="{ 'coach-bubble-speaking': isCoachSpeaking, 'coach-bubble-loading': coachLoading, 'coach-bubble-dragging': isDraggingBubble }"
        x-bind:style="`left: ${bubbleX}px; top: ${bubbleY}px;`"
        x-on:click="onBubbleClick()"
        x-on:mousedown="onBubbleMouseDown($event)"
        x-on:mousemove.window="onBubbleDrag($event)"
        x-on:mouseup.window="endBubbleDrag()"
        role="button"
        x-bind:aria-label="isCoachSpeaking ? '{{ __('Arrêter le coach') }}' : '{{ __('Écouter le coach') }}'"
    >
        <canvas x-ref="coachCanvas" class="coach-bubble-canvas" aria-hidden="true"></canvas>
        <x-coach-robot-icon />
    </div>
</div>
