@extends('websitePages.master')
@section('content')
<style>
.search-bars input::placeholder {
    color: black !important;
    opacity: 1;
}
.search-bars svg {
  width: 20px;
  height: 20px;
  fill: #121212 !important;
}
</style>


<div class="product-banner">
    <div class="wrapper">
        <div class="breadcrum">
            <a href="{{ url('/index') }}" class="link">
                Home
            </a>
            <svg>
                <use xlink:href="#breadcrum"></use>
            </svg>
            <div class="current">
                Our Products
            </div>
        </div>
        <div class="heading">
            Shop the Best of Gamata
        </div>
        <div class="desc">
            Explore fresh products, connect with featured sellers, and shop with ease. From trending items to detailed searches, Gamata makes
            buying and selling effortless for the farming community.
        </div>
    </div>
</div>

<!-- Listing -->
<div class="product-listing">
    <div class="wrapper">
        <div class="col-1">
            <div class="search-bars">
                <div class="wrapper">
                    <input type="text" placeholder="Search your Product">
                    <svg>
                        <use xlink:href="#inner_search"></use>
                    </svg>
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">Sellers</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    <label><input type="checkbox"> GreenHarvest Suppliers</label>
                    <label><input type="checkbox"> AgriPro Direct</label>
                    <label><input type="checkbox"> FarmFresh Depot</label>
                    <label><input type="checkbox"> CropCare Solutions</label>
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">Fresh Products</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    <label><input type="checkbox"> Product 01</label>
                    <label><input type="checkbox"> Product 02</label>
                    <label><input type="checkbox"> Product 03</label>
                    <label><input type="checkbox"> Product 04</label>
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">Categories</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    <label><input type="checkbox"> All Products</label>
                    <label><input type="checkbox"> Fruits</label>
                    <label><input type="checkbox"> Processed Foods</label>
                    <label><input type="checkbox"> Organic Products</label>
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">District</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    <label><input type="checkbox"> Colombo</label>
                    <label><input type="checkbox"> Rathnapura</label>
                    <label><input type="checkbox"> Kandy</label>
                    <label><input type="checkbox"> Kegalle</label>
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">Price</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    <div class="price">
                        <div class="price-input">
                            <label for="min-price">Min</label>
                            <input type="text" id="min-price" placeholder="Rs. 1,000">
                        </div>
                        <div class="price-input">
                            <label for="max-price">Max</label>
                            <input type="text" id="max-price" placeholder="Rs. 1,000,000">
                        </div>
                    </div>
                     <a href="#" target="_blank" class="common-btn-1 btn-p">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                      Price
                    </a>
                   
                </div>
            </div>
             {{-- <a href="#" target="_blank" class="common-btn-1 btn-p">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Filter
             </a> --}}
        </div>
        <div class="col-2">
            <div class="top-bar">
                <div class="row-1">
                    <div class="left">
                        <div class="text">Sort</div>
                        <svg id= "gridViewBtn" class=" sort-grid active">
                            <use xlink:href="#grid"></use>
                        </svg>
                        <svg id ="listViewBtn" class="sort-list">
                            <use xlink:href="#column"></use>
                        </svg>
                    </div>
                    <div class="right">
                        <div class="text">
                            Showing 1-9 of 132 Results
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-2">
                <!-- Item List -->
                @php

                    $bestSellingItems = [
                        [
                            "image" => asset('assets/Images/items/1.png'),
                            "sin" => "ලංකා ලොකු ළුණු",
                            "eng" => "Lanka Big Onion",
                            "tam" => "சிலோன் பெரிய வெங்காயம்",
                            "price" => "Rs. <span>260.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/2.png'),
                            "sin" => "කොල මිරිස්",
                            "eng" => "Green Chillies",
                            "tam" => "பச்சை மிளகாய்",
                            "price" => "Rs. <span>260.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/3.png'),
                            "sin" => "කරවිල",
                            "eng" => "Bitter Gourd",
                            "tam" => "பாகற்காய்",
                            "price" => "Rs. <span>160.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/4.png'),
                            "sin" => "කුරුඳු කූරු",
                            "eng" => "Cinnamon Sticks",
                            "tam" => "இலவங்கப்பட்டை குச்சிகள்",
                            "price" => "Rs. <span>60.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/5.png'),
                            "sin" => "බතල",
                            "eng" => "Sweet Potatoes",
                            "tam" => "இனிப்பு உருளைக்கிழங்கு",
                            "price" => "Rs. <span>260.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/6.png'),
                            "sin" => "බණ්ඩක්කා",
                            "eng" => "Ladies Fingers",
                            "tam" => "வெண்டைக்காய்",
                            "price" => "Rs. <span>260.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/7.png'),
                            "sin" => "කොල පිපිඤ්ඤා",
                            "eng" => "Green Cucumber",
                            "tam" => "பச்சை வெள்ளரி",
                            "price" => "Rs. <span>160.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ],
                        [
                            "image" => asset('assets/Images/items/8.png'),
                            "sin" => "බෙල්පෙපර්",
                            "eng" => "Bell Pepper Green",
                            "tam" => "பெல் மிளகு பச்சை",
                            "price" => "Rs. <span>60.00</span> (1kg)",
                            "stock" => "100 Kilo Available in Stock"
                        ]
                    ];
                @endphp

                <div id="food-list" class="food-list grid-view">
                    @foreach ($bestSellingItems as $item)
                    
                        <!--<div class="items">-->
                        <!--    <div class="wrap">-->
                        <!--        <div class="wishlist">-->
                        <!--            <svg>-->
                        <!--                <use xlink:href="#heart"></use>-->
                        <!--            </svg>-->
                        <!--        </div>-->
                        <!--        <div class="image">-->
                        <!--            <img src="{{$item['image']}}" alt="Best Selling Item">-->
                        <!--        </div>-->
                        <!--        <div class="content">-->
                        <!--            <div class="pro-name">-->
                        <!--                <div class="sin">{{$item['sin']}}</div>-->
                        <!--                <div class="eng">{{$item['eng']}}</div>-->
                        <!--                <div class="tam">{{$item['tam']}}</div>-->
                        <!--            </div>-->
                        <!--            <div class="price">{!!$item['price']!!}</div>-->
                        <!--            <div class="stock">{{$item['stock']}}</div>-->
                        <!--            <a href="{{'product-view' }}" class="common-btn-1">-->
                        <!--                <svg>-->
                        <!--                    <use xlink:href="#btn_arr"></use>-->
                        <!--                </svg>-->
                        <!--                Buy Now-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                     <a href="{{ 'product-view' }}" class="product-link">
                        <div class="items">
                            <div class="wrap">
                                <div class="wishlist">
                                    <svg>
                                        <use xlink:href="#heart"></use>
                                    </svg>
                                </div>
                                <div class="image">
                                    <img src="{{$item['image']}}" alt="Best Selling Item">
                                </div>
                                <div class="content">
                                    <div class="pro-name">
                                        <div class="sin">{{$item['sin']}}</div>
                                        <div class="eng">{{$item['eng']}}</div>
                                        <div class="tam">{{$item['tam']}}</div>
                                    </div>
                                    <div class="price">{!!$item['price']!!}</div>
                                    <div class="stock">{{$item['stock']}}</div>
                                    <div class="common-btn-1">
                                        <svg>
                                            <use xlink:href="#btn_arr"></use>
                                        </svg>
                                        Buy Now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                     
                    @endforeach
                </div>
            </div>
            <div class="pagination">
                <div class="arrow-left">
                    {{-- <svg>
                        <use xlink:href="#left_arr"></use>
                    </svg> --}}
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#000000"></path> </g></svg>
                </div>
                <div class="numbers">
                    <div class="num active">
                        1
                    </div>
                    <div class="num">
                        2
                    </div>
                    <div class="num">
                        3
                    </div>
                </div>
                <div class="arrow-right">
                    {{-- <svg>
                        <use xlink:href="#right_arr"></use>
                    </svg> --}}
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#000000"></path> </g></svg>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
