<!-- Back Button -->
<a href="{{ route('lab.cours.chapitres', ['slug' => $parcoursSlug]) }}" class="back-btn" wire:navigate>
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
        <path d="M10 3L5 8l5 5"/>
    </svg> 
    Retour
</a>

<!-- Header -->
<div class="learn-header">
    <div>
        <div class="learn-eyebrow">{{ $chapitreData['sur_titre'] }}</div>
        <h2 class="learn-title">{{ $chapitreData['titre'] }}</h2>
        <p class="learn-desc">{{ $chapitreData['description'] }}</p>
    </div>
</div>
