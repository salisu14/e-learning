<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'instructor_id', 'session_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the instructors for the user.
     */
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
