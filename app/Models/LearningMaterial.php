<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningMaterial extends Model
{
    use HasFactory;

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
