<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'title')) $table->string('title');
            if (!Schema::hasColumn('posts', 'slug')) $table->string('slug')->unique();
            if (!Schema::hasColumn('posts', 'excerpt')) $table->text('excerpt')->nullable();
            if (!Schema::hasColumn('posts', 'content')) $table->longText('content');
            if (!Schema::hasColumn('posts', 'thumbnail')) $table->string('thumbnail')->nullable();
            if (!Schema::hasColumn('posts', 'user_id')) $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            if (!Schema::hasColumn('posts', 'is_published')) $table->boolean('is_published')->default(false)->index();
            if (!Schema::hasColumn('posts', 'published_at')) $table->timestamp('published_at')->nullable()->index();
            if (!Schema::hasColumn('posts', 'meta_title')) $table->string('meta_title')->nullable();
            if (!Schema::hasColumn('posts', 'meta_description')) $table->string('meta_description', 300)->nullable();
        });
    }

    public function down(): void
    {
        // Optionnel : retirer les colonnes (souvent inutile)
    }
};
