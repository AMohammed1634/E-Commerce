<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getProducts(Category $category)
    {
        $products = Product::where("QTY",">",0)->get();
        return view("user.category",compact('category'));
    }
    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back()->withErrors(["Item Deleted"]);
    }
    public function updateCategory(Category $category)
    {

        $isUpdate = true;
        return view ("admin.category",compact("category","isUpdate"));
    }
    public function createCategory()
    {
        return view("admin.category");
    }
    public function saveCategory(Request $request)
    {
        $result = $request->validate([
            'name'=>"required",
            'decription'=>'required',
            'image'=>'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->decription;

        if($request->hasFile('image')){
            $nameWithExt = $request->file('image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/category_images',$imgName);
            $category->img = $imgName;
            $category->save();
            return redirect()->route('dashboard');

        }

        //dd($request->all());
        return redirect()->back();
    }
    public function saveUpdateCategory(Request $request,Category $category)
    {
        $result = $request->validate([
            'name'=>"required",
            'decription'=>'required',
            'image'=>'required'
        ]);

        $category->name = $request->name;
        $category->description = $request->decription;

        if($request->hasFile('image')){
            $nameWithExt = $request->file('image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/category_images',$imgName);
            $category->img = $imgName;
            $category->save();
            return redirect()->route('dashboard');

        }

        //dd($request->all());
        return redirect()->back();
    }
}
