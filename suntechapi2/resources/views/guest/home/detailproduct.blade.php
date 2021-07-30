@extends('guest.layouts.master')


@section('title') Home @endsection
@section('main')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>eCommerce Detail Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="/guest/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/guest/assets/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="/guest/assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/guest/assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">



<!-- plug in comment fb -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=350503056647454&autoLogAppEvents=1" nonce="l3UcUjlD"></script>
<!-- end fb -->





<div class="page-header">
    <h1><small> Chi tiết sản phẩm</small></h1>
</div>

<!-- eCommerce Detail - START -->

@if(isset($product))
    <div class="">
        <div class="row" style="display: inline-block; border: solid 1px #808080; padding: 10px 10px 10px 0px; width:90%">
            <div class="col-md-6">
                 
                @if(isset($images))

                    <img class="img-responsive main-img" id="main-img" alt="IMG" src=" {{ $images[0] }}" />
                    <br />
                    <div class=" row">

                        @for($i=0; $i < count($images); $i++)
                            <div class="col-md-3 col-sm-3 col-xs-6 img-small">
                                <img class="img-responsive img-list" alt="eCommerce Detail" src="{{ $images[$i] }}" />
                            </div>

                        @endfor

                    </div>

                @endif 


                <div class="endow">
                    <div class="endow2">
                        <label class="h4-bold white"> Khuyến mãi, quà tặng </label>
                    </div>
                     
                    <div class="endow3">
                        <ul class="">                   
                            
                            <li class="hide"></li><li>Túi xách đựng Laptop + Chuột không dây + Tấm lót chuột Phi Long<p></p>
                            </li><li>Giảm 10% khi mua phụ kiện kèm theo như: túi chống sốc, túi xách, ba lô, fan tản nhiệt, phần mềm diệt virus, phím, chuột, headphone.<p></p>
                            </li><li>Trả góp lãi suất 0% áp dụng cho thẻ tín dụng Sacombank, VPbank và trả góp lãi suất ưu đãi áp dụng cho nhà tài chính HD Saison và ACS.<p></p>
                            </li><li>Trả góp lãi suất uư đãi thông qua cổng MPOS áp dụng cho thẻ tín dụng: Citibank, Eximbank, HSBC, MSB, Techcombank, Nam Á, Shinhan bank, TP bank, Seabank, Kiên Long bank, OCB, VIB, ACB, MB, Vietcombank, SHB...<p></p></li>
            
                        </ul>
                    </div>

                </div>


            </div>
            <div class="col-md-6">
                <h2> {{ $product-> name}} </h2>      <!-- ==========Product name ========= -->
                <p>
                    <div id="rating1"></div>
                    (10 reviews)
                </p>
                <br />
                <p class="text-justify">
                    {{ $product-> description}}    <!-- ==========Product Description ========= -->
                </p>
                <br>
                <h4 class="text-right">Current price: <span style="color: #197BB5; font-size: 35px;">  ${{ $product-> price}}  </span></h4>
                <p class="text-right"><strong>89%</strong> of buyers enjoyed this product! <strong>(107 votes)</strong></p>
                <br />
                <!-- <h4>Sizes:
                    <span style="color: #197BB5">S</span>
                    <span style="color: #197BB5">M</span>
                    <span style="color: #197BB5">L</span>
                    <span style="color: #197BB5">XL</span>
                </h4> -->
                <h4 class="colors">Colors:
                    <span class="color black"></span>
                    <span class="color gray"></span>
                    <span class="color gold"></span>
                </h4>
                <br />
                <br />
                <button type="button" onclick="AddToCart(<?php echo $product -> id?>); AddToCart2(<?php echo $product -> id?>)" class="btn btn-primary add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Card</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-heart"></i></button>

                <h4 class="h4-bold"> Gọi ngay: 0355093521 để đặt hàng</h4>

            </div>
        </div>

    </div>

    <!-- //end info product=========== -->
    <div class="page-header">
        <h1><small> Phân đánh giá và bình luận:</small></h1>
    </div>

    <div class="row">
        <div class="col-md-7">

        <div class="fb-comments" data-href="http://127.0.0.1:8000/home/detailproduct/" data-width="" data-numposts="5"></div>

                <!-- <div class="panel panel-info">
                    <div class="panel-body">
                        <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
                        <form class="form-inline">
                            <div class="btn-group">
                                <button class="btn" type="button"><span class="fa fa-picture-o fa-lg"></span></button>
                                <button class="btn" type="button"><span class="fa fa-video-camera fa-lg"></span></button>
                                <button class="btn" type="button"><span class="fa fa-microphone fa-lg"></span></button>
                                <button class="btn" type="button"><span class="fa fa-music fa-lg"></span></button>
                            </div>
                            <button class="btn btn-primary pull-right" type="button">Share</button>
                        </form>
                    </div>
                </div> -->



        </div>



        <div class="col-md-4">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="row rating-desc">
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star"></span>6
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 19%">
                                        <span class="sr-only">19%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star"></span>5
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star"></span>4
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star"></span>3
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star"></span>2
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star"></span>1
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">15%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">5.1</h1>
                        <div id= "itemm" class="rating">
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star-half-empty"></span>
                        </div>
                        <div>
                            <span class="fa fa-user"></span>125888 total votes
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <!--============ end star ==============-->



@endif

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script>
    $(() =>{
        $('.img-list').click(function(){
            let imgPath = $(this).attr('src');
            $('#main-img').attr('src', imgPath);
        })

        $('.color').click(function(){
            alert('Chưa làm chức năng này ahihiii !');
        })
    });


    //view 
    function AddToCart($id){
        $.ajax({
            url: "http://127.0.0.1:8001/cart/hover/{{ $product -> id }}",
            method: "get",
           
            success: function(data){
                // alertify.success('Đã thêm sản phẩm thành công 1 !');
              
            },
            
            error: function (xhr, error) {
                alert(error1);

            }
        }).done(function(responsive){
            // console.log(responsive);
            // $('.header__cart-list-item').empty();
            $('.header__cart-list-item2').html(responsive);
        });
    }

    //add to database
    function AddToCart2(id){
        $.ajax({
            url: "http://127.0.0.1:8000/api/cart/"+id,
            method: "post",

            data: {
                "_token": "{{ csrf_token() }}",
            },
           
            success: function(data){
                alertify.success('Add success 2 !');
            },
            
            error: function (xhr, error) {
                // alert(error + ' '+ this.url );
                // alert(data);              
            }
        }).done(function(responsive){
            // something
        }).fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus ); 
        });
    }

</script>


<script type="text/javascript">
    jQuery(function ($) {
        $('#rating1').shieldRating({
            max: 5,
            step: 1,
            value: 3,
            markPreset: false
        });
    });
</script>

<style>
    .main-img {
        height: 250px;
    }
    .img-list:hover{
        border: 1px solid red;
    }

    .center-row{
        margin: auto !important;
    }

    .endow{
        margin-top: 40px;
        border: 1px dotted  #000;
        height: 400px;
        background-color: #99ff99;

    }

    .endow2{
        background-color: #34a105;
        height: 50px;
        text-align: center;
        padding-top: 12px;

    }

    .endow3{
        padding: 30px;
        font-size: 15px;
    }


    .white{
        color: #fff;
        
    }

    .h4-bold {
        font-weight: bold;
        font-size: 16px;
    }

    .page-header{
        margin: 0px !important;
    }

    .btn
    {
        border-radius: 0;
    }

    .colors
    {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .color
    {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 0;
    }

        .color:first-of-type
        {
            margin-left: 20px;
        }

    .black
    {
        background: #000000;
    }

    .gray
    {
        background: #808080;
    }

    .gold
    {
        background: #D3AF37;
    }

    /* star */

    .fa {
        margin-right: 5px;
    }

    .rating .fa {
        font-size: 22px;
    }

    .rating-num {
        margin-top: 0px;
        font-size: 60px;
    }

    .progress {
        margin-bottom: 5px;
    }

    .progress-bar {
        text-align: left;
    }

    .rating-desc .col-md-3 {
        padding-right: 0px;
    }

    .sr-only {
        margin-left: 5px;
        overflow: visible;
        clip: auto;
    }

    /* coment */
    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 180px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }

    .img-responsive{
        margin: auto;

    }


</style>
<!-- eCommerce Detail - END -->

</div>

</body>
</html>

@endsection