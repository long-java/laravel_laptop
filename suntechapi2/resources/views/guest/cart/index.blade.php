@extends('guest.layouts.master_order')


@section('title') Home @endsection
@section('main')

<style>
    .content {
        background-color: #fff;
        height:70px;
        margin: 0px 80px 0px 80px;
    }

    .content-header {
        background-color: #fff;
        height:70px;
        margin: 0px 80px 0px 80px;
        text-align: center;
        border: 2px dotted yellow;
        padding-top: 5px;
    }

    .content-noti {
        background-color: #fff;
        height:40px;
        margin: 10px 80px 0px 80px;
        border: 2px dotted yellow;
        padding-top: 10px;
        padding-left: 10px;
    }
    
    .content-product-title{
        height:60px;
        margin: 20px 80px 0px 80px;
        background-color: #fff;
        display: flex;
    }

    .content-product-main{
        height:120px;
        margin: 2px 80px 0px 80px;
        background-color: #fff;
        padding-top: 10px;
        display: flex;
    }

    .text-noti{
        font-size: 15px;
        font-family: "Helvetica Neue", Helvetica, Arial, 文泉驛正黑, "WenQuanYi Zen Hei", "Hiragino Sans GB", "儷黑 Pro", "LiHei Pro", "Heiti TC", 微軟正黑體, "Microsoft JhengHei UI", "Microsoft JhengHei", sans-serif;
        
    }

    .title{
        font-size: 30px;
        color: #ee4d2d;
        
    }

    .col1{
        width:47%;
        /* display: inline-block;   */
        padding-left: 70px;
        display: flex;


    }

    .col2{
        width:52%;
        display: inline-block;  
        padding-top: 20px;
        display: flex;

    }

    .lb{
        font-size: 15px;
        color: gray;

    }

    .lbsp{
        margin-top: 20px;
    }

    .col2 .lb1{
        /* margin-left: 15%; */
        width: 34%;
    }

    .img1{
        width: 100px;
        height: 100px;
    }

    .col1-1{
        width: 60%;
        /* display: inline-block; */
        margin-left: 10px;
        margin-top: 0px;
        padding-top: 0px;
        
        height: 100px;
    }

    .col1-2{
        width: 20%;
        display: inline-block;
    }

    .col1-1-lb{
        font-size: 15px;
    }

    /* .contai{
        margin-top: 0px !impo;
    }  */

    .contai1{
        margin-top: 3px !important;
    }

    .content-product-main:hover{
        background-color: #ccffcc;
    }

    a:hover{
        color: red;
        text-decoration: underline;
    }

    .contai2{
        margin-top: 20px;
        margin-bottom: 100px;
        
        
    }

    .contai2-1{
        height: 50px;
    }

    .btn{
        background-color: red;
        color: white;
        margin-left: 3%;
    }

    .sumcart{
        margin-left: 67%;
        font-size: 16px;
        padding-top: 8px;
    }

</style>



<div class="content-header">
    <h1 class="title">Giỏ hàng</h1>
</div>

<div class="content-noti">
    <label class="text-noti"> - Bấm nút đặt hàng để tiến hành đặt hàng ngay !</label>
</div>

<!-- Title product items -->
<div class="content-product-title">
        <div class="col1">
            <label class="lb lbsp"> Sản phẩm  </label>
        </div>

        <div class="col2">
            <label class="lb lb1"> Đơn giá  </label>
            <label class="lb lb1"> Số lượng  </label>
            <label class="lb lb1"> Số tiền  </label>
            <label class="lb lb1"> Thao tác  </label>
        </div>
</div>
<!-- End product items  -->

<!-- Product items -->

@if(isset($cart))

    @foreach ($cart as $key => $item)

        <div id="itemm<?php echo $item -> id; ?>" class="contai contai1">
            <div class="content-product-main">
                <div class="col1">
                    <div class="col1-2">
                        <img src=" <?php 
                                        $images = $item -> products() -> first() -> images;
                                        $arrImages = explode(";", $images);
                                        $img = $arrImages[0];
                                        echo $img;
                                    ?> "  class="img1"> 
                        </img>
                    </div>

                    <div class="col1-1">
                        <label class="col1-1-lb"> {{ $item -> products() -> first() -> name }}  </label>
                    </div>

                </div>

                <div class="col2">
                    <label class="lb lb1"> ₫ {{ $price = $item -> products() -> first() -> price }}  </label>
                    <label class="lb lb1"> {{ $quantity =  $item ->  quantity  }}  </label>
                    <label class="lb lb1"> ₫ {{ $price * $quantity }}   </label>
                    <label class="lb lb1"><a onclick="DeleteItem(<?php echo $item->id ?>)"> Xóa  </a></label>
                </div>
            </div>
        </div>
    @endforeach
@endif    
<!-- End product items -->
<div class="contai contai2">
    <div class="content-product-main contai2-1">
        <label class="sumcart"> Tổng tiền: 120000 Đồng </label>
        <button type="submit" class="btn btn-danger"> Thanh toán </button>
    </div>
</div>
@endsection


<script>
    function DeleteItem(id){
        if(confirm("Are you sure you want to delete ?")){
            $.ajax({

            
                success: function(data){
                    // alertify.success('Đã thêm sản phẩm thành công !');

                },
                
                error: function (xhr, error) {
                    alert(error);

                }
            }).done(function(responsive){
                $('#itemm'+id).remove();
            });
        }
    }

</script>