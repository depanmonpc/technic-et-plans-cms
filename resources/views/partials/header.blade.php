<header class="header">
    <div class="content">
        <a href="{{ route('home') }}">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Technic & Plans - Conception de plans et permis de construire en Hauts-de-France" class="header-logo">
        </a>

        <div class="header-menu">
            <a href="{{ route('home') }}"
               class="header-menu-item {{ request()->routeIs('home') ? 'header-menu-item-active' : '' }}">
                ACCUEIL
            </a>

            <a href="{{ route('notre-savoir-faire') }}"
               class="header-menu-item {{ request()->routeIs('notre-savoir-faire') ? 'header-menu-item-active' : '' }}">
                NOTRE SAVOIR FAIRE
            </a>

            <a href="{{ route('courtage-travaux') }}"
               class="header-menu-item {{ request()->routeIs('courtage-travaux') ? 'header-menu-item-active' : '' }}">
                COURTAGE TRAVAUX
            </a>

            <a href="{{ route('contact') }}"
               class="header-menu-item {{ request()->routeIs('contact') ? 'header-menu-item-active' : '' }}">
                CONTACT
            </a>
        </div>

        <img src="{{ asset('asset/img/ombre.png') }}" alt="" class="header-shadow">
    </div>
</header>
