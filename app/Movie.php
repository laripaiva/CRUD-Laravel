<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function users(){
        return $this->belongsToMany(User::class)->using(MovieUser::class)   ;  
    }
}
