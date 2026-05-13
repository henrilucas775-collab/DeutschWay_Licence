<x-layouts.cyber 
    title="Mot de passe oublié | DeutschWay"
    description="Réinitialisez votre mot de passe DeutschWay."
>
    <!-- PAGE OUBLI -->
    <section class="animate-fade starfield-bg" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding:6rem 1rem;">
        <div class="card glass neon-box w-full" style="max-width: 400px; padding: 3rem 2rem; border-radius: 2rem; position: relative;">
            <a href="{{ route('login') }}" class="close-modal" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">×</a>
            
            <h1 class="text-center text-primary neon-glow font-mono mb-2" style="font-size: 1.8rem;">Récupération</h1>
            <p class="text-center text-muted font-mono mb-8" style="font-size: 0.8rem;">Saisis ton email pour recevoir un lien</p>

            @if (session('status'))
                <div class="mb-4 font-mono text-xs text-secondary text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-6">
                    <label class="block text-xs font-mono text-foreground mb-2">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="ton@email.com" class="w-full" required autofocus>
                    @error('email')
                        <span class="text-primary text-xs font-mono mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full neon-box" style="padding: 1rem;">
                    Envoyer le lien
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                </button>
            </form>

            <p class="text-center mt-8 text-muted font-mono" style="font-size: 0.85rem;">
                Retour à la <a href="{{ route('login') }}" class="text-primary font-bold transition-colors" style="text-decoration: none;">Connexion</a>
            </p>
        </div>
    </section>
</x-layouts.cyber>
