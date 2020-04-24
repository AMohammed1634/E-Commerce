<?php

namespace App\Http\Controllers;

use App\models\Product;
use App\models\ShoppingCart;
use App\User;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //
    public function addToCart(Product $product,int $QTY)
    {
        if(!auth()->check())
        {
            return redirect()->route('login');
        }

        $found = ShoppingCart::where([
            ["products_id" , "=" , $product->id],
            ["users_id" , "=" , auth()->user()->id],
            ["ordered","=",-1]

        ])->get()->count();
        if($found!= 0)
        {
            return redirect()->back()->withErrors("This is Alredy in bag");
        }
        $cart = new ShoppingCart();
        $cart->quantity = $QTY;
        $cart->products_id = $product->id;
        $cart->users_id = auth()->user()->id;
        $cart->save();
        $product->QTY -= $QTY;
        $product->save();

        return redirect()->back()->withMessage("Message");
    }
    public function deleteCart(ShoppingCart $cart)
    {
        $cart->delete();
        return redirect()->back()->withMessage("Cart Deleted Successfulle");
    }
    public function updateQTY(ShoppingCart $cart,  $QTY){
//        return "A7A";
////        $cart = ShoppingCart::find($cart->id);
//        return "ASD";
//
        if($QTY <= 0){
            $QTY = 1;
        }
        $cart->quantity = $QTY;
        $cart->save();

        return json_encode([
            "message" => "Addes Success",
            "reponse_code" => "120"
        ]);
    }
    public function addToCartAPI(Product $product,$QTY){
        $found = ShoppingCart::where([
            ["products_id" , "=" , $product->id],
            ["users_id" , "=" , auth()->user()->id],
            ["ordered","=",-1]

        ])->get()->count();
        if($found!= 0)
        {
            return json_encode([
                "message" => "The Item Is Alredy In Cart",
                "respose_code" => 777,

            ]);
        }
        $cart = new ShoppingCart();
        $cart->quantity = $QTY;
        $cart->products_id = $product->id;
        $cart->users_id = auth()->user()->id;
        $cart->save();
        $product->QTY -= $QTY;
        $product->save();


        $count = ShoppingCart::where([

            ["users_id" , "=" , auth()->user()->id],
            ["ordered","=",-1]

        ])->get()->count();
        return json_encode([
            "message" => "The Item Added Successflly",
            "respose_code" => 888,
            "newQTY" =>$count
        ]);
    }
}
