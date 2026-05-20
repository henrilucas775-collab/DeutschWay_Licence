<x-layouts::app :title="__('Cours')">
    <div class="lab-section-header">
        <div class="lab-section-eyebrow">Section active</div>
        <div class="lab-section-title">Cours</div>
    </div>

    <!-- Scoped Style block for 3D Interactive Library -->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&display=swap');

      .lab-books-section {
        background: radial-gradient(circle at center, #e6e6e6ff 0%, #e7e7e7ff 100%);
        border-radius: 24px;
        padding: 5rem 2rem;
        box-shadow: inset 0 0 50px var(--lab-accent), 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
        overflow: hidden;
        margin-top: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        
        /* Model parameters */
        --bg-color: #0f172a;
        --book-width: 220px;
        --book-height: 320px;
        --transition-speed: 0.6s;
        --gold: #d4af37;
        --open-angle: -80deg;
      }

      /* Soft decorative glow blobs behind the library shelf */
      .lab-books-glow {
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
        top: 20%;
        left: 30%;
        pointer-events: none;
        z-index: 0;
      }

      .lab-books-title {
        font-family: 'Cinzel', serif;
        font-size: 2.2rem;
        margin-bottom: 3.5rem;
        text-align: center;
        letter-spacing: 0.2rem;
        color: var(--lab-accent);
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        z-index: 1;
      }

      .books-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 4rem;
        max-width: 1200px;
        margin: 0 auto;
        z-index: 1;
      }

      /* Style du livre */
      .book {
        position: relative;
        width: var(--book-width);
        height: var(--book-height);
        transform-style: preserve-3d;
        perspective: 1500px;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.5s ease;
        cursor: pointer;
      }

      .book:hover, .book.book-open {
        transform: scale(1.1) translateY(-10px);
        z-index: 10;
      }

      /* Pages intérieures */
      .pages {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        border-radius: 2px 8px 8px 2px;
        box-shadow: inset 5px 0 15px rgba(0,0,0,0.1);
        z-index: 1;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* Décalage du contenu vers la droite pour éviter qu'il soit caché par la couverture */
        padding: 1.5rem 1rem 1.5rem 2.5rem;
        text-align: center;
        border: 1px solid #e2e8f0;
      }

      .book-content {
        color: #334155;
        z-index: 2;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;

        position: relative;
      }

      .book-title-inner {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.8rem;
        border-bottom: 1px solid #cbd5e1;
        padding-bottom: 0.4rem;
      }

      .book-text-inner {
        font-family: 'Playfair Display', serif;
        font-size: 0.9rem;
        line-height: 1.5;
        font-style: italic;
      }

      .book-link-text {
        position: absolute;
        bottom: 0;
        right: 0;
        font-family: 'Poppins', sans-serif;
        font-size: 0.72rem;
        font-weight: 600;
        color: var(--lab-accent, #8b9a8b);
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: color 0.25s ease, background 0.25s ease;
        cursor: pointer;
        padding: 0.35rem 0.7rem;
        border-top: 1px solid #e2e8f0;
        border-left: 1px solid #e2e8f0;
        border-radius: 6px 0 0 0;
        background: #f8fafc;
      }

      .book-link-text:hover {
        color: #1e293b;
        background: #e2e8f0;
      }

      /* Couverture */
      .cover {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px 10px 10px 4px;
        z-index: 5;
        transform-origin: left;
        transform: rotateY(0deg);
        transition: transform var(--transition-speed) cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        box-shadow: 5px 5px 20px rgba(0,0,0,0.5);
        overflow: hidden;
        backface-visibility: hidden;
      }

      .cover::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("https://www.transparenttextures.com/patterns/leather.png");
        opacity: 0.3;
        pointer-events: none;
      }

      .cover::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 12px;
        background: linear-gradient(to right, rgba(0,0,0,0.4), rgba(255,255,255,0.2), rgba(0,0,0,0.4));
        border-right: 1px solid rgba(255,255,255,0.1);
      }

      .book:hover .cover, .book.book-open .cover {
        transform: rotateY(var(--open-angle));
      }

      .cover-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 1.5rem;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        color: white;
        fill: white;
      }

      .cover-title {
        font-family: 'Cinzel', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: white;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
      }

      .cover-subtitle {
        font-family: 'Poppins', sans-serif;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.8);
        margin-top: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
      }

      /* Couleurs de couverture premium */
      .book-level-0 .cover {
        background: linear-gradient(135deg, #10b981 0%, #064e3b 100%); /* Green Teal */
        border-right: 1px solid rgba(16, 185, 129, 0.3);
      }
      .book-level-foundation .cover {
        background: linear-gradient(135deg, #3b82f6 0%, #1e3a8a 100%); /* Indigo/Royal Blue */
        border-right: 1px solid rgba(59, 130, 246, 0.3);
      }
      .book-level-immersion .cover {
        background: linear-gradient(135deg, #f59e0b 0%, #78350f 100%); /* Golden Amber */
        border-right: 1px solid rgba(245, 158, 11, 0.3);
      }
      .book-level-advanced .cover {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); /* Obsidian & Gold */
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-right: 1px solid rgba(212, 175, 55, 0.5);
      }
      
      .book-level-advanced .cover .cover-title {
        color: var(--gold); /* Gold title for Advanced */
        text-shadow: 0 0 10px rgba(212, 175, 55, 0.4);
      }
      .book-level-advanced .cover .cover-icon {
        color: var(--gold);
        fill: var(--gold);
      }

      .spine {
        position: absolute;
        top: 0;
        left: 0;
        width: 30px;
        height: 100%;
        background: #1e293b;
        transform: rotateY(-90deg) translateX(-15px);
        transform-origin: left;
        z-index: 0;
      }

      .hint {
        margin-top: 4rem;
        font-size: 0.9rem;
        color: #94a3b8;
        font-style: italic;
        font-family: 'Poppins', sans-serif;
        z-index: 1;
        text-align: center;
      }

      @media (max-width: 1024px) {
        .books-container { gap: 3rem; }
      }

      @media (max-width: 768px) {
        .lab-books-title { font-size: 1.8rem; margin-bottom: 2.5rem; }
        .books-container { gap: 2.5rem; }
        .book { width: 180px; height: 260px; }
        .cover-icon { width: 45px; height: 45px; }
        .cover-title { font-size: 1.1rem; }
        .pages { padding: 1rem 0.5rem 1rem 1.5rem; }
      }
    </style>

    <div class="lab-books-section" x-data="{ toastMessage: '', showToast: false, triggerToast(msg) { this.toastMessage = msg; this.showToast = true; setTimeout(() => this.showToast = false, 3500); } }">
        <div class="lab-books-glow"></div>
        <h2 class="lab-books-title">Choisissez votre parcours DeutschWay</h2>

        <div class="books-container">
            <!-- Livre 1: Niveau Zéro -->
            <div class="book book-level-0" x-data="{ open: false }" @click="open = !open" @click.outside="open = false" :class="{ 'book-open': open }">
                <div class="spine"></div>
                <div class="pages">
                    <div class="book-content">
                        <div class="book-title-inner">Fondamentaux absolus</div>
                        <p class="book-text-inner">Alphabet, chiffres, couleurs et base du quotidien. Parfait pour les débutants complets.</p>
                        <a href="{{ route('niveau-zero') }}" class="book-link-text" @click.stop wire:navigate>Decouvrir</a>
                    </div>
                </div>
                <div class="cover">
                    <!-- SVG Feather Icon -->
                    <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.88 3.549a1.125 1.125 0 011.58 1.58l-1.8 1.8a4.5 4.5 0 01-1.58 1.05l-3.21 1.07a.75.75 0 01-.93-.93l1.07-3.21a4.5 4.5 0 011.05-1.58l1.8-1.8zM16.88 3.549L12.5 7.93M12.5 7.93l-4.72 4.72a3 3 0 00-.73 1.25l-1.07 3.21a.75.75 0 00.93.93l3.21-1.07a3 3 0 001.25-.73l4.72-4.72M12.5 7.93l3.54 3.54m-8.14.36l-3.2 3.2a.75.75 0 00-.22.53v2.25a.75.75 0 00.75.75h2.25a.75.75 0 00.53-.22l3.2-3.2" />
                    </svg>
                    <p class="cover-title">Niveau Zéro</p>
                    <p class="cover-subtitle">Commencer</p>
                </div>
            </div>

            <!-- Livre 2: Parcours Fondations -->
            <div class="book book-level-foundation" x-data="{ open: false }" @click="open = !open" @click.outside="open = false" :class="{ 'book-open': open }">
                <div class="spine"></div>
                <div class="pages">
                    <div class="book-content">
                        <div class="book-title-inner">Niveau A1 → C2</div>
                        <p class="book-text-inner">Grammaire, conjugaison et vocabulaire essentiel pour construire des phrases complètes.</p>
                        <a href="{{ route('fondations') }}" class="book-link-text" @click.stop wire:navigate>Decouvrir</a>
                    </div>
                </div>
                <div class="cover">
                    <!-- Open Book Icon -->
                    <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <p class="cover-title">Fondations</p>
                    <p class="cover-subtitle">Commencer</p>
                </div>
            </div>

            <!-- Livre 3: Parcours Immersion -->
            <div class="book book-level-immersion" x-data="{ open: false }" @click="open = !open" @click.outside="open = false" :class="{ 'book-open': open }">
                <div class="spine"></div>
                <div class="pages">
                    <div class="book-content">
                        <div class="book-title-inner">Immersion complet</div>
                        <p class="book-text-inner">Conversations avancées, culture allemande et préparation à la vie en Allemagne.</p>
                        <a href="{{ route('immersion') }}" class="book-link-text" @click.stop wire:navigate>Decouvrir</a>
                    </div>
                </div>
                <div class="cover">
                    <!-- Chat Bubble Icon -->
                    <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v5.018z" />
                    </svg>
                    <p class="cover-title">Immersion</p>
                    <p class="cover-subtitle">commencer</p>
                </div>
            </div>

            <!-- Livre 4: Future - Avancé -->
            <div class="book book-level-advanced" x-data="{ open: false }" @click="open = !open" @click.outside="open = false" :class="{ 'book-open': open }">
                <div class="spine"></div>
                <div class="pages">
                    <div class="book-content">
                        <div class="book-title-inner">Niveau C1 → C2</div>
                        <p class="book-text-inner">Maîtrise complète de l'allemand, littérature, argot et nuances professionnelles.</p>
                        <a href="#" class="book-link-text" @click.stop.prevent="triggerToast('Le parcours Future – Avancé sera disponible très prochainement !')">Decouvrir</a>
                    </div>
                </div>
                <div class="cover">
                    <!-- Sparkle/Star Icon -->
                    <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.195-.49.846-.49 1.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.528.04.74.686.359 1.042l-4.116 3.85a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.98 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.116-3.85a.563.563 0 01.359-1.043l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <p class="cover-title">Avancé</p>
                    <p class="cover-subtitle">commencer</p>
                </div>
            </div>
        </div>

        <p class="hint">Survolez un livre pour l'ouvrir</p>

        <!-- Custom Mystical Library Toast Notification -->
        <div x-show="showToast" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-4"
             class="fixed bottom-6 right-6 z-50 bg-slate-900 border border-amber-500/30 text-white px-5 py-3 rounded-xl shadow-2xl flex items-center gap-3 backdrop-blur-md"
             style="display: none;"
        >
             <div class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></div>
             <span class="font-sans text-xs tracking-wider uppercase font-semibold text-amber-500">INFO</span>
             <span class="font-sans text-xs text-slate-200" x-text="toastMessage"></span>
        </div>
    </div>
</x-layouts::app>
