<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotegory extends Model
{
    function posts(){
        return $this->hasMany(Post::class,'id');

    }
}
