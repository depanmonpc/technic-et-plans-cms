<?php

namespace App\Filament\Admin\Enums;

enum Icon: string // ✅ Rend l'enum compatible avec BackedEnum
{
    case Cog = 'heroicon-o-cog';
    case Settings = 'heroicon-o-adjustments-horizontal';
    case Users = 'heroicon-o-users';
    case Dashboard = 'heroicon-o-home';
    case Tools = 'heroicon-o-wrench-screwdriver';
    // Ajoute ici toutes les icônes utiles de Filament Heroicons
}
