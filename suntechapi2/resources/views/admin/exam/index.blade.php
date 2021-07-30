@extends('admin.layouts.master')
@section('title_page') <h4>This page index Exams</h4> @endsection
@section('main')


<form method="get" action="{{ route('exams.show') }}">
    <input type="text" name="name" >
    <button type="submit" class=""> Search </button>
</form>
    <a href="{{ route('exams.create')}}" type="button" class="btn btn-danger"> Create </a>




<!-- @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif -->

<table class="table table-striped">
    <tr>
        <td> STT </td>
        <td> Id </td>
        <td> Name </td>
        <td colspan="2"> Thao tác </td>
    </tr>

    @if(isset($exams))
        @foreach($exams as $key => $value)
            <tr>
                <th scope="row"> {{ $key+1 }} </th>
                <td> {{ $value -> id }} </td>
                <td> {{ $value -> name }} </td>
                <td><a href="{{ url('exams/edit/'.$value['id']) }}"> Edit  </a></td>
                <td><a href="{{ url('exams/destroy/'.$value['id']) }}"> Delete </a></td>  </a></td>
            </tr>
        @endforeach
    @endif 

</table>


<table class="table table-striped">
    @if(isset($exam))
            @foreach($exam as $key => $value)  
                <tr>
                    <td> {{ $value -> id }} </td>
                    <td> {{ $value -> name }} </td>
                </tr>
            @endforeach
    @endif  
</table>



@endsection