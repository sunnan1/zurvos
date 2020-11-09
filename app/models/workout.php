<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class workout extends Model
{
    protected $guarded = [];
    protected $table = 'workouts';
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(Customer::class , 'customer_id' , 'id');
    }

    public function buddyworkout()
    {
        return $this->hasMany(BuddyWorkout::class , 'workout_id' , 'id');
    }

    public function videos()
    {
        return $this->hasMany(WorkoutVideos::class , 'workout_id' , 'id');
    }
}
