<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PodcastUser extends Pivot
{
    use HasFactory;

    protected $table = 'podcast_user';

    protected $fillable = [
        'podcast_id',
        'user_id',
        'active',
        'priority',
    ];
}
