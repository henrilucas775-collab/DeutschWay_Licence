<x-layouts.cyber 
    title="Parcours Immersion | DeutschWay"
    description="Vivez l'expérience allemande réelle et atteignez la fluidité B2-C1."
>
    <!-- PAGE IMMERSION -->
    <section class="animate-fade starfield-bg" style="min-height:100vh; padding:6rem 1rem 4rem;">
        <div class="container">
            <!-- Hero -->
            <div class="hero-grid mb-16">
                <div>
                    <p class="text-secondary font-mono uppercase tracking-widest mb-4" style="font-size:.75rem;">DEUTSCHWAY</p>
                    <h1 class="font-mono leading-tight mb-6" style="font-size:clamp(2.5rem,6vw,4rem);">
                        <span class="block">Parcours</span>
                        <span class="block neon-glow">IMMERSION</span>
                    </h1>
                    <p class="text-muted font-mono leading-relaxed mb-8" style="font-size:1.05rem; max-width:480px;">
                        Objectif : être à l'aise en Allemagne dès votre arrivée. Codes culturels, vie professionnelle et
                        rouages de la société allemande.
                    </p>
                </div>
                <div class="hidden-mobile flex justify-center" style="padding-left:19rem">
                    <div class="immersion-parent">
                        <div class="immersion-card-3d">
                            <div class="logo-3d">
                                <span class="circle circle1"></span><span class="circle circle2"></span><span class="circle circle3"></span><span class="circle circle4"></span>
                                <span class="circle circle5">
                                    <svg viewBox="0 0 24 24" class="svg"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                </span>
                            </div>
                            <div class="glass"></div>
                            <div class="content">
                                <span class="title">Mod. 1: Vie quotidienne</span>
                                <span class="text">S'installer et naviguer dans la vie de tous les jours en Allemagne.</span>
                            </div>
                            <div class="bottom">
                                <div class="icon-container">
                                    <div class="topic-icon"><svg viewBox="0 0 24 24" class="svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                                    <div class="topic-icon"><svg viewBox="0 0 24 24" class="svg" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg></div>
                                    <div class="topic-icon"><svg viewBox="0 0 24 24" class="svg" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline modules -->
            <h2 class="text-center mb-12 uppercase tracking-widest">MODULES PRATIQUES</h2>
            <div class="timeline-container" style="overflow-x:auto; padding-bottom:2rem; -webkit-overflow-scrolling: touch;">
                <div class="flex items-end" style="gap:2rem; position:relative; min-width:1500px; padding: 2rem;">
                    <div style="position:absolute;bottom:22px;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(221,0,0,.3),rgba(221,0,0,.5),rgba(221,0,0,.3),transparent);z-index:0;"></div>

                    @foreach([['title' => 'Mod. 1: <br>Vie quotidienne', 'icon' => 'home'], ['title' => 'Mod. 2:<br>Monde Pro', 'icon' => 'briefcase'], ['title' => 'Mod. 3: <br> Culture Moderne', 'icon' => 'globe'], ['title' => 'Mod. 4: <br>Sit. Critiques', 'icon' => 'shield'], ['title' => 'Mod. 5: <br> Intégration Sociale', 'icon' => 'users']] as $index => $mod)
                        <div class="flex flex-col items-center" style="flex:1;position:relative;z-index:1;">
                            <div class="immersion-parent">
                                <div class="immersion-card-3d {{ $index % 2 != 0 ? 'secondary' : '' }}">
                                    <div class="logo-3d">
                                        <span class="circle circle1"></span><span class="circle circle2"></span><span class="circle circle3"></span><span class="circle circle4"></span>
                                        <span class="circle circle5">
                                            <svg viewBox="0 0 24 24" class="svg"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                        </span>
                                    </div>
                                    <div class="glass"></div>
                                    <div class="content">
                                        <span class="title">{!! $mod['title'] !!}</span>
                                        <span class="text">Description du module {{ $index + 1 }}.</span>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon-container">
                                            <div class="topic-icon"><svg viewBox="0 0 24 24" class="svg" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg></div>
                                        </div>
                                        <div class="view-more">
                                            <button class="view-more-button">Détails</button>
                                            <svg class="svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-node active" style="{{ $index % 2 != 0 ? 'border-color:var(--secondary);' : '' }}"></div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA -->
            <div class="card glass neon-box text-center mt-20" style="padding:4rem 2rem; border-radius:1.5rem;">
                <h2 class="glow-text mb-4 uppercase">PRÉPAREZ VOTRE EXPATRIATION</h2>
                <p class="text-muted mb-8 font-mono mx-auto" style="max-width:36rem; line-height:1.7;">Nos modules
                    d'immersion vous évitent le choc culturel et vous donnent toutes les clés d'une intégration réussie.</p>
                <a href="{{ route('register') }}" class="btn btn-primary neon-box" style="padding:1.1rem 2.5rem;">DÉCOUVRIR LE LAB D'IMMERSION</a>
            </div>
        </div>
    </section>
</x-layouts.cyber>
