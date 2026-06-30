<div class="grid-couleurs">
    @foreach ($items as $index => $item)
        <button 
            class="card-couleurs"
            x-data="{ playing: false }"
            @click="
                if(playing) return;
                playing = true; 
                $wire.markAsHeard({{ $item['id'] }});
                @if(!empty($item['audio']))
                    let audio = new Audio('{{ Storage::url($item['audio']) }}');
                    audio.play();
                    audio.onended = () => playing = false;
                    audio.onerror = () => playing = false;
                @else
                    setTimeout(() => playing = false, 1000);
                @endif
            "
            :class="{ 'is-playing': playing }"
        >
            <div class="couleur-preview" style="background: {{ $item['hex'] }}; border-bottom: {{ in_array($item['hex'], ['#ECF0F1', '#F5F0E8']) ? '1px solid var(--lab-glass-border)' : 'none' }}"></div>
            <div class="couleur-body">
                <div class="couleur-de">{{ $item['de'] }}</div>
                <div class="couleur-fr">{{ $item['fr'] }}</div>
            </div>
        </button>
    @endforeach
</div>
