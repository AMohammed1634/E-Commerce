@extends("user.app")
<style>
    .home{
        display: none;
    }
    .required{
        color:#fd006b;
    }
    .order{
        /*background-color: #D6D6D6;*/
        border:2px solid #F4F2F8;
        margin: 15px 15px 15px 25px;
        padding: 50px;
    }
    .asd li{
        padding-bottom: 30px;
        padding-top: 30px;
        border-bottom: 2px  solid #DDDDDD;
        margin-bottom: 30px;
    }
</style>
@section("boxes")
    <div class="container" style="margin-top: 30px;color: #000000">
        <div class="row">

            <div class="col-12 col-md-5">

                <div class="card-title">
                    <h4>Billing Address</h4>

                </div>
                <form>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="first_name">
                                Name
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="first_name"
                                   value="{{Auth::user()->name}}" required="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email">
                                E-MAil
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-control" id="email"
                                   value="{{Auth::user()->email}}" required="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="address">
                                Address
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="address"
                                   value="" required="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="phone">
                                Phone
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="phone"
                                   value="" required="">
                        </div>

                        <div class="col-12 mb-3">

                            <a
                               @if(count(Auth::user()->carts->where("ordered","=",-1) ) !=0 )
                                    href="{{route("makeOrder")}}"
                               @endif
                               class="btn btn-outline-dark" style="width: 100%;margin-top: 10px;padding: 10px">
                                Order Now !
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-7 asd">

                <div class="order">
                    <div class="">

                    </div>
                    <h4>Your Order</h4>
                    <div > The Details</div>

                    <ul>
                        <li style="font-weight: bold;color: #9f191f">
                            <div class="row">
                                <div class="col-6">
                                    Product
                                </div>
                                <div class="col-6" style="text-align: right">
                                    Total
                                </div>
                            </div>
                        </li>
                        <?php
                        $total = 0.0;
                        ?>
                        @foreach(Auth::user()->carts->where("ordered","=",-1) as $cart)
                            <li style="">
                                <div class="row">
                                    <div class="col-6">
                                        {{$cart->product->name}}
                                    </div>
                                    <div class="col-6" style="text-align: right">
                                        $
                                        @if($cart->product->discounted_price ==0 )
                                            {{$cart->product->price * $cart->quantity}}
                                            <?php
                                            $total += $cart->product->price * $cart->quantity;
                                            ?>
                                        @else
                                            {{$cart->product->discounted_price * $cart->quantity}}
                                            <?php
                                            $total += $cart->product->discounted_price * $cart->quantity;
                                            ?>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li style="font-weight: bold;color: #9f191f">
                            <div class="row">
                                <div class="col-6">
                                    TOTAL
                                </div>
                                <div class="col-6" style="text-align: right">
                                    ${{$total}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
