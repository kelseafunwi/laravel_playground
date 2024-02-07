<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Teacher extends Model
{
    use HasFactory;

    public function subjects(): MorphToMany {
        return $this->morphToMany(Subject::class, 'courseable');
    }

    public function comments(): MorphToMany {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
