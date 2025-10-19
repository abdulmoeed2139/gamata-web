@extends('websitePages.master')
@section('content')
<style>
/* Best selling products alignment fix */
.hm-food-slider .item {
    height: 100% !important;
    display: flex !important;
    flex-direction: column !important;
}

.hm-food-slider .item .wrap {
    height: 100% !important;
    display: flex !important;
    flex-direction: column !important;
}

.hm-food-slider .item .content {
    flex-grow: 1 !important;
    display: flex !important;
    flex-direction: column !important;
}

.hm-food-slider .item .pro-name {
    flex-grow: 1 !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: flex-start !important;
}

.hm-food-slider .item .price,
.hm-food-slider .item .stock {
    margin: 8px 0 !important;
}

.hm-food-slider .item .common-btn-1 {
    margin-top: auto !important;
    align-self: flex-start !important;
}
</style>
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
                'button_link' => url(app()->getLocale().'/login'),            ],
            [
                'type' => 'image',
                'mobile' => asset('assets/Images/banner/m-banner-1.png'),
                'tablet' => asset('assets/Images/banner/t-banner-1.png'),
                'desktop' => asset('assets/Images/banner/d-banner-1.png'),
                'subtitle' => 'Linking Farmers and Businesses',
                'title' => 'Lorem Ipsuim Dolar Sit Amet',
                'button_text' => 'Register Now',
                'button_link' => url(app()->getLocale().'/login'),            ],
            [
                'type' => 'image',
                'mobile' => asset('assets/Images/banner/m-banner-2.png'),
                'tablet' => asset('assets/Images/banner/t-banner-2.png'),
                'desktop' => asset('assets/Images/banner/d-banner-2.png'),
                'subtitle' => 'Linking Farmers and Businesses',
                'title' => 'Lorem Ipsuim Dolar Sit Amet',
                'button_text' => 'Register Now',
                'button_link' => url(app()->getLocale().'/login'),            ],
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
                        <div class="banner-subtitle">{{ __('messages.banner_subtitle') }}</div>
                        <div class="banner-title">{!! __('messages.banner_title_1') !!}</div>
                        @if (session('access_token'))
                               <a> </a>
                            @else
                            <a href="{{ $banner['button_link'] }}" class="banner-button ">
                                <svg>
                                    <use xlink:href="#btn_arr"></use>
                                </svg>
                                {{ __('messages.banner_button') }}
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
        ['title' => __('messages.step_1_title'), 'desc' => __('messages.step_1_desc')],
        ['title' => __('messages.step_2_title'), 'desc' => __('messages.step_2_desc')],
        ['title' => __('messages.step_3_title'), 'desc' => __('messages.step_3_desc')],
        ['title' => __('messages.step_4_title'), 'desc' => __('messages.step_4_desc')],
    ];
    @endphp


    <section class="sec-1">
        <div class="wrapper">
            <div class="col-1">
                <div class="title">
                    <!-- Transforming Agriculture with Gamata -->
                        {{ __('messages.banner_subtitle') }}

                </div>
                <div class="desc">
                    <!-- Gamata is your go-to platform to plan crops, trade produce, and connect with the farming community.
                    Whether you're growing,
                    selling, buying, or collaborating, Gamata brings everything you need to one place. -->
                       {{ __('messages.banner_title') }}

                </div>
                <div class="steps-cards owl-carousel" style="display: flex; justify-content: center; align-items: center;">
                    @foreach ($steps as $step)
                        <div class="item" style="text-align: center;">
                            <div class="title">
                                {{ $step['title'] }}
                            </div>
                            <div class="desc">
                                {{ $step['desc'] }}
                            </div>
                        </div>
                    @endforeach
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
                      {{ __('messages.vision_title') }}
                    </div>
                    <div class="title">
                            {{ __('messages.vision_heading') }}  </div>
                    <div class="desc">
                        {{ __('messages.vision_desc') }}
                        <!-- Empowering farmers and businesses through direct connections, Gamata simplifies the trading of fresh
                        produce while fostering
                        growth and collaboration. By bridging the gap between farmers and buyers, the platform enables
                        seamless transactions, enhances
                        transparency, and supports sustainable agricultural practices. -->
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
                       {{ __('messages.mission_title') }}
                    </div>
                    <div class="title">
                     {{ __('messages.mission_heading') }}
                    </div>
                    <div class="desc">
                       {{ __('messages.mission_desc') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Selling Items Section -->
    <section class="item-list">
        <div class="wrapper">
            <div class="col-1">
                <div class="common-title">
                {{ __('messages.best_selling') }}
                </div>
                <div class="common-desc">
                 {{ __('messages.best_selling_desc') }}

                </div>
                    <a href="{{ url(app()->getLocale().'/product') }}" class="common-btn-1 btn-secondary">
                    <svg>
                        <use xlink:href="#btn_arr"></use>
                    </svg>
                {{ __('messages.explore_all') }}
                </a>
            </div>
            <div class="col-2">
                <div class="hm-food-slider owl-carousel">
                    @foreach ($bestSellingItems as $item)
                        <a href="{{ url(app()->getLocale().'/product?childCode='.$item['productID']) }}" class="item-link">
                            <div class="item">
                                <div class="wrap">
                                    <div class="wishlist">
                                        <svg>
                                            @if (session('access_token'))
                                                <use xlink:href="#heart"></use>
                                            @endif
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
                                        <div class="price">Rs. <span>{{ $item['average_Price'] ?? 0 }}</span> (1Kg)</div>
                                        <div class="stock">{{ $item['total_Quantity'] ?? 0 }} {{ __('messages.kilo_available_in_stock') }} </div>
                                        <span class="common-btn-1">
                                            <svg>
                                                <use xlink:href="#btn_arr"></use>
                                            </svg>
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
                      {{ __('messages.explore_title') }}                </div>
                <div class="common-desc">
                    {{ __('messages.explore_desc') }}
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
                            <option value="">{{ __('messages.select_district') }}</option>
                            <option value="colombo">{{ __('messages.city_colombo') }}</option>
                            <option value="anuradhapura">{{ __('messages.city_anuradhapura') }}</option>
                            <option value="kandy">{{ __('messages.city_kandy') }}</option>
                            <option value="mathara">{{ __('messages.city_mathara') }}</option>
                            <option value="galle">{{ __('messages.city_galle') }}</option>
                        </select>



                        <div class="address-slider owl-carousel">
                            @if (isset($exploreNetwork))
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
                                             {{ __('messages.get_directions') }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            @endif
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
                            {{ __('messages.online_journal') }}
                        </div>
                        <div class="desc">
                            {{ __('messages.online_journal_desc') }}
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

    <!-- Journal Section -->
<section class="journal-section">
    <div class="wrapper">
        <div class="col-1">
            <div class="content">
                <div class="top">
                    <div class="title">
                        {{ __('messages.online_journal') }}
                    </div>
                    <div class="desc">
                        {{ __('messages.journal_description') }}
                    </div>
                </div>
                    <a href="{{ url(app()->getLocale().'/posts') }}" id="blogBtn" class="common-btn-1 btn-secondary">
                    <svg>
                        <use xlink:href="#btn_arr"></use>
                    </svg>
                    {{ __('messages.explore') }}
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="journal-carousel owl-carousel">
                    @if (isset($blogs) && !empty($blogs))
                        @foreach ($blogs as $item)
                            <a href="#" data-code="{{ $item['code'] }}" class="open-modal-btn item">
                                <div class="image">
                                    <img src="{{ $item['imageUri'].'/'.$item['image'] }}" alt="journal Image">
                                </div>
                                <div class="content">
                                    <div class="category">{{ $item['category'] ?? __('messages.default_category') }}</div>
                                    <div class="desc">
                                        <div class="title">
                                            {{ $item['subject'] ?? __('messages.default_subject') }}
                                        </div>
                                        <div class="date">
                                            {{ Carbon\Carbon::parse($item['createdOn'])->format('F d, Y') }}
                                        </div>
                                        <span class="common-btn-1">
                                            <svg><use xlink:href="#btn_arr"></use></svg>
                                            {{ __('messages.explore') }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 2; $i++)
                            <a href="#" class="open-modal-btn item" style="text-decoration: none; color: inherit;">
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
                                            <svg><use xlink:href="#btn_arr"></use></svg>
                                            {{ __('messages.explore') }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endfor
                    @endif
            </div>
        </div>
    </div>
</section>





    <!-- Community Section -->
    <?php
    $communityStats = [
    [
        'icon' => '#com_1',
        'title' => 'Over 20K',
        'sub_title' => __('messages.registered_users'),
        'desc' => __('messages.registered_users_desc'),
    ],
    [
        'icon' => '#com_2',
        'title' => '2,500+',
        'sub_title' => __('messages.fresh_products'),
        'desc' => __('messages.fresh_products_desc'),
    ],
    [
        'icon' => '#com_3',
        'title' => '50,000+',
        'sub_title' => __('messages.deliveries'),
        'desc' => __('messages.deliveries_desc'),
    ],
];

    ?>
    <!-- <section class="community-section">
        <div class="wrapper">
            <div class="col-1">
                <div class="common-title">
                    {{-- Our Community at a Glance --}}
                    {{-- {{ $communityText }} --}}
                </div>
                <div class="common-desc">
                    At Gamata.com, we are proud to connect farmers, consumers, and agricultural enthusiasts in a thriving
                    online ecosystem.
                    With thousands of registered users
                </div>
            </div>
            <div class="col-2">
                <div class="community-slider owl-carousel">
                    @if (isset($communityStats))
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
                    @else
                        @foreach ($community_stats as $stat)
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
                        @endforeach
                    @endif



                </div>
            </div>
        </div>
    </section> -->

    <!-- Community Section -->
<section class="community-section">
    <div class="wrapper">
        <div class="col-1">
            <div class="common-title">
                {{ __('messages.our_community_title') }}
            </div>
            <div class="common-desc">
                {{ __('messages.our_community_desc') }}
            </div>
        </div>
        <div class="col-2">
            <div class="community-slider owl-carousel">
                @if (isset($communityStats))
                    @foreach ($communityStats as $stat)
                        <div class="item">
                            <div class="icon">
                                <svg>
                                    <use xlink:href="{{ $stat['icon'] }}"></use>
                                </svg>
                            </div>
                            <div class="content">
                                <div class="title">{{ $stat['title'] }}</div>
                                <div class="sub-title">{{ __($stat['sub_title']) }}</div>
                                <div class="desc">{{ __($stat['desc']) }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($community_stats as $stat)
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
                    @endforeach
                @endif
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

                    {{ $exploreTeamText ?? __('messages.explore_our_team') }}

                </div>
                <a href="{{ url(app()->getLocale().'/product') }}" class="common-btn-1 btn-secondary">
                    <svg>
                        <use xlink:href="#btn_arr"></use>
                    </svg>
                     {{ __('messages.explore_all') }}
                </a>
            </div>
            <div class="col-2">
                <div class="team-slider owl-carousel">
                    @if (isset($exploreTeam))
                        @foreach ($exploreTeam as $member)
                            <div class="item">
                                <div class="image">
                                    <img src="{{ $member['imageUri'] }}/{{ $member['image'] }}" alt="{{ $member['imageUri'] }}">
                                </div>
                                <div class="content">
                                    <div class="name">{{ $member['name'] }}</div>
                                    <div class="position">{{ $member['position'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($team_members as $member)
                            <div class="item">
                                <div class="image">
                                    <img src="{{ $member['image'] }}" alt="">
                                </div>
                                <div class="content">
                                    <div class="name">{{ $member['name'] }}</div>
                                    <div class="position">{{ $member['position'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
        integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
