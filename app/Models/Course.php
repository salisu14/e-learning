<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'instructor_id'];

    /**
     * Get the instructor for the course.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

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
