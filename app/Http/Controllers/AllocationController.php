<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAllocationRequest;
use App\Http\Requests\UpdateAllocationRequest;
use App\Models\Allocation;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Session;
use App\Models\User;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch allocations with related models
        $allocations = Allocation::with(['course', 'session', 'instructor.user'])
            ->orderBy('session_id')
            ->paginate(10);

        return view('allocations.index', compact('allocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::latest()->get();

        // $instructors = User::whereHas('instructor')->get();
        $instructors = User::role('instructor')->get();
        
        $session = Session::where('is_active', true)->first();

        if (!$session) {
            $session =  Session::latest()->first();
        }

        return view('allocations.create', compact('courses', 'instructors', 'session'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAllocationRequest $request)
    {
        $validated = $request->validated();

        $user = User::findOrFail($request->instructor_id);

        $instructor = $user->instructor;

        $courseIds = $request->input('courses', []);

        foreach ($courseIds as $courseId) {
            $instructor->allocations()->create([
                'course_id' => $courseId,
                'session_id' => $validated['session_id'],
            ]);
        }

        return redirect()->route('allocations.index')->withSuccess('Allocation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Allocation $allocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Allocation $allocation)
    {
        $courses = Course::latest()->get();

        $instructors = Instructor::latest()->get();

        $sessions = Session::latest()->get();

        return view('allocations.edit', compact('allocation','courses', 'instructors', 'sessions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAllocationRequest $request, Allocation $allocation)
    {
        $validated = $request->validated();

        $allocation->update($validated);

        return redirect()->route('allocations.index')->withSuccess('Allocation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allocation $allocation)
    {
        $allocation->delete();

        return redirect()->route('allocations.index')->withSuccess('Allocation deleted successfully.');
    }
}
