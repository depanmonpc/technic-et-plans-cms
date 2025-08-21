<?php

namespace App\Filament\Admin\Enums;

enum AdminNavigationGroup: string // ✅ BackedEnum avec `string` pour compatibilité
{
    case Settings = 'Paramètres';
    case Content = 'Contenu';
    case Users = 'Utilisateurs';
    // ➕ Ajoute d'autres groupes si besoin
}