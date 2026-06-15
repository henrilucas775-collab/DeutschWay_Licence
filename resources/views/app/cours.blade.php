<x-layouts::app :title="__('Cours')">
    <div class="lab-section-header">
        <div class="lab-section-eyebrow">Section active</div>
        <div class="lab-section-title">Cours</div>
    </div>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=MedievalSharp&family=Sevillana&family=Poppins:wght@300;400;600&display=swap');

      .lab-parchemins-section {
        background: radial-gradient(circle at center, #e6e6e6ff 0%, #e7e7e7ff 100%);
        border-radius: 24px;
        padding: 5rem 24px;
        box-shadow: inset 0 0 50px var(--lab-accent), 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
        overflow: hidden;
        margin-top: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .lab-parchemins-glow {
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
        top: 20%;
        left: 30%;
        pointer-events: none;
        z-index: 0;
      }

      .lab-parchemins-title {
        font-family: 'MedievalSharp', cursive;
        font-size: 2.2rem;
        margin-bottom: 3.5rem;
        text-align: center;
        letter-spacing: 0.2rem;
        color: var(--lab-accent);
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        z-index: 1;
      }

      .parchemins-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2.75rem 2rem;
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        z-index: 1;
        padding: 0;
      }

      @media (min-width: 841px) {
        .parchemins-container {
          grid-template-columns: repeat(2, 1fr);
          max-width: none; 
        }
      }

       
      @media (min-width: 1225px) {
        .parchemins-container {
          grid-template-columns: repeat(3, 1fr);
        }
      }


      @media (min-width: 1700px) {
        .parchemins-container {
          grid-template-columns: repeat(4, 1fr);
        }
      }

      @media (max-width: 840px) {
        .parchemins-container {
          grid-template-columns: 1fr;
          max-width: 880px;
        }
      }

      .parchemin-wrapper {
        width: 100%;
        max-width: calc(840px + 1cm);
        container-type: inline-size;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        text-decoration: none;
        color: inherit;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .parchemin-wrapper:hover {
        transform: scale(1.02) translateY(-3px);
      }

      .parchemin-wrapper--disabled {
        cursor: not-allowed;
        opacity: 0.85;
      }

      .parchemin-wrapper--disabled:hover {
        transform: scale(1.01) translateY(-2px);
      }

      .parchemin-card {
        width: calc(100cqw + 1cm);
        height: calc(76cqw + 1cm);
        position: relative;
        background-image: url('{{ asset("sadow-removebg-preview.png") }}');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
        display: flex;
        flex-direction: column;
        box-sizing: border-box;
        /* Zone lisible du parchemin (évite bords et plis de l’image) */
        padding: 13% 21% 15% 21%;
      }

      .parchemin-content {
        height: 100%;
        min-height: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 0.35rem;
        color: #3d2416;
        text-align: center;
      }

      .parchemin-title {
        font-family: 'MedievalSharp', cursive;
        font-size: clamp(1.15rem, 2.8vw, 1.55rem);
        margin: 0;
        line-height: 1.15;
        flex-shrink: 0;
        width: 100%;
        padding-bottom: 0.35rem;
        border-bottom: 2px solid rgba(61, 36, 22, 0.22);
        text-transform: uppercase;
        color: #2b1810;
        letter-spacing: 1px;
      }

      .parchemin-description {
        font-size: clamp(0.78rem, 1.6vw, 0.92rem);
        line-height: 1.55;
        margin: 0;
        flex: 1;
        min-height: 0;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow-y: auto;
        scrollbar-width: none;
        font-weight: 500;
        color: #4a2c1d;
        padding: 0.15rem 0;
        padding-left: 12px;
        padding-right : 12px;
      }

      .parchemin-description::-webkit-scrollbar {
        display: none;
      }

      .parchemin-footer {
        flex-shrink: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.2rem;
        padding-top: 0.15rem;
      }

      .parchemin-meta {
        font-family: 'Sevillana', cursive;
        font-size: clamp(1rem, 2.2vw, 1.25rem);
        line-height: 1.2;
        color: #854d0e;
        margin: 0;
      }

      .parchemin-cta {
        font-family: 'Poppins', sans-serif;
        font-size: 0.90rem;
        font-weight: 600;
        color: #974705ff;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin: 0;
        padding-right: 65px;
        padding-bottom: 7px;
      }

      .hint {
        margin-top: 3rem;
        font-size: 0.9rem;
        color: #64748b;
        font-style: italic;
        font-family: 'Poppins', sans-serif;
        z-index: 1;
        text-align: center;
      }

      @media (max-width: 768px) {
        .lab-parchemins-title {
          font-size: 1.8rem;
          margin-bottom: 2.5rem;
        }

        .parchemin-wrapper {
          max-width: calc(800px + 1cm);
        }

        .parchemin-card {
          padding: 12% 18% 14% 18%;
        }u
      }
    </style>

    <div
        class="lab-parchemins-section"
        x-data="{
            toastMessage: '',
            showToast: false,
            triggerToast(msg) {
                this.toastMessage = msg;
                this.showToast = true;
                setTimeout(() => this.showToast = false, 3500);
            }
        }"
    >
        <div class="lab-parchemins-glow"></div>
        <h2 class="lab-parchemins-title">Choisissez votre parcours DeutschWay</h2>

        <div class="parchemins-container">
            @foreach ($parcoursList as $parcours)
                @if ($parcours['disponible'])
                    <a
                        href="{{ route('lab.cours.chapitres', ['slug' => $parcours['slug']]) }}"
                        class="parchemin-wrapper"
                        wire:navigate
                    >
                        <div class="parchemin-card">
                            <div class="parchemin-content">
                                <h2 class="parchemin-title">{{ $parcours['titre'] }}</h2>
                                <p class="parchemin-description">{{ $parcours['description'] }}</p>
                                <div class="parchemin-footer">
                                    
                                    <span class="parchemin-cta">Découvrir →</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @else
                    <div
                        class="parchemin-wrapper parchemin-wrapper--disabled"
                        role="button"
                        tabindex="0"
                        @click="triggerToast('Le parcours Future – Avancé sera disponible très prochainement !')"
                        @keydown.enter="triggerToast('Le parcours Future – Avancé sera disponible très prochainement !')"
                    >
                        <div class="parchemin-card">
                            <div class="parchemin-content">
                                <h2 class="parchemin-title">{{ $parcours['titre'] }}</h2>
                                <p class="parchemin-description">{{ $parcours['description'] }}</p>
                                <div class="parchemin-footer">
                                    <span class="parchemin-cta">Bientôt</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <p class="hint">Cliquez sur un parchemin pour explorer le parcours</p>

        <div
            x-show="showToast"
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
 