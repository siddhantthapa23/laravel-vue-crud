<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name', 
        'address', 
        'website', 
        'email'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}