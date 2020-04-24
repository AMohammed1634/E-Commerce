<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Interval;

class AdminController extends Controller
{
    //
    public function dashboard(){

        $categories = Category::where("id",">=",0)->paginate(3);
        $date = new \DateTime();
        return view("admin.dashboard",compact("categories","date"));
    }
    public function dashboard_products()
    {
        $products = Product::where("status","=",0)->paginate(6);
//        dd($products);
        return view("admin.dashboard",compact("products"));
    }
    public function dashboard_products_one(Category $category)
    {
        $products = Product::where("category_id","=",$category->id)->paginate(6);
//        dd($products);
        $categoryOne = Product::where("category_id","=",$category->id)->paginate(6);
//        return $category->Products;
        return view("admin.dashboard",compact("categoryOne"));
    }
    public function statistics(){
//        $newUsers = User::where("")
        //select the latest regigstered in last day
        $date = new \DateTime();
        $interval  = date_interval_create_from_date_string("0000-00-10");
        $interval->h = 24;
        $date->sub($interval);
        $newUsers = User::where("created_at",">",$date)->paginate(4);
        $currentData = new  \DateTime();
        $products = Product::where("QTY","<=",5)->get();
        return view("admin.statistics",[
            "newUsers" =>$newUsers,
            "currentData" =>$currentData,
            "products" => $products,

        ]);
    }
    public function permission(User $user,$num){

        $user->isAdmin = $num;
        $user->save();
        return redirect()->back();
    }

    public function statisticsProducts(){
        $products = Product::where("QTY","<=",5)->paginate(4);
        return view("admin.statisticsProducts",
        [
            "products" => $products,
        ]
        );
    }
}
