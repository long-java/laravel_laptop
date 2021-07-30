

@if(  session('cart') != null  )
    @foreach (session('cart') as $key => $item)
        <?php
            session(['countCart' => count(session('cart')) ]);
        ?>


            <li class="header__cart-item">
                <img src="<?php 
                                $images = $item -> products() -> first() -> images;
                                $arrImages = explode(";", $images);
                                $img = $arrImages[0];
                                echo $img;
                            ?> " class="header__cart-img">

                <div class="header__cart-item-info">
                    <div class="header__cart-item-head">
                        <h5 class="header__cart-item-name"> {{ $item -> products() -> first() -> name }}  </h5>
                        <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price">{{ $price = $item -> products() -> first() -> price }} </span>
                            <span class="header__cart-item-multiply">x</span>
                            <span class="header__cart-item-qnt">{{ $quantity =  $item ->  quantity  }} </span>
                        </div>
                    </div>
                    <div class="header__cart-item-body">
                        <span class="header__cart-item-description">
                            Phân loại: <span class="header__cart-item-classify"> {{ $price = $item -> products() -> first() -> exams() -> first() -> name }} </span>
                        </span>
                        <!-- <span class="header__cart-item-remove">Xóa</span> -->
                    </div>
                </div>
            </li>


            <li class="header__cart-item">

            </li>

    @endforeach
@endif    