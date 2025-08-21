<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\LaravelSettings\Models\SettingsProperty;

class GeneralSettingsSeeder extends Seeder
{
    public function run(): void
    {
        SettingsProperty::updateOrCreate(
            ['group' => 'general', 'name' => 'site_name'],
            ['payload' => 'LiberuCMS']
        );

        SettingsProperty::updateOrCreate(
            ['group' => 'general', 'name' => 'admin_email'],
            ['payload' => 'admin@example.com']
        );

        SettingsProperty::updateOrCreate(
            ['group' => 'general', 'name' => 'site_description'],
            ['payload' => 'CMS Laravel avec Filament']
        );
    }
}
