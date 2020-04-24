<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //

    protected $guarded = "";
    public function product(){
        return $this->belongsTo("App\models\Product","products_id");
    }
}
