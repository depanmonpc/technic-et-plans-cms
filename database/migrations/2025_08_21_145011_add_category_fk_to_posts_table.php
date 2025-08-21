<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Ajoute la colonne si absente
        Schema::table('posts', function (Blueprint $table) {
            if (! Schema::hasColumn('posts', 'category_id')) {
                $table->foreignId('category_id')->nullable()->after('user_id');
            }
        });

        // 2) Drop la FK existante si elle existe (quel que soit son nom)
        $fk = DB::selectOne("
            SELECT CONSTRAINT_NAME AS name
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = DATABASE()
              AND TABLE_NAME = 'posts'
              AND COLUMN_NAME = 'category_id'
              AND REFERENCED_TABLE_NAME IS NOT NULL
            LIMIT 1
        ");

        if ($fk && isset($fk->name)) {
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `{$fk->name}`");
        }

        // 3) (Optionnel) drop l’index auto si laissé par l’ancienne FK avec un nom différent
        //    On le fait seulement s'il existe et s'il gêne (rarement nécessaire)
        // DB::statement("ALTER TABLE `posts` DROP INDEX `posts_category_id_foreign`");

        // 4) Recrée la FK proprement
        //    NB: s’assure que la table categories existe bien avant
        if (Schema::hasTable('categories')) {
            DB::statement("
                ALTER TABLE `posts`
                ADD CONSTRAINT `posts_category_id_foreign`
                FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
                ON DELETE SET NULL
            ");
        }
    }

    public function down(): void
    {
        // Drop la nouvelle FK si présente
        $fk = DB::selectOne("
            SELECT CONSTRAINT_NAME AS name
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = DATABASE()
              AND TABLE_NAME = 'posts'
              AND COLUMN_NAME = 'category_id'
              AND REFERENCED_TABLE_NAME IS NOT NULL
            LIMIT 1
        ");

        if ($fk && isset($fk->name)) {
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `{$fk->name}`");
        }

        // (Optionnel) supprimer la colonne
        // Schema::table('posts', fn (Blueprint $t) => $t->dropColumn('category_id'));
    }
};
