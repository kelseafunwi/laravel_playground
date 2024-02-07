<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'something'
    ];

    public function teachers() {
        return $this->morphedByMany(Teacher::class, 'courseable');
    }

    public function students() {
        return $this->morphedByMany(Student::class, 'courseable');
    }
}
