<!DOCTYPE html>
<html lang="fr" class="dark max-w-full overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "DeutschWay | Maîtrisez l'Allemand avec Style" }}</title>
    <meta name="description" id="meta-description" content="{{ $description ?? "Plateforme d'apprentissage de l'allemand immersive avec un design cyberpunk unique." }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;600;700&family=Montserrat:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
</head>
<body class="starfield-bg antialiased min-w-0 overflow-x-hidden">
    <div id="particles-js"></div>
    <div id="app" class="min-w-0 max-w-full overflow-x-hidden">
        {{-- Navigation --}}
        @include('partials.header')

        {{-- Main Content --}}
        <main id="main-content">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        @include('partials.footer')
    </div>

    @fluxScripts
</body>
</html>

