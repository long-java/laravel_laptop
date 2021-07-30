@extends('admin.layouts.master')

@section('title_page') <h4>This page index Orders</h4> @endsection

@section('main')

    <div>
        <div class="row">
            
            <div class="panel-body">
                <table class="table  table-hover general-table">
                    <thead>
                        <tr>
                            <th> Mã ĐH</th>
                            <th>CustomerName</th>
                            <th>Shipping Fee</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($orders))
                        @foreach($orders as $key => $order) 

                                @if($order -> status_id < 5)

                                    <tr>
                                        <td> ĐH{{ $order-> id }}  </td>
                                        <td> {{ $order-> users() -> first() -> name  }}  </td>
                                        <td> {{ $order -> shipping_fee }}  </td>
                                        <td> {{ $order -> total }}  </td>
                                        <td> {{ $order -> payment }}  </td>
                                        <td> {{ $order -> created_at }}  </td>


                                        <td><span  class="label label-info label-mini"> {{ $order-> statuses() -> first() -> name }} </span></td>
                                        <td><a href="{{ url('orders/edit/'.$order -> id) }}"><button  class="label label-info label-mini"> Update </button></a></td>
                                        
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
               
           
        </div>

    </div>

    

                                



@endsection