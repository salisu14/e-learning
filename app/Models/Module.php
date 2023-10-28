<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'course_id', 'user_id'];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user for the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
