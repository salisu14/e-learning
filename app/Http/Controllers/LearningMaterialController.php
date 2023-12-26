<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLearningMaterialRequest;
use App\Http\Requests\UpdateLearningMaterialRequest;
use App\Models\LearningMaterial;

use App\Services\LessonService;

class LearningMaterialController extends Controller
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
        $instructor = auth()->user()->instructor;

        $learningMaterials = $instructor->learningMaterials()->paginate(10);

        return view('learning-materials.index', compact('learningMaterials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lessonId)
    {
        // dd($lessonId);

        return view('learning-materials.create',compact('lessonId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLearningMaterialRequest $request, $lessonId)
    {
        $this->lessonService->createdLearningMaterials($request, $lessonId);
    
        return redirect()->route('learning-materials.index')->with('success', 'Learning material created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LearningMaterial $learningMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LearningMaterial $learningMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearningMaterialRequest $request, LearningMaterial $learningMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningMaterial $learningMaterial)
    {
        //
    }
}
