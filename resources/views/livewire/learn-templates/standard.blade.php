<div class="grid-standard">
    @foreach ($items as $index => $item)
        <button 
            class="card-standard"
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
            <div class="card-standard-header">
                <span class="card-standard-de" style="{{ $templateType === 'alphabet' ? 'font-size: 22px;' : '' }}">
                    {{ $item['de'] }}
                </span>
                <svg class="card-standard-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 5L6 9H2v6h4l5 4V5z"/>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/>
                </svg>
            </div>
            @if (isset($item['example']))
                <div class="card-standard-example">{{ $item['example'] }}</div>
            @endif
            @if (isset($item['fr']))
                <div class="card-standard-fr" style="{{ $templateType === 'salutations' ? 'font-size: 12px;' : '' }}">
                    {{ $item['fr'] }}
                </div>
            @endif
        </button>
    @endforeach
</div>
