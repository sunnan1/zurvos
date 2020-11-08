<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\models\WorkoutVideos;
class MyWorkout extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            $data=WorkoutVideos::where('workout_id',$this->id)->count();
        return [

            'id' => $this->id,

            'workout_title' => $this->workout_title ==null ? '0' : $this->workout_title,
            'total_videos' => $data,
        ];
    }
}
