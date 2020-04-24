<style>
    .asd{
        margin-bottom: 40px;
        margin-top: 30px;
    }
</style>
@extends("user.app")
@section("content")
    <div class="" style="background-image: url('/images/home_slider_1.jpg');height: 500px;background-size: cover">

        <div style="height: 75px;width: 50%;position: relative;top: 100px;left: 364px;font-size: 60px;color: #BBE432;
                font-family: 'Poppins', sans-serif">
            A-Commerce<br>
            {{ $category->name }} Category
        </div>
        {{--$categoryies--}}


    </div>
@endsection

@section("boxes")
    <div class="products">

        <div class="section_container">
            @if($errors->any())

                <div class="alert alert-danger">
                    {{"This Item is Alredy in bag "}}
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="products_container grid" style="position: relative; height: 1914.05px;">

                            @foreach($category->Products->where("QTY" , ">",0) as $product)
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
                                        <div class="product_title"><a >Quantity {{$product->QTY}} </a></div>
                                        @if($product->discounted_price == 0)
                                            <div class="product_price">${{$product->price}}</div>
                                        @else
                                            <div class="product_price">${{$product->discounted_price}}</div>
                                            <div class="product_price_offer">${{$product->price}}</div>
                                        @endif
                                        <div class="product_button ml-auto mr-auto trans_200">
                                            @guest
                                                <a href="{{route("login")}}"
                                                   style="cursor: pointer"
                                                   >add to cart</a>
                                            @else
                                            <a {{--href="{{route("addToCart",[$product->id,1])}}" --}}
                                               style="cursor: pointer"
                                               onclick="addToCart({{$product->id}})">add to cart</a>
                                                @endguest
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
@endsection

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/main.js"></script>
<script>
    function addToCart(id) {

        $.get("http://127.0.0.1:8000/api/addToCart/"+id+"/1",
            function (data,status) {
                var $result = JSON.parse(data);
                console.log($result)
                if($result.respose_code == 777){
                    alert($result.message)
                    return ;
                }
                $("#bag1").text($result.newQTY);
                $("#bag2").text("$**.** "+$result.newQTY);
            }
        )
    }
</script>
