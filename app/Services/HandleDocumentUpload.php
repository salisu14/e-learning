<?php

namespace App\Services;

use App\Models\LearningMaterial;

class HandleDocumentUpload
{
    public function uploadDocument($request, $lessonId, $instructor)
    {
        // Process and store document files
        if ($request->hasFile('document')) {

            $file = $request->file('document');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            
            $path = $file->storeAs('documents', $filename, 'public');

            LearningMaterial::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'file_path' => $path,
                'type' => 'file',
                'lesson_id' => $lessonId,
                'instructor_id' => $instructor->id,
            ]);
        }
    }
}

