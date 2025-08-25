<footer class="footer">
    <div class="content footer-content{{ request()->routeIs('home') ? ' footer-content-alt' : '' }}">
        <a href="{{ route('home') }}">
            <img src="{{ asset('asset/img/logo-white.png') }}" alt="Logo Technic & Plans" class="footer-logo">
        </a>

        <div class="footer-menu">
            <a href="{{ route('home') }}" class="footer-menu-item{{ request()->routeIs('home') ? ' footer-menu-item-alt' : '' }}">
                Accueil
            </a>

            <a href="{{ route('notre-savoir-faire') }}" class="footer-menu-item{{ request()->routeIs('notre-savoir-faire') ? ' footer-menu-item-alt' : '' }}">
                Notre savoir-faire
            </a>

            <a href="{{ route('courtage-travaux') }}" class="footer-menu-item{{ request()->routeIs('courtage-travaux') ? ' footer-menu-item-alt' : '' }}">
                Courtage travaux
            </a>

            <a href="{{ route('contact') }}" class="footer-menu-item{{ request()->routeIs('contact') ? ' footer-menu-item-alt' : '' }}">
                Contact
            </a>

            <a href="{{ route('mentions-legales') }}"
   class="footer-menu-item{{ request()->routeIs('mentions-legales') ? ' footer-menu-item-alt' : '' }}">
    Mentions légales
</a>

            <a href="{{ route('rgpd') }}" class="footer-menu-item{{ request()->routeIs('rgpd') ? ' footer-menu-item-alt' : '' }}">
                RGPD
            </a>
        </div>
    </div>
</footer>
