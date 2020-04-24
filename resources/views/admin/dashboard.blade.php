@extends("admin.app")

<style>
    .ASD{
        display: inline-block;
        padding: 5px 15px;
    }

     li.active .page-link{
         background-color: #BBE432;
         border-color: #BBE432;
     }
    .page-item .page-link {
        color:#34ce57;
    }

</style>
{{--@section("content")--}}
{{--<div class="container" style="color: #000000; text-align: center;background-color: #1d68a7;padding: 10px">--}}
{{--    <h3 style="color: #ffffff">Admin Dashboard</h3>--}}
{{--</div>--}}
{{--<nav class="navbar navbar-laravel" role="navigation" style="background-color: #2a2a2a;color: #ffffff">--}}

{{--    <div class="container-fluid">--}}
{{--        <div class="header_nav">--}}
{{--            <a href="{{route("home")}}" style="color: #ffffff" class="navbar-brand">ACommerce</a>--}}
{{--        </div>--}}
{{--        <div style="display: inline-block; float: left;margin: auto">--}}
{{--            <ul >--}}
{{--                <li class="ASD" id="orders-header"><a href="{{route('dashboard')}}">Categories</a></li>--}}
{{--                <li class="ASD" id="shopping-carts-header"><a href="{{route("dashboard_products")}}">Products</a></li>--}}
{{--                <li class="ASD"><a href="#">Statistics</a></li>--}}

{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</nav>--}}
{{--@endsection--}}
@section("boxes")
    <div class="container" style="color: #000000; ">

        @isset($categories)
            <div>
                <h4 style="text-align: center;margin: 20px"> Categories</h4>
                <div class="create" style="padding: 15px">
                    <a href="{{route("createCategory")}}" class="btn btn-success" >Create Category</a>

                </div>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12" style="width: 100%">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="color: #000000">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-6">

                                            </div>
                                            <div class="col-sm-6"></div>
                                        </div>
                                        <div class="row" style="width: 90%">
                                            <div class="col-sm-12" style="color: #000000;width:100%">
                                                <table id="example2" style="color: #000000" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                                            ID
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                            Name
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            Description
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            action
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            Image
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            Last Updated
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($categories as $category)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{$category->id}}</td>
                                                            <td class="">
                                                                <a href="{{route("dashboard_products_one",$category->id)}}">
                                                                    {{$category->name}}
                                                                </a>
                                                            </td>
                                                            <td style="width: 20%">{{$category->description}}</td>
                                                            <td>
                                                                <a href="{{route("deleteCategory",$category->id)}}" class="btn btn-danger">Delete</a><br><br>
                                                                <a href="{{route("updateCategory",$category->id)}}" class="btn btn-primary">Update</a>
                                                            </td>
                                                            <td style="width: 30%">
                                                                <img style="width: 100%"
                                                                    src="/storage/category_images/{{$category->img}}">
                                                            </td>
                                                            <?php
                                                            $date2 = new DateTime("$category->updated_at");
                                                            $diff =$date->diff($date2);
                                                            ?>
                                                            <td>
                                                                @if($diff->y == 0 && $diff->m ==0 && $diff->d == 0)
                                                                    since {{$diff->h .":".$diff->i.":".$diff->s}} hour/s
                                                                @else
                                                                    since {{$diff->d+ ($diff->m * 30)+($diff->y * 365*30) }} day/s
                                                                @endif
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>

                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                                            ID
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                            Name
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            Description
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            action
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            Image
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                            Last Updated
                                                        </th>
                                                    </tr>
                                                    </tfoot>

                                                </table>
                                            </div>
                                        </div>
                                        <style>
                                            .page-item.active .page-link{
                                                background-color: #BBE432;
                                                border-color: #BBE432;
                                            }
                                            .page-item .page-link {
                                                color:#34ce57;
                                            }
                                        </style>
                                        <div class="pagination-My" style="margin: 15px 35px;float: right">
                                             <span class="pagination" >

                                                {{$categories->links()}}
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">

                                            </div>
                                            <div class="col-sm-7">
                                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
        @endisset

        @isset($categoryOne)
                <h3 style="padding: 15px;text-align: center">Products category {{$categoryOne[0]->Category->name}}</h3>
                <div style=" padding: 15px 100px 0px">
                    <a href="{{route("createProduct")}}" class="btn btn-success">Create New Product </a>
                </div>
                <div class="products">

                    <div class="section_container">

                        <div class="container">
                            <div style="margin:15px">
                                <style>
                                    .page-item.active .page-link{
                                        background-color: #BBE432;
                                        border-color: #BBE432;
                                    }
                                    .page-item .page-link {
                                        color:#34ce57;
                                    }
                                </style>
                                {{$categoryOne->links()}}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="products_container grid" style="position: relative; height: 1914.05px;">


                                    @foreach($categoryOne as $product)
                                        <!-- Product -->
                                            <div class="product grid-item hot " style="position: absolute; left: 0%; top: 0px;">
                                                <div class="product_inner">
                                                    <div class="product_image">
                                                        <img src="/storage/product_images/{{$product->img}}" alt=""
                                                             style="width: 272.66px;height: 371.02px">
                                                        @if($product->discounted_price != 0)
                                                            <div class="product_tag">hot</div>
                                                        @endif
                                                    </div>
                                                    <div class="product_content text-center">
                                                        <div class="product_title"><a href="/product.html">{{$product->name}}</a></div>
                                                        <div class="product_content"><a >Quantity {{$product->QTY}} </a></div>
                                                        <div class="product_categories"><a >Category {{$product->Category->name}} </a></div>
                                                        @if($product->discounted_price == 0)
                                                            <div class="product_price">${{$product->price}}</div>
                                                        @else
                                                            <div class="product_price">${{$product->discounted_price}}</div>
                                                            <div class="product_price_offer">${{$product->price}}</div>
                                                        @endif
                                                        <div class="product_button ml-auto mr-auto trans_200">
                                                            <a href="{{route("updateProduct",$product->id)}}">Update</a>
                                                        </div>
                                                        <div class="product_button ml-auto mr-auto trans_200">
                                                            <a href="{{route("deleteProduct",$product->id)}}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endisset

        @isset($products)
                <h3 style="padding: 15px;text-align: center">All Products</h3>
                <div style=" padding: 15px 100px 0px">
                    <a href="{{route('createProduct')}}" class="btn btn-success">Create New Product </a>
                </div>
                <div class="products">

                    <div class="section_container">

                        <div class="container">
                            <div style="margin:15px">
                                <style>
                                    .page-item.active .page-link{
                                        background-color: #BBE432;
                                        border-color: #BBE432;
                                    }
                                    .page-item .page-link {
                                        color:#34ce57;
                                    }
                                </style>
                                {{$products->links()}}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="products_container grid" style="position: relative; height: 1914.05px;">


                                    @foreach($products as $product)
                                        <!-- Product -->
                                            <div class="product grid-item hot " style="position: absolute; left: 0%; top: 0px;">
                                                <div class="product_inner">
                                                    <div class="product_image">
                                                        <img src="/storage/product_images/{{$product->img}}" alt=""
                                                             style="width: 272.66px;height: 371.02px">
                                                        @if($product->discounted_price != 0)
                                                            <div class="product_tag">hot</div>
                                                        @endif
                                                    </div>
                                                    <div class="product_content text-center">
                                                        <div class="product_title"><a href="/product.html">{{$product->name}}</a></div>
                                                        <div class="product_content"><a >Quantity {{$product->QTY}} </a></div>
                                                        <div class="product_categories"><a >Category {{$product->Category->name}} </a></div>
                                                        @if($product->discounted_price == 0)
                                                            <div class="product_price">${{$product->price}}</div>
                                                        @else
                                                            <div class="product_price">${{$product->discounted_price}}</div>
                                                            <div class="product_price_offer">${{$product->price}}</div>
                                                        @endif
                                                        <div class="product_button ml-auto mr-auto trans_200">
                                                            <a href="{{route("updateProduct",$product->id)}}">Update</a>
                                                        </div>
                                                        <div class="product_button ml-auto mr-auto trans_200">
                                                            <a href="{{route("deleteProduct",$product->id)}}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endisset
    </div>
@endsection
