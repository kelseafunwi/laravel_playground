<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Podcast extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $fillable = [
        'title'
    ];

    public function users(): BelongsToMany {
        // we pass to using() method our Pivot class which extends Pivot.
        return $this->belongsToMany(User::class)->using(PodcastUser::class);
    }

}
