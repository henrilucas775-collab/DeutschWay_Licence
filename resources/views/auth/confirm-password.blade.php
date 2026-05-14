<x-layouts.cyber
    title="Confirmer le mot de passe | DeutschWay"
    description="Confirmez votre mot de passe pour continuer une action sensible."
>
    <section class="animate-fade starfield-bg" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 6rem 1rem;">
        <div class="card glass neon-box w-full" style="max-width: 420px; padding: 3rem 2rem; border-radius: 2rem; position: relative;">
            <a href="{{ route('dashboard') }}" class="close-modal" style="text-decoration: none; display: flex; align-items: center; justify-content: center;">×</a>

            <h1 class="text-center text-primary neon-glow font-mono mb-2" style="font-size: 1.75rem;">Confirmation</h1>
            <p class="text-center text-muted font-mono mb-8" style="font-size: 0.8rem;">
                Pour des raisons de sécurité, veuillez entrer votre mot de passe pour continuer.
            </p>

            <form method="POST" action="{{ route('password.confirm.store') }}">
                @csrf
                <div class="mb-6" x-data="{ show: false }">
                    <label class="block text-xs font-mono text-foreground mb-2">MOT DE PASSE</label>
                    <div class="relative">
                        <input
                            :type="show ? 'text' : 'password'"
                            name="password"
                            placeholder="••••••••"
                            class="w-full pr-10"
                            required
                            autofocus
                            autocomplete="current-password"
                        >
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-primary transition-colors focus:outline-none">
                            <template x-if="!show">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0z"/><circle cx="12" cy="12" r="3"/></svg>
                            </template>
                            <template x-if="show">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" y1="2" x2="22" y2="22"/></svg>
                            </template>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-primary text-xs font-mono mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full neon-box" style="padding: 1rem;">
                    Confirmer
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </button>
            </form>
        </div>
    </section>
</x-layouts.cyber>
