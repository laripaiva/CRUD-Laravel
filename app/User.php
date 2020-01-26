<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function movies(){
        return $this->belongsToMany(Movie::class)->using(MovieUser::class);  
    }
}
