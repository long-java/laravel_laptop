@extends('admin.layouts.master')

@section('title_page') 
<h4>
    Update order #ĐH{{ $order-> id }}
    @if($order->status_id == 4)
        --  <b>  Đã hoàn thành. </b>
    @endif

</h4>
 @endsection

<style>

    p{
        font-size: 16px;
    }
    .h{
        background-color: #04aa6d !important;
        margin: 0px 0px 30px 0px;
        padding: 0;
        height: 60px;
        border-radius: 10px 10px 0px 0px !important;
        color: #fff;
    }

    .lbName{
        width: 160px;
        margin: 0px 30px 0px 40px;
        font-size: 15px;
    }
    
    .row2{
        margin-top: 40px;
    }

    .tb{
        margin: 0px 40px 0px 40px;
    }
    .sum1{
        margin-right: 70px;
        font-size: 17px;
        float: right;
    }
    .sum2{
        margin-right: 30px;
        font-size: 17px;
        float: right;
    }

    .left{
        padding-left:0px !important
    }

    .prog{
        width:250px;
        margin-left: 19px;
        margin-top: 10px;

    }

    .bt{
        display: block;
        margin-top: 100px;
        padding-bottom: 100px;
        
    }

    .btConfirm{
        width: 200px;
        height: 40px;
        margin-bottom: 100px;
        border-radius: 3px;
    }

    .btCancel{
        width: 200px;
        height: 40px;
        margin-bottom: 100px;
        
    }

    .address{
        display: inline-block;
        font-size: 14px;
    }

    .lbAddress{
        display: inline-block;
    }


</style>

@section('main')

    <div class="row1">
        <div class="h panel-heading ">
            <h4>Order Items</h4>
        </div>

        <div class="row">
            <div class="panel-body">
                <table class="tb table  table-hover general-table">
                    <thead>
                        <tr>
                            <th> STT </th>
                            <th> Tên sản phẩm </th>
                            <th> Giá </th>
                            <th> Số lượng </th>
                            <th> Tổng tiền </th>
                            

                        </tr>
                    </thead>
                    <tbody>


                        @if(isset($order_items))
                            @foreach($order_items as $key => $item)    
                                <tr>
                                    
                                    <td> {{ $key + 1}}</td>
                                    <td> {{ $item-> products() -> first() -> name  }}  </td>
                                    <td> {{ $item -> products() -> first() -> price }} </td>  
                                    <td> {{ $item -> quantity }} </td>  
                                    <td> {{ ($item -> products() -> first() -> price) * ($item -> quantity)  }} </td>  

                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>

                <label class="sum1">{{ $sumMoney  }} (Đồng) </label>
                <label class="sum2">Tổng tiền hàng: </label>
            </div>
  
        </div>
    <div>

   <!-- =================================================== -->
    <div class="row2">
        <div class="h panel-heading ">
            <h4>Order Summary</h4>
        </div>

        <div class="row">
            @if(isset($order)) 

                <div class="col-sm-6">
                    <p><label class="lbName"> Order ID: </label>  ĐH{{ $order-> id }}</p>
                    <p><label class="lbName"> Customer Name: </label>  {{ $order-> users() -> first() -> name  }} </p>
                    <p><label class="lbName"> Customer Phone: </label>  {{ $order-> users() -> first() -> user_details() -> first() -> phone  }} </p>
                    <p><label class="lbName"> Payment: </label>    {{ $order-> payment }} </p>
                    <p><label class="lbName"> Created at: </label>    {{ $order-> created_at }}  </p>
                    <p><label class="lbName"> Status: </label>    <span  class="label label-info label-mini"> {{ $order-> statuses() -> first() -> name }} </span>  </p>
                </div>

                
                <div class="col-sm-6">
                    <p><label class="lbName"> Shipping Fee: </label>   ${{ $order-> shipping_fee }}</p>
                    <p><label class="lbName"> Order Total: </label>   ${{ $order-> total }}</p>
                    <p class="lbAddress"><label class="lbName"> Shipping Address: </label> <h5 class="address"> {{ $order-> users() -> first() -> user_details() -> first() -> address }}</h5> </p>

                    <div>
                        <div class=" left col-sm-4">
                            <p><label class="lbName"> Finish: </label>
                        
                        </div>

                        <div class="col-sm-8">
                            <div class="prog progress progress-striped progress-xs">
                                <div style="width: <?php echo $status; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-danger">
                                    <span class="sr-only">70% Complete (success)</span>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

            @endif    
        </div>
    <div>

    <form action="{{ url('orders/update/'.$order['id']) }}" method="post">
        @method('put')
        @csrf
        <div class="bt">
            <center>
                @if($order-> status_id != 4)
                    <a href=""><button  class="btn btn-danger btConfirm " > CONFIRM</button> </a>
                @endif

                <a type="" class="btn btn-danger btCancel" href="/orders"> CANCEL  </a>

            </center>
        </div>
    </form>

@endsection

