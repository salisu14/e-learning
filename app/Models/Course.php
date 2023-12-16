<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'code', 'semester', 'department_id', 'status', 'type', 'level', 'unit'];

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    /**
     * Get the enrollments for the course.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    /**
     * Get the department for the course.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


    /**
     * Get the instructor for the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
