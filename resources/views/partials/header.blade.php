<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Technic et plans - Études & plans pour l'habitat</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta name="description" content="Besoin de plans sur mesure, permis de construire ou modélisation 3D à Lille, Lens, Béthune, Arras ? Technic & Plans vous accompagne dans votre projet architectural en Hauts-de-France. Devis rapide et expertise reconnue !">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Roboto+Condensed:400,300,700" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <header class="header">
        <div class="content">
            <a href="{{ url('index.php') }}">
                <img src="{{ asset('asset/img/logo.png') }}" alt="Technic & Plans - Conception de plans et permis de construire en Hauts-de-France" class="header-logo">
            </a>
            <div class="header-menu">
                <a href="{{ url('index.php') }}" class="header-menu-item{{ ($pageName ?? '') == 'index' ? ' header-menu-item-active' : '' }}">ACCUEIL</a>
                <a href="{{ url('notre-savoir-faire.php') }}" class="header-menu-item{{ ($pageName ?? '') == 'notre-savoir-faire' ? ' header-menu-item-active' : '' }}">NOTRE SAVOIR FAIRE</a>
                <a href="{{ url('courtage-travaux.php') }}" class="header-menu-item{{ ($pageName ?? '') == 'courtage-travaux' ? ' header-menu-item-active' : '' }}">COURTAGE TRAVAUX</a>
                <a href="{{ url('contact.php') }}" class="header-menu-item{{ ($pageName ?? '') == 'contact' ? ' header-menu-item-active' : '' }}">CONTACT</a>
            </div>
            <img src="{{ asset('asset/img/ombre.png') }}" alt="" class="header-shadow">
        </div>
    </header>
