<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Technic & Plans'))</title>
    <meta name="description" content="@yield('meta_description', 'Technic & Plans - Études & plans pour l\'habitat')">

    <!-- Normalize CSS & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Roboto+Condensed:400,300,700" type="text/css">

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"/>

    <!-- Ton style CSS principal -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <!-- Scripts compilés -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="font-sans antialiased bg-white">

    {{-- HEADER --}}
    <header class="header">
        <div class="content">
            <a href="{{ route('home') }}">
                <img src="{{ asset('asset/img/logo.png') }}"
                     alt="Technic & Plans - Conception de plans et permis de construire"
                     class="header-logo">
            </a>
            <nav class="header-menu">
                <a href="{{ route('home') }}"
                   class="header-menu-item{{ request()->routeIs('home') ? ' header-menu-item-active' : '' }}">
                    ACCUEIL
                </a>
                <a href="{{ route('notre-savoir-faire') }}"
                   class="header-menu-item{{ request()->routeIs('notre-savoir-faire') ? ' header-menu-item-active' : '' }}">
                    NOTRE SAVOIR FAIRE
                </a>
                <a href="{{ route('courtage-travaux') }}"
                   class="header-menu-item{{ request()->routeIs('courtage-travaux') ? ' header-menu-item-active' : '' }}">
                    COURTAGE TRAVAUX
                </a>
                <a href="{{ route('contact') }}"
                   class="header-menu-item{{ request()->routeIs('contact') ? ' header-menu-item-active' : '' }}">
                    CONTACT
                </a>
            </nav>
            <img src="{{ asset('asset/img/ombre.png') }}" alt="" class="header-shadow">
        </div>
    </header>

    {{-- CONTENU DES PAGES --}}
    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

{{-- FOOTER --}}
@include('partials.footer')

    @stack('modals')
    @livewireScripts
</body>
</html>
