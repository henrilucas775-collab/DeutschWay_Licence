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
                <div class="mb-4" x-data="{ show: false }">
                    <label class="block text-xs font-mono text-foreground mb-2">MOT DE PASSE</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="••••••••" class="w-full pr-10" required>
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

                <div class="mb-6" x-data="{ show: false }">
                    <label class="block text-xs font-mono text-foreground mb-2">CONFIRMER LE MOT DE PASSE</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" placeholder="••••••••" class="w-full pr-10" required>
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-primary transition-colors focus:outline-none">
                            <template x-if="!show">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0z"/><circle cx="12" cy="12" r="3"/></svg>
                            </template>
                            <template x-if="show">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" y1="2" x2="22" y2="22"/></svg>
                            </template>
                        </button>
                    </div>
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
