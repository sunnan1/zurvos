<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\models\ExerciseLib;

use App\Http\Resources\libResource;
class workoutsindle extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $work=ExerciseLib::where('tags',$this->goal)->orWhere('video_level',$this->workout_level)->get();
        return [

            'id' =>$this->id,
            'message' => 'Workut added Successfully','status' =>'success',
            'videos'=>libResource::collection($work),
        ];
    }
}
