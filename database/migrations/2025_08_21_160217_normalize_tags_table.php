<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Renommer les colonnes existantes via SQL (pas besoin de doctrine/dbal)
        // tag_id -> id (PK auto increment)
        DB::statement('ALTER TABLE `tags` CHANGE `tag_id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');

        // tag_name -> name
        DB::statement('ALTER TABLE `tags` CHANGE `tag_name` `name` VARCHAR(191) NOT NULL');

        // 2) Ajouter slug si manquant
        if (! Schema::hasColumn('tags', 'slug')) {
            Schema::table('tags', function (Blueprint $table) {
                $table->string('slug', 191)->nullable()->after('name');
            });

            // Backfill slug depuis name
            DB::table('tags')->select('id', 'name')->orderBy('id')->chunkById(500, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('tags')->where('id', $row->id)->update([
                        'slug' => Str::slug($row->name),
                    ]);
                }
            });
        }

        // 3) Index/uniques (protégés)
        try { DB::statement('ALTER TABLE `tags` ADD UNIQUE `tags_name_unique` (`name`)'); } catch (\Throwable $e) {}
        try { DB::statement('ALTER TABLE `tags` ADD UNIQUE `tags_slug_unique` (`slug`)'); } catch (\Throwable $e) {}

        // 4) Table pivot taggables + FK si absente
        if (! Schema::hasTable('taggables')) {
            Schema::create('taggables', function (Blueprint $table) {
                $table->unsignedBigInteger('tag_id');
                $table->unsignedBigInteger('taggable_id');
                $table->string('taggable_type');
                $table->index(['tag_id', 'taggable_id', 'taggable_type'], 'taggables_full_index');
            });

            // FK vers tags(id)
            try {
                DB::statement('ALTER TABLE `taggables`
                    ADD CONSTRAINT `taggables_tag_id_foreign`
                    FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`) ON DELETE CASCADE');
            } catch (\Throwable $e) {}
        }
    }

    public function down(): void
    {
        // On ne revient pas en arrière sur la normalisation des colonnes.
        // On peut au moins retirer les uniques si besoin.
        try { DB::statement('ALTER TABLE `tags` DROP INDEX `tags_name_unique`'); } catch (\Throwable $e) {}
        try { DB::statement('ALTER TABLE `tags` DROP INDEX `tags_slug_unique`'); } catch (\Throwable $e) {}

        // Supprimer la table pivot si créée par cette migration
        if (Schema::hasTable('taggables')) {
            Schema::drop('taggables');
        }
    }
};
