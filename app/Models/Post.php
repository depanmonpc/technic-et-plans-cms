<?php

namespace App\Models;

use App\Traits\IsTenantModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
        'featured',      // bool "mis en avant"
        'published_at',  // datetime de publication
        'user_id',
        'category_id',
        'thumbnail',     // chemin éventuel sur disque "public"
        // 'featured_image', // garder si tu stockes une URL brute
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured'     => 'boolean',
    ];

    // (Optionnel) Exposer directement ces attributs calculés en JSON
    // protected $appends = ['content_html', 'featured_image_url'];

    /* -------------------- Relations -------------------- */

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

    /* -------------------- Scopes -------------------- */

    /** Articles publiés (published_at défini et passé) */
    public function scopePublished(Builder $q): Builder
    {
        return $q->whereNotNull('published_at')
                 ->where('published_at', '<=', now());
    }

    /* -------------------- Précédent / Suivant -------------------- */

    /** Article précédent (par published_at puis id) */
    public function previous(): ?self
    {
        return static::published()
            ->where(function ($q) {
                $q->where('published_at', '<', $this->published_at)
                  ->orWhere(function ($q) {
                      $q->where('published_at', $this->published_at)
                        ->where('id', '<', $this->id);
                  });
            })
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->first();
    }

    /** Article suivant (par published_at puis id) */
    public function next(): ?self
    {
        return static::published()
            ->where(function ($q) {
                $q->where('published_at', '>', $this->published_at)
                  ->orWhere(function ($q) {
                      $q->where('published_at', $this->published_at)
                        ->where('id', '>', $this->id);
                  });
            })
            ->orderBy('published_at', 'asc')
            ->orderBy('id', 'asc')
            ->first();
    }

    /* -------------------- Accessors pratiques -------------------- */

    /** Contenu prêt à l’affichage : HTML si présent, sinon texte -> nl2br + escape */
    public function getContentHtmlAttribute(): string
    {
        $c = (string) ($this->content ?? '');
        $looksHtml = $c !== strip_tags($c);
        return $looksHtml ? $c : nl2br(e($c));
    }

    /** URL image mise en avant (Spatie -> large -> original -> thumbnail disque) */
    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('featured', 'large')
            ?: $this->getFirstMediaUrl('featured')
            ?: ($this->thumbnail ? \Storage::disk('public')->url($this->thumbnail) : null);
    }

    /* -------------------- MediaLibrary -------------------- */

    /** Conversions d’images */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('large')
            ->width(1200)
            ->nonQueued();
    }
}
