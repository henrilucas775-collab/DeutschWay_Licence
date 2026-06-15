<div>
    @include('livewire.learn-templates.styles')

    <div class="learn-space-container">
        <!-- Header commun (Titre, description, bouton retour) -->
        @include('partials.learn-header')

        <!-- Le chef d'orchestre : affichage dynamique selon le template -->
        @if ($templateType === 'chiffres')
            @include('livewire.learn-templates.chiffres')
            
        @elseif ($templateType === 'couleurs')
            @include('livewire.learn-templates.couleurs')
            
        @elseif ($templateType === 'quotidien')
            @include('livewire.learn-templates.quotidien')
            
        @elseif ($templateType === 'grammaire')
            @include('livewire.learn-templates.grammaire')
            
        @else
            @include('livewire.learn-templates.standard')
        @endif
    </div>
</div>
