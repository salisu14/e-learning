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
        $user_id = \Auth::user()->id;

        // Retrieve the user's enrollments with courses and additional details
        $enrollments = Enrollment::whereHas('course', function($query) use($semester) {
            $query->where('semester', $semester);
        })->where('user_id', auth()->id())
        ->get();

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
            $studentId = auth()->id();
            $enrollmentDate = now();
    
            foreach ($validated['courses'] as $courseId) {
                // Attempt to create an enrollment, handle duplicate entry error
                try {
                    Enrollment::create([
                        'session_id' => $session->id,
                        'user_id' => $studentId,
                        'enrollment_date' => $enrollmentDate,
                        'course_id' => $courseId,
                    ]);
                } catch (QueryException $e) {
                    // Handle duplicate entry error (code 23000)
                    if ($e->getCode() === '23000') {
                        // Handle the fact that the student is already enrolled in this course
                        return redirect()->back()->with('error', 'An error occurred while enrolling courses.');
                    } else {
                        // Rethrow the exception if it's not a duplicate entry error
                        throw $e;
                    }
                }
            }
    
            // Handle successful enrollment, e.g., redirect back with a success message
            return redirect()->back()->with('success', 'Courses enrolled successfully.');
        } catch (\Exception $e) {
            // Handle other exceptions if necessary
            return redirect()->back()->with('error', 'An error occurred while enrolling courses.');
        }

        // return back()->with('success', 'Enrolled successfully');
    }
}
