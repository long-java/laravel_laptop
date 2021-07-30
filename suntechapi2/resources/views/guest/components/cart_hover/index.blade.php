	<link rel="stylesheet" href="/guest/assets/css/base.css">
	<link rel="stylesheet" href="/guest/assets/css/main.css">
	<link rel="stylesheet" href="/guest/assets/css/responsive.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">


@if( isset($product)  )


            <li class="header__cart-item">
                <img src="<?php echo $images[0];  ?> " class="header__cart-img">

                <div class="header__cart-item-info">
                    <div class="header__cart-item-head">
                        <h5 class="header__cart-item-name"> {{ $product -> name }} </h5>
                        <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price">{{ $price = $product -> price }} </span>
                            <span class="header__cart-item-multiply">x</span>
                            <span class="header__cart-item-qnt"> 1 </span>
                        </div>
                    </div>
                    <div class="header__cart-item-body">
                        <span class="header__cart-item-description">
                            Phân loại: <span class="header__cart-item-classify"> {{ $product -> exams() -> first() -> name }} </span>
                        </span>
                        <!-- <span class="header__cart-item-remove">Xóa</span> -->
                    </div>
                </div>
            </li>

@endif    