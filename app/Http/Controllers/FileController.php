<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\LearningMaterial;
use App\Models\Lesson;

class FileController extends Controller
{
    public function download($id)
    {
        $material = LearningMaterial::findOrFail($id);

        $filePath = $material->file_path;

        $downloadPath = Storage::disk('public')->path($filePath);

        if (file_exists($downloadPath)) {
            return response()->download($downloadPath);
        }
        
        return response()->json(['error' => 'No files found for download'], 404);
    }
}
