<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Instructor;
use App\Models\Course;
use App\Models\Module;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::latest()->paginate(10);

        return view('modules.index', \compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::latest()->get();
        $courses = Course::latest()->get();

        return view('modules.create', \compact('instructors', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuleRequest $request)
    {
        $validated = $request->validated();

        // dd($validated);

        auth()->user()->modules()->create($validated);

        return redirect()->route('modules.index')->withSuccess('Module created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        $module->load('enrollments');

        return view('modules.show', \compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        $courses = Course::latest()->get();

        return view('modules.edit', \compact('module', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        $validated = $request->validated();

        $module->update($validated);

        return redirect()->route('modules.index')->withSuccess('Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')->withSuccess('Module deleted successfully.');
    }
}
