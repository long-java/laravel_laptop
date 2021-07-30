@extends('guest.layouts.master')

@section('title') Home @endsection
@section('main')

  <div class="home-product">
    <div class="row sm-gutter">
      <!-- product item -->

      @if(isset($products))
        @foreach($products as $key => $product)


          <div  class="col l-2-4 m-4 c-6">
            <a href="{{ url('home/detailproduct/'.$product->id) }}" class="home-product-item">


              <div class="home-product-item-img" style="background-image: url(
                <?php 
                   $product_images = $product -> images;
                   $images = explode(";", $product_images);
                   echo $images[0]; 
                   
                ?> 
              )">

              
              </div>
              <h4 class="home-product-item-name"> {{ $product->name }}  </h4>
              <div class="home-product-item__price">
                <span class="home-product-item__price-old">1.400.000đ</span>
                <span class="home-product-item__price-current">  {{ $product->price }}  </span>
              </div>
              <div class="home-product-item__action">
                <span class="home-product-item__like home-product-item__like--liked">
                  <i class="far fa-heart home-product-item-icon-like-empty"></i>
                  <i class="fas fa-heart home-product-item-icon home-product-item-icon-like-fill"></i>
                </span>
                <div class="home-product-item__rating">
                  <i class="fas fa-star home-product-item__star--gold"></i>
                  <i class="fas fa-star home-product-item__star--gold"></i>
                  <i class="fas fa-star home-product-item__star--gold"></i>
                  <i class="fas fa-star home-product-item__star--gold"></i>
                  <i class="fas fa-star home-product-item__star--gold"></i>
                </div>
                <span class="home-product-item__sold">22 đã bán</span>
              </div>
              <div class="home-product-item__origin">
                <span class="home-product-item__brand">Yohe</span>
                <span class="home-product-item__origin-name">Thái Lan</span>
              </div>
              <div class="home-product-item__sale-off">
                <span class="home-product-item__sale-off-percent">10%</span>
                <span class="home-product-item__sale-off-label">GIẢM</span>
              </div>
            </a>
          </div>

        @endforeach
      @endif



      <!-- end item -->

    </div>
  </div>


  <!-- pagination -->
  <ul class="pagination home-product__pagination">
    <li class="pagination-item">
      <a href="#" class="pagination-item__link">
        <i class="pagination-item__icon fas fa-angle-left"></i>
      </a>
    </li>

    <li class="pagination-item pagination-item--active">
      <a href="#" class="pagination-item__link">1</a>
    </li>
    <li class="pagination-item">
      <a href="#" class="pagination-item__link">2</a>
    </li>
    <li class="pagination-item">
      <a href="#" class="pagination-item__link">3</a>
    </li>
    <li class="pagination-item">
      <a href="#" class="pagination-item__link">...</a>
    </li>
    <li class="pagination-item">
      <a href="#" class="pagination-item__link">14</a>
    </li>

    <li class="pagination-item">
      <a href="#" class="pagination-item__link">
        <i class="pagination-item__icon fas fa-angle-right"></i>
      </a>
    </li>
  </ul>
  <!--end pagination -->

@endsection

