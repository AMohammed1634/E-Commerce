<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    protected $guarded = "";
    public function Category()
    {
        return $this->belongsTo("App\models\Category");
    }
}
