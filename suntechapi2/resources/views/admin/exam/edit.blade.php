@extends('admin.layouts.master')
@section('main')

<h1> This is page Edit </h1>

<form method="post" action="{{ url('exams/update/'.$exam['id']) }}">
    @method('put')
    @csrf

    <label> {{ $exam -> id }} </label>
    <input type="" name="name" value=" {{ $exam -> name }} ">
    <button type="submit" class=""> Save </button>

</form>

@endsection