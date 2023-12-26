<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Session;
use App\Models\Student;

use App\Enums\LevelEnum;
use App\Enums\SemesterEnum;

class StudentEnrollmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function getCourses(Request $request)
    {
        $sessions = Session::all();

        return view('students.enrollment_form', compact('sessions'));
    }

    public function enrolledCourses(Request $request)
    {
        $session = Session::findOrFail($request->session);
        
        $semester = $request->semester;
        
        $student = \Auth::user()->student;

        $enrollments = $student->enrollments()->whereHas('course', function($query) use($semester) {
            $query->where('semester', $semester);
        })->get();

        return view('students.enrolled_courses', compact('enrollments'));
    }

    public function enrollmentForm(Student $student)
    {
        $courses = Course::latest()->get();
        
        $session = Session::where('is_active', true)->first();

        return view('students.course-enrollment-form', compact('student', 'session', 'courses'));
    }

    public function enroll(Request $request, Student $student)
    {
        try {
            $validated = $request->validate([
                'courses' => 'required|array'
            ]);
    
            $session = Session::where('is_active', true)->first();
            $enrollmentDate = now();
    
            foreach ($validated['courses'] as $courseId) {
                try {
                    Enrollment::create([
                        'session_id' => $session->id,
                        'student_id' => $student->id,
                        'enrollment_date' => $enrollmentDate,
                        'course_id' => $courseId,
                    ]);
                } catch (QueryException $e) {

                    dd($e->getMessage());

                        if ($e->getCode() === '23000') {
                        return redirect()->back()->with('error', 'An error occurred while enrolling courses.');
                    } else {
                        throw $e;
                    }
                }
            }
    
            return redirect()->back()->with('success', 'Courses enrolled successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while enrolling courses.');
        }
    }
}
