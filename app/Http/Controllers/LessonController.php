<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

use App\Models\Allocation;
use App\Models\Course;
use App\Models\Lesson;

use App\Services\LessonService;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::latest()->paginate(10);

        return view('lessons.index', \compact('lessons'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($allocation)
    {
        return view('lessons.create', \compact('allocation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request, $allocationId)
    {
        $validated = $request->validated();

        $validated['allocation_id'] = $allocationId;

        Lesson::create($validated);

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show', \compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $lesson = Lesson::latest()->get();

        return view('lessons.edit', \compact('lesson', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $validated = $request->validated();

        $course->update($validated);

        return redirect()->route('lessons.index')->withSuccess('Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $course->delete();

        return redirect()->route('lessons.index')->withSuccess('Lesson deleted successfully.');
    }
}
