@extends("user.app")
@section("content")

<div class="" style="background-image: url('/images/home_slider_1.jpg');height: 500px;background-size: cover">

    <div style="height: 75px;width: 50%;position: relative;top: 100px;left: 364px;font-size: 60px;color: #BBE432;
                font-family: 'Poppins', sans-serif">
        A-Commerce
    </div>
    {{--$categoryies--}}


</div>
@endsection

@section("boxes")
    <div class="boxes" style="">
        <div class="section_container">
            <div class="container">
                <div class="row">

{{--                    @for($i=0;$i < count($categories); $i++)--}}

{{--                        {{$i}}--}}
{{--                        {{$categories[$i]->Products->last()->name}} <br>--}}
{{--                    @endfor--}}
                    @foreach($categories as $category)
                        <!-- Box -->
                        <div class="col-lg-4 box_col" style="margin-top: 30px;margin-bottom: 40px">
                            <div class="box">
                                <div style="color: #BBE432">
                                    Products: {{$category->Products->where("QTY",">",0)->count()}}
                                </div>
{{--                                {{$category->img}}--}}
                                <div class="box_image" style="width:100%;height: 320px">
                                    <img style="height: 100%"
                                        src="/storage/category_images/{{$category->img}}" alt="">
                                </div>
                                <div class="box_title trans_200"><a href="{{route('category',$category->id)}}">{{$category->name}}</a></div>
                            </div>
                        </div>
                    @endforeach





                </div>
            </div>
        </div>
    </div>
@endsection
