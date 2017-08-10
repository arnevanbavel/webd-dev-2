<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function Products(){
        return $this->belongsToMany('App\Product');
    }
}
