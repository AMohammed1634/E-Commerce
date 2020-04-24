@extends("admin.app")
@section("content")

@endsection
@section("boxes")

<div class="container">
    <div class="row">

        <div class="col-md-8">
            <h3 style="color: #000000;margin: 30px 5px 15px ;text-align: center">
                Latest Loged Users
            </h3>
            <div style="">

            </div>
            {{$newUsers->links()}}
            <br>
            <table id="example2" style=" " class="table table-dark table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
{{--                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">--}}
{{--                        ID--}}
{{--                    </th>--}}
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                        User Name
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                       E-Mail
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                        Add\Sub Permision
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                        Date
                    </th>
                </thead>
                <tbody>
                <?php
                $date = new DateTime();
                ?>
                @foreach($newUsers as $user)
                    <tr role="row" class="odd">
{{--                        <td class="sorting_1">{{$user->id}}</td>--}}
                        <td class="">{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->isAdmin == 0)
                                <a href="{{route("permission",[$user->id,1])}}" class="btn btn-outline-success">
                                    Add
                                </a>
                            @else
                                <a href="{{route("permission",[$user->id,0])}}" class="btn btn-outline-danger">
                                    Sub
                                </a>
                            @endif
                        </td>
                        <?php

                        $date2 = new DateTime("$user->created_at");
                        $diff =$date->diff($date2);
//                        var_dump($diff);
                        ?>
                        <td>
                            {{"$diff->h:$diff->i:$diff->s "}}
                            <span style="color: #1d68a7">Hour/s</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h3 style="color: #000000;margin: 30px 5px 15px ;text-align: center">
                Products saled from warrents
            </h3>

            <table class="table table-hover" style="">
                <thead>
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                    Name
                </th>
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                    Image
                </th>
                <th title="Update"
                    class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                    QTY
                </th>
                </thead>
                <tbody>
                @for($i=0;$i<count($products);$i++)
                    <tr>
                        <td>
                            <a href="#" title="View Product">
                                {{$products[$i]->name}}
                            </a>
                        </td>
                        <td>
                            <img src="/storage/product_images/{{$products[$i]->img}}"
                            style="width: 100px;height: 100px">
                        </td>
                        <td>
                            <a href="{{route("updateProduct",$products[$i]->id)}}" title="Update Quantity" style="color: #fd006b">
                                {{$products[$i]->QTY}} Elements
                            </a>
                        </td>
                    </tr>
                    @if($i == 2)
                        <tr>
                            <td colspan="3">
                                <a href="{{route("statisticsProducts")}}">
                                    Show More >>
                                </a>
                            </td>
                        </tr>
                        @break
                    @endif
                @endfor
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
