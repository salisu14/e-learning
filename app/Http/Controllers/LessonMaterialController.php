<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Student;
use App\Models\LearningMaterial;

class LessonMaterialController extends Controller
{
    public function studentCourseLesson(Course $course)
    {
        // dd($course->lessons);

        return view('students.student-course-lessons', compact('course'));
    }

    public function courseLearningMaterials(Course $course)
    {

        dd($course->lessons);

        $material = LearningMaterial::findOrFail($materialId);

        $student = auth()->user()->student;

        dd($material, $student);

        if (!$student->isEnrolledIn($material->course_id)) {
            abort(403, 'Unauthorized action.');
        }

        // Perform additional checks as needed, e.g., file existence, permissions, etc.
        $filePath = $material->file_path;

        $downloadPath = Storage::disk('public')->path($filePath);

        if (file_exists($downloadPath)) {
            return response()->download($downloadPath);
        }
        
        return response()->json(['error' => 'No files found for download'], 404);

        // // Return the file for download
        // return response()->download(storage_path("app/{$material->file_path}"), $material->file_name);
    }
}
