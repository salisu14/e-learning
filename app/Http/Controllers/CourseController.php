<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Department;

use App\Enums\CourseStatusEnum;
use App\Enums\CourseTypeEnum;
use App\Enums\LevelEnum;
use App\Enums\SemesterEnum;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('status', 'active')->latest()->paginate(10);
        
        // $semesters = SemesterEnum::cases();

        return view('courses.index', \compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = CourseStatusEnum::cases();
        $types = CourseTypeEnum::cases();
        $levels = LevelEnum::cases();
        $semesters = SemesterEnum::cases();

        return view('courses.create', \compact([
            'semesters',
            'types',
            'levels',
            'statuses',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        $dept_id = Department::first()->id;

        $validated['department_id'] = $dept_id;   

        auth()->user()->courses()->create($validated);

        return redirect()->route('courses.index')->withSuccess('Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('enrollments');

        return view('courses.show', \compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $statuses = CourseStatusEnum::cases();
        $types = CourseTypeEnum::cases();
        $levels = LevelEnum::cases();
        $semesters = SemesterEnum::cases();

        return view('courses.edit', \compact([
            'course',
            'semesters',
            'types',
            'levels',
            'statuses',
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validated = $request->validated();

        $course->update($validated);

        // dd($validated, $course);

        return redirect()->route('courses.index')->withSuccess('Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->withSuccess('Course deleted successfully.');
    }
}
