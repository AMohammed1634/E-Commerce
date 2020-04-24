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
            <h4 style="text-align: center;margin: 20px">
                Update Category {{$category->name}}
            </h4>
            <div class="container" style="margin-top: 100px;border: 1px solid #DDD">
                <div class="row justify-content-center">
                    <div class="card-body">
                        <form method="POST" action="{{route("saveUpdateCategory",$category->id)}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ "Name" }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $category->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>ASD</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="decription" class="col-md-4 col-form-label text-md-right">{{ "decription" }}</label>

                                <div class="col-md-6">
                                    <textarea style="height: 253px" id="decription" type="text" class="form-control @error('decription') is-invalid @enderror" name="decription"
                                          required autocomplete="name" autofocus>
                                        {{ $category->description }}
                                    </textarea>

                                    @error('decription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>ASD</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ "image" }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                           value="" required autocomplete="name" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>ASD</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                            style="background-color: #bbe432;border-color: #bbe432">
                                        {{ "Update" }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @else
            <h4 style="text-align: center;margin: 20px">
                Create New  Category
            </h4>
            <div class="container" style="margin-top: 100px;border: 1px solid #DDD">
                <div class="row justify-content-center">
                    <div class="card-body">
                        <form method="POST" action="{{route("saveCategory")}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ "Name" }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="decription" class="col-md-4 col-form-label text-md-right">{{ "decription" }}</label>

                                <div class="col-md-6">
                                    <textarea style="height: 253px" id="decription" type="text" class="form-control @error('decription') is-invalid @enderror" name="decription"
                                              required autocomplete="name" autofocus>

                                    </textarea>

                                    @error('decription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>ASD</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ "image" }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                           value="" required autocomplete="name" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>ASD</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                            style="background-color: #bbe432;border-color: #bbe432">
                                        {{ "Create" }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection
