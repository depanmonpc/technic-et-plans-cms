<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Actualités',
            'Tutoriels',
            'Communiqués',
            'Événements',
            'Divers',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['name' => $name],
                ['slug' => \Str::slug($name)]
            );
        }
    }
}
