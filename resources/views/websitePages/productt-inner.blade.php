@extends('websitePages.master')

@section('content')

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
            Crisp Green Lettuce
        </div>
    </div>
</div>
</div>

<div class="product-inner">
<div class="wrapper">
    <div class="col-1">
        <div class="product-gallery">
            <!-- Main (Large) Carousel -->
            <div class="owl-carousel product-img-carousel">
                <div class="item" data-id="0">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/1.jpg') }}" alt="Main Image 1">
                    </div>
                </div>
                <div class="item" data-id="1">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/2.jpg') }}" alt="Main Image 2">
                    </div>
                </div>
                <div class="item" data-id="2">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/3.jpg') }}" alt="Main Image 3">
                    </div>
                </div>
                <div class="item" data-id="3">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/4.jpg') }}" alt="Main Image 4">
                    </div>
                </div>
            </div>

            <!-- Thumbnail (Small) Carousel -->
            <div class="owl-carousel product-thumb-carousel">
                <div class="item" data-id="0">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/1.jpg') }}" alt="Main Image 1">
                    </div>
                </div>
                <div class="item" data-id="1">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/2.jpg') }}" alt="Main Image 2">
                    </div>
                </div>
                <div class="item" data-id="2">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/3.jpg') }}" alt="Main Image 3">
                    </div>
                </div>
                <div class="item" data-id="3">
                    <div class="image">
                        <img src="{{ asset('assets/Images/product-inner/4.jpg') }}" alt="Main Image 4">
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
                <div class="title">Crisp Green Lettuce</div>
                <div class="price-1">Rs. <span>260.00</span> (1kg)</div>
                <div class="price-2">Rs. <span>210.00</span> (1kg)</div>
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
</div>
</div>

<!-- product slider -->
@php
$bestSellingItems = [
    [
        "image" => asset("assets/Images/items/1.png"),
        "sin" => "ලංකා ලොකු ළුණු",
        "eng" => "Lanka Big Onion",
        "tam" => "சிலோன் பெரிய வெங்காயம்",
        "price" => "Rs. <span>260.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/2.png"),
        "sin" => "කොල මිරිස්",
        "eng" => "Green Chillies",
        "tam" => "பச்சை மிளகாய்",
        "price" => "Rs. <span>260.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/3.png"),
        "sin" => "කරවිල",
        "eng" => "Bitter Gourd",
        "tam" => "பாகற்காய்",
        "price" => "Rs. <span>160.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/4.png"),
        "sin" => "කුරුඳු කූරු",
        "eng" => "Cinnamon Sticks",
        "tam" => "இலவங்கப்பட்டை குச்சிகள்",
        "price" => "Rs. <span>60.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/5.png"),
        "sin" => "බතල",
        "eng" => "Sweet Potatoes",
        "tam" => "இனிப்பு உருளைக்கிழங்கு",
        "price" => "Rs. <span>260.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/6.png"),
        "sin" => "බණ්ඩක්කා",
        "eng" => "Ladies Fingers",
        "tam" => "வெண்டைக்காய்",
        "price" => "Rs. <span>260.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/7.png"),
        "sin" => "කොල පිපිඤ්ඤා",
        "eng" => "Green Cucumber",
        "tam" => "பச்சை வெள்ளரி",
        "price" => "Rs. <span>160.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ],
    [
        "image" => asset("assets/Images/items/8.png"),
        "sin" => "බෙල්පෙපර්",
        "eng" => "Bell Pepper Green",
        "tam" => "பெல் மிளகு பச்சை",
        "price" => "Rs. <span>60.00</span> (1kg)",
        "stock" => "100 Kilo Available in Stock"
    ]
];
@endphp
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
    <div class="col-2">
        <div class="product-slider owl-carousel">
            @foreach ($bestSellingItems as $item)
                <div class="item">
                    <div class="wrap">
                        <div class="wishlist">
                            <svg>
                                <use xlink:href="#heart"></use>
                            </svg>
                        </div>
                        <div class="image">
                            <img src="{{ $item['image'] }}" alt="Best Selling Item">
                        </div>
                        <div class="content">
                            <div class="pro-name">
                                <div class="sin">{{ $item['sin'] }}</div>
                                <div class="eng">{{ $item['eng'] }}</div>
                                <div class="tam">{{ $item['tam'] }}</div>
                            </div>
                            <div class="price">{!!$item['price']!!}</div>
                            <div class="stock">{{ $item['stock'] }}</div>
                            <a href="#" class="common-btn-1">
                                <svg>
                                    <use xlink:href="#btn_arr"></use>
                                </svg>
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>

@endsection
