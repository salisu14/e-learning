<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'code', 'semester', 'department_id', 'status', 'type', 'level', 'unit'];

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
    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    /**
     * Get the user for the course.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
