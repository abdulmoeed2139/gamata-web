@extends('websitePages.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @php

        $video = asset('assets/Images/banner/banner-video.mp4');

        $banners = [
            [
                'type' => 'video',
                'src' => $video,
                'subtitle' => 'Linking Farmers and Businesses for Growth',
                'title' => 'Farm. <span>Connect. Grow.</span>',
                'button_text' => 'Register Now',
                'button_link' => url('/login'),
            ],
            [
                'type' => 'image',
                'mobile' => asset('assets/Images/banner/m-banner-1.png'),
                'tablet' => asset('assets/Images/banner/t-banner-1.png'),
                'desktop' => asset('assets/Images/banner/d-banner-1.png'),
                'subtitle' => 'Linking Farmers and Businesses',
                'title' => 'Lorem Ipsuim Dolar Sit Amet',
                'button_text' => 'Register Now',
                'button_link' => url('/login'),
            ],
            [
                'type' => 'image',
                'mobile' => asset('assets/Images/banner/m-banner-2.png'),
                'tablet' => asset('assets/Images/banner/t-banner-2.png'),
                'desktop' => asset('assets/Images/banner/d-banner-2.png'),
                'subtitle' => 'Linking Farmers and Businesses',
                'title' => 'Lorem Ipsuim Dolar Sit Amet',
                'button_text' => 'Register Now',
                'button_link' => url('/login'),
            ],
        ];

    @endphp


    <div class="banner-wrapper">
        <div class="owl-carousel banner-slider">
            @foreach ($banners as $banner)
                <div class="banner {{ $banner['type'] === 'video' ? 'video-banner' : 'image-banner' }}">
                    @if ($banner['type'] === 'video')
                        <video autoplay loop muted playsinline>
                            <source src="{{ $banner['src'] }}" type="video/mp4">
                        </video>
                    @else
                        <picture>
                            <source srcset="{{ $banner['mobile'] }}" media="(max-width: 767px)">
                            <source srcset="{{ $banner['tablet'] }}" media="(max-width: 991px)">
                            <source srcset="{{ $banner['desktop'] }}" media="(min-width: 1199px)">
                            <img src="{{ $banner['desktop'] }}" alt="Banner Image">
                        </picture>
                    @endif

                    <div class="banner-content">
                        <div class="banner-subtitle">{{ $banner['subtitle'] }}</div>
                        <div class="banner-title">{!! $banner['title'] !!}</div>
                        @if (session('access_token'))
                               <a> </a>
                            @else
                            <a href="{{ $banner['button_link'] }}" class="banner-button ">
                                <svg>
                                    <use xlink:href="#btn_arr"></use>
                                </svg>
                                {{ $banner['button_text'] }}
                            </a>
                        @endif
                        <div class="arrow-down"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ***** Welcome Section ***** -->
    @php
        $steps = [
            [
                'title' => '1. Plan Your Crops',
                'desc' =>
                    'Plan your crops effectively with tailored insights, seasonal recommendations, and weather updates to maximize your yield.',
            ],
            [
                'title' => '2. Buy High-Quality Produce',
                'desc' =>
                    'Explore a wide range of fresh, locally sourced products. Buy directly from trusted farmers with ease.',
            ],
            [
                'title' => '3. Reach More Buyers',
                'desc' =>
                    'List your produce effortlessly and connect with potential buyers across the platform for better prices.',
            ],
            [
                'title' => '4. Join the Farming Community',
                'desc' =>
                    'Share knowledge, discuss best practices, and connect with like-minded farmers in a supportive community space.',
            ],
        ];
    @endphp

    <section class="sec-1">
        <div class="wrapper">
            <div class="col-1">
                <div class="title">
                    Transforming Agriculture with Gamata
                </div>
                <div class="desc">
                    Gamata is your go-to platform to plan crops, trade produce, and connect with the farming community.
                    Whether you're growing,
                    selling, buying, or collaborating, Gamata brings everything you need to one place.
                </div>
                <div class="steps-cards owl-carousel">
                    @foreach ($steps as $step)
                        <div class="item">
                            <div class="title">
                                {{ $step['title'] }}
                            </div>
                            <div class="desc">
                                {{ $step['desc'] }}
                            </div>
                        </div>
                    @endforeach;
                </div>
            </div>

            <div class="col-2">
                <!-- Image width & Height 705 x 705 -->
                <div class="image">
                    <img src="{{ asset('assets/Images/home/sec-1.png') }}" alt="section 1 image">
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Section 02 ***** -->
    <section class="visionn-mision">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                    <div class="sub-title">
                        Our vision
                    </div>
                    <div class="title">
                        Building a Sustainable Future for Agriculture and Commerce
                    </div>
                    <div class="desc">
                        Empowering farmers and businesses through direct connections, Gamata simplifies the trading of fresh
                        produce while fostering
                        growth and collaboration. By bridging the gap between farmers and buyers, the platform enables
                        seamless transactions, enhances
                        transparency, and supports sustainable agricultural practices.
                    </div>
                </div>
                <!-- Image Width & Height 240 x 330 -->
                <div class="image">
                    <img src="{{ asset('assets/Images/home/vision.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-2">
                <!-- Image Width & Height 240 x 330 -->
                <div class="image">
                    <img src="{{ asset('assets/Images/home/mision.jpg') }}" alt="">
                </div>
                <div class="content">
                    <div class="sub-title">
                        Our Mission
                    </div>
                    <div class="title">
                        Empowering individuals, businesses, and communities
                    </div>
                    <div class="desc">
                        To bring lasting positive change by embracing sustainable practices and delivering innovative
                        solutions. By prioritizing
                        environmental stewardship, social responsibility, and forward-thinking strategies, we aim to create
                        a meaningful impact that
                        benefits communities and the planet.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Item List -->
    <?php
    $bestSellingProducts = [
        [
            'image' => asset('assets/Images/items/1.png'),
            'sin' => 'ලංකා ලොකු ළුණු',
            'eng' => 'Lanka Big Onion',
            'tam' => 'சிலோன் பெரிய வெங்காயம்',
            'price' => 'Rs. <span>260.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/2.png'),
            'sin' => 'කොල මිරිස්',
            'eng' => 'Green Chillies',
            'tam' => 'பச்சை மிளகாய்',
            'price' => 'Rs. <span>260.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/3.png'),
            'sin' => 'කරවිල',
            'eng' => 'Bitter Gourd',
            'tam' => 'பாகற்காய்',
            'price' => 'Rs. <span>160.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/4.png'),
            'sin' => 'කුරුඳු කූරු',
            'eng' => 'Cinnamon Sticks',
            'tam' => 'இலவங்கப்பட்டை குச்சிகள்',
            'price' => 'Rs. <span>60.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/5.png'),
            'sin' => 'බතල',
            'eng' => 'Sweet Potatoes',
            'tam' => 'இனிப்பு உருளைக்கிழங்கு',
            'price' => 'Rs. <span>260.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/6.png'),
            'sin' => 'බණ්ඩක්කා',
            'eng' => 'Ladies Fingers',
            'tam' => 'வெண்டைக்காய்',
            'price' => 'Rs. <span>260.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/7.png'),
            'sin' => 'කොල පිපිඤ්ඤා',
            'eng' => 'Green Cucumber',
            'tam' => 'பச்சை வெள்ளரி',
            'price' => 'Rs. <span>160.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
        [
            'image' => asset('assets/Images/items/8.png'),
            'sin' => 'බෙල්පෙපර්',
            'eng' => 'Bell Pepper Green',
            'tam' => 'பெல் மிளகு பச்சை',
            'price' => 'Rs. <span>60.00</span> (1kg)',
            'stock' => '100 Kilo Available in Stock',
        ],
    ];
    ?>

    <!-- Best Selling Items Section -->
    <section class="item-list">
        <div class="wrapper">
            <div class="col-1">
                <div class="common-title">
                    Best Selling
                </div>
                <div class="common-desc">
                    Lorem ipsum dolorsitamet consecteturon adipiscing elitsed doeiusmod tempore incididunte utlabore
                    etdolore magna aliquaenim adminim
                </div>
                <a href="{{ url('/product') }}" class="common-btn-1 btn-secondary">
                    <svg>
                        <use xlink:href="#btn_arr"></use>
                    </svg>
                    Explore all
                </a>
            </div>
            <div class="col-2">
                <div class="hm-food-slider owl-carousel">
                    @foreach ($bestSellingItems as $item)
                        <a href="{{ url('product-view/') }}/{{ $item['productID'] }}" class="item-link">
                            <div class="item">
                                <div class="wrap">
                                    <div class="wishlist">
                                        <svg>
                                            <use xlink:href="#heart"></use>
                                        </svg>
                                    </div>
                                    <div class="image">
                                        <img src="{{ $item['imageUri'] . '/' . $item['image'] }}"
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
                                            <svg>
                                                <use xlink:href="#btn_arr"></use>
                                            </svg>
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

    <?php
    $locations = [
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
        [
            'location' => 'Katuwana Industrial Park, Homagama, Colombo',
            'phone' => '+94 11-2345678',
            'email' => 'information@gamataecommerce.com',
        ],
    ];
    ?>
    <!-- Explore Section -->
    <section class="explore-section">
        <div class="wrapper">
            <div class="col-1">
                <div class="common-title">
                    Explore Our Network
                </div>
                <div class="common-desc">
                    Discover Gamata's presence across the region. Our branches are here to support your agricultural
                    journey, wherever you are.
                </div>
            </div>
            <div class="col-2">
                <div class="map">
                    <img src="{{ asset('assets/Images/map.jpg') }}" alt="map">
                    <div class="locations">
                        <div class="loc1">
                            <div class="text">Anuradhapura</div>
                            <svg>
                                <use xlink:href="#drop_pin"></use>
                            </svg>
                        </div>
                        <div class="loc2">
                            <div class="text">Kandy</div>
                            <svg>
                                <use xlink:href="#drop_pin"></use>
                            </svg>
                        </div>
                        <div class="loc3">
                            <div class="text"><span>Head Office</span>Colombo</div>
                            <svg>
                                <use xlink:href="#drop_pin"></use>
                            </svg>
                        </div>
                        <div class="loc4">
                            <div class="text">Galle</div>
                            <svg>
                                <use xlink:href="#drop_pin"></use>
                            </svg>
                        </div>
                        <div class="loc5">
                            <div class="text">Matara</div>
                            <svg>
                                <use xlink:href="#drop_pin"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="adresses">
                    <div class="dropdown">
                        <select name="cars" id="cars">
                            <option value="">Select Your City</option>
                            <option value="colombo">Colombo</option>
                            <option value="anuradhapura">Anuradhapura</option>
                            <option value="kandy">Kandy</option>
                            <option value="mathara">Mathara</option>
                            <option value="galle">Galle</option>
                        </select>


                        <!--<div class="custom-dropdown">-->
                        <!--      <div class="dropdown-header">-->
                        <!--      <span class="dropdown-selected">Select Your City</span>-->
                        <!--      <span class="dropdown-arrow"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="20px" viewBox="0,0,256,256"><g fill="#95c11f" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M3,12v-2c0,-0.386 0.223,-0.738 0.572,-0.904c0.349,-0.166 0.762,-0.115 1.062,0.13l10.366,8.482l10.367,-8.482c0.299,-0.245 0.712,-0.295 1.062,-0.13c0.35,0.165 0.571,0.518 0.571,0.904v2c0,0.3 -0.135,0.584 -0.367,0.774l-11,9c-0.369,0.301 -0.898,0.301 -1.267,0l-11,-9c-0.231,-0.19 -0.366,-0.474 -0.366,-0.774z"></path></g></g></svg>-->
                        <!--     </span>-->
                        <!--      </div>-->
                        <!--      <ul class="dropdown-list">-->
                        <!--       <li>Colombo</li>-->
                        <!--       <li>Anuradhapura/li>-->
                        <!--       <li>Kandy</li>-->
                        <!--       <li>Galle</li>-->
                        <!--     </ul>-->

                        <!--     </div>-->
                        <div class="address-slider owl-carousel">
                            @foreach ($exploreNetwork as $item)
                                <div class="item">
                                    <div class="wrap">
                                        <div class="location">
                                            <span>{{ $item['city'] }}</span><br>
                                            {{ $item['address'] }}
                                        </div>
                                        <div class="tel">
                                            <div class="icon">
                                                <svg>
                                                    <use xlink:href="#call"></use>
                                                </svg>
                                            </div>

                                            <a href="tel:{{ $item['phone'] }}" class="number">{{ $item['phone'] }}</a>
                                        </div>
                                        <div class="mail">
                                            <div class="icon">
                                                <svg>
                                                    <use xlink:href="#email"></use>
                                                </svg>
                                            </div>
                                            <a href="mailto:{{ $item['email'] }}"
                                                class="email">{{ $item['email'] }}</a>
                                        </div>
                                        <a href="#" target="_blank" class="common-btn-1 btn-secondary">
                                            <svg>
                                                <use xlink:href="#btn_arr"></use>
                                            </svg>
                                            Get Directions
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Journal Section -->
    {{-- <section class="journal-section">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                    <div class="top">
                        <div class="title">
                            Online Journal
                        </div>
                        <div class="desc">
                            Morem Insum Dolorsitame Consectetureon Mdiniscine Elitsed Doeiusmod
                        </div>
                    </div>
                    <a href="{{ url('/posts') }}" id = "blogBtn" class="common-btn-1 btn-secondary">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Explore
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="journal-carousel owl-carousel">
                    <div class="open-modal-btn item" style="cursor:pointer">
                        <div class="image">
                            <img src="{{ asset('assets/Images/j1.png') }}" alt="journal Image">
                        </div>
                        <div class="content">
                            <div class="category">Market Access</div>
                            <div class="desc">
                                <div class="title">
                                    Breaking Barriers Connecting Farmers to Markets
                                </div>
                                <div class="date">
                                    November 18, 2024
                                </div>
                                <span class="open-modal-btn common-btn-1 btn-secondary">
                                    <svg>
                                        <use xlink:href="#btn_arr"></use>
                                    </svg>
                                    Explore
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="item white open-modal-btn" style="cursor:pointer">
                        <div class="image">
                            <img src="{{ asset('assets/Images/jwbg.jpg') }}" alt="journal Image">
                        </div>
                        <div class="content">
                            <div class="category">Market Access</div>
                            <div class="desc">
                                <div class="title">
                                    Breaking Barriers Connecting Farmers to Markets
                                </div>
                                <div class="date">
                                    November 18, 2024
                                </div>
                                <span class="open-modal-btn common-btn-1 btn-secondary">
                                    <svg>
                                        <use xlink:href="#btn_arr"></use>
                                    </svg>
                                    Explore
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="item open-modal-btn" style="cursor:pointer">
                        <div class="image">
                            <img src="{{ asset('assets/Images/j1.png') }}" alt="journal Image">
                        </div>
                        <div class="content">
                            <div class="category">Market Access</div>
                            <div class="desc">
                                <div class="title">
                                    Breaking Barriers Connecting Farmers to Markets
                                </div>
                                <div class="date">
                                    November 18, 2024
                                </div>
                                <span class="common-btn-1">
                                    <svg>
                                        <use xlink:href="#btn_arr"></use>
                                    </svg>
                                    Explore
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}

    <!-- Journal Section -->
    <section class="journal-section">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                    <div class="top">
                        <div class="title">
                            Online Journal
                        </div>
                        <div class="desc">
                            Morem Insum Dolorsitame Consectetureon Mdiniscine Elitsed Doeiusmod
                        </div>
                    </div>
                    <a href="{{ url('/posts') }}" id = "blogBtn" class="common-btn-1 btn-secondary">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Explore
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="journal-carousel owl-carousel">
                    @foreach ($blogs as $item)
                        <a href="#" data-code="{{ $item['code'] }}" class="open-modal-btn item">
                        {{-- <div class="item open-modal-btn" style="cursor:pointer"> --}}
                            <div class="image">
                                {{-- <img src="{{ asset('assets/Images/j1.png') }}" alt="journal Image"> --}}
                                <img src="{{ $item['imageUri'].'/'.$item['image'] }}" alt="journal Image">
                            </div>
                            <div class="content">
                                <div class="category">{{ $item['category'] ?? 'Market Access' }}</div>
                                <div class="desc">
                                    <div class="title">
                                        {{ $item['subject'] ?? 'Breaking Barriers Connecting Farmers to Markets' }}
                                    </div>
                                    <div class="date">
                                        {{ Carbon\Carbon::parse($item['createdOn'])->format('F d, Y') }}
                                    </div>
                                    <span class="common-btn-1">
                                        <svg><use xlink:href="#btn_arr"></use></svg>
                                        Explore
                                    </span>

                                </div>
                            </div>
                        {{-- </div> --}}
                            </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    <!-- Community Section -->
    <?php
    $community_stats = [
        [
            'icon' => '#com_1',
            'title' => 'Over 20K',
            'sub_title' => 'Registered Users',
            'desc' => 'At Gamata.com, we are proud to connect farmers, consumers, and agricultural enthusiasts in a thriving online ecosystem.',
        ],
        [
            'icon' => '#com_2',
            'title' => '2,500+',
            'sub_title' => 'Fresh Products',
            'desc' => 'Offering a wide range of fresh vegetables, farm supplies, and essential products, all conveniently in one place.',
        ],
        [
            'icon' => '#com_3',
            'title' => '50,000+',
            'sub_title' => 'Deliveries',
            'desc' => 'Building strong connections between farms and homes across regions, fostering community and sustainable living.',
        ],
    ];
    ?>
    <section class="community-section">
        <div class="wrapper">
            <div class="col-1">
                <div class="common-title">
                    {{-- Our Community at a Glance --}}
                    {{ $communityText }}
                </div>
                <div class="common-desc">
                    At Gamata.com, we are proud to connect farmers, consumers, and agricultural enthusiasts in a thriving
                    online ecosystem.
                    With thousands of registered users
                </div>
            </div>
            <div class="col-2">
                <div class="community-slider owl-carousel">
                    {{-- @foreach ($community_stats as $stat)
                    <div class="item">
                        <div class="icon">
                            <svg>
                                <use xlink:href="#com_2"></use>
                            </svg>
                        </div>
                        <div class="content">
                            <div class="title">{{$stat['title']}}</div>
                            <div class="sub-title">{{$stat['sub_title']}}</div>
                            <div class="desc">{{$stat['desc']}}</div>
                        </div>
                    </div>
                @endforeach --}}


                    @foreach ($communityStats as $stat)
                        <div class="item">
                            <div class="icon">
                                <svg>
                                    <use xlink:href="{{ $stat['icon'] }}"></use>
                                </svg>
                            </div>
                            <div class="content">
                                <div class="title">{{ $stat['title'] }}</div>
                                <div class="sub-title">{{ $stat['sub_title'] }}</div>
                                <div class="desc">{{ $stat['desc'] }}</div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <?php
    $team_members = [
        [
            'name' => 'Nathan Davidson',
            'position' => 'CEO',
            'image' => asset('assets/Images/team/1.jpg'),
        ],
        [
            'name' => 'Jane Smith',
            'position' => 'Marketing Manager',
            'image' => asset('assets/Images/team/2.jpg'),
        ],
        [
            'name' => 'Michael Johnson',
            'position' => 'Lead Developer',
            'image' => asset('assets/Images/team/3.jpg'),
        ],
        [
            'name' => 'Michael Johnson',
            'position' => 'Lead Developer',
            'image' => asset('assets/Images/team/3.jpg'),
        ],
    ];
    ?>

    <section class="team-section">
        <div class="wrapper">
            <div class="col-1">
                <div class="common-title">
                    {{ $exploreTeamText }}
                </div>
                <a href="{{ url('/product') }}" class="common-btn-1 btn-secondary">
                    <svg>
                        <use xlink:href="#btn_arr"></use>
                    </svg>
                    Explore all
                </a>
            </div>
            <div class="col-2">
                <div class="team-slider owl-carousel">
                    @foreach ($exploreTeam as $member)
                        <div class="item">
                            <div class="image">
                                <img src="{{ $member['imageUri'] }}" alt="{{ $member['imageUri'] }}">
                            </div>
                            <div class="content">
                                <div class="name">{{ $member['name'] }}</div>
                                <div class="position">{{ $member['position'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
        integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
