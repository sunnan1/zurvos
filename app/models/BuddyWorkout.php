<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BuddyWorkout extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class , 'customer_id' , 'id');
    }
}
