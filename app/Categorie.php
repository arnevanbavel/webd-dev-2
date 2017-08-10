<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function Products()
    {
        return $this->hasMany('App\Product');
    }
}
