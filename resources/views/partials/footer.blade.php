<footer class="footer">
    <div class="content footer-content{{ ($pageName ?? '') == 'index' ? ' footer-content-alt' : '' }}">
        <a href="{{ url('index.php') }}">
            <img src="{{ asset('asset/img/logo-white.png') }}" alt="Logo Technic & Plans" class="footer-logo">
        </a>

        <div class="footer-menu">
            <a href="{{ url('index.php') }}" class="footer-menu-item{{ ($pageName ?? '') == 'index' ? ' footer-menu-item-alt' : '' }}">Accueil</a>
            <a href="{{ url('notre-savoir-faire.php') }}" class="footer-menu-item{{ ($pageName ?? '') == 'notre-savoir-faire' ? ' footer-menu-item-alt' : '' }}">Notre savoir-faire</a>
            <a href="{{ url('courtage-travaux.php') }}" class="footer-menu-item{{ ($pageName ?? '') == 'courtage-travaux' ? ' footer-menu-item-alt' : '' }}">Courtage travaux</a>
            <a href="{{ url('contact.php') }}" class="footer-menu-item{{ ($pageName ?? '') == 'contact' ? ' footer-menu-item-alt' : '' }}">Contact</a>
            <a href="{{ url('mentions-legales.php') }}" class="footer-menu-item{{ ($pageName ?? '') == 'mentions-legales' ? ' footer-menu-item-alt' : '' }}">Mentions légales</a>
            <a href="{{ url('rgpd.php') }}" class="footer-menu-item{{ ($pageName ?? '') == 'rgpd' ? ' footer-menu-item-alt' : '' }}">RGPD</a>
        </div>
    </div>
</footer>
