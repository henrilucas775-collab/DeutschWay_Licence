<div>
    <div class="flex items-center justify-between border-b border-zinc-200 pb-4 dark:border-zinc-700">
        <div class="flex items-center gap-3">
            <flux:icon name="question-mark-circle" class="size-6 text-violet-600 dark:text-violet-400" />
            <div>
                <flux:heading size="lg">{{ __('Quiz') }}</flux:heading>
                <flux:text class="text-sm">{{ __('Choisissez la bonne traduction allemande') }}</flux:text>
            </div>
        </div>
        <flux:badge color="zinc">{{ $question['chapitre'] ?? '' }}</flux:badge>
    </div>

    <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
        <flux:text class="text-sm text-zinc-500">
            {{ __('Score') }} : <span class="font-semibold text-zinc-900 dark:text-white">{{ $score }} / {{ $totalAnswered }}</span>
        </flux:text>
        <flux:button variant="ghost" size="sm" icon="arrow-path" wire:click="resetScore">
            {{ __('Réinitialiser') }}
        </flux:button>
    </div>

    <div class="mt-6 rounded-2xl border border-zinc-200 bg-zinc-50 p-8 dark:border-zinc-700 dark:bg-zinc-900/50">
        <flux:text class="text-sm uppercase tracking-wide text-zinc-500">{{ __('Question') }}</flux:text>
        <p class="mt-3 text-2xl font-semibold text-zinc-900 dark:text-white">
            {{ __('Quelle est la traduction allemande de :') }}
            <span class="text-violet-600 dark:text-violet-400">« {{ $question['hint'] }} »</span>
        </p>

        <div class="mt-8 grid gap-3 sm:grid-cols-2">
            @foreach ($question['options'] as $option)
                @php
                    $phrase = $option['phrase'];
                    $isSelected = $selectedPhrase === $phrase;
                    $isCorrect = $phrase === $question['correctPhrase'];
                    $showResult = $answered;
                @endphp
                <button
                    type="button"
                    wire:click="selectAnswer(@js($phrase))"
                    @disabled($answered)
                    @class([
                        'rounded-xl border px-4 py-4 text-left text-sm font-medium transition',
                        'cursor-not-allowed' => $answered,
                        'border-green-500 bg-green-50 text-green-900 dark:border-green-400 dark:bg-green-900/30 dark:text-green-100' => $showResult && $isCorrect,
                        'border-red-500 bg-red-50 text-red-900 dark:border-red-400 dark:bg-red-900/30 dark:text-red-100' => $showResult && $isSelected && ! $isCorrect,
                        'border-zinc-300 bg-zinc-100 text-zinc-500 dark:border-zinc-600 dark:bg-zinc-800/60 dark:text-zinc-400' => $showResult && ! $isSelected && ! $isCorrect,
                        'border-zinc-200 bg-white text-zinc-900 hover:border-violet-300 hover:bg-violet-50/50 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:hover:border-violet-600 dark:hover:bg-violet-950/20' => ! $showResult,
                    ])
                >
                    {{ $phrase }}
                </button>
            @endforeach
        </div>

        @if ($answered)
            <div class="mt-8 flex flex-col items-center gap-4 sm:flex-row sm:justify-between">
                <div>
                    @if ($selectedPhrase === $question['correctPhrase'])
                        <div class="flex items-center gap-2 text-green-700 dark:text-green-400">
                            <flux:icon name="check-circle" class="size-5" />
                            <flux:heading size="sm">{{ __('Bonne réponse !') }}</flux:heading>
                        </div>
                    @else
                        <div class="flex items-center gap-2 text-amber-700 dark:text-amber-400">
                            <flux:icon name="x-circle" class="size-5" />
                            <flux:heading size="sm">{{ __('Mauvaise réponse') }}</flux:heading>
                        </div>
                        <flux:text class="mt-1 text-sm text-zinc-500">
                            {{ __('Réponse correcte') }} : <span class="font-medium text-zinc-900 dark:text-white">{{ $question['correctPhrase'] }}</span>
                        </flux:text>
                    @endif
                </div>

                <flux:button variant="primary" icon-trailing="chevron-right" wire:click="nextQuestion">
                    {{ __('Question suivante') }}
                </flux:button>
            </div>
        @endif
    </div>
</div>
