<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use App\Models\LearningMaterial;

class LessonService
{
    protected $handleDocumentUpload;
    protected $handleVideoUpload;

    public function __construct(HandleDocumentUpload $handleDocumentUpload, HandleVideoUpload $handleVideoUpload)
    {
        $this->handleDocumentUpload = $handleDocumentUpload;
        $this->handleVideoUpload = $handleVideoUpload;
    }

    public function createdLearningMaterials($request, $lessonId): bool
    {
        $user = \Auth::user();

        $instructor = $user->instructor;

        DB::transaction(function () use ($request, $instructor, $lessonId) {

            $this->handleDocumentUpload->uploadDocument($request, $lessonId, $instructor);

            $this->handleVideoUpload->uploadVideo($request, $lessonId, $instructor);
        });

        return true;
    }
}
