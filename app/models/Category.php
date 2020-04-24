<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function Products(){
        return $this->hasMany('App\models\Product',"category_id","id");
    }
}
