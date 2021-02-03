<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campu extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'campus_id');
    }
}
