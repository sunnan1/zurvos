<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExerciseLib extends Model
{

    public function getVideoNameAttribute($value)
    {
        return url('/public/lib_videos/' . $value);
    }
}
