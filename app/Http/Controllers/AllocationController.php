<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAllocationRequest;
use App\Http\Requests\UpdateAllocationRequest;
use App\Models\Allocation;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Session;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allocations = Allocation::latest()->paginate(10);

        return view('allocations.index', compact('allocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::latest()->get();

        $instructors = Instructor::latest()->get();
        
        $sessions = Session::latest()->get();

        return view('allocations.create', compact('courses', 'instructors', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAllocationRequest $request)
    {
        $validated = $request->validated();

        Allocation::create($validated);

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
