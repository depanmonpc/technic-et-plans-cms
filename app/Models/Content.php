<?php

namespace App\Models;

use Exception;
use App\Services\FileService;
use App\Traits\IsTenantModel;
use App\Traits\SEOable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContentStatusChanged;

class Content extends Model
{
    use HasFactory, SEOable;
    use IsTenantModel;

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'body', 'author_id', 'published_at', 'type', 'category_id',
        'status', 'featured_image_url', 'slug', 'workflow_status', 'scheduled_for',
        'review_by', 'reviewed_at', 'reviewed_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'scheduled_for' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    const STATUS_DRAFT = 'draft';
    const STATUS_REVIEW = 'review';
    const STATUS_APPROVED = 'approved';
    const STATUS_PUBLISHED = 'published';
    const STATUS_SCHEDULED = 'scheduled';
    const STATUS_REJECTED = 'rejected';

    public static function boot()
    {
        parent::boot();

        static::saving(function ($content) {
            if ($content->featured_image_url) {
                $fileService = app(FileService::class);
                if (!$fileService->validateFileType($content->featured_image_url, 'image')) {
                    throw new Exception('Invalid file type or size for featured image.');
                }
            }

            if (!$content->workflow_status) {
                $content->workflow_status = self::STATUS_DRAFT;
            }
        });

        static::saved(function ($content) {
            Cache::forget("content_{$content->id}");
            if ($content->isDirty('workflow_status')) {
                $content->notifyStatusChange();
            }
        });
    }

    public function author() { return $this->belongsTo(User::class, 'author_id'); }
    public function reviewer() { return $this->belongsTo(User::class, 'review_by'); }
    public function reviewedBy() { return $this->belongsTo(User::class, 'reviewed_by'); }
    public function versions() { return $this->hasMany(ContentVersion::class)->orderBy('version_number', 'desc'); }

    public function createVersion() {
        $latestVersion = $this->versions()->first();
        $versionNumber = $latestVersion ? $latestVersion->version_number + 1 : 1;

        return $this->versions()->create([...$this->only([...$this->fillable, 'workflow_status', 'scheduled_for', 'review_by', 'reviewed_at', 'reviewed_by']), 'version_number' => $versionNumber]);
    }

    public function rollbackToVersion(ContentVersion $version) {
        $this->update([...$version->only([...$this->fillable])]);
        $this->createVersion();
        return $this;
    }

    protected function diffText($old, $new) {
        return $old === $new ? ['type' => 'unchanged', 'content' => $old] : ['type' => 'changed', 'old' => $old, 'new' => $new];
    }

    protected function diffHtml($old, $new) {
        return $old === $new ? ['type' => 'unchanged', 'content' => $old] : ['type' => 'changed', 'old' => $old, 'new' => $new];
    }

    public static function findCached($id) {
        return Cache::remember("content_{$id}", now()->addHours(24), fn () => static::find($id));
    }

    public function isDraft() { return $this->workflow_status === self::STATUS_DRAFT; }
    public function isInReview() { return $this->workflow_status === self::STATUS_REVIEW; }
    public function isApproved() { return $this->workflow_status === self::STATUS_APPROVED; }
    public function isPublished() { return $this->workflow_status === self::STATUS_PUBLISHED; }
    public function isScheduled() { return $this->workflow_status === self::STATUS_SCHEDULED; }

    public function submitForReview($reviewerId = null) {
        $this->workflow_status = self::STATUS_REVIEW;
        $this->review_by = $reviewerId;
        $this->save();
        return $this;
    }

    public function approve() {
        $this->workflow_status = self::STATUS_APPROVED;
        $this->reviewed_at = now();
        $this->reviewed_by = Auth::id();
        $this->save();
        Notification::send($this->author, new ContentStatusChanged($this, 'approved'));
        return $this;
    }

    public function reject() {
        $this->workflow_status = self::STATUS_REJECTED;
        $this->reviewed_at = now();
        $this->reviewed_by = Auth::id();
        $this->save();
        Notification::send($this->author, new ContentStatusChanged($this, 'rejected'));
        return $this;
    }

    public function publish() {
        $this->workflow_status = self::STATUS_PUBLISHED;
        $this->published_at = now();
        $this->save();
        Notification::send($this->author, new ContentStatusChanged($this, 'published'));
        return $this;
    }

    public function scheduleFor($dateTime) {
        $this->workflow_status = self::STATUS_SCHEDULED;
        $this->scheduled_for = $dateTime;
        $this->save();
        Notification::send($this->author, new ContentStatusChanged($this, 'scheduled'));
        return $this;
    }

    public function notifyStatusChange() {
        Notification::send($this->author, new ContentStatusChanged($this));
        if ($this->workflow_status === self::STATUS_REVIEW && $this->reviewer) {
            Notification::send($this->reviewer, new ContentStatusChanged($this));
        }
    }

    public function analytics() { return $this->hasMany(ContentAnalytics::class); }

    public function recordView($isUnique = false, $source = null, $deviceType = null, $country = null, $referrer = null) {
        return ContentAnalytics::recordView($this->id, $isUnique, $source, $deviceType, $country, $referrer);
    }

    public function recordInteraction($type, $value = 1) {
        return ContentAnalytics::recordInteraction($this->id, $type, $value);
    }

    public function updateAnalyticsMetrics($avgTimeOnPage = null, $bounceRate = null, $conversionRate = null) {
        return ContentAnalytics::updateMetrics($this->id, $avgTimeOnPage, $bounceRate, $conversionRate);
    }

    public function getViewsCount($startDate = null, $endDate = null) {
        $query = $this->analytics();
        if ($startDate) $query->where('date', '>=', $startDate);
        if ($endDate) $query->where('date', '<=', $endDate);
        return $query->sum('views');
    }

    public function getUniqueViewsCount($startDate = null, $endDate = null) {
        $query = $this->analytics();
        if ($startDate) $query->where('date', '>=', $startDate);
        if ($endDate) $query->where('date', '<=', $endDate);
        return $query->sum('unique_views');
    }

    public function contentBlocks() {
        return $this->morphToMany(ContentBlock::class, 'blockable')->using(Blockable::class)->withPivot('order', 'settings')->orderBy('order');
    }

    public function addBlock(ContentBlock $block, $order = null, $settings = []) {
        if ($order === null) $order = $this->contentBlocks()->count();
        $this->contentBlocks()->attach($block->id, ['order' => $order, 'settings' => $settings]);
        return $this;
    }

    public function removeBlock(ContentBlock $block) {
        $this->contentBlocks()->detach($block->id);
        $this->reorderBlocks();
        return $this;
    }

    public function reorderBlocks() {
        $blocks = $this->contentBlocks()->orderBy('order')->get();
        foreach ($blocks as $index => $block) {
            $this->contentBlocks()->updateExistingPivot($block->id, ['order' => $index]);
        }
        return $this;
    }

    public function renderBlocks() {
        return $this->contentBlocks->reduce(fn ($html, $block) => $html .= $block->render(), '');
    }
}
