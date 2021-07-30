@extends('admin.layouts.master')
@section('main')

<h1>This page create category</h1>

<form method="post" action="{{ route('exams.store') }}">
    @csrf

    Name: <input type="" name="name">
    <button type="submit" class=""> Save </button>

</form>

@endsection