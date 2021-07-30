<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="/guest/assets/css/base.css">
	<link rel="stylesheet" href="/guest/assets/css/main.css">
	<link rel="stylesheet" href="/guest/assets/css/grid.css">
	<link rel="stylesheet" href="/guest/assets/css/responsive.css">
	<link rel="stylesheet" href="/guest/assets/fonts/fontawesome/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">


	<!-- ////////////// -->
	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

	<!-- 
		RTL version
	-->
	<!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/> -->

</head>

<style>
	.header{
		background: #000 !important;
	}
	.a-login{
		text-decoration: none;
		color: #fff;
	}

	.header__navbar-user-name{
		padding-top:2px;
	}
</style>

<body>
	<div class="app">
		<!-- header -->
		<header class="header">
			<div class="grid wide">

				<!-- header navbar -->
				<nav class="header__navbar hide-on-mobile-tablet">

					<!-- header navbar left -->
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item-has-qr header__navbar-item--separate">
							Vào cửa hàng trên ứng dụng JackeyLove
							<div class="header__qr">
								<img src="guest/assets/img/qrcode.png" alt="QR code" class="header__qr-img">
								<div class="header__qr-apps">
									<a class="header__qr-link">
										<img src="guest/assets/img/ch_play.png" alt="CH Play" class="header__qr-download-img">
									</a>
									<a class="header__qr-link">
										<img src="guest/assets/img/apstore.png" alt="Apstore" class="header__qr-download-img">
									</a>
								</div>
							</div>
						</li>
						<li class="header__navbar-item">
							<span class="header__navbar-item-no-pointer">Kết nối</span>
							<a href="#" class="header__navbar-icon-link">
								<i class="header__navbar-icon fab fa-facebook"></i>
							</a>
							<a href="#" class="header__navbar-icon-link">
								<i class="header__navbar-icon fab fa-instagram"></i>
							</a>
						</li>
					</ul>
					<!--rnd header navbar left -->

					<!-- header navbar right -->
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item-has-notity">
							<a href="#" class="header__navbar-item-link">
								<i class="header__navbar-icon far fa-bell"></i>
								Thông báo
							</a>
							<div class="header__notify">
								<header class="header__notify-header">
									<h3>Thông báo mới nhận</h3>
								</header>
								<ul class="header__notify-list">
									<li class="header__notify-item header__notify-item-viewed">
										<a href="#" class="header__notify-link">
											<img src="guest/assets/img/prd_img_3.jpg" alt="" class="header__notify-img">
											<div class="header__notify-info">
												<div class="header__notify-name">4 ký do bạn phải sử dụng kem chống nắng thường xuyên</div>
												<div class="header__notify-descrition">Nhiều người vẫn cho rằng kem chống nắng chỉ sử dụng khi có ánh nắng mặt trời, còn khi thời tiết lạnh, râm</div>
											</div>
										</a>
									</li>
									<li class="header__notify-item">
										<a href="#" class="header__notify-link">
											<img src="guest/assets/img/prd_img_2.jpg" alt="" class="header__notify-img">
											<div class="header__notify-info">
												<div class="header__notify-name">4 ký do bạn phải sử dụng kem chống nắng thường xuyên</div>
												<div class="header__notify-descrition">Nhiều người vẫn cho rằng kem chống nắng chỉ sử dụng khi có ánh nắng mặt trời, còn khi thời tiết lạnh, râm</div>
											</div>
										</a>
									</li>
									<li class="header__notify-item header__notify-item-viewed">
										<a href="#" class="header__notify-link">
											<img src="guest/assets/img/prd_img_4.jpg" alt="" class="header__notify-img">
											<div class="header__notify-info">
												<div class="header__notify-name">4 ký do bạn phải sử dụng kem chống nắng thường xuyên</div>
												<div class="header__notify-descrition">Nhiều người vẫn cho rằng kem chống nắng chỉ sử dụng khi có ánh nắng mặt trời, còn khi thời tiết lạnh, râm</div>
											</div>
										</a>
									</li>
									<li class="header__notify-item">
										<a href="#" class="header__notify-link">
											<img src="guest/assets/img/prd_img_8.jpg" alt="" class="header__notify-img">
											<div class="header__notify-info">
												<div class="header__notify-name">4 ký do bạn phải sử dụng kem chống nắng thường xuyên</div>
												<div class="header__notify-descrition">Nhiều người vẫn cho rằng kem chống nắng chỉ sử dụng khi có ánh nắng mặt trời, còn khi thời tiết lạnh, râm</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="header__notify-footer">
									<a href="#" class="header__notity-footer-link">Xem tất cả</a>
								</div>
							</div>
						</li>
						<li class="header__navbar-item">
							<a href="#" class="header__navbar-item-link">
								<i class="header__navbar-icon far fa-question-circle"></i>
								Trợ giúp
							</a>
						</li>	

						<!-- <li class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">Đăng ký</li>
							<li class="header__navbar-item header__navbar-item--strong">Đăng nhập</li> -->

							<li class="header__navbar-item header__navbar-user">

								@if( Auth::user() != null )
									@if( (Auth::user()-> user_details) != null )
										<img src="
											{{ Auth::user()-> user_details -> avatar }}
										" class="header__navbar-user-img">
									@endif

									<span class="header__navbar-user-name">  {{ Auth::user()-> name }}  </span>
									<ul class="header__navbar-user-menu">
										<li class="header__navbar-user-item">
											<a href="#">Tài khoản của tôi</a>
										</li>
										<li class="header__navbar-user-item">
											<a href="#">Địa chỉ của tôi</a>
										</li>
										<li class="header__navbar-user-item">
											<a href="#">Đơn mua</a>
										</li>
										<li class="header__navbar-user-item header__navbar-user-item--separate">
											<form  method="post" action="{{ route('logout') }}">
												@csrf
													<!-- <input type="submit" href="{{ route('logout') }}"><i class="fa fa-key"></i> Đăng xuất -->
													</i><input type="submit" name="submit" value="Logout 1" />
											</form>
										</li>
								@else	
									<span class="header__navbar-user-name span-login"><a class="a-login" href="{{ route('login') }}">Đăng nhập</a>  </span>
									
								@endif


									


								</ul>
							</li>		
						</ul>
						<!--end header navbar right -->
					</nav>

					<!-- end header-navbar -->


					<!-- header-search -->
					<div class="header-with-search">
						
						<label for="header-bars-input" class="header__bars-btn">
							<i class="fas fa-bars header__bars-icon"></i>
						</label>
						
						<input type="checkbox" class="header__bars-input" id="header-bars-input">
						<div class="header__mobile">
							<!-- <div class="header__mobile-search-wrap">
								<div class="header__mobile-search">
									<input type="text" class="header__mobile-search-btn" placeholder="Tìm kiếm sản phẩm...">
									<button class="header__search-moblie-btn">
										<i class="fas fa-search header__search-mobile-btn-icon"></i>
									</button>
								</div>
							</div> -->
							<ul class="header__mobile-list">
								<li class="header__mobile-item">
									<a href="" class="header__mobile-link">Trang chủ</a>
								</li>

								<li class="header__mobile-item">
									<a href="" class="header__mobile-link">Giỏ hàng</a>
								</li>
								
								<li class="header__mobile-item">
									<a href="" class="header__mobile-link">Đăng ký</a>
								</li>

								<li class="header__mobile-item">
									<a href="" class="header__mobile-link">Đăng nhập</a>
								</li>

							</ul>
							<label for="header-bars-input">
								<i class="fas fa-times header__mobile-close"></i>
							</label>
							
						</div>

						<label for="header-bars-input" class="modal">
							<div class="modal__overlay"></div>
						</label>
						<!-- logo -->
						<div class="header__logo">
							<a href="#" class="header__logo-link">
								<img class="header__logo-img" src="guest/assets/img/jackeylove.png" alt="">
							</a>
						</div>

						<!-- end logo -->

						<!-- search -->
						<div class="header__search hide-on-mobile">
							<div class="header__search-input-wrap">
								<input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm tại đây">

								<div class="header__search-history">
									<h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
									<ul class="header__search-history-list">
										<li class="header__search-history-item">
											<a href="#">Mũ bảo hiểm</a>
										</li>
										<li class="header__search-history-item">
											<a href="#">Gang tay phượt</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="header__search-select">
								<span class="header__search-select-label">
									Trong shop
								</span>
								<i class="fas fa-chevron-down header__search-select-icon"></i>

								<ul class="header__search-option">
									<li class="header__search-option-item header__search-option-item--active">
										<span>Trong shop</span>
										<i class="fas fa-check "></i>
									</li>

									<li class="header__search-option-item">
										<span>Ngoài shop</span>
										<i class="fas fa-check "></i>
									</li>
								</ul>
							</div>

							<button class="header__search-btn">
								<i class="fas fa-search header__search-btn-icon"></i>
							</button>

						</div>
						<!--end search -->

						<!-- cart -->
						<div class="header__cart">
							@if(Auth::user() != null)
							<div class="header__cart-wrap">
								<span class="header__cart-notice"> {{ session('countCart'); }} </span>

								<i class="fas fa-shopping-cart header__cart-icon"></i>
								<div class="header__cart-list">
									<img src="guest/assets/img/no_cart.png" alt="" class="header__cart-no-cart-img">
									<p class="header__cart-no-cart-msg">
										Chưa có sản phẩm
									</p>

									<h4 class="header__cart-heading">Sản phẩn đã thêm</h4>
									<ul class="header__cart-list-item">

										@include('guest.components.cart.index')
										<!-- <li class="header__cart-item">
											<img src="guest/assets/img/prd_img_1.jpg" class="header__cart-img">
											<div class="header__cart-item-info">
												<div class="header__cart-item-head">
													<h5 class="header__cart-item-name">Mũ bảo hiểm fullface yohe</h5>
													<div class="header__cart-item-price-wrap">
														<span class="header__cart-item-price">2.500.000</span>
														<span class="header__cart-item-multiply">x</span>
														<span class="header__cart-item-qnt">3</span>
													</div>
												</div>
												<div class="header__cart-item-body">
													<span class="header__cart-item-description">
														Phân loại: <span class="header__cart-item-classify">Mũ bảo hiểm</span>
													</span>
													<span class="header__cart-item-remove">Xóa</span>
												</div>
											</div>
										</li> -->


									</ul>

									<ul class="header__cart-list-item2">

									</ul>

									<button class="btn btn--primary header__cart-view-cart">
										<a style="color: #fff; text-decoration: none;" href="{{ route('cart.index') }}"> Xem giỏ hàng </a>
									</button>
								</div>
							</div>
							@endif
						</div>
						<!--end cart -->
					</div>

					<!--end header-search -->
				</div>
			</div>
			<ul class="header__sort-bar">
				<li class="header__sort-item">
					<a href="#" class="header__sort-link">Liên quan</a>
				</li>

				<li class="header__sort-item header__sort-item--active">
					<a href="#" class="header__sort-link">Mới nhất</a>
				</li>

				<li class="header__sort-item">
					<a href="#" class="header__sort-link">Bán chạy</a>
				</li>

				<li class="header__sort-item">
					<a href="#" class="header__sort-link">Giá</a>
				</li>
			</ul>

		</header>
		<!--end header -->

		<!-- container -->
		<div class="app__container">
			<div class="grid wide">
				<div class="row sm-gutter app__content">

					<!-- aside -->
					<div class="col l-2 m-0 c-0">
						@include('guest.components.category.index')
						<!-- <nav class="category">
							<h3 class="category__heading">
								<i class="fas fa-list-ul category__heading-icon"></i>
							Danh mục</h3>
							<ul class="category-list">
								<li class="category-item catgory-item--active">
									<a href="#" class="category-item__link">Gang tay phượt</a>
								</li>
							</ul>
						</nav> -->
					</div>
					<!-- end aside -->

					<!-- article -->
					<div class="col l-10 m-12 c-12">

						<!-- home filter -->
						<div class="home-filter hide-on-mobile-tablet">
							<span class="home-filter__label">
								Sắp xếp theo
							</span>
							<button class="btn home-filter__btn">Phổ biến</button>
							<button class="btn btn--primary home-filter__btn">Mới nhất</button>
							<button class="btn home-filter__btn">Bán chạy</button>

							<div class="select-input">
								<span class="select-input__label">Giá</span>
								<i class="fas fa-chevron-down select-input__icon"></i>
								<ul class="select-input__list">
									<li class="select-input__item">
										<a href="#" class="select-input__link">Giá: Thấp đến cao</a>
									</li>
									<li class="select-input__item">
										<a href="#" class="select-input__link">Giá: Cao đến thấp</a>
									</li>

								</ul>
							</div>

							<!-- <div class="home-filter__page">
								<span class="home-filter__page-num">
									<span class="home-filter__page-current">1</span>/
									<span class="home-filter__page-total">14</span>
								</span>
								<div class="home-filter__page-control">
									<a href="#" class="home-filter__page-btn home-filter__page-btn--disable">
										<i class="fas fa-angle-left home-filter__page-icon"></i>
									</a>
									<a href="#" class="home-filter__page-btn">
										<i class="fas fa-angle-right home-filter__page-icon"></i>
									</a>
								</div>
							</div> -->
						</div>

						<!--end home filter -->
						
						<nav class="mobile-category">
							<ul class="mobile-category__list">
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm LS2 đẹp</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
								<li class="mobile-category__item">
									<a href="#" class="mobile-category__link">Mũ bảo hiểm</a>
								</li>
							</ul>
						</nav>
						<!-- main -->
                        @yield('main')

						<!--end main -->

					</div>
					<!--end article -->
				</div>
			</div>
		</div>
		<!--end container -->

		<!-- footer -->
		<footer class="footer">
			<div class="grid wide">
				<div class="grid__row">
					<div class="col l-2-4 m-4 c-6">
						<h3 class="footer__heading">Chăm sóc khách hàng</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" class="footer-item__link">Trung tâm trợ giúp</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link"Shop Mall</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">Hướng dẫn mua hàng</a>
							</li>
						</ul>
					</div>
					<div class="col l-2-4 m-4 c-6">
						<h3 class="footer__heading">Giới thiệu</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" class="footer-item__link">Giới thiệu</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">Tuyển dụng</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">Điều khoản</a>
							</li>
						</ul>
					</div>
					<div class="col l-2-4 m-4 c-6">
						<h3 class="footer__heading">Theo dõi</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" class="footer-item__link">
									<i class="fab fa-facebook footer-item__icon"></i>
									Facebook
								</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">
									<i class="fab fa-instagram footer-item__icon"></i>
									Instagram
								</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">
									<i class="fab fa-linkedin footer-item__icon"></i>
								Linkedin</a>
							</li>
						</ul>
					</div>
					<div class="col l-2-4 m-4 c-6">
						<h3 class="footer__heading">Danh mục</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" class="footer-item__link">Mũ bảo hiểm</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">Phụ kiện phượt</a>
							</li>
							<li class="footer-item">
								<a href="#" class="footer-item__link">Đồ bảo hộ</a>
							</li>
						</ul>
					</div>
					<div class="col l-2-4 m-8 c-6">
						<h3 class="footer__heading">Vào cửa hàng trên ứng dụng</h3>
						<div class="footer__download">
							<img src="guest/assets/img/qrcode.png" class="footer__download-qr">
							<div class="footer__download-apps">
								<a href="#" class="footer__download-app-link">
									<img src="guest/assets/img/ch_play.png" class="footer__download-app-img">
								</a>

								<a href="#" class="footer__download-app-link">
									<img src="guest/assets/img/apstore.png" class="footer__download-app-img">
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="grid wide">
					<p class="footer__text">@2021 - Bản quyền thuộc về Công ty Akali Đà Nẵng</p>
				</div>
			</div>
		</footer>

		<!--end footer -->
	</div>
	
	</body>
	</html>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



	<script type="text/javascript">
		function logoutAjax(){
			if(confirm("Are you sure you want to logout")){
				$.ajax({
					type:'post',
					url: "{{url('logout')}}",
					data: {
						"_token": "{{ csrf_token() }}",
					},

					headers: {
						"_token": "{{ csrf_token() }}",
					},
					
					success:function(data){
						alert( this.url);
					},

					error: function (xhr, error) {
						alert(error);
						console.debug(xhr); 
						console.debug(error);
					}
				})
			}
		}

	</script>