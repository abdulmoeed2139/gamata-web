@extends('websitePages.master')
@section('content')

<!-- 🟩 Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

<style>
/* ===== Product Gallery Slider Styles ===== */
.product-page .product-gallery .owl-nav .prev,
.product-page .product-gallery .owl-nav .next {
  position: absolute;
  top: 45%;
  transform: translateY(-50%);
  background: rgba(0,0,0,0.4);
  color: #fff;
  padding: 8px 12px;
  border-radius: 50%;
  cursor: pointer;
}

.product-page .item-list .wrapper .col-2 .recents  .owl-stage-outer .owl-stage{
padding-top:10px;
}

.product-page .product-carousel {
        margin-bottom: 2.208333vw;
}
.product-page .product-gallery .owl-nav .prev { left: -25px; }
.product-page .product-gallery .owl-nav .next { right: -25px; }

.product-page .product-img-carousel .item img {
  width: 100%;
  min-height: 508px;
  height: 508px;
  object-fit: cover;
  border-radius: 10px;
}


.product-page .product-thumb-carousel .item img {
  height: 150px;
  width: 150px;
  object-fit: cover;
  border-radius: 8px;
  border: 1px solid #E1E1E180;
  transition: 0.3s;
}

.product-page .product-thumb-carousel .item{
 border-radius: 8px;
}

/* 🟩 Thumbnail carousel image spacing fix */
.product-page .product-thumb-carousel .owl-item {
  margin-right: 15px; 
}
/* Active thumbnail highlight */
.product-page .product-thumb-carousel .item.active img {
  border-color: #ff6600;
}

.product-page .hm-food-slider.owl-carousel {
  width: 100% !important;
  max-width: 100% !important;
}

.product-page .item-list.exploreProduct .wrapper,
.product-page .item-list.exploreProduct .col-2 {
  width: 100%;
  max-width: 100%;
  padding: 0;
  margin: 0 auto;
}

.product-page .hm-food-slider .item {
  width: 100%;
  box-sizing: border-box;
}

.product-page .item-list.exploreProduct {
  overflow: hidden;
}

.product-page .hm-food-slider .owl-stage {
  display: flex;
}

.product-page .hm-food-slider .owl-item {
  padding: 0 5px;
}


body .product-page .product-thumb-carousel .owl-stage{
width:100% !important;

}

body .product-page .product-thumb-carousel{
    padding-top:15px;
}

@media screen and (max-width:767px){
.product-page .product-thumb-carousel .item img{

    height: 100px;
}

.product-page .product-img-carousel .item img {
    min-height: 300px;
    height: 300px;
}

.product-page .product-gallery{
.owl-nav:nth-child(4){
display:none !important;
}

}


</style>

<div class="product-page">

    <!-- 🟨 Breadcrumb Section -->
    <div class="product-banner">
    <div class="wrapper">
        <div class="breadcrum">
        <a href="{{ url(app()->getLocale().'/index') }}" class="link">{{ __('messages.home') }}</a>
        <svg><use xlink:href="#breadcrum"></use></svg>
        <a href="{{ url(app()->getLocale().'/product') }}" class="link">{{ __('messages.product_title') }}</a>
        <svg><use xlink:href="#breadcrum"></use></svg>
        <div class="current">{{ $product['productName'] ?? 'Product Not Found' }}</div>
        </div>
    </div>
    </div>

    <!-- 🟦 Product Section -->
    <div class="product-inner">
    <div class="wrapper">
        @if ($product)
        <div class="col-1">
        <div class="product-gallery">
            <!-- Main Image Carousel -->
            <div class="owl-carousel product-img-carousel main-img">
            @if (isset($product['images']) && !empty($product['images']))
            @foreach ($product['images'] as $image)
                @if($image != 'Select.png')
                <div class="item">
                    <img src="https://api.aethriasolutions.com/uploads/UploadImage/Sells/{{ $image }}" alt="{{ $loop->iteration }}">
                </div>
                @endif
            @endforeach

            @endif
            </div>

            <!-- Thumbnail Carousel -->
            <div class="owl-carousel product-thumb-carousel">
            @if (isset($product['images']) && !empty($product['images']))
            @foreach ($product['images'] as $image)
                @if($image != 'Select.png')
                <div class="item">
                    <img src="https://api.aethriasolutions.com/uploads/UploadImage/Sells/{{ $image }}" alt="Thumb {{ $loop->iteration }}">
                </div>
                @endif
            @endforeach
            @endif
            </div>
        </div>
        </div>

        <div class="col-2">
        <div class="content">
            <div class="row-1">
            <div class="save">
                <div class="text-1">{{ __('messages.saving') }}: </div>
                <div class="text-2">{{ $product['discount'] ?? 0 }}% off</div>
            </div>
            <div class="title">{{ $product['productName'] }}</div>
            
            @if(isset($product['priceCut']) && $product['priceCut'] > 0)
                <div class="price-1">Rs. <span>{{ $product['unit_Price'] + $product['priceCut'] }}</span> {{ $product['uom'] }}</div>
                <div class="price-2">Rs. <span>{{ $product['unit_Price'] }}</span> {{ $product['uom'] }}</div>
            @else
                <div class="price-2">Rs. <span>{{ $product['unit_Price'] }}</span> {{ $product['uom'] }}</div>
            @endif
            
            <div class="desc">{{ $product['productDescription'] }}</div>
            </div>

            <div class="row-2">
            <div class="title">{{ __('messages.package_sizes') }}:</div>
            <div class="attributes">
                <div class="att active">
                <div class="text-1">250g</div>
                <div class="text-2">Rs. <span>54.50</span></div>
                </div>
                <div class="att">
                <div class="text-1">500g</div>
                <div class="text-2">Rs. <span>163.50</span></div>
                </div>
                <div class="att">
                <div class="text-1">750g</div>
                <div class="text-2">Rs. <span>109.00</span></div>
                </div>
                <div class="att">
                <div class="text-1">1KG</div>
                <div class="text-2">Rs. <span>210.00</span></div>
                </div>
            </div>
            </div>

            <div class="row-3">
            <div class="btn-1">
                <a href="{{ url(app()->getLocale().'/app-banner') }}" class="common-btn-1">
                <svg><use xlink:href="#btn_arr"></use></svg>
                {{ __('messages.buy_now') }}
                </a>
            </div>
            <div class="btn-2">
                <a href="{{ url(app()->getLocale().'/app-banner') }}" class="common-btn-1">
                <svg><use xlink:href="#btn_arr"></use></svg>
                {{ __('messages.add_to_cart') }}
                </a>
            </div>
            </div>
        </div>
        </div>

        @else
        <div class="col-3">
        <h3>{{ __('messages.product_not_found') }}</h3>
        </div>
        @endif
    </div>
    </div>

    <!-- 🟧 Explore Other Products -->
    <div class="product-carousel">
    <div class="wrapper">
        <div class="col-1">
        <div class="common-title">{{ __('messages.explore_other_products') }}</div>
        <div class="common-desc">{{ __('messages.explore_other_products_desc') }}</div>
        </div>
    </div>
    </div>

    <section class="item-list exploreProduct" style="padding-top:0;">
    <div class="wrapper">
        <div class="col-2">
        <div class="hm-food-slider owl-carousel recents hm-food-slider" style="padding-top:0;">
            @foreach ($bestSellingItems as $item)
            <a href="{{ url(app()->getLocale().'/product-view/'.$item['productID']) }}" class="item-link">
            <div class="item">
                <div class="wrap">
                <div class="wishlist"><svg><use xlink:href="#heart"></use></svg></div>
                <div class="image">
                    <img src="{{ $item['imageUri'].'/'.$item['image']}}" alt="{{ $item['name_English'] ?? __('messages.product') }}">
                </div>
                <div class="content">
                    <div class="pro-name">
                    <div class="sin">{{ $item['name_Sinhala'] ?? __('messages.n_a') }}</div>
                    <div class="eng">{{ $item['name_English'] ?? __('messages.n_a') }}</div>
                    <div class="tam">{{ $item['name_Tamil'] ?? __('messages.n_a') }}</div>
                    </div>
                    <div class="price">Rs. {{ $item['average_Price'] ?? 0 }}</div>
                    <div class="stock">{{ __('messages.stock') }}: {{ $item['total_Quantity'] ?? 0 }}</div>
                    <span class="common-btn-1">
                    <svg><use xlink:href="#btn_arr"></use></svg>
                    {{ __('messages.buy_now') }}
                    </span>
                </div>
                </div>
            </div>
            </a>
            @endforeach
        </div>
        </div>
    </div>
    </section>


</div>
<!-- 🟩 jQuery + Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
jQuery(document).ready(function($){

  /* ===== Best Selling Items Slider ===== */
$('.hm-food-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1 // 👈 mobile par 1 item per slide
    },
    600: {
      items: 2
    },
    1000: {
      items: 4
    }
  }
});


  /* ===== Product Gallery Slider ===== */
  var sync1 = $(".product-img-carousel");
  var sync2 = $(".product-thumb-carousel");
  var slidesPerPage = 4;
  var syncedSecondary = true;

  sync1.owlCarousel({
      items: 1,
      slideSpeed: 2000,
      nav: false,
      autoplay: false,
      dots: false,
      loop: true,
      responsiveRefreshRate: 200,
    //   navText: ['<span class="prev">&#10094;</span>','<span class="next">&#10095;</span>']
  }).on('changed.owl.carousel', syncPosition);

  sync2.owlCarousel({
      items: slidesPerPage,
      dots: false,
      nav: true,
      smartSpeed: 200,
      slideSpeed: 500,
      slideBy: slidesPerPage,
      responsiveRefreshRate: 100
        // navText: ['<span class="prev"><svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg></span>','<span class="next"><svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg></span>']
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
      var count = el.item.count - 1;
      var current = Math.round(el.item.index - (el.item.count / 2) - .5);
      if (current < 0) current = count;
      if (current > count) current = 0;

      sync2.find(".item").removeClass("active").eq(current).addClass("active");
      var onscreen = sync2.find('.owl-item.active').length - 1;
      var start = sync2.find('.owl-item.active').first().index();
      var end = sync2.find('.owl-item.active').last().index();

      if (current > end) {
          sync2.trigger('to.owl.carousel', [current - onscreen, 100, true]);
      }
      if (current < start) {
          sync2.trigger('to.owl.carousel', [current, 100, true]);
      }
  }

  function syncPosition2(el) {
      if (syncedSecondary) {
          var number = el.item.index;
          sync1.trigger('to.owl.carousel', [number, 100, true]);
      }
  }

  sync2.on("click", ".item", function(e){
      e.preventDefault();
      var index = $(this).parent().index();
      sync1.trigger("to.owl.carousel", [index, 300, true]);
  });

});
</script>

@endsection
