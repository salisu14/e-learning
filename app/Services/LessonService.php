<?php

namespace App\Services;

use Illuminate\Http\Request;

class LessonService
{
    public function createLessonAndLearningMaterials(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'file_path' => 'required|string',
            'type' => 'required|in:video,file',
            'lesson_id' => 'required|exists:lessons,id',
            'instructor_id' => 'required|exists:instructors,id',
            'files.*' => 'mimes:doc,docx,ppt,pptx,pdf', // Allow multiple document uploads
            'videos.*' => 'mimes:mp4,mov,avi,wmv', // Allow multiple video uploads
        ]);

        // Process and store document files
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Define logic for handling document uploads (e.g., storing in 'files' disk)
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('files', $filename, 'files');

                // Save the file path to the database, associate with user, etc.
                // For example, assuming 'file_path' is the database field for storing the file path
                LearningMaterial::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'file_path' => $path,
                    'type' => 'file',
                    'lesson_id' => $request->input('lesson_id'),
                    'instructor_id' => $request->input('instructor_id'),
                ]);
            }
        }

        // Process and store video files
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                // Define logic for handling video uploads (e.g., storing in 'videos' disk)
                $filename = uniqid() . '_' . $video->getClientOriginalName();
                $path = $video->storeAs('videos', $filename, 'videos');

                // Save the file path to the database, associate with user, etc.
                // For example, assuming 'file_path' is the database field for storing the file path
                LearningMaterial::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'file_path' => $path,
                    'type' => 'video',
                    'lesson_id' => $request->input('lesson_id'),
                    'instructor_id' => $request->input('instructor_id'),
                ]);
            }
        }

        return redirect()->route('learning-materials.index')
            ->with('success', 'Learning materials created successfully.');
    }
}