<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get("/","Controller@index");



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get("/home","Controller@index")->name("home");
Route::get("/category/{category}","CategoryController@getProducts")->name("category");
Route::get("/addToCart/{product}/{QTY}","ShoppingCartController@addToCart")->name("addToCart")->middleware("auth");
Route::get("/api/addToCart/{product}/{QTY}","ShoppingCartController@addToCartAPI")->name("addToCartAPI")->middleware("auth");

Route::get("/addToCart/{cart}/{QTY}/updateQTY","ShoppingCartController@updateQTY")->name("updateQTY")->middleware("auth");


Route::get("/user/history/{user}","Controller@userHistory")->name("userHistory")->middleware("auth");
Route::get("/user/history/{user}/orders","Controller@userHistoryOrders")->name("userHistoryOrders")->middleware("auth");

Route::get("/user/history/deleteCart/{cart}","ShoppingCartController@deleteCart")->name("deleteCart")->middleware("auth");
Route::get("/user/history/order/asd","OrdersController@showOrder")->name("order")->middleware("auth");
Route::get("/ASD/ASD/ASD",function (){

    return"sdvcd";
});
Route::get("/user/makeOrder","OrdersController@makeOrder")->name("makeOrder")->middleware("auth");

Route::get("/user/edit-profile","Controller@editProfile")->name("editProfile")->middleware("auth");
Route::post("/user/edit-profile/change-image","Controller@changeImage")->name("changeImage")->middleware("auth");
Route::post("/user/edit-profile/update-profile","Controller@updateProfile")->name("updateProfile")->middleware("auth");
Route::get("/user/edit-profile/delete-image","Controller@deleteImage")->name("deleteImage")->middleware("auth");
//Route::get("/user/history/showOrder","OrdersController@showOrder")->name("showOrder")->middleware("auth");
//admin routes


Route::get("/admin/dashboard","AdminController@dashboard")->name("dashboard")->middleware("admin");

Route::get("/admin/category/{category}/delete","CategoryController@deleteCategory")->name("deleteCategory")->middleware("admin");
Route::get("/admin/category/{category}/update","CategoryController@updateCategory")->name("updateCategory")->middleware("admin");
Route::post("/admin/category/{category}/update","CategoryController@saveUpdateCategory")->name("saveUpdateCategory")->middleware("admin");
Route::get("/admin/category/create","CategoryController@createCategory")->name("createCategory")->middleware("admin");
Route::post("/admin/category/create","CategoryController@saveCategory")->name("saveCategory")->middleware("admin");


Route::get("/admin/dashboard/products","AdminController@dashboard_products")->name("dashboard_products")->middleware("admin");
Route::get("/admin/dashboard/products/{category}","AdminController@dashboard_products_one")->name("dashboard_products_one")->middleware("admin");


Route::get("/admin/product/{product}/delete","ProductsController@deleteProduct")->name("deleteProduct")->middleware("admin");
Route::get("/admin/product/{product}/update","ProductsController@updateProduct")->name("updateProduct")->middleware("admin");
Route::post("/admin/product/{product}/update","ProductsController@saveUpdateProduct")->name("saveUpdateProduct")->middleware("admin");
Route::get("/admin/product/create","ProductsController@createProduct")->name("createProduct")->middleware("admin");
Route::post("/admin/product/create","ProductsController@saveProduct")->name("saveProduct")->middleware("admin");

Route::get("/admin/statistics","AdminController@statistics")->name("statistics")->middleware("admin");
Route::get("/admin/statistics/products","AdminController@statisticsProducts")->name("statisticsProducts")->middleware("admin");

Route::get("/admin/statistics/permission/{user}/{num}","AdminController@permission")->name("permission")->middleware("admin");

//testing
Route::get("/asd/asd",function (){

    $date = new DateTime();
    $date2 = new DateTime("2020-04-16 21:01:33");
    $result = ($date->diff($date2));
    var_dump($result);
});
