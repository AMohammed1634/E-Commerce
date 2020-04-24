@extends("admin.app")
<style>
    .ASD{
        display: inline-block;
        padding: 5px 15px;
    }
</style>
@section("content")
{{--    <div class="container" style="color: #000000; text-align: center;background-color: #1d68a7;padding: 10px">--}}
{{--        <h3 style="color: #ffffff">Admin Dashboard</h3>--}}
{{--    </div>--}}
{{--    <nav class="navbar navbar-laravel" role="navigation" style="background-color: #2a2a2a;color: #ffffff">--}}

{{--        <div class="container-fluid">--}}
{{--            <div class="header_nav">--}}
{{--                <a href="{{route("home")}}" style="color: #ffffff" class="navbar-brand">ACommerce</a>--}}
{{--            </div>--}}
{{--            <div style="display: inline-block; float: left;margin: auto">--}}
{{--                <ul >--}}
{{--                    <li class="ASD" id="orders-header"><a href="{{route('dashboard')}}">Categories</a></li>--}}
{{--                    <li class="ASD" id="shopping-carts-header"><a href="{{route("dashboard_products")}}">Products</a></li>--}}
{{--                    <li class="ASD"><a href="#">Statistics</a></li>--}}

{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </nav>--}}
@endsection

@section("boxes")
    <div class="container" style="color: #000000; margin-bottom: 50px">

        @isset($isUpdate)
            <div class="container form">
                ASD
                <div class="form-text">
                    <h4 style="text-align: center;color: #2A2A2A;margin-bottom: 50px">
                        Update Product {{$product->name}}
                    </h4>
                    {{--                    @if ($errors->any())--}}
                    {{--                        <div class="alert alert-danger">--}}
                    {{--                            <ul>--}}
                    {{--                                @foreach ($errors->all() as $error)--}}
                    {{--                                    <li>{{ $error }}</li>--}}
                    {{--                                @endforeach--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                </div>
                <form method="post" action="{{route("saveUpdateProduct",$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Name:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text @error('name') is-invalid @enderror" type="text" style="width: 80%"
                                       value="{{$product->name}}" name="name">
                                @error('name')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Description:
                            </div>
                            <div class="col-lg-8">
                                <textarea class="input-group-text" type="text" style="width: 80%;height: 150px"
                                          name="description">

                                    {{$product->description}}
                                </textarea>
                                @error('description')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Price:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="number" style="width: 80%" name="price"
                                value="{{$product->price}}"
                                >
                                @error('price')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Descount:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="number" style="width: 80%" name="discountted_price"
                                       value="{{$product->discounted_price}}"
                                >
                                @error('discountted_price')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                I:mage:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="file" style="width: 80%" name="img"

                                >
                                @error('img')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Category:
                            </div>
                            <div class="col-lg-8">

                                <select class="input-group-text" name="category" style="width: 80%" >
                                    <?php
                                    $categories = \App\models\Category::all();
                                    ?>
                                    @foreach($categories as $category)
                                        <option
                                            @if($category->id == $product->category_id)
                                                selected
                                            @endif
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                QTY:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="number" style="width: 80%" name="QTY"
                                       value="{{$product->QTY}}"
                                >
                                @error('QTY')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-8">

                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        @else
{{--            <h4 style="text-align: center;margin: 20px">--}}
{{--                Create New  Product--}}
{{--            </h4>--}}
{{--            <div class="container" style="margin-top: 100px;border: 1px solid #DDD">--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ "Name" }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"--}}
{{--                                           value="" required autocomplete="name" autofocus>--}}

{{--                                    @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>ASD</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="decription" class="col-md-4 col-form-label text-md-right">{{ "decription" }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <textarea style="height: 253px" id="decription" type="text" class="form-control @error('decription') is-invalid @enderror" name="decription"--}}
{{--                                              required autocomplete="name" autofocus>--}}

{{--                                    </textarea>--}}

{{--                                    @error('decription')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>ASD</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ "image" }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"--}}
{{--                                           value="" required autocomplete="name" autofocus>--}}

{{--                                    @error('image')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>ASD</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary"--}}
{{--                                            style="background-color: #bbe432;border-color: #bbe432">--}}
{{--                                        {{ "Create" }}--}}
{{--                                    </button>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="container form">
                ASD
                <div class="form-text">
                    <h4 style="text-align: center;color: #2A2A2A;margin-bottom: 50px">
                        Create New Product
                    </h4>
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                </div>
                <form method="post" action="{{route("saveProduct")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Name:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text @error('name') is-invalid @enderror" type="text" style="width: 80%" name="name">
                                @error('name')
                                    <br>
                                    <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Description:
                            </div>
                            <div class="col-lg-8">
                                <textarea class="input-group-text" type="text" style="width: 80%;height: 150px"
                                name="description">

                                </textarea>
                                @error('description')
                                    <br>
                                    <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Price:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="number" style="width: 80%" name="price">
                                @error('price')
                                    <br>
                                    <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Product Descount:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="number" style="width: 80%" name="discountted_price"
                                    value="0.00"
                                >
                                @error('discountted_price')
                                    <br>
                                    <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                I:mage:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="file" style="width: 80%" name="img"
                                       value="0.00"
                                >
                                @error('img')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                Category:
                            </div>
                            <div class="col-lg-8">

                                <select class="input-group-text" name="category" style="width: 80%" >
                                    <?php
                                    $categories = \App\models\Category::all();
                                    ?>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4" style="text-align: right">
                                QTY:
                            </div>
                            <div class="col-lg-8">
                                <input class="input-group-text" type="number" style="width: 80%" name="QTY"
                                       value="100"
                                >
                                @error('QTY')
                                <br>
                                <div class="alert alert-danger" style="width: 80%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-8">

                                <button class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endisset
    </div>
@endsection
