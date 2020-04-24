@extends("admin.app")
@section("boxes")

    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h3 style="color: #000000;margin: 30px 5px 15px ;text-align: center">
                    Products saled from warrents
                </h3>
                <br>
                {{$products->links()}}
                <br>
                <table id="example2" style=" " class="table table-dark table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        {{--                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">--}}
                        {{--                        ID--}}
                        {{--                    </th>--}}
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                            Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                            Image
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                            Quantaty
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                            last Update
                        </th>
                    </thead>
                    <tbody>
                    <?php
                    $date = new DateTime();
                    ?>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <a href="#" title="View Product">
                                    {{$product->name}}
                                </a>
                            </td>
                            <td>
                                <img src="/storage/product_images/{{$product->img}}"
                                     style="width: 100px;height: 100px">
                            </td>
                            <td>
                                <a href="{{route("updateProduct",$product->id)}}" title="Update Quantity" style="color: #fd006b">
                                    {{$product->QTY}} Elements
                                </a>
                            </td>
                            <?php

                            $date2 = new DateTime("$product->updated_at");
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
        </div>
    </div>
@endsection
