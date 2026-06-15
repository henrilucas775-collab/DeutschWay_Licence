<div>
    <!-- Scoped Style block for Parchemin & 3D Interactive Library -->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=MedievalSharp&family=Sevillana&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&display=swap');

      /* Layout Styles */
      .parcours-chapitres-container {
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: stretch;
      }

      /* 3D Library Shelf Section */
      .lab-books-section {
        background: radial-gradient(circle at center, #e6e6e6ff 0%, #e7e7e7ff 100%);
        border-radius: 24px;
        padding: 5rem 24px;
        box-shadow: inset 0 0 50px var(--lab-accent), 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
        overflow: hidden;
        width: 100%;
        margin-top: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;

        /* Model parameters */
        --bg-color: #e7e7e7;
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
        font-family: 'MedievalSharp', cursive;
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
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        padding: 0;
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
        justify-content: center;
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
        font-size: 0.85rem;
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
        width: 55px;
        height: 55px;
        margin-bottom: 1.5rem;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        fill: white;
      }

      .cover-title {
        font-family: 'MedievalSharp', cursive;
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
      }

      .cover-subtitle {
        font-family: 'Poppins', sans-serif;
        font-size: 0.7rem;
        color: rgba(255,255,255,0.8);
        margin-top: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
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

      @media (max-width: 768px) {
        .lab-books-section {
          padding: 3rem 1rem;
        }
        .books-container {
          gap: 2.5rem;
        }
        .book {
          width: 180px;
          height: 260px;
        }
        .cover-icon {
          width: 45px;
          height: 45px;
        }
        .cover-title {
          font-size: 1.05rem;
        }
        .pages {
          padding: 1rem 0.5rem 1rem 1.5rem;
        }
      }
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: var(--charcoal-light, #64748b);
            cursor: pointer;
            background: none;
            border: none;
            margin-bottom: 24px;
            padding: 0;
            transition: color 0.15s;
            text-decoration: none;
        }
        .back-btn:hover { color: var(--ink, #0f172a); }
    </style>

    <div class="parcours-chapitres-container">

        <a href="{{ route('lab.cours') }}" class="back-btn" wire:navigate>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                <path d="M10 3L5 8l5 5"/>
            </svg>
            Cours
        </a>

        <div class="lab-section-header">
            <div class="lab-section-eyebrow">Section active</div>
            <div class="lab-section-title">Chapitres</div>
        </div>  


        <!-- Dynamic Bookshelf of Chapters -->
        <div class="lab-books-section">
            <div class="lab-books-glow"></div>
            
            <h2 class="lab-books-title">Les Chapitres</h2>

            <div class="books-container">
                @foreach ($chapitres as $chapitre)
                    <div 
                      class="book" 
                      x-data="{ open: false }" 
                      @click="open = !open" 
                      @click.outside="open = false" 
                      :class="{ 'book-open': open }"
                    >
                        <div class="spine"></div>
                        <div class="pages">
                            <div class="book-content">
                                <div class="book-title-inner">{{ $chapitre['titre'] }}</div>
                                <p class="book-text-inner">{{ $chapitre['description'] }}</p>
                                
                                <!-- Anchor action link to study room -->
                                <a 
                                  href="{{ route('lab.apprendre.show', ['chapitre' => $chapitre['slug']]) }}" 
                                  class="book-link-text" 
                                  @click.stop 
                                  wire:navigate
                                >
                                    Ouvrir
                                </a>
                            </div>
                        </div>
                        <div class="cover" style="background: {{ $chapitre['couleur_theme'] }}">
                            <!-- Icon mapping based on chapter slug -->
                            @if($chapitre['slug'] === 'alphabet')
                                <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            @elseif($chapitre['slug'] === 'chiffres')
                                <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            @elseif($chapitre['slug'] === 'couleurs')
                                <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122A3 3 0 0010.4 18h3.2a3 3 0 00.87-1.878l.45-3.372A1.5 1.5 0 0013.43 11.25h-2.86a1.5 1.5 0 00-1.49 1.488l.45 3.384z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25A9.75 9.75 0 1021.75 12 9.75 9.75 0 0012 2.25z" />
                                </svg>
                            @elseif($chapitre['slug'] === 'salutations')
                                <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-2.83C2.918 16.63 2 14.425 2 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                </svg>
                            @elseif($chapitre['slug'] === 'base-quotidienne')
                                <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                            @else
                                <svg class="cover-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.195-.49.846-.49 1.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.528.04.74.686.359 1.042l-4.116 3.85a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.98 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.116-3.85a.563.563 0 01.359-1.043l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            @endif

                            <p class="cover-title">{{ $chapitre['titre'] }}</p>
                            <p class="cover-subtitle">commencer</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
