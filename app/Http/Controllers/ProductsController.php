<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function deleteProduct(Product $product)
    {

        $product->delete();
        return redirect()->back();
    }
    public function updateProduct(Product $product)
    {
        $isUpdate = true;
        return view("admin.product",compact('product','isUpdate'));
    }
    public function createProduct()
    {

        return view("admin.product");
    }
    public function saveProduct(Request $request)
    {
        //dd($request->all());
        $result = $request->validate([
            'name'=>"required",
            'description'=>'required',
            'price'=>'required',
            'discountted_price'=>'required',
            'img'=>'required',
            'category'=>'required',
            'QTY'=>'required',

        ]);
        //dd($request->name);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discounted_price = $request->discountted_price;
        $product->img = $request->img;
        $product->category_id = $request->category;
        $product->QTY = $request->QTY;
        $product->status = 0;

        if($request->hasFile('img')){
            $nameWithExt = $request->file('img')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('img')->storeAs('public/product_images',$imgName);
            $product->img = $imgName;
            $product->save();

            return redirect()->back();
        }

        return redirect()->route("dashboard_products");
    }
    public function saveUpdateProduct(Request $request,Product $product)
    {
        //dd($request->all());
        $result = $request->validate([
            'name'=>"required",
            'description'=>'required',
            'price'=>'required',
            'discountted_price'=>'required',
//            'img'=>'required',
            'category'=>'required',
            'QTY'=>'required',

        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discounted_price = $request->discountted_price;
//        $product->img = $request->img;
        $product->category_id = $request->category;
        $product->QTY = $request->QTY;
        $product->status = 0;
        if($request->hasFile('img')){
            $nameWithExt = $request->file('img')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('img')->storeAs('public/product_images',$imgName);
            $product->img = $imgName;
            $product->save();

            return redirect()->route("dashboard_products");
        }

        $product->save();

        return redirect()->route("dashboard_products");
    }


}
