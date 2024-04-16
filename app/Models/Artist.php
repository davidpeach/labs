<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mbid',
    ];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Song::class,
            table: 'artist_credit',
        )->using(ArtistCredit::class);
    }
}
