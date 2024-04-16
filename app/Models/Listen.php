<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listen extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
        'started_at',
    ];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }
}
