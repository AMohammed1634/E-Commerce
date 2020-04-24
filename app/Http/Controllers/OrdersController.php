<?php

namespace App\Http\Controllers;

use App\models\Orders;
use App\models\ShoppingCart;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function showOrder()
    {


        return view("user.order");
    }
    public function makeOrder(){
        //dd("ASD");
        $order = new Orders();
        $order->shopping_id = time();
        $order->users_id = auth()->user()->id;
        $order->total_amount = 0.0;
        $order->save();
        $carts = ShoppingCart::where([
            ["users_id","=",auth()->user()->id],
            ["ordered","=",-1],
        ])->get();
        $total = 0;
        foreach($carts as $cart)
        {
            $cart->ordered = 1;
            $cart->orders_id = $order->id;
            $cart->save();
            if($cart->product->discounted_price ==0 )
            {
                $total += $cart->product->price * $cart->quantity;
            }
            else {
                $total += $cart->product->discounted_price * $cart->quantity;
            }
        }
        $order->total_amount = $total;
        $order->save();
        return redirect()->route("home");
    }
}
