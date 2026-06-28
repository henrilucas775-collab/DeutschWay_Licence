<div>
    <flux:heading size="xl">{{ __('Laboratoire d\'allemand') }}</flux:heading>
    <flux:subheading class="mt-1">
        {{ __('Espace d\'expérimentation pour pratiquer l\'allemand avec des outils interactifs.') }}
    </flux:subheading>

    <div class="mt-8 grid gap-4 md:grid-cols-2">


        <a
            href="{{ route('lab.dictation') }}"
            wire:navigate
            class="group rounded-xl border border-zinc-200 p-6 transition hover:border-emerald-300 hover:bg-emerald-50/50 dark:border-zinc-700 dark:hover:border-emerald-700 dark:hover:bg-emerald-950/20"
        >
            <div class="flex items-start gap-4">
                <div class="rounded-lg bg-emerald-100 p-3 text-emerald-600 dark:bg-emerald-900/40 dark:text-emerald-400">
                    <flux:icon name="pencil-square" class="size-6" />
                </div>
                <div>
                    <flux:heading size="lg" class="group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                        {{ __('Dictée') }}
                    </flux:heading>
                    <flux:text class="mt-1">
                        {{ __('Écoutez une phrase en allemand et écrivez ce que vous entendez.') }}
                    </flux:text>
                </div>
            </div>
        </a>

        <a
            href="{{ route('lab.quiz') }}"
            wire:navigate
            class="group rounded-xl border border-zinc-200 p-6 transition hover:border-violet-300 hover:bg-violet-50/50 dark:border-zinc-700 dark:hover:border-violet-700 dark:hover:bg-violet-950/20"
        >
            <div class="flex items-start gap-4">
                <div class="rounded-lg bg-violet-100 p-3 text-violet-600 dark:bg-violet-900/40 dark:text-violet-400">
                    <flux:icon name="question-mark-circle" class="size-6" />
                </div>
                <div>
                    <flux:heading size="lg" class="group-hover:text-violet-600 dark:group-hover:text-violet-400">
                        {{ __('Quiz') }}
                    </flux:heading>
                    <flux:text class="mt-1">
                        {{ __('Testez vos connaissances avec des questions à choix multiples.') }}
                    </flux:text>
                </div>
            </div>
        </a>

        <a
            href="{{ route('lab.pronunciation') }}"
            wire:navigate
            class="group rounded-xl border border-zinc-200 p-6 transition hover:border-blue-300 hover:bg-blue-50/50 dark:border-zinc-700 dark:hover:border-blue-700 dark:hover:bg-blue-950/20"
        >
            <div class="flex items-start gap-4">
                <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400">
                    <flux:icon name="microphone" class="size-6" />
                </div>
                <div>
                    <flux:heading size="lg" class="group-hover:text-blue-600 dark:group-hover:text-blue-400">
                        {{ __('Test de prononciation') }}
                    </flux:heading>
                    <flux:text class="mt-1">
                        {{ __('Enregistrez votre voix et recevez un retour instantané grâce à Azure Speech.') }}
                    </flux:text>
                </div>
            </div>
        </a>

    </div>
</div>
