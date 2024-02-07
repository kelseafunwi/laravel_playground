<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subjects(): MorphToMany {
        return $this->morphToMany(Subject::class, 'courseable');
    }

    public function comments(): MorphToMany {
        // means that the student is connected to the comments table via the commentable method on
        // the comment table.
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
