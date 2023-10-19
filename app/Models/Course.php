<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'instructor_id'];

    /**
     * Get the instructor for the course.
     */
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    /**
     * Get the user for the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
