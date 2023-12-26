<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'allocation_id'];

    public function allocation()
    {
        return $this->belongsTo(Allocation::class);
    }

    public function learningMaterials()
    {
        return $this->hasMany(LearningMaterial::class);
    }
}
