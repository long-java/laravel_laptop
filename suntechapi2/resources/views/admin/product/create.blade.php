@extends('admin.layouts.master')
@section('title_page') <h4>This page create Products</h4> @endsection
@section('main')



<style>
    input, select{
        display: block;
    }

    select {
        padding: 2px 55px 2px 55px;
    }

    .btSave{
        margin-top: 20px;
    }
</style>

@if($errors->any())
    <h5> {{$errors->first()}} </h5>
@endif

<form method="post" action="{{ route('products.store') }}">
    @csrf

    Name: <input type="" name="name">
    Description: <input type="" name="description">
    Price: <input type="" name="price">
    Images: <input type="" name="images">

    Category: 
        <select name="categoryName">
            @foreach($categories as $category) 
                <option name="categoryName" value="{{ $category->name}}"> {{ $category->name}} </option>
            @endforeach
        </select>

    <button type="submit" class="btSave"> Save </button>

</form>

@endsection