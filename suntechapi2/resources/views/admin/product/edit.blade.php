@extends('admin.layouts.master')
@section('main')


@section('title_page') <h4>This page update Products</h4> @endsection


<style>
    input{
        display: block;
        width: 400px;
    }

    select {
        padding: 2px 55px 2px 55px;
        display: block;
    }

    .btSave{
        margin-top: 20px;
    }
</style>

<form method="post" action="{{ url('products/update/'.$product -> id) }}">
    @method('put')
    @csrf

    Name: <input type="" name="name" value=" {{ $product -> name }} ">
    Description: <input type="" name="description" value=" {{ $product -> description }} ">
    Price: <input type="" name="price" value=" {{ $product -> price }} ">
    Images: <input type="" name="images" value=" {{ $product -> images }} ">

    Category: 
        <select name="categoryName">
            @foreach($categories as $category) 
                <option name="categoryName" value="{{ $category->name}}"> {{ $category->name}} </option>
            @endforeach
        </select>


    <button type="submit" class="btSave"> Save </button>

</form>

@endsection