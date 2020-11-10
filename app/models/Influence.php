<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Influence extends Model
{
    protected $hidden = [
        'password', 'remember_token',
    ];
}
