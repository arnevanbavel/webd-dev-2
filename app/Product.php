<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function Colors(){
        return $this->belongsToMany('App\Color');
    }

    public function Tag(){
        return $this->belongsTo('App\Tag');
    }

    public function Photos(){
        return $this->hasMany('App\Photo');
    }

    public function getRouteKeyName()
    {
        return 'link';
    }


}
