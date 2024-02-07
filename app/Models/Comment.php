<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'commentable_id',
        'commentable_type',
    ];

   public function commentable(): MorphTo {
       // setting up up commentable on the table itself.
       // this method tells laravel that there is a commentable_id and commentable_type in the comments table.
       return $this->morphTo();
   }


   public function users() {
       return $this->morphedByMany(User::class, 'commentable');
   }
}
