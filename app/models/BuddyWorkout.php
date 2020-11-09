<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BuddyWorkout extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class , 'customer_id' , 'id');
    }

    public function workouts()
    {
        return $this->belongsTo(workout::class , 'workout_id' , 'id');
    }

    public function buddy()
    {
        return $this->belongsTo(Customer::class , 'buddy_id' , 'id');
    }
}
