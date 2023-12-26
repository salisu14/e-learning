<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['enrollment_date','course_id', 'session_id', 'student_id'];

    /**
     * Get the course for the enrollment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the user for the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
