<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\ShoppingCart;
use App\User;
//use http\Env\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function editProfile(){
        return view("user.editProfile");
    }
    public function index(){
        //dd(Category::first()->products[0]->category);
        $categories = Category::all();
//        dd($categories[0]->Products->last()->id);
        return view("user.home",[
            "categories" => $categories
        ]);
    }
    public function userHistory(User $user)
    {
        $shoppingCarts = true;
//        $carts = $user->carts->where("orderd","<>",-1)->paginate(4);
        $carts = ShoppingCart::where([
            ["ordered","=",-1],
            ["users_id","=",auth()->user()->id]

        ])->paginate(4);
        //dd($carts);
        return view("user.history",compact("user","shoppingCarts"),[
            "carts"=>$carts
        ]);
    }
    public function userHistoryOrders(User $user)
    {
        $orders = true;
        return view("user.history",compact("user","orders"));

    }
    public function changeImage(Request $request){
        $user = User::find(auth()->user()->id);
        if($request->hasFile('img')){
            $nameWithExt = $request->file('img')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('img')->storeAs('public/profile_images',$imgName);
            $user->img = $imgName;
            $user->save();

            return redirect()->back();
        }
    }
    public function deleteImage(){
        $user = User::find(auth()->user()->id);
        $user->img = "noImage.jpg";
        $user->save();
        return redirect()->back();
    }
    public function updateProfile(Request $request){
        $result = $request->validate([
            'name'=>"required",
            'email'=>'required|email',


        ]);
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route("userHistory",auth()->user()->id);
    }
}
