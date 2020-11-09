<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getUserImageAttribute($value)
    {
        if($value != null)
        {
            return url('/public/userimage/'.$value);
        }
    }

}
