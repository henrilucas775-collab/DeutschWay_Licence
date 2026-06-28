@php
    $current = $phrases[$phraseIndex];
@endphp

<div
    x-data="dictationExercise({
        phrase: @js($current['phrase']),
        tokenUrl: @js(route('azure-speech.token')),
    })"
    x-on:phrase-changed.window="onPhraseChanged($event.detail.phrase)"
>
    <div class="flex items-center justify-between border-b border-zinc-200 pb-4 dark:border-zinc-700">
        <div class="flex items-center gap-3">
            <flux:icon name="pencil-square" class="size-6 text-emerald-600 dark:text-emerald-400" />
            <div>
                <flux:heading size="lg">{{ __('Dictée') }}</flux:heading>
                <flux:text class="text-sm">{{ __('Écoutez la phrase et écrivez ce que vous entendez') }}</flux:text>
            </div>
        </div>
        <flux:badge color="zinc">{{ $current['chapitre'] }}</flux:badge>
    </div>

    <div wire:ignore class="mt-6 rounded-2xl border border-zinc-200 bg-zinc-50 p-8 dark:border-zinc-700 dark:bg-zinc-900/50">
        <flux:text class="text-sm uppercase tracking-wide text-zinc-500">{{ __('Phrase dictée') }}</flux:text>
        <flux:text class="mt-2 text-zinc-500">{{ __('La phrase n\'est pas affichée — écoutez-la puis saisissez votre réponse.') }}</flux:text>

        <template x-if="!ready && !error">
            <div class="mt-4 flex items-center gap-2 text-sm text-zinc-500">
                <flux:icon name="arrow-path" class="size-4 animate-spin" />
                {{ __('Connexion à Azure Speech...') }}
            </div>
        </template>

        <div x-show="error" x-cloak class="mt-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300" x-text="error"></div>

        <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
            <flux:button
                variant="primary"
                icon="speaker-wave"
                x-on:click="playDictation()"
                x-bind:disabled="!ready || isPlaying"
            >
                <span x-text="isPlaying ? '{{ __('Lecture...') }}' : '{{ __('Écouter la dictée') }}'"></span>
            </flux:button>
        </div>

        <div class="mx-auto mt-8 max-w-xl space-y-4">
            <flux:field>
                <flux:label>{{ __('Votre réponse') }}</flux:label>
                <flux:input
                    type="text"
                    x-model="dictationAnswer"
                    x-on:keydown.enter.prevent="submitDictation()"
                    x-bind:disabled="dictationLoading || !ready"
                    placeholder="{{ __('Tapez la phrase en allemand...') }}"
                    autocomplete="off"
                    autocorrect="off"
                    spellcheck="false"
                />
            </flux:field>

            <div class="flex justify-end">
                <flux:button
                    variant="primary"
                    icon="check"
                    x-on:click="submitDictation()"
                    x-bind:disabled="!dictationAnswer?.trim() || dictationLoading || !ready"
                >
                    <span x-text="dictationLoading ? '{{ __('Vérification...') }}' : '{{ __('Vérifier') }}'"></span>
                </flux:button>
            </div>
        </div>

        <div x-show="dictationResult" x-cloak class="mx-auto mt-6 max-w-xl">
            <div
                class="rounded-xl border p-4"
                x-bind:class="dictationResult?.isCorrect
                    ? 'border-green-200 bg-green-50 dark:border-green-800 dark:bg-green-900/20'
                    : 'border-amber-200 bg-amber-50 dark:border-amber-800 dark:bg-amber-900/20'"
            >
                <div class="flex items-center gap-2">
                    <flux:icon name="check-circle" class="size-5 text-green-600 dark:text-green-400" x-show="dictationResult?.isCorrect" />
                    <flux:icon name="x-circle" class="size-5 text-amber-600 dark:text-amber-400" x-show="dictationResult && !dictationResult.isCorrect" />
                    <flux:heading size="sm" x-text="dictationResult?.isCorrect ? '{{ __('Bravo !') }}' : '{{ __('Pas tout à fait...') }}'"></flux:heading>
                </div>

                <flux:text class="mt-2 text-sm" x-show="!dictationResult?.isCorrect">
                    {{ __('Similarité') }} : <span x-text="dictationResult ? Math.round(dictationResult.similarity) + '%' : ''"></span>
                </flux:text>

                <div x-show="!dictationResult?.isCorrect" class="mt-3">
                    <flux:text class="text-xs uppercase text-zinc-500">{{ __('Réponse attendue') }}</flux:text>
                    <p class="mt-1 font-medium text-zinc-900 dark:text-white" x-text="dictationResult?.expected"></p>
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
</div>
