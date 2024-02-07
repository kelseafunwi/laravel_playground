<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function comments(): MorphToMany {
        return $this->morphToMany(Comment::class, 'commentable');
    }

//    public function podcasts(): BelongsToMany {
//        // this is going to make the intermediate table accessible with the term subscription
//        // and make the timestamps available with it as properties.
//        return $this->belongsToMany(Podcast::class)->as('subscription')->withTimestamps();
//    }

    public function podcasts() : BelongsToMany {
        return $this->belongsToMany(Podcast::class)->using(PodcastUser::class);
    }

    public function getExpiredPodcast(): BelongsToMany {
        return $this->belongsToMany(Podcast::class)->as('subscription')
                ->wherePivotNotNull('expired_at');
    }

    public function getActivePodcast():BelongsToMany {
        return $this->belongsToMany(Podcast::class)->as('subscription')
                ->wherePivot('active', 1);
    }

    // get the my priority podcast
    public function priorityPodcast(): BelongsToMany {
        return $this->belongsToMany(Podcast::class)->as('subscription')
            ->wherePivotIn('priority', [1, 2]);
    }

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }

}
