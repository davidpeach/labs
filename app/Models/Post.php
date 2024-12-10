<?php

namespace App\Models;

use App\PostKind;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
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
            'kind' => PostKind::class,
            'published_at' => 'datetime',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->preventOverwrite()
            ->generateSlugsFrom(function ($model) {
                return $model->title ?? Str::of($model->markdown)->limit(50);
            })
            ->saveSlugsTo('slug');
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
        $prefix = config('app.url').'/'.$this->kind->getSlugPart().'/';

        return Attribute::make(
            get: fn () => $prefix.($this->attributes['slug']),
        );
    }

    public function featured(): Attribute
    {
        $firstImage = $this->getMedia('featured_images')->first();

        if (is_null($firstImage)) {
            $url = null;
        } else {
            $url = $firstImage->getUrl('square');
        }

        return Attribute::make(
            get: fn () => $url,
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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('square')
            ->crop(900, 900, CropPosition::Center)
            ->nonQueued();
    }

    public function featuredImage(): Attribute
    {
        $image = $this->media->firstWhere(fn (Media $item) => $item->getCustomProperty('is_featured'));

        return Attribute::make(
            get: fn () => $image?->preview_url ?? '',
        );
    }
}
