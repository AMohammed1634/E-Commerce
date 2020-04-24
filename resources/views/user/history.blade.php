@extends("user.app")

<style>
    .center{
        width: 150px;
        margin: 10px auto;

    }
</style>
@section("content")

    <div class="" style="background-image: url('/images/home_slider_1.jpg');height: 500px;background-size: cover">

        <div style="height: 75px;width: 100%;position: relative;top: 100px;left: 0px;font-size: 60px;color: #BBE432;
                font-family: 'Poppins', sans-serif ; text-align: center" >
            A-Commerce<br>
            {{ $user->name }} History
        </div>
        {{--$categoryies--}}


    </div>
@endsection
@section("boxes")
<style>
    .ASD{
        display: inline-block;
        padding: 5px 15px;
    }
</style>
    <nav class="navbar navbar-laravel" role="navigation">

        <div class="container-fluid">
            <div class="header_nav">
                <a href="{{route("home")}}"  class="navbar-brand">ACommerce</a>
            </div>
            <div style="display: inline-block; float: left;margin: auto">
                <ul >
                    <li class="ASD" id="orders-header"><a href="{{route('userHistoryOrders',Auth::user()->id)}}">Orders</a></li>
                    <li class="ASD" id="shopping-carts-header"><a href="{{route('userHistory',Auth::user()->id)}}">SHopping Carts</a></li>
                    <li class="ASD"><a href="#">may bae like</a></li>
                    <li class="ASD"><a href="{{route("editProfile")}}">Edit Profile</a></li>

                </ul>
            </div>
        </div>

    </nav>
    @isset($orders)

        <div id="orders" class="data-table container" style="color: #000000">
            <div class="alert alert-dark"> Orders</div>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12" style="width: 100%">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="text-align: center">Orders</h3>
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
                                                        Total Amount
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Shopping Code ()
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        User
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Date
                                                    </th>
                                                </thead>
                                                <tbody>
                                                @foreach($user->oreders as $order)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$order->id}}</td>
                                                        <td class="">${{$order->total_amount}}</td>
                                                        <td>{{$order->shopping_id}}</td>
                                                        <td><a href="#"> {{$order->user->name}} </a></td>
                                                        <td>{{$order->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>

                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                                        ID
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        Total Amount
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Shopping Code ()
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        User
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        Date
                                                    </th>
                                                </tfoot>
                                            </table>
                                        </div>
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

    @isset($shoppingCarts)
        <div id="shopping-carts" class="data-table container" style="height: 900px">
            <div class="alert-dark alert" style="">

                <span style=""><a href="{{route("order")}}" class="btn btn-outline-dark">Order Items</a> </span>
                <span style="width: 70%;margin-left: 339px">
                    Shopping Carts
                </span>
            </div>
            <div class="">


                <div class="container">

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="products_container grid" style="position: relative; height: 1914.05px;">

                                    <table class="table table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Acion</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <th scope="row">{{$cart->id}}</th>
                                                <td>
                                                    <a href="#" style="color: #ffffff">
                                                        {{$cart->product->name}}
                                                    </a>
                                                </td>
                                                <td style="width: 200px">
                                                    <div class="center" id="app-Vue">
                                                        <p>
                                                        </p>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button  type="button" class="btn btn-danger btn-number ASD"
                                                                        data-type="minus" data-field="quant[2]"
                                                                style="border-bottom-right-radius: 0px;border-top-right-radius: 0px;"
                                                                onclick="subOne('{{$cart->id}}')">
                                                                    <span class="glyphicon glyphicon-minus">-</span>
                                                                </button>
                                                            </span>
                                                            <input readonly type="text" id="cartQTY--{{$cart->id}}" name="quant[2]" class="form-control input-number" value="{{$cart->quantity}}" min="1" max="100">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]"
                                                                style="border-bottom-left-radius: 0px;border-top-left-radius: 0px;"
                                                                        onclick="addOne('{{$cart->id}}')">
                                                                    <span class="glyphicon glyphicon-plus">+</span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <p></p>
                                                    </div>
                                                    <script>

                                                    </script>

                                                </td>
                                                <td style="width: 150px; height: 150px">
                                                    <a href="#">
                                                    <img src="/storage/product_images/{{$cart->product->img}}"
                                                    style="width: 100%;height: 100%">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route("deleteCart",$cart->id)}}" class="btn btn-outline-danger"
                                                    style="vertical-align: center;margin-top: 50px">
                                                        Delete
                                                    </a>
                                                    <br>
                                                    <br>
{{--                                                    <a href="#" class="btn btn-outline-primary">--}}
{{--                                                        Update--}}
{{--                                                    </a>--}}

                                                </td>
                                                <td>
                                                    <div style="margin-top: 50px">
                                                        $
                                                        @if($cart->product->discounted_price == 0)

                                                            <span id="price-{{$cart->id}}" price="{{$cart->product->price}}">
                                                                {{$cart->product->price}}
                                                            </span>
                                                        @else
                                                            <span id="price-{{$cart->id}}" price="{{$cart->product->discounted_price}}">
                                                                {{$cart->product->discounted_price}}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$carts->links()}}

                                    <!-- Product -->




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset


@endsection
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/main.js"></script>
<script>

    function subOne(id) {
        if(parseInt($("#cartQTY--"+id).val())<=1)
            return;
        var $QTY= parseInt($("#cartQTY--"+id).val()) - 1;
        $("#cartQTY--"+id).val(
            $QTY
        );
        asd = document.getElementById("price-"+id).getAttribute("price");
        val =parseFloat(asd)
        console.log(asd);
        $("#price-"+id).text(val * $QTY)
        $.get("http://127.0.0.1:8000/addToCart/"+id+"/"+$QTY+"/updateQTY",
            function (data,status) {
                console.log(data);
            }
        )
    }
    function addOne(id) {

        var $QTY = parseInt($("#cartQTY--"+id).val()) + 1;
        $("#cartQTY--"+id).val(
            $QTY
        );
        console.log(id);
        asd = document.getElementById("price-"+id).getAttribute("price");
        val =parseFloat(asd)
        console.log(asd);
        $("#price-"+id).text(val * $QTY)
        $.get("http://127.0.0.1:8000/addToCart/"+id+"/"+$QTY+"/updateQTY",
            function (data,status) {
                console.log(data);
            }
        )
    }
    $asd = document.getElementsByClassName("ASD");
    console.log($asd);

</script>


