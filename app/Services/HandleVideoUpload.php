<?php

namespace App\Services;

use App\Models\LearningMaterial;

class HandleVideoUpload
{
    public function uploadVideo($request, $lessonId, $instructor)
    {
        if ($request->hasFile('video')) {

            $video = $request->file('video');

            $filename = uniqid() . '_' . $video->getClientOriginalName();

            $path = $video->storeAs('videos', $filename, 'public');

            LearningMaterial::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'file_path' => $path,
                'type' => 'video',
                'lesson_id' => $lessonId,
                'instructor_id' => $instructor->id,
            ]);
        }
    }
}
