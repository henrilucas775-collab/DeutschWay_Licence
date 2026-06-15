{{-- ── Quotidien: barre de contrôle ── --}}
<div class="qd-controls">
    <div class="qd-filter-group">
        @foreach ($categories as $cat)
            <button
                wire:click="$set('activeCategory', '{{ $cat }}')"
                class="qd-filter-btn {{ $activeCategory === $cat ? 'active' : '' }}"
            >{{ $cat }}</button>
        @endforeach
    </div>
    <div class="qd-search">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Rechercher un mot…"
        >
    </div>
</div>

@if ($totalItems === 0)
    <div class="qd-empty">Aucun résultat pour « {{ $search }} »</div>
@else
    @foreach ($filteredGroups as $categorieName => $groupe)
        <div class="qd-category-section">
            <div class="qd-category-title">{{ $categorieName }}</div>
            <div class="qd-grid">
                @foreach ($groupe as $item)
                    <div
                        class="qd-card"
                        x-data="{ playing: false }"
                        :class="{ 'is-playing': playing }"
                    >
                        @if (!empty($item['img']))
                            <img class="qd-card-img" src="{{ $item['img'] }}" alt="{{ $item['de'] }}" loading="lazy">
                        @else
                            <div class="qd-card-img-placeholder">🔤</div>
                        @endif
                        <div class="qd-card-body">
                            @if (!empty($item['article']))
                                <span class="qd-article">{{ $item['article'] }}</span>
                            @endif
                            <span class="qd-word">{{ $item['de'] }}</span>
                            <span class="qd-fr">{{ $item['fr'] }}</span>
                        </div>
                        <button
                            class="qd-listen-btn"
                            :class="{ 'playing': playing }"
                            @click.stop="
                                if(playing) return;
                                playing = true;
                                $wire.markAsHeard({{ $item['id'] }});
                                @if(!empty($item['audio']))
                                    let audio = new Audio('{{ Storage::url($item['audio']) }}');
                                    audio.play();
                                    audio.onended = () => playing = false;
                                    audio.onerror = () => playing = false;
                                @else
                                    setTimeout(() => playing = false, 1200);
                                @endif
                            "
                        >
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                                <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    @if ($totalPages > 1)
        <div class="fc-pagination">
            <button 
                class="fc-page-btn" 
                wire:click="goToPage({{ $currentPage - 1 }})" 
                @if($currentPage === 1) disabled @endif
            >
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
            </button>

            @for ($i = 1; $i <= $totalPages; $i++)
                @if ($i === 1 || $i === $totalPages || ($i >= $currentPage - 1 && $i <= $currentPage + 1))
                    <button 
                        class="fc-page-btn {{ $i === $currentPage ? 'active' : '' }}" 
                        wire:click="goToPage({{ $i }})"
                    >
                        {{ $i }}
                    </button>
                @elseif ($i === $currentPage - 2 || $i === $currentPage + 2)
                    <span style="color: #94a3b8;">...</span>
                @endif
            @endfor

            <button 
                class="fc-page-btn" 
                wire:click="goToPage({{ $currentPage + 1 }})" 
                @if($currentPage === $totalPages) disabled @endif
            >
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>
    @endif
@endif
