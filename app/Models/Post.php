<?php

namespace App\Models;

use App\Traits\IsTenantModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use IsTenantModel;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'featured',
        'published_at',
        'user_id',
        'category_id',
        'thumbnail',

        // Tu peux garder ça si tu veux aussi stocker une URL brute
        // 'featured_image',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getFeaturedImageUrlAttribute(): ?string
{
    return $this->getFirstMediaUrl('featured', 'thumb');
}

    /**
     * Déclaration des conversions pour MediaLibrary.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('large')
            ->width(1200)
            ->nonQueued(); // Génère sans file d'attente
    }
}
