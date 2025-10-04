@extends('websitePages.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<style>
.recents .image img{
height:250px !important;
}
.recents .content{
padding:0 !important;
}
.recents .wrap{
padding-bottom:0 !important;
}
.recents .wrap .image img{
height:165px !important;
object-fit:contain !important;
}
.recents .item .wrap{
height:370px !important;
}
.recents .item .common-btn-1{
bottom:0 !important;
}
.recents .item .wrap .content{
bottom:-30px !important;
}
.recents .item:hover .content {
 bottom:-14px !important;
}
.recents .item .content{
padding-bottom:40px !important;
}
.recents .item:hover .common-btn-1{
bottom:25px !important;
}
.recents .owl-item{
margin:0 !important;
}
.recents .owl-nav {
display:none !important;
}
.product-carousel {
margin-bottom:0;
}
.recents .pro-name div {
font-size:18px !important;
}
/*.recents  .item .wrap .content{*/
/*    position:static !important;*/
/*}*/
</style>
<div class="product-banner">
<div class="wrapper">
    <div class="breadcrum">
    <a href="{{url('index')}}" class="link">
            Home
        </a>
        <svg>
            <use xlink:href="#breadcrum"></use>
        </svg>
        <a href="{{url('product')}}" class="link">
            Our Products
        </a>
        <svg>
            <use xlink:href="#breadcrum"></use>
        </svg>
        <div class="current">
            {{$product['product_Name_English'] ?? 'Product Not Found'}}
        </div>
    </div>
</div>
</div>

<div class="product-inner">
<div class="wrapper">
    @if ($product)

        <div class="col-1">
            <div class="product-gallery">
                <!-- Main (Large) Carousel -->
                <div class="owl-carousel product-img-carousel">
                    <div class="item" data-id="0">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image01'] }}" alt="Main Image 1">
                        </div>
                    </div>
                    <div class="item" data-id="1">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image02'] }}" alt="Main Image 2">
                        </div>
                    </div>
                    <div class="item" data-id="2">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image03'] }}" alt="Main Image 3">
                        </div>
                    </div>
                    <div class="item" data-id="3">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image04'] }}" alt="Main Image 4">
                        </div>
                    </div>
                </div>

                <!-- Thumbnail (Small) Carousel -->
                <div class="owl-carousel product-thumb-carousel">
                    <div class="item" data-id="0">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image01'] }}" alt="Main Image 1">
                        </div>
                    </div>
                    <div class="item" data-id="1">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image02'] }}" alt="Main Image 2">
                        </div>
                    </div>
                    <div class="item" data-id="2">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image03'] }}" alt="Main Image 3">
                        </div>
                    </div>
                    <div class="item" data-id="3">
                        <div class="image">
                            <img src="{{ $product['imageUri'].'/'.$product['image04'] }}" alt="Main Image 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="content">
                <div class="row-1">
                    <div class="save">
                        <div class="text-1">Saving: </div>
                        <div class="text-2">26% off</div>
                    </div>
                    <div class="title">{{ $product['product_Name_English'] }}</div>
                    <div class="price-1">Rs. <span>260.00</span> {{ $product['uom'] }}</div>
                    <div class="price-2">Rs. <span>{{ number_format($product['unit_Price']) }}</span> {{ $product['uom'] }}</div>
                    <div class="desc">Freshly harvested green lettuce, perfect for salads and wraps. Organically grown and handpicked for quality.</div>
                </div>
                <div class="row-2">
                    <div class="title">Package Sizes:</div>
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
                        <a href="{{ url('/app-banner') }}" class="common-btn-1">
                            <svg>
                                <use xlink:href="#btn_arr"></use>
                            </svg>
                            Buy Now
                        </a>
                    </div>
                    <div class="btn-2">
                        <a href="{{ url('/app-banner') }}" class="common-btn-1">
                            <svg>
                                <use xlink:href="#btn_arr"></use>
                            </svg>
                            Add to cart
                        </a>
                    </div>
                </div>
            </div>
        </div>

    @else
    <div class="col-3">
        <h3> Product Not Found </h3>
    </div>
    @endif
</div>
</div>
<div class="product-carousel">
    <div class="wrapper">
        <div class="col-1">
            <div class="common-title">
                Explore Other Products
            </div>
            <div class="common-desc">
                Discover Gamata's presence across the region. Our branches are here to support your agricultural journey, wherever you are.
            </div>
        </div>
    </div>
</div>
<!-- Best Selling Items Section -->
<section class="item-list">
    <div class="wrapper">
        <div class="col-2">
            <div class="hm-food-slider owl-carousel recents hm-food-slider owl-loaded owl-drag">
                @foreach ($bestSellingItems as $item)
                    <a href="{{ url('product-view/'.$item['productID']) }}" class="item-link">
                        <div class="item">
                            <div class="wrap">
                                <div class="wishlist">
                                    <svg><use xlink:href="#heart"></use></svg>
                                </div>
                                <div class="image">
                                    <img src="{{ $item['imageUri'].'/'.$item['image']}}"
                                        alt="{{ $item['name_English'] ?? 'Product' }}">
                                </div>
                                <div class="content">
                                    <div class="pro-name">
                                        <div class="sin">{{ $item['name_Sinhala'] ?? 'N/A' }}</div>
                                        <div class="eng">{{ $item['name_English'] ?? 'N/A' }}</div>
                                        <div class="tam">{{ $item['name_Tamil'] ?? 'N/A' }}</div>
                                    </div>
                                    <div class="price">Rs. {{ $item['average_Price'] ?? 0 }}</div>
                                    <div class="stock">Stock: {{ $item['total_Quantity'] ?? 0 }}</div>
                                    <span class="common-btn-1">
                                        <svg><use xlink:href="#btn_arr"></use></svg>
                                        Buy Now
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
<script>
jQuery(document).ready(function($){
    $(".hm-food-slider").owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{ items:1 },
            768:{ items:2 },
            1024:{ items:4 }
        }
    });
});
</script>
@endsection
<script>
jQuery(document).ready(function($){
    $(".recents.hm-food-slider").owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{ items:1 },
            768:{ items:2 },
            1024:{ items:2.1 }
        }
    });
});
</script>
