<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class WorkoutVideos extends Model
{
    public function libs()
    {
        return $this->belongsTo(ExerciseLib::class , 'lab_id' , 'id');
    }
}
