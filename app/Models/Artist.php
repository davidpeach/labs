<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Artist extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'mbid',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Crop, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('artist_avatar')
            ->singleFile();
    }

    public function avatar(): Attribute
    {
        $avatar = $this->getMedia('artist_avatar')->first();

        if (is_null($avatar)) {
            $url = 'https://placekitten.com/g/200/200';
        } else {
            $url = $avatar->getUrl('preview');
        }

        return Attribute::make(
            get: fn () => $url,
        );
    }

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Song::class,
            table: 'artist_credit',
        )->using(ArtistCredit::class);
    }
}
