@extends('admin.layouts.master')
@section('title_page') <h4>This page index Products</h4> @endsection

@section('main')


<style>
    .img{
        width:80px;
        height:60px;
    }
    .lii{
        display: inline-block;
    }
    .btn{
        margin: 10px 0px 10px 0px;
    }
</style>


<!-- <form method="get" action="">
    <input type="text" name="name">
    <button type="submit" class=""> Search </button>
</form> -->

<a href="{{ route('products.create')}}" type="button" class="btn btn-danger"> Create </a>
@if($errors->any())
    <h5> {{$errors->first()}} </h5>
@endif

<table class="table table-striped table-hover">

    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Images</th>
        <th>Category </th>
        <th>Thao tác</th>
    </tr>

    @if(isset($products))
        @foreach($products as $key => $product)
            <tr>
                <td scope="row"> {{ $key+1 }} </td> 
                <td> {{ $product -> name }} </td>
                <td> {{ $product -> description }} </td>
                <td> {{ $product -> price }} </td>
                <td> {{ $product  -> name }} </td>
                <td> <img  class="img" alt="No image" src = "  
                                                <?php 
                                                    $images = $product -> images; 
                                                    $arrImages = explode(";", $images);
                                                    echo $arrImages[0];
                                                ?>">  
                </td>

                <td> 
                    <ul>
                        <li class="lii"><a href="{{ url('products/edit/'.$product->id) }}"> Sửa  |  </a></li>
                        <li class="lii"><a href="{{ url('products/destroy/'.$product->id) }}"> Xóa  </a></li>
                    </ul>    
                </td>
            </tr>
        
        @endforeach

        @else

            @if(isset($product))
                <tr>
                    <td scope="row"> 1 </td>
                    <td> {{ $product -> name }} </td>
                    <td> {{ $product -> description }} </td>
                    <td> {{ $product -> price }} </td>
                    <td> {{ $product  -> name }} </td>
                    <td> <img  class="img" src = "<?php 
                                                    $images = $product -> images; 
                                                    $arrImages = explode(";", $images);
                                                    echo $arrImages[0];
                                                ?>"> 
                    </td>

                    <td> 
                        <ul>
                            <li class="lii"><a href="{{ url('products/edit/'.$product->id) }}"> Sửa  |  </a></li>
                            <li class="lii"><a href="{{ url('products/destroy/'.$product->id) }}"> Xóa  </a></li>
                        </ul>    
                    </td>
                </tr>
            @endif


    @endif




</table>

@endsection