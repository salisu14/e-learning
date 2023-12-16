<?php

namespace App\Policies;

use App\Models\User;

class LearningMaterialPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(Instructor $instructor)
    {
        return true;
    }

    public function update(Instructor $instructor, LearningMaterial $learningMaterial)
    {
        return $instructor->id === $learningMaterial->instructor_id;
    }

    public function delete(Instructor $instructor, LearningMaterial $learningMaterial)
    {
        return $instructor->id === $learningMaterial->instructor_id;
    }

}
