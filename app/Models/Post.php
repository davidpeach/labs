<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;

    protected $fillable = [
        'wp_id',
        'category_id',
        'user_id',
        'title',
        'kind',
        'slug',
        'featured_image',
        'excerpt',
        'content',
        'format',
        'status',
        'published_at',
        'markdown',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public static function getTagClassName(): string
    {
        return Tag::class;
    }

    public function tags(): MorphToMany
    {
        return $this
            ->morphToMany(self::getTagClassName(), 'taggable', 'taggables', null, 'tag_id')
            ->orderBy('order_column');
    }

    public function permalink(): Attribute
    {
        $prefix = config('app.url').'/notes/';

        return Attribute::make(
            get: fn () => $prefix.($this->attributes['slug']),
        );
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (! is_null($post->attributes['markdown'])) {
                $post->attributes['content'] = Str::markdown($post->attributes['markdown']);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function markdown(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn () =>
    //     );
    // }

    public function featuredImage(): Attribute
    {
        $image = $this->media->firstWhere(fn (Media $item) => $item->getCustomProperty('is_featured'));

        return Attribute::make(
            get: fn () => $image?->preview_url ?? '',
        );
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
