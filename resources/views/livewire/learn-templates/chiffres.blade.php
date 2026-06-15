<div class="grid-chiffres">
    @foreach ($items as $index => $item)
        <button 
            class="card-chiffres"
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
            <div class="chiffre-num">{{ $item['num'] }}</div>
            <div class="chiffre-de">{{ $item['de'] }}</div>
        </button>
    @endforeach
</div>
