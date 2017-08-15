<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function Products(){
        return $this->belongsToMany('App\Product');
    }
}