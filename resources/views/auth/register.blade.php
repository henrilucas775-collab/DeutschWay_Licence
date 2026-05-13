<x-layouts.cyber 
    title="Inscription | DeutschWay"
    description="Rejoignez la communauté DeutschWay et commencez votre apprentissage."
>
    <!-- PAGE INSCRIPTION -->
    <section class="animate-fade starfield-bg" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding:6rem 1rem;">
        <div class="card glass neon-box w-full" style="max-width: 450px; padding: 3rem 2rem; border-radius: 2rem; position: relative;">
            <a href="{{ route('home') }}" class="close-modal" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">×</a>
            
            <h1 class="text-center text-primary neon-glow font-mono mb-2" style="font-size: 2rem;">Inscription</h1>
            <p class="text-center text-muted font-mono mb-8" style="font-size: 0.8rem;">Rejoins la révolution DeutschWay</p>

            <form method="POST" action="{{ route('register') }}" id="signup-form">
                @csrf
                <div class="mb-4">
                    <label class="block text-xs font-mono text-foreground mb-2">NOM D'UTILISATEUR</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="CyberLearner_2026" class="w-full" required autofocus>
                    @error('name')
                        <span class="text-primary text-xs font-mono mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-mono text-foreground mb-2">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="ton@email.com" class="w-full" required>
                    @error('email')
                        <span class="text-primary text-xs font-mono mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-mono text-foreground mb-2">MOT DE PASSE</label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full" required>
                    @error('password')
                        <span class="text-primary text-xs font-mono mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-xs font-mono text-foreground mb-2">CONFIRMER LE MOT DE PASSE</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-full neon-box" style="padding: 1rem;">
                    Créer mon compte
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </button>
            </form>

            <p class="text-center mt-8 text-muted font-mono" style="font-size: 0.85rem;">
                Déjà membre ? <a href="{{ route('login') }}" class="text-primary font-bold transition-colors" style="text-decoration: none;">Se connecter</a>
            </p>
        </div>
    </section>
</x-layouts.cyber>
