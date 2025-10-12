<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gamata.com</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital@0;1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/sass/header/site-header.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/footer/footer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/home.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/style.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    <style>
        .login-right-uni {
            flex: 1;
            background: url('/assets/Images/login-page.jpg') no-repeat center center/cover;
        }

        ..auth-btn {

            text-decoration: none;
        }


        @media (min-width: 1200px) {
            header .nav-container .nav-icons .user-bag .profile-dropdown ul li a {
                font-size: .8854166667vw;
                line-height: 1.1458333333vw;
                letter-spacing: -.0177083333vw;
                border-bottom: 1px solid #e1e1e1;
                display: block;
                padding: .5208333333vw .5208333333vw .5208333333vw .5208333333vw;
            }

            header .nav-container .nav-icons .user-bag .profile-dropdown.active {
                top: 4.4270833333vw;
            }

            header .nav-container .nav-icons .user-bag .profile-dropdown {
                top: 4.1666666667vw;
                right: 18.2291666667vw;
                background-color: #fff;
                box-shadow: 0 .2083333333vw .625vw rgba(0, 0, 0, .15);
                transition: .5s;
                width: 9.375vw;
                z-index: 99;
                visibility: hidden;
            }

            footer .wrapper .col-1 .row-1 {
                border-top: .0520833333vw solid #e1e1e1 !important;
            }

            body .chat-box .message-inner .bottom-cont .chat-display .chat-bot-message .chat-bot-text {
                background: #f1f5f9;
                width: 16.9270833333vw;
                padding: .5208333333vw .5208333333vw;
                border-radius: .4166666667vw .4166666667vw .4166666667vw 0;
                font-size: .9375vw;
                line-height: 1.0416666667vw;
                max-width: 100%;
            }


            .message-inner {
                height: 100% !important;
            }


        }


        header .nav-container .nav-icons .user-bag .profile-dropdown ul li a {
            text-decoration: none;
            color: #1d1d1b;
            position: relative;
            transition: .5s;
            font-family: "Barlow", serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 18px;
            letter-spacing: .34px;
            border-bottom: 1px solid #e1e1e1;
            display: block;
            padding: 10px 10px 10px 10px;
        }

        header .nav-container .nav-icons .user-bag .profile-dropdown ul {
            list-style-type: none;
            margin-bottom: 0;
            padding-left: 0;
            margin-top: 0;
            z-index: 99;
        }

        header .nav-container .nav-icons .user-bag .profile-dropdown.active {
            opacity: 1;
            visibility: visible;
            pointer-events: all;
            /*top: 72px;*/
            transition: .5s;
            z-index: 99999;
        }

        .profile-dropdown {
            /* margin-top:80px; */
            position: absolute;
            opacity: 0;


        }

        /*footer {*/
        /*    background: url(/assets/Images/d-bg.png) !important;*/
        /*}*/

        /* Open Button */
        #openChat {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
        }

        /* Modal (Chat Box) */
        .chat-box {
            display: none;
            position: fixed;
            right: 6.604167vw;
            ;
            bottom: 2.8645833333vw;
            height: 35.458333vw;
            width: 20.8333333333vw;
            background-color: #fff;
            /* border-radius: 10px; */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 999;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .chat-box.active {
            display: block;
        }

        .message-inner {
            display: flex;
            flex-direction: column;
            height: 600px;
        }

        .top-bar {
            background-color: #9fcd22;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .minus,
        .cross {
            width: 15px;
            height: 15px;
            /* background-color: white; */
            border-radius: 50%;
            cursor: pointer;
        }

        .bottom-cont {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chat-display {
            padding: 15px;
            flex-grow: 1;
            overflow-y: auto;

        }

        .chat-bot-message {
            display: flex;
            align-items: center;
            margin-bottom: 10px;

        }

        .chat-bot-img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .chat-bot-text {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 10px;
            max-width: 200px;
        }

        .chat-bot-text {
            background: #f1f5f9;
            width: 100%;
            padding: .5208333333vw .5208333333vw;
            border-radius: .4166666667vw .4166666667vw .4166666667vw 0;
            font-size: 16px;
            line-height: 26px;
            font-family: "Roboto", serif;
            font-weight: 400;
        }

        .chat-type-area {
            border-top: 1px solid #ddd;
            padding: 10px;
        }

        #text-message {
            width: 80%;
            padding: 5px 10px;
        }

        .chat-type-area button {
            background-color: #9fcd22;
            color: white;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
        }

        form#chat_form {
            display: flex;
        }

        form#chat_form #text-message {
            outline: none;
            border: none;
        }

        form#chat_form button {
            border-radius: 70%;
        }

        body .chat-box .message-inner .bottom-cont .chat-display .chat-bot-message img {
            border: 1px solid #d0d0d0;
            border-radius: 50%;
            padding: 6px 8px;
            width: .9375vw;
            height: .9375vw;
        }

        .product-listing .wrapper .col-2 .top-bar .row-1 {
            width: 100%;
        }

        .product-listing .wrapper .col-1 .search-bars input::placeholder {
            opacity: 0.3;
        }

        .journal-section .wrapper::after {
            background: url('{{ asset('assets/Images/jdbg.png') }}') !important;

        }

        footer::before {
            background: none !important;
        }

        /*modal css*/

        .custom-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            /*height: 100%;*/
            overflow: auto;
            /*background-color: #fff;*/
        }

        .custom-modal .modal-content {
            position: relative;
            background: #fff;
            /*margin: 5% auto;*/
            padding: 20px;
            border-radius: 12px;
            width: 100vw
                /*max-width: 800px;*/
                position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /*padding-top:30px;*/
        }

        .custom-modal .close {
            position: absolute;
            top: 5px;
            right: 12px;
            font-size: 40px;
            cursor: pointer;
            font-weight: 700;
            color: #92bd26;
        }

        @media (max-width: 1200px) {

            body .chat-box .message-inner .bottom-cont .chat-display .chat-bot-message img {
                width: 15px;
                height: 15px;
            }

            .chat-box {

                width: 27.833333vw;
            }

        }

        @media screen and (max-width: 1200px) and (min-width:768px) {
            .profile-dropdown.active {
                background: #fff !important;
            }

            .profile-dropdown {
                top: 80px;
                box-shadow: 0 .2083333333vw .625vw rgba(0, 0, 0, .15);
                transition: .5s;
            }
        }

        @media (max-width: 1024px) {
            .chat-box {
                max-height: 350px !important;
                bottom: 180px;
                margin: auto;
                width: 320px;
                right: 30px;

            }

            body .message-inner {
                max-height: 350px !important;
            }

            .chat-box {
                height: auto;
            }


            body .popup {
                bottom: 20px;
            }

            .chat-box {
                bottom: 80px;
            }

            .card-container {
                grid-template-columns: repeat(2, 1fr) !important;

            }

            .blog-container {
                flex-direction: column;
            }
        }

        @media (max-width: 767px) {
            .journal-section .wrapper .col-1 {
                background: url(/assets/Images/jdbg.png) !important;
                background-repeat: no-repeat, repeat;
                background-size: cover;
                background-position: center;
                padding: 20px;
            }

            .profile-dropdown {
                top: 80px;
                box-shadow: 0 .2083333333vw .625vw rgba(0, 0, 0, .15);
                transition: .5s;
            }

            .profile-dropdown.active {
                background: #fff !important
            }

            .profile-menus a {
                font-size: 14px !important
            }

            footer .wrapper .col-2 .wrapper-1 .row-1 .box .footer-menu a li {
                font-size: 16px;
            }

            .chat-box {
                max-height: 350px !important;
                bottom: 180px;
                margin: auto;
                width: 320px;
                right: 30px;

            }

            body .message-inner {
                max-height: 350px !important;
            }

            .chat-box {
                height: auto;
            }

            body .popup {
                bottom: 106px;
            }


            .login-wrapper-uni {
                flex-direction: column;
            }

            .login-right-uni {
                /*min-height:300px !important;*/
                display: none !important;
            }

            .login-left-uni {

                min-height: 80vh;

            }

            p.recaptcha-note {
                width: 100%;
                padding: 0;
            }

            .card-container {
                grid-template-columns: repeat(1, 1fr) !important;

            }

            body .account-wrapper {
                padding: 30px 8.5vw;
            }

            .card-container .card {
                padding: 20px 22px;
            }

        }
    </style>



</head>

@php
    $bodyClass = session('access_token') ? 'logged-in' : 'logged-out';

    // Current page segment
    $currentSegment = request()->segment(count(request()->segments()));

    $currentLang = app()->getLocale(); 

    // Combine all classes
    $finalClass = trim("$bodyClass $currentSegment $currentLang");
@endphp

<body class="{{ $finalClass }}">
    @if (
        !Request::is('/') &&
        !Request::is('login') &&
        !Request::is('verify-otp') &&
        !Request::is('register') &&
        !Request::is('forgot-password') &&
        !Request::is('forgot-password/verify-otp') &&
        !Request::is('forgot-password/reset') &&
        !Request::is('login-by-password')
    )
        <header class="">
            <nav class="nav-container">
                <a href="{{ url(app()->getLocale().'/index') }}" class="logo">
                    <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo">
                </a>

                <!-- Menu Links (Desktop & Mobile) -->
                <div class="main-menu">

                    <ul>
                        {{-- <li><a href="{{ url('/en/index') }}" class="{{ request()->is('index') ? 'active' : '' }}">Home</a>
                        </li>
                        <li><a href="{{ url('/en/product') }}"
                                class="{{ request()->is('product') ? 'active' : '' }}">Shop</a></li>
                        <li><a href="{{ url('/en/community') }}"
                                class="{{ request()->is('community') ? 'active' : '' }}">Community</a></li>
                        <li><a href="{{ url('/en/app-banner') }}"
                                class="{{ request()->is('app-banner') ? 'active' : '' }}">My Plan</a></li>
                        <li><a href="{{ url('/en/posts') }}" class="{{ request()->is('posts') ? 'active' : '' }}">Journal</a>
                        </li>
                        <li><a href="{{ url('/en/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact
                                Us</a></li> --}}

                                {{-- <a href="{{ url(app()->getLocale() . '/index') }}" class="logo">
    <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo">
</a> --}}

                <li><a href="{{ url(app()->getLocale() . '/index') }}" class="{{ request()->is(app()->getLocale().'/index') ? 'active' : '' }}">
                    {{ __('messages.home') }}
                </a></li>
                <li><a href="{{ url(app()->getLocale() . '/product') }}" class="{{ request()->is(app()->getLocale().'/product') ? 'active' : '' }}">
                    {{ __('messages.shop') }}
                </a></li>
                <li><a href="{{ url(app()->getLocale() . '/community') }}" class="{{ request()->is(app()->getLocale().'/community') ? 'active' : '' }}">
                    {{ __('messages.community') }}
                </a></li>
                <li><a href="{{ url(app()->getLocale() . '/app-banner') }}" class="{{ request()->is(app()->getLocale().'/app-banner') ? 'active' : '' }}">
                    {{ __('messages.my_plan') }}
                </a></li>
                <li><a href="{{ url(app()->getLocale() . '/posts') }}" class="{{ request()->is(app()->getLocale().'/posts') ? 'active' : '' }}">
                    {{ __('messages.journal') }}
                </a></li>
                <li><a href="{{ url(app()->getLocale() . '/contact') }}" class="{{ request()->is(app()->getLocale().'/contact') ? 'active' : '' }}">
                    {{ __('messages.contact_us') }}
                </a></li>

                    </ul>
                </div>

                <!-- Right-Side Icons -->
                <div class="nav-icons">
                    <div class="user-bag">
                        @if (session('access_token'))
                            <a href="#" class="icon user" id="profile-menu">
                                <svg>
                                    <use xlink:href="#user"></use>
                                </svg>
                                <!--<img src="{{ asset('assets/Images/logout.png') }}" alt="User" class="user-avatar" style="width: 30px; height: 30px; border-radius: 100%; object-fit: cover; border:1px solid #00000029; padding:3px">-->
                                <label for="profile ">{{ $username ?? 'Login' }}</label>
                                <div class="arrow-down"></div>
                            </a>
                        @else
                            <a href="{{ url(app()->getLocale().'/login') }}" class="icon user" id="">
                               
                                <label for="profile">{{ __('messages.login') }}</label>
                                 <!--<img src="{{ asset('assets/Images/logout.png') }}" alt="User" class="user-avatar" style="width: 30px; height: 30px; border-radius: 100%; object-fit: cover; border:1px solid #00000029; padding:3px">-->

                                 <svg width="15" height="25" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="12" height="22" fill="url(#pattern0_2015_344)"/>
                                    <defs>
                                    <pattern id="pattern0_2015_344" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_2015_344" transform="scale(0.0416667 0.0227273)"/>
                                    </pattern>
                                    <image id="image0_2015_344" width="24" height="44" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAsCAMAAABIQohxAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAWJQAAFiUBSVIk8AAAAbxQTFRF/////v7+/Pz8+/v7+vr68fHx6Ojo7Ozs/f399vb27u7u29vby8vL1NTU8vLy+fn53Nzcv7+/paWlmpqaqamp0NDQ+Pj4np6ehYWFfHx8iYmJrKys6urq9PT05eXlvb29oqKikZGRgICAdHR0eHh4jY2NtLS01dXV7+/v0dHRo6OjlJSUnJyckpKSfn5+enp6mZmZtbW13d3d8/Pz19fXvLy8srKyk5OTj4+PoaGhjIyM5OTk9fX16+vrxMTEm5ubsLCw0tLSw8PDoKCgwMDAhoaG3t7esbGxiIiIzMzMr6+v4ODgtra29/f339/fvr6+lpaWxsbG4+Pj6enp09PTuLi4qKioycnJlZWV5+fn5ubms7Ozt7e3h4eHg4ODz8/P4uLixcXF2traqqqqu7u72dnZnZ2dyMjIra2tx8fHrq6uq6urkJCQjo6OmJiYf39/goKCb29vaGhocHBwzc3NpqamdXV1ysrK4eHhn5+fwcHB2NjY8PDwubm57e3tioqKwsLCpKSk1tbWd3d3gYGBeXl5ampqfX19dnZ2Z2dnbGxshISEp6enl5eXe3t7zs7OcXFxi4uLurq6c3NzmNW6rgAAA5FJREFUeJxlk1tsU3Ucx8/vtD2nPb2s7brZbgxKd9My1nWwlWKVmzi5lGFExKkjvhhjMCYaXiTxwZgoJj6Y+IC86MM2gyAGWW3INjbZyjqHrCCUbJ0NtZedXlivW3t6OcfTlg7Jfg//5P/7/P75/25fQCoGCABCIwhTuVZOQAGgQGNUGVUAzsaXjHoK8HOiVWHJH5cmqP8BVBHFMKwIsng2kXkCOHXwxFw0swaqxOKyM6gECPvpSj5IJySIpY0ltBTTgo1NGkpf7wR4pGC9q8KkZK7GnedRZbCdAMgIpjvTMggwXuPUCyMlwIf94GoBjzrmrm0AuLEreZ2fKAJOsy5SE6aVQJL6S9vvCPMa1UimCKrSx4GNHzex4N9GcHI8LYnbDABeeAdmwwqDzeTQX34Vhd9opjX0kGJbV3/ojxjyYrjVchjGO2zC7CvgdpBcQBW9t/huQUKFRNQ7kOu7h5XElpWolX2Bq/deKByxd3n1bCEha7t82YFoUgvAqXsDkr8Igls7XN5jZGYzDDRrLRHzReASb15TN08u6upTkN713csPnW/7dUPVPqiNf2Jrk8IXiGRHlWxhUW+V9/K42Xk7mMWNA8Iu5kLW+KeJzJ84Zxj74PfXr2y+BYKP5p6Rz/RkvhFINPsGfdWhM8PRfqC+hYYaIzulwSP3eDhJivDaZy/ib7GNGIOG5M5qrVMz1L0clJLxgyFXzjj1HpzNsOCQbBZdODWxRXozzGv7h0QItD9Q/xk0PIft+fI1lde+B7USJ+PLQ8ZgQPrSHRMIOrNpos134AqTO4ZmBN8LGXEs15SKsnU8D4Xm5ZmTA+ITzA2nKZVIo55taTtb+QHteUmSBEybU6aPzk4iRKrfpvkVOMZGC/3+PQuj5ytS3IkqJPXhVZXPmwHOwcnPf4of/1qEd2/9EfPxmjpjPpfhrh9QFD0buJTczVh7g+zMTzvHz6zkf0hSwEdquuQR17ucUTzmVqvmdUqrNOhPsTNHUCGzLWbKL9V5HulyjqMP7hoW5CNUca/wdi4WIAz33eIOSx8iGnXRK3R5E/OfekY/PnfK3bQyYYg2/T1I0eXdBVzSevt06P686PDMhk2RDefDj5ealaUian6w2odFkz/L1PaiPpg1DebB/Fff9M3uaV5ZhLAmZ/NcC4mnFwtPybkEYtrhup6v1oNauX/vmGxpPeCqNvZMOSLMOsDPGWfa5zDqMfgPmg6KqJU7TbsAAAAASUVORK5CYII="/>
                                    </defs>
                                 </svg>

                               
                            </a>
                        @endif


                        @if (session('access_token'))
                            <div class="profile-dropdown">
                                <ul>
                                    <li class="profile-menus">
                                        <a href="#">{{ __('messages.my_dashboard') }}</a>
                                    </li>
                                    <li class="profile-menus">
                                        <a href="#">{{ __('messages.my_profile') }}</a>
                                    </li>
                                    <li class="profile-menus">
                                        <a href="#">{{ __('messages.settings') }}</a>
                                    </li>
                                    <li class="profile-menus">
                                        <a href="{{ route('logout') }}">{{ __('messages.logout') }}</a>
                                    </li>
                                </ul>

                            </div>
                        @endif

                        <a href="{{ url('/en/app-banner') }}" class="icon cart">
                            <svg>
                                <use xlink:href="#bag"></use>
                            </svg>
                        </a>
                    </div>

                    <!-- Language Selector -->
                    <!-- <div class="language">
                        <div class="title">
                            Select your Language
                        </div>
                        <div class="wrap">
                            <a href="#" class="lan">
                                <svg>
                                    <use xlink:href="#sinhala"></use>
                                </svg>
                            </a>
                            <a href="#" class="lan active">
                                <svg>
                                    <use xlink:href="#english"></use>
                                </svg>
                            </a>
                            <a href="#" class="lan">
                                <svg>
                                    <use xlink:href="#tamil"></use>
                                </svg>
                            </a>
                        </div>
                    </div> -->


                 <!-- Language Selector -->
                    <div class="language">
                        <div class="title">
                            Select your Language
                        </div>
                        <div class="wrap">
                            <a href="#" class="lan" data-lang="si">
                                <svg>
                                    <use xlink:href="#sinhala"></use>
                                </svg>
                            </a>
                            <a href="#" class="lan active" data-lang="en">
                                <svg>
                                    <use xlink:href="#english"></use>
                                </svg>
                            </a>
                            <a href="#" class="lan" data-lang="ta">
                                <svg>
                                    <use xlink:href="#tamil"></use>
                                </svg>
                            </a>
                        </div>
                    </div>



                    <!-- Search Button -->
                    <button class="search-toggle">
                        <svg>
                            <use xlink:href="#search"></use>
                        </svg>
                    </button>

                    <!-- Mobile Menu Toggle -->
                    <label class="main-menu-btn" for="main-menu-state">
                        <span class="main-menu-btn-icon"></span>
                        <div class="menu-txt">Menu</div>
                    </label>
                </div>
            </nav>

            <!-- Search Bar (Hidden by Default) -->
            <div class="search-bar">
                <form class="search-form" action="{{ url('/en/product') }}" method="GET">
                    <div class="wrapper">
                        <svg>
                            <use xlink:href="#search"></use>
                        </svg>
                        <input type="text" name="search" placeholder="{{ __('messages.search_your_keyword') }}" class="search-input"
                            autocomplete="off">
                        <button type="submit" class="search-button">{{ __('messages.search') }}</button>
                    </div>
                </form>
            </div>

        </header>
    @endif
    
    @if (
        !Request::is('/') &&
        !Request::is('login') &&
        !Request::is('verify-otp') &&
        !Request::is('register') &&
        !Request::is('forgot-password') &&
        !Request::is('forgot-password/verify-otp') &&
        !Request::is('forgot-password/reset') &&
        !Request::is('login-by-password')
    )
    @if (session('access_token'))
         <div class="popup">
              <img src="{{ asset('assets/Images/msg-popup.png') }}" alt="popup">
              </div>
              @else
               <div class="popup">
                                    <!-- <img src="{{ asset('assets/Images/msg-popup.png') }}" alt="popup"> -->
               </div>
                                        
          @endif
    @endif




    @yield('content')
    @if (
        !Request::is('/') &&
        !Request::is('login') &&
        !Request::is('register') &&
        !Request::is('forgot-password') &&
        !Request::is('forgot-password/verify-otp') &&
        !Request::is('forgot-password/reset') &&
        !Request::is('login-by-password')
    )

    <footer class="site-footer">

        <div class="wrapper">
            <div class="col-1">
                <div class="row-1">
                    <div class="box-1">
                        <svg>
                            <use xlink:href="#news_icon"></use>
                        </svg>
                        <div class="text">
                             {{ __('messages.newsletter_signup') }}
                            <span>{{ __('messages.newsletter_desc') }}</span>
                        </div>
                    </div>
                    <div class="box-2">
                        <form id="emailForm" action="/" method="post">
                            <input type="email" name="newsletter-email" id="email"
                                placeholder="{{ __('messages.enter_email_here') }}" required>
                        </form>
                    </div>

                    <div class="box-3">
                        <form id="subscribeForm">
                            @csrf
                            <input type="hidden" name="email" id="emailForSubscribe">
                            <a href="#" class="common-btn-1" id="subscribeBtn">
                                <svg>
                                    <use xlink:href="#btn_arr"></use>
                                </svg>
                                  {{ __('messages.subscribe') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="wrapper-1">
                    <div class="row-1">
                        <div class="box">
                           <ul class="footer-menu mobile-fmenu">
    <li>
        <a href="{{ url(app()->getLocale() . '/index') }}" 
           class="{{ request()->is(app()->getLocale().'/index') ? 'active' : '' }}">
           {{ __('messages.home') }}
        </a>
    </li>
    <li>
        <a href="{{ url(app()->getLocale() . '/product') }}" 
           class="{{ request()->is(app()->getLocale().'/product') ? 'active' : '' }}">
           {{ __('messages.shop') }}
        </a>
    </li>
    <li>
        <a href="{{ url(app()->getLocale() . '/community') }}" 
           class="{{ request()->is(app()->getLocale().'/community') ? 'active' : '' }}">
           {{ __('messages.community') }}
        </a>
    </li>
    <li>
        <a href="{{ url(app()->getLocale() . '/app-banner') }}" 
           class="{{ request()->is(app()->getLocale().'/app-banner') ? 'active' : '' }}">
           {{ __('messages.my_plan') }}
        </a>
    </li>
    <li>
        <a href="{{ url(app()->getLocale() . '/posts') }}" 
           class="{{ request()->is(app()->getLocale().'/posts') ? 'active' : '' }}">
           {{ __('messages.journal') }}
        </a>
    </li>
    <li>
        <a href="{{ url(app()->getLocale() . '/contact') }}" 
           class="{{ request()->is(app()->getLocale().'/contact') ? 'active' : '' }}">
           {{ __('messages.contact_us') }}
        </a>
    </li>
</ul>

                        </div>
                        <div class="box-1">
                            <div class="title">
                               {{ __('messages.head_office') }}
                            </div>
                            <div class="text">
                                Aethria Solutions (Pvt) Ltd <br>Level 35 & 37, World Trade Center, West Tower, Colombo
                                01, Sri Lanka
                            </div>
                        </div>
                        <div class="box-2">
                            <div class="title">
                               {{ __('messages.email') }}
                            </div>
                            <div class="text">
                                <a href="mailto:info@aethriasolutions.com">info@aethriasolutions.com</a>
                            </div>
                        </div>
                        <div class="box-3">
                            <div class="title">
                               {{ __('messages.contact') }}
                            </div>
                            <div class="text">
                                <a href="tel:�6�7+94 771 856 567">94 771 856 56767</a>
                            </div>
                        </div>
                    </div>
                    <div class="row-2">
                        <div class="box-1">
                         <ul class="footer-menu">
                            <li>
                                <a href="{{ url(app()->getLocale() . '/index') }}" 
                                class="{{ request()->is(app()->getLocale().'/index') ? 'active' : '' }}">
                                {{ __('messages.home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url(app()->getLocale() . '/product') }}" 
                                class="{{ request()->is(app()->getLocale().'/product') ? 'active' : '' }}">
                                {{ __('messages.shop') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url(app()->getLocale() . '/community') }}" 
                                class="{{ request()->is(app()->getLocale().'/community') ? 'active' : '' }}">
                                {{ __('messages.community') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url(app()->getLocale() . '/app-banner') }}" 
                                class="{{ request()->is(app()->getLocale().'/app-banner') ? 'active' : '' }}">
                                {{ __('messages.my_plan') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url(app()->getLocale() . '/posts') }}" 
                                class="{{ request()->is(app()->getLocale().'/posts') ? 'active' : '' }}">
                                {{ __('messages.journal') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url(app()->getLocale() . '/contact') }}" 
                                class="{{ request()->is(app()->getLocale().'/contact') ? 'active' : '' }}">
                                {{ __('messages.contact_us') }}
                                </a>
                            </li>
                        </ul>

                        </div>
                        <div class="box-2">
                            <div class="title">{{ __('messages.we_are_available_on') }}</div>
                            <div class="image">
                                <img src="{{ asset('assets/Images/playstore.png') }}" alt="playsore">
                                <img src="{{ asset('assets/Images/appstore.png') }}" alt="appstore">
                            </div>
                        </div>
                        <div class="box-3">
                            <ul>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#fb_icon"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#x_icon"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#yt"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#linkedin"></use>
                                        </svg>
                                    </li>
                                </a>
                                <a href="#" target="_blank">
                                    <li>
                                        <svg>
                                            <use xlink:href="#insta"></use>
                                        </svg>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="row-3">
                        <div class="cont">
                            <div class="copyright">{{ __('messages.copyright') }}</div>
                            <div class="author">{{ __('messages.designed_by') }}<a href="https://aethriasolutions.com/"
                                    target="_blank">Aethria</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chat Modal -->
        <div class="chat-box" id="chatModal">
            <div class="message-inner">
                <div class="top-bar">
                    <div class="minus"></div>
                    <div class="cross" id="closeChat">X</div>
                </div>
                <div class="bottom-cont">
                    <div class="chat-display">
                        <div class="chat-bot-message">
                            <img class="chat-bot-img" src="{{ asset('assets/Images/gamata-chat-icon.png') }}"
                                alt="chat-bot-icon">
                            <div class="chat-bot-text">
                            {{ __('messages.chat_welcome') }}                            </div>
                        </div>
                    </div>
                    <div class="chat-type-area">
                        <form id="chat_form" onsubmit="return false;">
                            <input id="text-message" type="text" placeholder="{{ __('messages.chat_placeholder') }}">
                            <button type="submit">
                                <i class="fas fa-arrow-up"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    @endif


    <!-- All Blogs Modal Code Start -->
    <div class="custom-modal" id="modal1">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="blog-container">
                <!-- Left Column -->
                <div class="blog-left-column">
                    <img id="blog-img" src="http://feapi.aethriasolutions.com/uploads/Blog/" alt="Blog Image" class="blog-main-image">
                    <div class="blog-post-meta">
                    <svg>
                        <use xlink:href="#user"></use>
                        </svg>
                    <span>Posted by Admin · <span id="blog-date"> </span></span>
                    </div>

                    <div id="blog-content"></div>
                </div>

                <!-- Right Column -->
                <div class="blog-right-column">
                    <h3>Categories</h3>
                    <div class="blog-search-box">
                        <input type="text" placeholder="Search...">
                    </div>
                    <div class="blog-categories">
                        <ul>
                            <li id="blog-ctg"></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- All Blogs Modal Code End -->


    <!-- svg inline sprite -->
    <svg xmlns="//www.w3.org/2000/svg" style="display:none" aria-hidden="true">
        <!-- Sinhala Icon -->
        <symbol id="sinhala" viewBox="0 0 17 13" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0.878906 9.36328C0.878906 9.28125 0.884766 9.19922 0.896484 9.11719C0.966797 8.15625 1.44141 7.50586 2.32031 7.16602C1.16016 7.18945 0.416016 7.23047 0.0878906 7.28906V6.70898H4.81641C4.82812 6.69727 4.83398 6.67969 4.83398 6.65625C4.83398 6.39844 4.77539 6.15234 4.6582 5.91797C4.42383 5.49609 4.10156 5.28516 3.69141 5.28516C3.28125 5.30859 2.97656 5.52539 2.77734 5.93555C2.66016 6.28711 2.41406 6.46875 2.03906 6.48047C1.99219 6.48047 1.93945 6.47461 1.88086 6.46289C1.56445 6.39258 1.40625 6.18164 1.40625 5.83008C1.40625 5.75977 1.41211 5.68359 1.42383 5.60156C1.54102 5.10938 1.95117 4.79297 2.6543 4.65234C2.05664 4.30078 1.75195 3.78516 1.74023 3.10547C1.74023 2.54297 1.91602 2.05664 2.26758 1.64648C2.94727 0.873047 4.0957 0.486328 5.71289 0.486328C6.45117 0.486328 7.11914 0.580078 7.7168 0.767578C9.04102 1.18945 9.70312 1.96875 9.70312 3.10547C9.69141 3.77344 9.38672 4.28906 8.78906 4.65234C8.80078 4.65234 8.81836 4.6582 8.8418 4.66992C9.56836 4.8457 9.93164 5.28516 9.93164 5.98828C9.88477 6.35156 9.7207 6.65625 9.43945 6.90234C9.5918 6.98438 9.73828 7.07812 9.87891 7.18359C10.4766 7.6875 10.7754 8.34375 10.7754 9.15234C10.7754 9.72656 10.6582 10.2305 10.4238 10.6641C9.94336 11.5547 9.09961 12 7.89258 12C6.81445 11.9883 6.08789 11.5195 5.71289 10.5938C5.31445 11.5312 4.57031 12.0059 3.48047 12.0176C2.84766 12.0176 2.29688 11.8242 1.82812 11.4375C1.19531 10.9102 0.878906 10.2188 0.878906 9.36328ZM6.5918 6.67383C6.84961 6.60352 7.20117 6.56836 7.64648 6.56836C8.16211 6.56836 8.60156 6.62695 8.96484 6.74414C9.12891 6.56836 9.2168 6.35742 9.22852 6.11133C9.22852 6.04102 9.2168 5.9707 9.19336 5.90039C9.06445 5.52539 8.68945 5.33789 8.06836 5.33789C7.99805 5.33789 7.92773 5.34375 7.85742 5.35547C7.08398 5.42578 6.66211 5.86523 6.5918 6.67383ZM7.76953 9.97852C8.12109 9.97852 8.4375 9.93164 8.71875 9.83789C9.44531 9.5918 9.80859 9.12891 9.80859 8.44922C9.79688 7.52344 9.09961 7.05469 7.7168 7.04297C7.17773 7.04297 6.62695 7.0957 6.06445 7.20117C6.06445 7.17773 6.05859 7.14844 6.04688 7.11328C6.04688 7.06641 6.04688 7.03125 6.04688 7.00781C6.04688 6.62109 6.10547 6.26367 6.22266 5.93555C6.51562 5.15039 7.06055 4.70508 7.85742 4.59961C8.44336 4.43555 8.74805 4.10742 8.77148 3.61523C8.77148 3.50977 8.74805 3.4043 8.70117 3.29883C8.39648 2.73633 7.40039 2.45508 5.71289 2.45508C5.60742 2.45508 5.50195 2.45508 5.39648 2.45508C3.55664 2.50195 2.63672 2.88867 2.63672 3.61523C2.64844 4.10742 2.98242 4.44727 3.63867 4.63477C3.87305 4.66992 4.08984 4.73438 4.28906 4.82812C5.01562 5.19141 5.37891 5.88867 5.37891 6.91992V7.16602H3.91992C3.63867 7.16602 3.36328 7.20117 3.09375 7.27148C2.28516 7.48242 1.88086 7.91016 1.88086 8.55469C1.88086 8.75391 1.93359 8.94727 2.03906 9.13477C2.34375 9.69727 2.92969 9.97852 3.79688 9.97852C4.03125 9.97852 4.25391 9.95508 4.46484 9.9082C5.15625 9.75586 5.50195 9.4043 5.50195 8.85352V8.50195H5.97656V8.85352C5.98828 9.5918 6.58594 9.9668 7.76953 9.97852ZM12.5775 8.7832C12.5775 9.36914 12.8353 9.82031 13.3509 10.1367C13.6322 10.3008 13.9252 10.3828 14.2298 10.3828C14.8509 10.3828 15.3197 10.125 15.6361 9.60938C15.7884 9.35156 15.8646 9.07617 15.8646 8.7832C15.8646 8.19727 15.6068 7.75195 15.0912 7.44727C14.8216 7.29492 14.5345 7.21875 14.2298 7.21875C13.6088 7.21875 13.1341 7.4707 12.806 7.97461C12.6537 8.23242 12.5775 8.50195 12.5775 8.7832ZM11.7513 9.16992C11.7513 8.36133 12.0853 7.71094 12.7533 7.21875C13.1986 6.90234 13.6908 6.74414 14.2298 6.74414C15.0619 6.74414 15.724 7.07227 16.2162 7.72852C16.5443 8.16211 16.7084 8.64258 16.7084 9.16992C16.7084 9.97852 16.3744 10.6289 15.7064 11.1211C15.2611 11.4375 14.7689 11.5957 14.2298 11.5957C13.3978 11.5957 12.7357 11.2676 12.2435 10.6113C11.9154 10.1777 11.7513 9.69727 11.7513 9.16992Z" />
        </symbol>

        <!-- English Icon -->
        <symbol id="english" viewBox="0 0 19 12" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M8.73438 2.52344H2.64062V4.96875H8.23438V6.96875H2.64062V9.92969H9.01562V12H0.289062V0.484375H8.73438V2.52344ZM15.1097 3.28125C15.9899 3.28125 16.7086 3.51302 17.2659 3.97656C17.8284 4.4349 18.1097 5.19792 18.1097 6.26562V12H15.8284V6.82031C15.8284 6.3724 15.7685 6.02865 15.6488 5.78906C15.43 5.35156 15.0133 5.13281 14.3988 5.13281C13.6435 5.13281 13.1253 5.45312 12.8441 6.09375C12.6982 6.43229 12.6253 6.86458 12.6253 7.39062V12H10.4066V3.5H12.555V4.74219C12.8415 4.30469 13.1123 3.98958 13.3675 3.79688C13.8258 3.45312 14.4066 3.28125 15.1097 3.28125Z" />
        </symbol>

        <!-- Tamil Icon -->
        <symbol id="tamil" viewBox="0 0 14 16" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.548 0.946V2.566H9.028V4.528H9.262C9.766 4.528 10.27 4.6 10.774 4.744C11.278 4.876 11.728 5.092 12.124 5.392C12.532 5.692 12.862 6.088 13.114 6.58C13.366 7.06 13.492 7.648 13.492 8.344C13.492 9.1 13.342 9.76 13.042 10.324C12.742 10.888 12.322 11.356 11.782 11.728C11.254 12.112 10.624 12.394 9.892 12.574C9.172 12.766 8.386 12.862 7.534 12.862H3.97C3.358 12.862 3.052 13.12 3.052 13.636C3.052 13.792 3.076 13.948 3.124 14.104C3.172 14.26 3.238 14.422 3.322 14.59L1.414 15.238C1.27 14.998 1.138 14.71 1.018 14.374C0.91 14.05 0.856 13.714 0.856 13.366C0.856 12.634 1.072 12.076 1.504 11.692C1.948 11.32 2.53 11.134 3.25 11.134H7.444C8.116 11.134 8.692 11.062 9.172 10.918C9.652 10.774 10.042 10.57 10.342 10.306C10.654 10.054 10.882 9.754 11.026 9.406C11.17 9.058 11.242 8.674 11.242 8.254C11.242 7.63 11.068 7.132 10.72 6.76C10.372 6.376 9.886 6.184 9.262 6.184H9.028V7.102C9.028 8.062 8.71 8.818 8.074 9.37C7.438 9.91 6.514 10.18 5.302 10.18C4.738 10.18 4.216 10.108 3.736 9.964C3.268 9.82 2.86 9.616 2.512 9.352C2.164 9.088 1.888 8.77 1.684 8.398C1.492 8.026 1.396 7.606 1.396 7.138C1.396 6.814 1.444 6.52 1.54 6.256C1.636 5.98 1.762 5.74 1.918 5.536C2.086 5.32 2.272 5.146 2.476 5.014C2.692 4.882 2.914 4.792 3.142 4.744V0.946H11.548ZM4.78 6.13C4.396 6.13 4.084 6.226 3.844 6.418C3.616 6.598 3.502 6.862 3.502 7.21C3.502 7.606 3.664 7.93 3.988 8.182C4.312 8.422 4.762 8.542 5.338 8.542C5.878 8.542 6.292 8.41 6.58 8.146C6.88 7.882 7.03 7.522 7.03 7.066V6.13H4.78ZM5.122 4.546H7.066V2.566H5.122V4.546Z" />
        </symbol>

        <!-- User -->
        <symbol id="user" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12.5 5.10205C14.8951 5.10205 16.8367 7.10076 16.8367 9.56634C16.8367 12.0319 14.8951 14.0306 12.5 14.0306C10.1049 14.0306 8.16327 12.0319 8.16327 9.56634C8.16327 7.10081 10.1049 5.10205 12.5 5.10205ZM12.5 6.88777C11.1029 6.88777 9.94898 8.07559 9.94898 9.56634C9.94898 11.0571 11.1029 12.2449 12.5 12.2449C13.8971 12.2449 15.051 11.0571 15.051 9.56634C15.051 8.07559 13.8971 6.88777 12.5 6.88777Z"
                fill="#95C11F" />
            <path
                d="M12.5 0C19.4036 0 25 5.59643 25 12.5C25 17.1507 22.4601 21.2083 18.6918 23.3612C16.9295 24.3761 14.8919 24.9683 12.7182 24.9988L12.5 25C5.59643 25 0 19.4036 0 12.5C0 5.59643 5.59643 0 12.5 0ZM11.3321 17.0918C9.04681 17.0918 7.01712 18.541 6.27091 20.6931L6.15554 21.0665C7.92729 22.4098 10.1098 23.1823 12.3955 23.2133L12.6771 23.2129C14.5634 23.1823 16.3312 22.6642 17.86 21.7792L18.8453 21.126L18.735 20.7873C18.0261 18.6147 16.019 17.1346 13.7412 17.0927L11.3321 17.0918ZM12.5 1.78571C6.58266 1.78571 1.78571 6.58266 1.78571 12.5C1.78571 15.3359 2.88752 17.9146 4.68645 19.8311C5.75526 17.1146 8.3842 15.3061 11.3322 15.3061H13.6422C16.5971 15.3061 19.2314 17.1231 20.2956 19.8501C22.1052 17.9317 23.2143 15.3454 23.2143 12.5C23.2143 6.58266 18.4173 1.78571 12.5 1.78571Z"
                fill="#95C11F" />
            <defs>
                <clipPath id="clip0_191_1143">
                    <rect fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <!-- Bag -->
        <symbol id="bag" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M15 9.1875C14.4475 9.1875 14 9.60703 14 10.125C14 11.6756 12.654 12.9375 11 12.9375C9.346 12.9375 8 11.6756 8 10.125C8 9.60703 7.5525 9.1875 7 9.1875C6.4475 9.1875 6 9.60703 6 10.125C6 12.7097 8.243 14.8125 11 14.8125C13.757 14.8125 16 12.7097 16 10.125C16 9.60703 15.5525 9.1875 15 9.1875Z"
                fill="#95C11F" />
            <path
                d="M21.976 20.8322L19.992 6.25641C19.9905 6.24656 19.988 6.23719 19.9865 6.22781C19.9835 6.20906 19.98 6.19031 19.976 6.17203C19.973 6.15937 19.9695 6.14719 19.966 6.135C19.961 6.11719 19.956 6.09984 19.95 6.0825C19.9455 6.06937 19.94 6.05672 19.935 6.04406C19.9285 6.02813 19.9225 6.01266 19.915 5.99719C19.9085 5.98359 19.9015 5.97047 19.8945 5.95734C19.887 5.94375 19.88 5.92969 19.872 5.91609C19.864 5.9025 19.855 5.88984 19.8465 5.87672C19.838 5.86406 19.83 5.85188 19.821 5.83969C19.8115 5.82703 19.8015 5.81484 19.7915 5.80266C19.782 5.79094 19.772 5.77922 19.762 5.76797C19.7515 5.75672 19.741 5.74594 19.73 5.73516C19.7185 5.72391 19.7075 5.71266 19.6955 5.70187C19.6845 5.69203 19.6735 5.68266 19.6625 5.67375C19.6495 5.66297 19.6365 5.65219 19.623 5.64234C19.612 5.63391 19.6005 5.62641 19.589 5.61844C19.5745 5.60859 19.56 5.59875 19.545 5.58938C19.5335 5.58234 19.5215 5.57578 19.5095 5.56922C19.494 5.56031 19.478 5.55187 19.462 5.54391C19.4495 5.53781 19.4365 5.53219 19.4235 5.52656C19.4075 5.51953 19.3915 5.5125 19.3755 5.50641C19.361 5.50078 19.346 5.49609 19.331 5.49141C19.3155 5.48625 19.3005 5.48109 19.285 5.47687C19.268 5.47219 19.2505 5.46844 19.233 5.46422C19.219 5.46094 19.205 5.45766 19.191 5.45531C19.1715 5.45156 19.152 5.44922 19.132 5.44687C19.119 5.44547 19.1065 5.44359 19.0935 5.44219C19.073 5.44031 19.0525 5.43984 19.0315 5.43937C19.0215 5.43937 19.0115 5.43797 19.0015 5.43797H16.0015V4.68797C16 2.10281 13.757 0 11 0C8.243 0 6 2.10281 6 4.6875V5.4375H3C2.9895 5.4375 2.9795 5.43844 2.9695 5.43891C2.949 5.43937 2.9285 5.43984 2.908 5.44172C2.895 5.44266 2.882 5.44453 2.869 5.44641C2.849 5.44875 2.8295 5.45156 2.81 5.45484C2.796 5.45719 2.7825 5.46047 2.769 5.46375C2.751 5.46797 2.7335 5.47172 2.7155 5.47641C2.7005 5.48063 2.6865 5.48531 2.672 5.49C2.656 5.49516 2.6405 5.50031 2.625 5.50641C2.61 5.51203 2.595 5.51859 2.5805 5.52516C2.566 5.53125 2.552 5.53781 2.538 5.54437C2.5235 5.55141 2.509 5.55937 2.495 5.56734C2.4815 5.57484 2.468 5.58234 2.455 5.59031C2.4415 5.59875 2.4285 5.60719 2.4155 5.61609C2.4025 5.625 2.3895 5.63391 2.3765 5.64328C2.3645 5.65219 2.353 5.66156 2.3415 5.67141C2.3285 5.68172 2.316 5.6925 2.304 5.70328C2.2935 5.71266 2.2835 5.7225 2.274 5.73234C2.262 5.74453 2.2495 5.75672 2.238 5.76937C2.229 5.77922 2.2205 5.79 2.212 5.80031C2.201 5.81391 2.19 5.82703 2.1795 5.84109C2.1715 5.85187 2.164 5.86359 2.156 5.87484C2.1465 5.88891 2.137 5.90297 2.1285 5.9175C2.121 5.93016 2.114 5.94281 2.1075 5.95594C2.1 5.97 2.0925 5.98359 2.086 5.99813C2.079 6.01266 2.073 6.02812 2.067 6.04313C2.0615 6.05625 2.056 6.06938 2.0515 6.08297C2.0455 6.09984 2.0405 6.11719 2.0355 6.13453C2.032 6.14719 2.028 6.15937 2.025 6.17203C2.0205 6.19031 2.0175 6.20906 2.0145 6.22734C2.013 6.23719 2.0105 6.24656 2.009 6.25641L0.0235 20.8331C0.008 20.9498 0 21.0689 0 21.1875C0 22.7381 1.346 24 3 24H19C20.654 24 22 22.7381 22 21.1875C22 21.0698 21.992 20.9508 21.976 20.8322ZM8 4.6875C8 3.13687 9.346 1.875 11 1.875C12.654 1.875 14 3.13687 14 4.6875V5.4375H8V4.6875ZM19 22.125H3C2.4485 22.125 2 21.7045 2 21.1875C2 21.1472 2.0025 21.1073 2.0075 21.0694L3.88 7.3125H18.119L19.9915 21.068C19.997 21.1073 19.9995 21.1477 19.9995 21.1875C19.9995 21.7045 19.551 22.125 18.9995 22.125H19Z"
                fill="#95C11F" />
            <defs>
                <clipPath id="clip0_191_608">
                    <rect width="22" height="24" fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <!-- Bag -->
        <symbol id="search" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="10.5" cy="10.5" r="9" stroke-width="3" />
            <circle cx="23.5" cy="18.5" r="1.5" stroke-width="2" />
        </symbol>

        <!-- Button Arrow -->
        <symbol id="btn_arr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29">
            <path
                d="M28.1891 15.6601L15.6601 28.1891C15.3524 28.4968 14.9351 28.6697 14.5 28.6697C14.0649 28.6697 13.6476 28.4968 13.3399 28.1891C13.0323 27.8814 12.8594 27.4641 12.8594 27.029C12.8594 26.5939 13.0323 26.1766 13.3399 25.8689L23.0683 16.1406L1.97097 16.1406C1.53584 16.1406 1.11854 15.9678 0.810862 15.6601C0.503184 15.3524 0.330331 14.9351 0.330331 14.5C0.33033 14.0649 0.503183 13.6476 0.810862 13.3399C1.11854 13.0322 1.53584 12.8594 1.97097 12.8594L23.0683 12.8594L13.3399 3.13107C13.0323 2.82339 12.8594 2.40609 12.8594 1.97097C12.8594 1.53585 13.0323 1.11855 13.3399 0.810876C13.6476 0.5032 14.0649 0.330349 14.5 0.330349C14.9351 0.330349 15.3524 0.5032 15.6601 0.810876L28.1891 13.3399C28.4968 13.6476 28.6697 14.0649 28.6697 14.5C28.6697 14.9351 28.4968 15.3524 28.1891 15.6601Z" />
        </symbol>

        <!-- Left Arrow -->
        <symbol id="left_arr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M7.07277 15.3372L0.311162 8.57546C-0.10378 8.16052 -0.10378 7.48774 0.311162 7.0728L7.07277 0.311189C7.48771 -0.103752 8.16049 -0.103752 8.57543 0.311189C8.99037 0.726131 8.99037 1.39877 8.57543 1.81371L3.62758 6.7617L20.8958 6.7617C21.4826 6.7617 21.9583 7.23742 21.9583 7.8242C21.9583 8.41098 21.4826 8.8867 20.8958 8.8867L3.62758 8.8867L8.57543 13.8346C8.99037 14.2495 8.99037 14.9223 8.57543 15.3372C8.16049 15.7521 7.48771 15.7521 7.07277 15.3372Z" />
        </symbol>

        <!-- Right Arrow -->
        <symbol id="right_arr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M14.8855 0.311196L21.6471 7.07292C22.062 7.48786 22.062 8.16063 21.6471 8.57558L14.8855 15.3372C14.4705 15.7521 13.7978 15.7521 13.3828 15.3372C12.9679 14.9222 12.9679 14.2496 13.3828 13.8347L18.3307 8.88668H1.0625C0.475702 8.88668 0 8.41096 0 7.82418C0 7.23739 0.475702 6.76168 1.0625 6.76168H18.3307L13.3828 1.8138C12.9679 1.39887 12.9679 0.726123 13.3828 0.311196C13.7978 -0.103732 14.4705 -0.103732 14.8855 0.311196Z" />
        </symbol>

        <!-- Heart -->
        <!-- <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 16">
        <path d="M17.4735 1.56783C15.4071 -0.522327 12.0455 -0.522327 9.97966 1.56783L9.49983 2.05302L9.02028 1.56783C6.95443 -0.52261 3.59255 -0.52261 1.52671 1.56783C-0.497192 3.61555 -0.510334 6.8614 1.49623 9.11819C3.32635 11.1758 8.72388 15.6212 8.95289 15.8094C9.10836 15.9372 9.29542 15.9995 9.48137 15.9995C9.48752 15.9995 9.49367 15.9995 9.49955 15.9992C9.69193 16.0082 9.8857 15.9415 10.0462 15.8094C10.2752 15.6212 15.6733 11.1758 17.504 9.11791C19.5103 6.8614 19.4971 3.61555 17.4735 1.56783ZM16.2569 7.98258C14.83 9.58641 10.9077 12.8942 9.49955 14.068C8.09137 12.8945 4.16997 9.58698 2.74334 7.98287C1.34355 6.40874 1.33041 4.16694 2.71286 2.76823C3.4189 2.05416 4.34613 1.69684 5.27335 1.69684C6.20057 1.69684 7.1278 2.05387 7.83384 2.76823L8.88857 3.83537C9.01412 3.9624 9.17239 4.03822 9.33848 4.06481C9.60804 4.12338 9.90052 4.04727 10.1102 3.83565L11.1655 2.76823C12.5779 1.3398 14.8753 1.34008 16.2868 2.76823C17.6692 4.16694 17.6561 6.40874 16.2569 7.98258Z"/>
        </symbol> -->
        <symbol id="heart" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="m22.128 3.901c-1.21-1.226-2.819-1.901-4.532-1.901s-3.321.675-4.531 1.9l-1.065 1.08-1.065-1.079c-1.21-1.226-2.819-1.901-4.531-1.901-1.713 0-3.322.675-4.532 1.901-2.491 2.524-2.491 6.631 0 9.153l9.594 9.722c.141.144.333.224.534.224s.393-.08.534-.224l9.594-9.721c2.491-2.523 2.491-6.629 0-9.154z" />
            <path
                d="m11.466 22.776c.141.144.333.224.534.224s.393-.08.534-.224l9.594-9.721c2.491-2.523 2.491-6.63 0-9.154-1.21-1.226-2.819-1.901-4.532-1.901s-3.321.675-4.531 1.9l-1.065 1.08-1.065-1.079c-1.21-1.226-2.819-1.901-4.531-1.901-1.713 0-3.322.675-4.532 1.901-2.491 2.524-2.491 6.631 0 9.153zm-8.527-17.822c.926-.937 2.157-1.454 3.464-1.454 1.308 0 2.538.517 3.463 1.455l1.599 1.62c.281.285.786.285 1.067 0l1.599-1.621c.928-.937 2.158-1.454 3.465-1.454 1.308 0 2.538.517 3.464 1.454 1.917 1.943 1.917 5.104 0 7.048l-9.06 9.181-9.061-9.182c-1.917-1.942-1.917-5.104 0-7.047z" />
        </symbol>

        <!-- Call -->
        <symbol id="call" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
            <path
                d="M22.3567 17.396C22.3213 17.3667 18.3287 14.5093 17.2453 14.6967C16.7247 14.7887 16.4267 15.1433 15.83 15.8547C15.734 15.9693 15.5027 16.2433 15.324 16.4387C14.9469 16.3158 14.5791 16.1661 14.2233 15.9907C12.387 15.0967 10.9033 13.613 10.0093 11.7767C9.83391 11.4209 9.68419 11.0531 9.56133 10.676C9.75733 10.4967 10.032 10.2653 10.1493 10.1667C10.8567 9.57333 11.2113 9.27533 11.3033 8.754C11.492 7.67467 8.63333 3.67867 8.604 3.64267C8.47382 3.45804 8.30426 3.30462 8.10758 3.19348C7.9109 3.08234 7.69199 3.01626 7.46667 3C6.308 3 3 7.29067 3 8.014C3 8.056 3.06067 12.3253 8.32533 17.6807C13.6747 22.9393 17.944 23 17.986 23C18.7093 23 23 19.692 23 18.5333C22.9838 18.3079 22.9176 18.089 22.8063 17.8923C22.6951 17.6956 22.5415 17.526 22.3567 17.396ZM17.9127 21.6627C17.33 21.6147 13.7473 21.142 9.268 16.7413C4.84467 12.238 4.384 8.64533 4.338 8.08867C5.21185 6.7171 6.26719 5.47001 7.47533 4.38133C7.502 4.408 7.53733 4.448 7.58267 4.5C8.50922 5.76482 9.30738 7.11885 9.96533 8.542C9.75137 8.75725 9.52522 8.96003 9.288 9.14933C8.92013 9.42963 8.58232 9.74733 8.28 10.0973L8.118 10.324L8.166 10.598C8.30709 11.2092 8.52317 11.8005 8.80933 12.3587C9.83459 14.464 11.5358 16.165 13.6413 17.19C14.1994 17.4766 14.7908 17.6929 15.402 17.834L15.676 17.882L15.9027 17.72C16.254 17.4163 16.573 17.0772 16.8547 16.708C17.0633 16.4587 17.3427 16.126 17.448 16.032C18.8752 16.6893 20.2327 17.4884 21.5 18.4173C21.5553 18.464 21.594 18.5 21.62 18.5233C20.5315 19.7318 19.2844 20.7874 17.9127 21.6613V21.6627Z" />
        </symbol>

        <!-- Mail -->
        <symbol id="email" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
            <path
                d="M23.7148 3.85938H2.28516C1.02258 3.85938 0 4.8883 0 6.14453V19.8555C0 21.1192 1.0301 22.1406 2.28516 22.1406H23.7148C24.9669 22.1406 26 21.1235 26 19.8555V6.14453C26 4.89054 24.9815 3.85938 23.7148 3.85938ZM23.3948 5.38281C22.9279 5.84721 14.8933 13.8396 14.6159 14.1155C14.1842 14.5472 13.6104 14.7848 13 14.7848C12.3896 14.7848 11.8158 14.5471 11.3827 14.1141C11.1961 13.9285 3.25015 6.02438 2.60518 5.38281H23.3948ZM1.52344 19.5454V6.45557L8.10662 13.0041L1.52344 19.5454ZM2.60614 20.6172L9.18673 14.0784L10.3069 15.1927C11.0263 15.9121 11.9827 16.3082 13 16.3082C14.0173 16.3082 14.9737 15.9121 15.6917 15.1942L16.8133 14.0784L23.3939 20.6172H2.60614ZM24.4766 19.5454L17.8934 13.0041L24.4766 6.45557V19.5454Z" />
        </symbol>

        <!-- Drop Pin -->
        <symbol id="drop_pin" viewBox="0 0 46 68" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_dddd_250_2482)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M32.6544 25.2928C35.011 22.8477 36.4603 19.5221 36.4603 15.8581C36.4603 8.34865 30.3727 2.26105 22.8632 2.26105C15.3538 2.26105 9.26617 8.34865 9.26617 15.8581C9.26617 19.5221 10.7154 22.8477 13.072 25.2927L19.152 33.9652C20.9566 36.5393 24.7698 36.5393 26.5744 33.9652L32.6544 25.2928Z"
                    fill="#004216" fill-opacity="0.5" />
            </g>
            <path
                d="M22.8705 23.6955C21.9187 23.6955 21.0825 23.512 20.3619 23.1448C19.6412 22.7641 19.0769 22.2338 18.669 21.554C18.2747 20.8741 18.0776 20.0923 18.0776 19.2085V13.5793C18.0776 12.6955 18.2747 11.9137 18.669 11.2338C19.0769 10.554 19.6412 10.0305 20.3619 9.66336C21.0825 9.28265 21.9187 9.09229 22.8705 9.09229C23.8087 9.09229 24.6381 9.27585 25.3588 9.64297C26.093 10.0101 26.6573 10.5268 27.0516 11.193C27.4459 11.8457 27.6431 12.5867 27.6431 13.4161V13.6813C27.6431 13.8173 27.5751 13.8852 27.4391 13.8852H26.399C26.263 13.8852 26.195 13.8173 26.195 13.6813V13.4365C26.195 12.5255 25.8891 11.7845 25.2772 11.2134C24.6789 10.6424 23.8767 10.3568 22.8705 10.3568C21.8643 10.3568 21.0553 10.6491 20.4434 11.2338C19.8316 11.8185 19.5256 12.5867 19.5256 13.5385V19.2493C19.5256 20.2011 19.8384 20.9693 20.4638 21.554C21.0893 22.1387 21.9119 22.431 22.9317 22.431C23.9243 22.431 24.7129 22.159 25.2976 21.6152C25.8959 21.0713 26.195 20.3438 26.195 19.4328V17.5768C26.195 17.5225 26.1678 17.4953 26.1134 17.4953H23.1153C22.9793 17.4953 22.9113 17.4273 22.9113 17.2913V16.4347C22.9113 16.2987 22.9793 16.2307 23.1153 16.2307H27.4391C27.5751 16.2307 27.6431 16.2987 27.6431 16.4347V19.0657C27.6431 20.5206 27.208 21.656 26.3378 22.4718C25.4812 23.2876 24.3254 23.6955 22.8705 23.6955Z"
                fill="white" />
            <defs>
                <filter id="filter0_dddd_250_2482" x="0.201479" y="-0.00512648" width="45.3235" height="67.6274"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="1.13309" />
                    <feGaussianBlur stdDeviation="1.69963" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_250_2482" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="5.66543" />
                    <feGaussianBlur stdDeviation="2.83272" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.17 0" />
                    <feBlend mode="normal" in2="effect1_dropShadow_250_2482" result="effect2_dropShadow_250_2482" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="12.464" />
                    <feGaussianBlur stdDeviation="3.9658" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                    <feBlend mode="normal" in2="effect2_dropShadow_250_2482" result="effect3_dropShadow_250_2482" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="22.6617" />
                    <feGaussianBlur stdDeviation="4.53235" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0" />
                    <feBlend mode="normal" in2="effect3_dropShadow_250_2482" result="effect4_dropShadow_250_2482" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect4_dropShadow_250_2482" result="shape" />
                </filter>
            </defs>
        </symbol>

        <!-- Newsletter Icon -->
        <symbol id="news_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43 36">
            <g clip-path="url(#clip0_224_242)">
                <path
                    d="M21.5003 24.675C22.5919 24.675 23.6318 24.32 24.508 23.6489L43 9.47526V5.19228C43 2.32938 40.7394 0 37.961 0H5.03904C2.26064 0 0 2.32938 0 5.19228V9.47526L18.4926 23.6482C19.3688 24.3193 20.4087 24.6743 21.5003 24.6743V24.675ZM39.6409 7.73649L22.5031 20.8717C21.9034 21.3312 21.0978 21.3312 20.4982 20.8717L3.3604 7.73649V5.19228C3.3604 4.2382 4.11374 3.4613 5.04029 3.4613H37.961C38.8869 3.4613 39.6409 4.23755 39.6409 5.19228V7.73649Z" />
                <path
                    d="M3.35978 16.3643V30.8072C3.35978 31.7613 4.11311 32.5382 5.03967 32.5382H37.961C38.8869 32.5382 39.6409 31.762 39.6409 30.8072V16.3643L43 13.7896V30.8072C43 33.6708 40.7394 36.0002 37.961 36.0002H5.03904C2.26064 36.0002 0 33.6708 0 30.8079V13.7896L3.35915 16.3643H3.35978Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_242">
                    <rect fill="white" transform="matrix(-1 0 0 1 43 0)" />
                </clipPath>
            </defs>
        </symbol>

        <!-- Facebook -->
        <symbol id="fb_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 18">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5.32556 5.90971V4.36222C5.32209 4.18238 5.33232 4.00256 5.35617 3.82445C5.37859 3.69063 5.42652 3.56296 5.49702 3.44915C5.57878 3.31811 5.70566 3.22562 5.85091 3.19121C6.06419 3.1378 6.28323 3.11436 6.50235 3.12155H7.98285V0.0187254H5.61701C5.08525 -0.0351829 4.54865 0.0276074 4.04111 0.203189C3.53357 0.37877 3.06614 0.663308 2.66831 1.0388C2.01773 1.88553 1.69728 2.96115 1.77195 4.04752V5.91491H0V9.01005H1.77195V18H5.32313V9.01005H7.68773L8 5.91491H5.32313L5.32556 5.90971Z" />
        </symbol>

        <!-- X -->
        <symbol id="x_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 15">
            <g clip-path="url(#clip0_224_268)">
                <path
                    d="M8.33187 6.35143L13.5437 0H12.3087L7.7833 5.51493L4.16885 0H0L5.46572 8.33949L0 15H1.23515L6.01405 9.1761L9.83115 15H14L8.33163 6.35143H8.33198H8.33187ZM6.64032 8.413L6.0865 7.58262L1.68012 0.974706H3.57712L7.13312 6.30739L7.68693 7.13777L12.3093 14.0694H10.4123L6.64032 8.41312V8.41275V8.413Z" />
                <path
                    d="M8.33163 6.35143H8.33187L13.5437 0H12.3087L7.7833 5.51493L4.16885 0H0L5.46572 8.33949L0 15H1.23515L6.01405 9.1761L9.83115 15H14L8.33163 6.35143Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_268">
                    <rect width="14" height="15" fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <!-- Youtube -->
        <symbol id="yt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 13">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M19.1523 1.25415C18.9346 0.861455 18.5945 0.541244 18.178 0.336775C17.7615 0.132306 17.2886 0.0534171 16.8232 0.110699C15.6251 0.0304149 12.6145 0 10.0071 0C7.39967 0 4.3813 0.0304149 3.17937 0.110699C2.71338 0.0536936 2.24012 0.132672 1.82307 0.337072C1.40603 0.541473 1.06517 0.861509 0.846353 1.25415C0.287256 2.16404 0 3.7344 0 6.50178C0 9.25456 0.287256 10.8347 0.846353 11.7398C1.06703 12.1313 1.40758 12.4508 1.82354 12.6568C2.23951 12.8627 2.71159 12.9454 3.17811 12.8941C4.37489 12.9586 7.38678 13 10.0058 13C12.6248 13 15.6238 12.9586 16.8219 12.8941C17.2884 12.9474 17.7611 12.8655 18.1773 12.6594C18.5935 12.4532 18.9335 12.1325 19.1523 11.7398C19.7153 10.8372 20 9.25705 20 6.50913V6.50059C20.0038 3.73443 19.7166 2.16404 19.1523 1.25415ZM7.50399 10.0502V2.9571L13.7533 6.50423L7.50399 10.0502Z" />
        </symbol>

        <!-- Linked In -->
        <symbol id="linkedin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0.0025387 5.31051H3.80443V16.9988H0.0025387V5.31051ZM14.1608 5.44797C14.1194 5.43673 14.0817 5.42294 14.0353 5.41044C13.9889 5.39794 13.9336 5.38674 13.8809 5.37924C13.6566 5.3337 13.4283 5.31068 13.1993 5.31051C12.3921 5.34653 11.6039 5.56658 10.8956 5.9538C10.1872 6.34103 9.57765 6.88506 9.1138 7.54392V5.31051H5.31187V16.9988H9.1138V10.6247C9.1138 10.6247 11.9868 6.62529 13.1993 9.56236V17H17V9.11366C16.9999 8.27618 16.7213 7.46234 16.2076 6.79917C15.694 6.136 14.9743 5.66086 14.1608 5.44797ZM1.86016 1.51232e-05C2.22993 -0.00146944 2.59182 0.106375 2.89998 0.309876C3.20814 0.513376 3.44871 0.80339 3.59119 1.14315C3.73367 1.48291 3.77163 1.85711 3.70032 2.21839C3.629 2.57967 3.45162 2.91175 3.1906 3.17254C2.92957 3.43333 2.59667 3.6111 2.23409 3.68333C1.87151 3.75555 1.49555 3.71901 1.15386 3.57828C0.812169 3.43756 0.520091 3.19896 0.314683 2.89281C0.109275 2.58665 -0.000234903 2.22668 1.05907e-05 1.85849C-0.000816286 1.61452 0.0467839 1.3728 0.140052 1.14719C0.233321 0.921585 0.370435 0.716525 0.543515 0.543835C0.716595 0.371144 0.922229 0.234197 1.14861 0.140871C1.375 0.0475449 1.61767 -0.000315517 1.86269 1.51232e-05H1.86016Z" />
        </symbol>

        <!-- Insta -->
        <symbol id="insta" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path
                d="M12 0H4C1.8002 0 0 1.79941 0 4V12C0 14.1998 1.8002 16 4 16H12C14.1998 16 16 14.1998 16 12V4C16 1.79941 14.1998 0 12 0ZM8 11.3332C6.15879 11.3332 4.6666 9.84039 4.6666 8C4.6666 6.15879 6.15879 4.6666 8 4.6666C9.84039 4.6666 11.3334 6.15879 11.3334 8C11.3334 9.84039 9.84039 11.3332 8 11.3332ZM12.3334 4.6666C11.7806 4.6666 11.3334 4.21879 11.3334 3.6666C11.3334 3.11441 11.7806 2.6666 12.3334 2.6666C12.8862 2.6666 13.3334 3.11441 13.3334 3.6666C13.3334 4.21879 12.8862 4.6666 12.3334 4.6666Z" />
        </symbol>

        <!-- community-icons -->
        <!-- 1 -->
        <symbol id="com_1" viewBox="0 0 70 70" xmlns="http://www.w3.org/2000/svg">
            <path id="Vector"
                d="M60.5402 32.3336C62.59 30.8932 63.9474 28.4971 63.9474 25.7962C63.9474 21.378 60.374 17.8046 55.9557 17.8046C51.5374 17.8046 47.964 21.378 47.964 25.7962C47.964 28.4971 49.3075 30.8932 51.3712 32.3336C49.6122 32.9431 48.0055 33.8849 46.6482 35.1037C44.7784 33.5109 42.5762 32.2921 40.1662 31.5719C43.0886 29.799 45.0554 26.5719 45.0554 22.9015C45.0554 17.3059 40.5263 12.7769 34.9307 12.7769C29.3352 12.7769 24.8061 17.3198 24.8061 22.9015C24.8061 26.5719 26.759 29.799 29.6953 31.5719C27.313 32.2921 25.1385 33.4971 23.2826 35.0622C21.9252 33.871 20.3463 32.9431 18.615 32.3475C20.6648 30.9071 22.0222 28.5109 22.0222 25.8101C22.0222 21.3918 18.4488 17.8184 14.0305 17.8184C9.61219 17.8184 6.03878 21.3918 6.03878 25.8101C6.03878 28.5109 7.38227 30.9071 9.44598 32.3475C3.94737 34.245 0 39.4666 0 45.6023V46.5165C0 46.5442 0.0277008 46.5719 0.0554017 46.5719H16.9945C16.8975 47.3336 16.8421 48.1231 16.8421 48.9126V49.8544C16.8421 53.9264 20.1385 57.2228 24.2105 57.2228H45.6787C49.7507 57.2228 53.0471 53.9264 53.0471 49.8544V48.9126C53.0471 48.1231 52.9917 47.3336 52.8947 46.5719H69.9446C69.9723 46.5719 70 46.5442 70 46.5165V45.6023C69.9723 39.4528 66.0388 34.2311 60.5402 32.3336ZM50.1801 25.7824C50.1801 22.5968 52.7701 20.0068 55.9557 20.0068C59.1413 20.0068 61.7313 22.5968 61.7313 25.7824C61.7313 28.9264 59.1967 31.4888 56.0665 31.558C56.0249 31.558 55.9972 31.558 55.9557 31.558C55.9141 31.558 55.8864 31.558 55.8449 31.558C52.7008 31.5026 50.1801 28.9403 50.1801 25.7824ZM26.9945 22.9015C26.9945 18.5386 30.5402 14.9929 34.903 14.9929C39.2659 14.9929 42.8116 18.5386 42.8116 22.9015C42.8116 27.112 39.5014 30.5608 35.3601 30.7962C35.2078 30.7962 35.0554 30.7962 34.903 30.7962C34.7507 30.7962 34.5983 30.7962 34.446 30.7962C30.3047 30.5608 26.9945 27.112 26.9945 22.9015ZM8.2133 25.7824C8.2133 22.5968 10.8033 20.0068 13.9889 20.0068C17.1745 20.0068 19.7645 22.5968 19.7645 25.7824C19.7645 28.9264 17.2299 31.4888 14.0997 31.558C14.0582 31.558 14.0305 31.558 13.9889 31.558C13.9474 31.558 13.9197 31.558 13.8781 31.558C10.7479 31.5026 8.2133 28.9403 8.2133 25.7824ZM17.3823 44.342H2.24377C2.86704 38.4417 7.85319 33.8156 13.9058 33.7741C13.9335 33.7741 13.9612 33.7741 13.9889 33.7741C14.0166 33.7741 14.0443 33.7741 14.072 33.7741C16.9529 33.7879 19.5845 34.8544 21.6205 36.5857C19.626 38.7464 18.144 41.4057 17.3823 44.342ZM50.8033 49.8544C50.8033 52.6938 48.4903 55.0068 45.651 55.0068H24.1828C21.3435 55.0068 19.0305 52.6938 19.0305 49.8544V48.9126C19.0305 40.3115 25.9003 33.2755 34.446 33.0262C34.5983 33.04 34.7645 33.04 34.9169 33.04C35.0693 33.04 35.2355 33.04 35.3878 33.0262C43.9335 33.2755 50.8033 40.3115 50.8033 48.9126V49.8544ZM52.4515 44.342C51.6898 41.4195 50.2355 38.8018 48.2548 36.6411C50.3047 34.8683 52.964 33.8018 55.8726 33.7741C55.9003 33.7741 55.928 33.7741 55.9557 33.7741C55.9834 33.7741 56.0111 33.7741 56.0388 33.7741C62.0914 33.8156 67.0776 38.4417 67.7008 44.342H52.4515Z" />
        </symbol>

        <!-- 2 -->
        <symbol id="com_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <path
                d="M21.0521 24.0344C21.6125 24.1129 22.1312 23.7219 22.2097 23.1611C22.6647 19.9104 25.4876 17.4589 28.7761 17.4589H41.2237C44.5122 17.4589 47.3352 19.9103 47.7902 23.1611C47.8619 23.6737 48.3011 24.0444 48.8043 24.0444C48.8517 24.0444 48.8995 24.0411 48.9478 24.0344C49.5086 23.9559 49.8996 23.4376 49.8211 22.8768C49.2439 18.7527 45.7583 15.611 41.6276 15.4176L43.3467 11.2749C43.6269 10.5996 43.4581 9.84561 42.9167 9.35424C42.375 8.86287 41.6084 8.76758 40.9634 9.11211L38.4312 10.464L36.6989 6.38498C36.4087 5.70207 35.742 5.26074 35 5.26074C34.258 5.26074 33.5912 5.70207 33.3011 6.38498L31.5688 10.464L29.0365 9.11225C28.3916 8.76799 27.6247 8.86314 27.0832 9.35437C26.5417 9.84574 26.3729 10.5996 26.6532 11.275L28.3723 15.4177C24.2416 15.611 20.7559 18.7528 20.1787 22.8768C20.1002 23.4376 20.4913 23.9559 21.0521 24.0344ZM35 7.63117L36.6145 11.4328C35.601 11.9626 34.3987 11.9626 33.3853 11.4328L35 7.63117ZM32.3924 13.2284C32.3925 13.2284 32.3925 13.2284 32.3924 13.2284C34.0251 14.1 35.9747 14.1 37.6076 13.2284L41.0864 11.3714L39.4112 15.4081H30.5886L28.9135 11.3714L32.3924 13.2284Z" />
            <path
                d="M67.6074 39.7434H65.0892C65.2213 39.0374 65.2913 38.3097 65.2913 37.566C65.2913 31.3826 60.5268 26.292 54.4763 25.7704V23.3136L54.5547 23.3794C55.5089 24.179 56.6781 24.5787 57.8478 24.5785C59.0171 24.5785 60.1867 24.1788 61.1406 23.3794L62.2779 22.4264C62.6664 22.1008 62.8891 21.6234 62.8891 21.1164C62.8891 20.6095 62.6663 20.132 62.2779 19.8066L61.1406 18.8536C59.2324 17.2545 56.4627 17.2545 54.5546 18.8536L54.4761 18.9193V17.7355C54.4761 17.1692 54.017 16.7101 53.4507 16.7101C52.8845 16.7101 52.4254 17.1692 52.4254 17.7355V25.7704C46.3749 26.292 41.6104 31.3826 41.6104 37.566C41.6104 38.3097 41.6804 39.0374 41.8124 39.7434H26.8505L29.1015 34.7886C29.6059 33.6784 29.7668 32.4557 29.5668 31.2529C29.2864 29.5669 28.3046 28.0645 26.8732 27.1307C25.4417 26.1967 23.6709 25.9038 22.0149 26.3268L18.2046 27.2996V17.7354C18.2046 17.1691 17.7455 16.71 17.1793 16.71C16.613 16.71 16.1539 17.1691 16.1539 17.7354V18.9192L16.0754 18.8534C14.1672 17.2544 11.3974 17.2544 9.48937 18.8534L8.35215 19.8065C7.96373 20.132 7.74088 20.6095 7.74088 21.1163C7.74088 21.6232 7.96359 22.1006 8.35229 22.4263L9.48937 23.3792C10.4435 24.1788 11.6129 24.5784 12.7824 24.5784C13.9519 24.5784 15.1214 24.1786 16.0754 23.3792L16.1539 23.3135V27.2996L12.3437 26.3268C10.6877 25.9038 8.91693 26.1969 7.48535 27.1308C6.05391 28.0646 5.07213 29.5671 4.79172 31.2531C4.5917 32.456 4.75262 33.6785 5.25697 34.7887L7.50805 39.7435H2.39258C1.07338 39.7435 0 40.8169 0 42.1361V46.5276C0 47.8468 1.07338 48.9202 2.39258 48.9202H2.75078V67.6075C2.75078 68.9267 3.82416 70.0001 5.14336 70.0001H64.8566C66.1758 70.0001 67.2492 68.9267 67.2492 67.6075V59.1574C67.2492 58.5912 66.7901 58.132 66.2238 58.132C65.6575 58.132 65.1984 58.5912 65.1984 59.1574V67.6075C65.1984 67.7959 65.045 67.9493 64.8566 67.9493H5.14336C4.95496 67.9493 4.80156 67.7959 4.80156 67.6075V48.9201H17.1793C17.7455 48.9201 18.2046 48.461 18.2046 47.8947C18.2046 47.3284 17.7455 46.8693 17.1793 46.8693H2.39258C2.20418 46.8693 2.05078 46.7159 2.05078 46.5275V42.136C2.05078 41.9476 2.20418 41.7942 2.39258 41.7942H67.6074C67.7958 41.7942 67.9492 41.9476 67.9492 42.136V46.5275C67.9492 46.7159 67.7958 46.8693 67.6074 46.8693H22.7664C22.2001 46.8693 21.741 47.3284 21.741 47.8947C21.741 48.461 22.2001 48.9201 22.7664 48.9201H65.1984V53.2646C65.1984 53.8309 65.6575 54.29 66.2238 54.29C66.7901 54.29 67.2492 53.8309 67.2492 53.2646V48.9201H67.6074C68.9266 48.9201 70 47.8467 70 46.5275V42.136C70 40.8168 68.9266 39.7434 67.6074 39.7434ZM55.8719 20.4254C57.0168 19.4659 58.6785 19.4659 59.8235 20.4254L60.648 21.1164L59.8235 21.8074C58.6786 22.7669 57.0166 22.7669 55.8719 21.8074L55.0472 21.1164L55.8719 20.4254ZM14.7581 21.8074C13.6134 22.7669 11.9514 22.7669 10.8065 21.8074L9.98197 21.1164L10.8067 20.4254C11.9515 19.4659 13.6135 19.4659 14.7582 20.4254L15.5829 21.1164L14.7581 21.8074ZM43.6611 37.566C43.6611 32.1679 48.0528 27.7764 53.4507 27.7764C58.8487 27.7764 63.2404 32.1681 63.2404 37.566C63.2404 38.3143 63.155 39.0428 62.9952 39.7434H43.9063C43.7464 39.0428 43.6611 38.3143 43.6611 37.566ZM7.124 33.9403C6.78863 33.2023 6.68172 32.3893 6.81475 31.5895C7.00383 30.452 7.63998 29.4785 8.60576 28.8485C9.27842 28.4098 10.039 28.1845 10.8161 28.1845C11.155 28.1845 11.497 28.2273 11.8362 28.314L15.6648 29.2916C16.6556 29.5447 17.7029 29.5448 18.6934 29.2916L22.5221 28.314C23.6394 28.0289 24.7867 28.2185 25.7526 28.8487C26.7184 29.4787 27.3546 30.4522 27.5438 31.5897C27.6768 32.3896 27.5697 33.2025 27.2344 33.9406L24.5979 39.7437H9.76049L7.124 33.9403Z" />
            <path
                d="M28.0437 22.5259C27.4774 22.5259 27.0183 22.985 27.0183 23.5513C27.0183 24.1176 27.4774 24.5767 28.0437 24.5767H28.9625C29.5287 24.5767 29.9878 24.1176 29.9878 23.5513C29.9878 22.985 29.5287 22.5259 28.9625 22.5259H28.0437Z" />
            <path
                d="M35.4594 22.5259H34.5406C33.9744 22.5259 33.5153 22.985 33.5153 23.5513C33.5153 24.1176 33.9744 24.5767 34.5406 24.5767H35.4594C36.0257 24.5767 36.4848 24.1176 36.4848 23.5513C36.4848 22.985 36.0257 22.5259 35.4594 22.5259Z" />
            <path
                d="M41.0375 22.5259C40.4712 22.5259 40.0121 22.985 40.0121 23.5513C40.0121 24.1176 40.4712 24.5767 41.0375 24.5767H41.9562C42.5225 24.5767 42.9816 24.1176 42.9816 23.5513C42.9816 22.985 42.5225 22.5259 41.9562 22.5259H41.0375Z" />
            <path
                d="M35.4594 34.1055H34.5406C33.9744 34.1055 33.5153 34.5646 33.5153 35.1309C33.5153 35.6971 33.9744 36.1562 34.5406 36.1562H35.4594C36.0257 36.1562 36.4848 35.6971 36.4848 35.1309C36.4848 34.5646 36.0257 34.1055 35.4594 34.1055Z" />
            <path
                d="M31.2922 28.4678C30.7259 28.4678 30.2668 28.9269 30.2668 29.4932C30.2668 30.0595 30.7259 30.5186 31.2922 30.5186H32.211C32.7773 30.5186 33.2364 30.0595 33.2364 29.4932C33.2364 28.9269 32.7773 28.4678 32.211 28.4678H31.2922Z" />
            <path
                d="M37.7891 28.4678C37.2228 28.4678 36.7637 28.9269 36.7637 29.4932C36.7637 30.0595 37.2228 30.5186 37.7891 30.5186H38.7078C39.2741 30.5186 39.7332 30.0595 39.7332 29.4932C39.7332 28.9269 39.2741 28.4678 38.7078 28.4678H37.7891Z" />
            <path
                d="M30.9225 52.2295C28.7297 52.2295 26.9458 54.0134 26.9458 56.2062C26.9458 58.3991 28.7297 60.183 30.9225 60.183H39.0774C41.2702 60.183 43.0541 58.3991 43.0541 56.2062C43.0541 54.0134 41.2702 52.2295 39.0774 52.2295H30.9225ZM41.0035 56.2062C41.0035 57.2683 40.1396 58.1322 39.0775 58.1322H30.9227C29.8606 58.1322 28.9967 57.2683 28.9967 56.2062C28.9967 55.1442 29.8606 54.2803 30.9227 54.2803H39.0775C40.1394 54.2803 41.0035 55.1442 41.0035 56.2062Z" />
            <path
                d="M59.6056 14.0241L59.6394 14.0352C60.7824 14.4124 61.6901 15.3201 62.0677 16.4646L62.0786 16.4977C62.2542 17.0291 62.748 17.3862 63.3077 17.3862C63.8674 17.3862 64.3615 17.0289 64.5368 16.4975L64.5482 16.4632C64.9254 15.3202 65.8331 14.4126 66.976 14.0354H66.9762L67.0102 14.024C67.5418 13.8486 67.8989 13.3546 67.8989 12.7949C67.8989 12.2352 67.5418 11.7411 67.0107 11.5659L66.9759 11.5545C65.8329 11.1772 64.9252 10.2696 64.5476 9.1251L64.5368 9.09229C64.3614 8.56072 63.8676 8.20361 63.3079 8.20361C62.748 8.20361 62.254 8.56086 62.0782 9.09352L62.0673 9.12674C61.6901 10.2697 60.7825 11.1774 59.6389 11.5547L59.6052 11.5658C59.0735 11.7412 58.7164 12.2352 58.7164 12.795C58.7164 13.3549 59.0735 13.8486 59.6056 14.0241ZM63.3074 11.2072C63.7299 11.8324 64.2699 12.3724 64.895 12.7948C64.2699 13.2172 63.7299 13.7573 63.3076 14.3823C62.8851 13.7573 62.3451 13.2172 61.72 12.7948C62.3451 12.3723 62.885 11.8324 63.3074 11.2072Z" />
            <path
                d="M8.63046 9.03271L8.66368 9.04365C9.80665 9.42086 10.7143 10.3285 11.0903 11.4678L11.1029 11.5058C11.2783 12.0374 11.7721 12.3945 12.3318 12.3945C12.8917 12.3945 13.3857 12.0372 13.5608 11.5062L13.5723 11.4715C13.9494 10.3288 14.8565 9.42141 15.9991 9.04393L16.0347 9.03231C16.5663 8.85676 16.9233 8.36279 16.9233 7.80307C16.9233 7.24334 16.566 6.74951 16.0351 6.57438L16.0003 6.56289C14.8573 6.18568 13.9496 5.27801 13.5737 4.13873L13.5611 4.10059C13.3857 3.56902 12.8918 3.21191 12.3323 3.21191C11.7724 3.21191 11.2784 3.56916 11.1032 4.10018L11.0917 4.13504C10.7145 5.27801 9.80692 6.18568 8.66327 6.56303L8.62964 6.57424C8.09808 6.74965 7.74097 7.24348 7.74097 7.8032C7.74069 8.36266 8.09767 8.85676 8.63046 9.03271ZM12.332 6.21563C12.7544 6.8407 13.2945 7.38074 13.9194 7.80307C13.2943 8.22553 12.7543 8.76557 12.332 9.39051C11.9095 8.76543 11.3696 8.22553 10.7444 7.80307C11.3696 7.38074 11.9097 6.8407 12.332 6.21563Z" />
            <path
                d="M45.7707 7.54154L45.8201 7.55795C47.6162 8.15063 49.0425 9.57701 49.6346 11.3716L49.6515 11.4229C49.8434 12.004 50.3834 12.3946 50.9955 12.3946C51.6077 12.3946 52.148 12.0039 52.3399 11.4227L52.3563 11.3731C52.9491 9.57687 54.3753 8.15063 56.1715 7.55781L56.2212 7.54154C56.8024 7.34959 57.193 6.80941 57.1928 6.19719C57.1927 5.58496 56.8022 5.04492 56.2207 4.85311L56.1713 4.8367C54.3752 4.24402 52.9491 2.81764 52.3553 1.01828L52.3399 0.97166C52.148 0.390469 51.608 0 50.996 0C50.3838 0 49.8436 0.390606 49.6517 0.971934L49.6351 1.02184C49.0425 2.81777 47.6164 4.24389 45.8206 4.8367L45.7705 4.85324C45.1893 5.04506 44.7987 5.58523 44.7986 6.19732C44.7984 6.80941 45.1891 7.34959 45.7707 7.54154ZM50.9958 3.01068C51.7332 4.35066 52.8424 5.46 54.1824 6.19732C52.8426 6.93478 51.7331 8.04412 50.9958 9.38396C50.2584 8.04412 49.1488 6.93465 47.8091 6.19732C49.149 5.46 50.2584 4.35053 50.9958 3.01068Z" />
        </symbol>

        <!-- 3 -->
        <symbol id="com_3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <path
                d="M65.0997 31.6315L63.287 24.3806C63.7826 24.2753 64.1544 23.8356 64.1544 23.3089V22.1398C64.1544 19.6015 62.0893 17.5365 59.5511 17.5365H51.2944V15.125C51.2944 13.876 50.2783 12.8599 49.0293 12.8599H6.94148C5.69242 12.8599 4.67633 13.876 4.67633 15.125V34.9998C4.67633 35.6051 5.16701 36.0959 5.7724 36.0959C6.37766 36.0959 6.86848 35.6052 6.86848 34.9998V15.125C6.86848 15.0847 6.90115 15.052 6.94148 15.052H49.0291C49.0695 15.052 49.1021 15.0847 49.1021 15.125V35.0001C49.1021 35.6054 49.5928 36.0962 50.1982 36.0962C50.8035 36.0962 51.2943 35.6055 51.2943 35.0001V33.7576H64.2236C64.2247 33.7576 64.2255 33.7579 64.2265 33.7579C64.2276 33.7579 64.2286 33.7577 64.2295 33.7577C65.8205 33.7588 67.1714 34.8031 67.6354 36.2421H64.2273C63.6221 36.2421 63.1313 36.7327 63.1313 37.3381V39.6763C63.1313 41.57 64.6718 43.1105 66.5655 43.1105H67.8077V47.933H64.9418C64.0004 45.2146 61.4162 43.2565 58.3818 43.2565C55.3473 43.2565 52.763 45.2146 51.8217 47.933H51.294V39.6762C51.294 39.0709 50.8033 38.5801 50.1979 38.5801C49.5927 38.5801 49.1019 39.0708 49.1019 39.6762V47.9327H26.3617C25.4203 45.2144 22.8361 43.2563 19.8017 43.2563C16.7672 43.2563 14.1829 45.2144 13.2416 47.9327H6.94148C6.90115 47.9327 6.86848 47.9001 6.86848 47.8597V45.4484H11.6179C12.2232 45.4484 12.714 44.9577 12.714 44.3523C12.714 43.747 12.2233 43.2563 11.6179 43.2563H1.09607C0.49082 43.2563 0 43.747 0 44.3523C0 44.9577 0.490684 45.4484 1.09607 45.4484H4.67647V47.8597C4.67647 49.1088 5.69256 50.1249 6.94162 50.1249H12.8621C12.8618 50.1492 12.8602 50.1734 12.8602 50.1979C12.8602 54.0255 15.9742 57.1394 19.8017 57.1394C23.6291 57.1394 26.7431 54.0255 26.7431 50.1979C26.7431 50.1733 26.7415 50.1492 26.7412 50.1249H51.4422C51.4419 50.1492 51.4403 50.1734 51.4403 50.1979C51.4403 54.0255 54.5543 57.1394 58.3818 57.1394C62.2092 57.1394 65.3233 54.0255 65.3233 50.1979C65.3233 50.1733 65.3216 50.1492 65.3214 50.1249H68.9038C69.509 50.1249 69.9999 49.6342 69.9999 49.0288V37.3379C70 34.4514 67.8703 32.0533 65.0997 31.6315ZM51.2944 19.7285H59.5511C60.8807 19.7285 61.9624 20.8102 61.9624 22.1398V22.2128H51.2944V19.7285ZM51.2944 31.5656V24.4048H61.0336L62.8238 31.5656H51.2944ZM19.8017 54.9476C17.1828 54.9476 15.0522 52.8172 15.0522 50.1982C15.0522 47.5792 17.1828 45.4487 19.8017 45.4487C22.4205 45.4487 24.5511 47.5792 24.5511 50.1982C24.5511 52.8172 22.4205 54.9476 19.8017 54.9476ZM58.3821 54.9476C55.7632 54.9476 53.6326 52.8172 53.6326 50.1982C53.6326 47.5792 55.7632 45.4487 58.3821 45.4487C61.0009 45.4487 63.1315 47.5792 63.1315 50.1982C63.1315 52.8172 61.0009 54.9476 58.3821 54.9476ZM67.808 40.9184H66.5658C65.8808 40.9184 65.3235 40.3611 65.3235 39.6762V38.4339H67.8079V40.9184H67.808Z" />
            <path
                d="M19.8018 47.9331C18.5527 47.9331 17.5366 48.9492 17.5366 50.1983C17.5366 51.4473 18.5527 52.4634 19.8018 52.4634C21.0508 52.4634 22.0669 51.4473 22.0669 50.1983C22.0669 48.9492 21.0508 47.9331 19.8018 47.9331Z" />
            <path
                d="M58.3821 47.9331C57.133 47.9331 56.1169 48.9492 56.1169 50.1983C56.1169 51.4473 57.133 52.4634 58.3821 52.4634C59.6312 52.4634 60.6473 51.4473 60.6473 50.1983C60.6473 48.9492 59.6312 47.9331 58.3821 47.9331Z" />
            <path
                d="M45.5218 43.2568H29.1544C28.5492 43.2568 28.0583 43.7475 28.0583 44.3529C28.0583 44.9583 28.549 45.449 29.1544 45.449H45.5218C46.1271 45.449 46.6179 44.9583 46.6179 44.3529C46.6179 43.7475 46.1272 43.2568 45.5218 43.2568Z" />
            <path
                d="M17.4635 38.5806H3.43421C2.82896 38.5806 2.33813 39.0712 2.33813 39.6766C2.33813 40.282 2.82882 40.7727 3.43421 40.7727H17.4635C18.0687 40.7727 18.5595 40.282 18.5595 39.6766C18.5595 39.0712 18.0687 38.5806 17.4635 38.5806Z" />
            <path
                d="M38.1132 23.7028C37.6853 23.2748 36.9912 23.2748 36.5632 23.7029L26.8163 33.4497L21.7458 28.3792C21.3177 27.9512 20.6237 27.9512 20.1958 28.3792C19.7677 28.8073 19.7677 29.5011 20.1958 29.9292L26.0414 35.7748C26.2553 35.9889 26.5359 36.0958 26.8163 36.0958C27.0967 36.0958 27.3774 35.9889 27.5912 35.7748L38.1131 25.2529C38.5411 24.8247 38.5411 24.1308 38.1132 23.7028Z" />
        </symbol>

        <!-- breadcrum -->
        <symbol id="breadcrum" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 8">
            <path
                d="M14.3536 4.35355C14.5488 4.15829 14.5488 3.84171 14.3536 3.64645L11.1716 0.464465C10.9763 0.269203 10.6597 0.269203 10.4645 0.464465C10.2692 0.659727 10.2692 0.97631 10.4645 1.17157L13.2929 4L10.4645 6.82843C10.2692 7.02369 10.2692 7.34027 10.4645 7.53553C10.6597 7.7308 10.9763 7.7308 11.1716 7.53553L14.3536 4.35355ZM4.37114e-08 4.5L14 4.5L14 3.5L-4.37114e-08 3.5L4.37114e-08 4.5Z" />
        </symbol>

        <!-- breadcrum -->
        <symbol id="inner_search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M8.5 0C13.19 0 17 3.81 17 8.5C17 10.48 16.31 12.31 15.17 13.75L19.71 18.29C20.1 18.68 20.1 19.31 19.71 19.7C19.51 19.9 19.26 19.99 19 19.99C18.74 19.99 18.49 19.89 18.29 19.7L13.75 15.16C12.3 16.3 10.48 16.99 8.5 16.99C3.81 16.99 0 13.18 0 8.49C0 3.8 3.81 0 8.5 0ZM8.5 15C10.29 15 11.91 14.27 13.09 13.1C14.26 11.92 14.99 10.3 14.99 8.51C14.99 4.93 12.07 2.01 8.49 2.01C4.91 2.01 1.99 4.93 1.99 8.51C1.99 12.09 4.91 15.01 8.49 15.01L8.5 15Z" />
        </symbol>

        <!-- grid -->
        <symbol id="grid" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <path d="M187.628,0H43.707C19.607,0,0,19.607,0,43.707v143.921c0,24.1,19.607,43.707,43.707,43.707h143.921
     c24.1,0,43.707-19.607,43.707-43.707V43.707C231.335,19.607,211.728,0,187.628,0z" />
            <path d="M468.293,0H324.372c-24.1,0-43.707,19.607-43.707,43.707v143.921c0,24.1,19.607,43.707,43.707,43.707h143.921
     c24.1,0,43.707-19.607,43.707-43.707V43.707C512,19.607,492.393,0,468.293,0z" />
            <path d="M187.628,280.665H43.707C19.607,280.665,0,300.272,0,324.372v143.921C0,492.393,19.607,512,43.707,512h143.921
     c24.1,0,43.707-19.607,43.707-43.707V324.372C231.335,300.272,211.728,280.665,187.628,280.665z" />
            <path d="M468.293,280.665H324.372c-24.1,0-43.707,19.607-43.707,43.707v143.921c0,24.1,19.607,43.707,43.707,43.707h143.921
     c24.1,0,43.707-19.607,43.707-43.707V324.372C512,300.272,492.393,280.665,468.293,280.665z" />
        </symbol>

        <!-- column -->
        <symbol id="column" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
            <path
                d="M19.643 19.6428H8.64296C8.17153 19.6428 7.85725 19.3285 7.85725 18.8571V15.7143C7.85725 15.2428 8.17153 14.9285 8.64296 14.9285H19.643C20.1144 14.9285 20.4287 15.2428 20.4287 15.7143V18.8571C20.4287 19.3285 20.1144 19.6428 19.643 19.6428ZM5.5001 19.6428H2.35725C1.88582 19.6428 1.57153 19.3285 1.57153 18.8571V15.7143C1.57153 15.2428 1.88582 14.9285 2.35725 14.9285H5.5001C5.97153 14.9285 6.28582 15.2428 6.28582 15.7143V18.8571C6.28582 19.3285 5.97153 19.6428 5.5001 19.6428ZM19.643 13.3571H8.64296C8.17153 13.3571 7.85725 13.0428 7.85725 12.5714V9.42855C7.85725 8.95712 8.17153 8.64283 8.64296 8.64283H19.643C20.1144 8.64283 20.4287 8.95712 20.4287 9.42855V12.5714C20.4287 13.0428 20.1144 13.3571 19.643 13.3571ZM5.5001 13.3571H2.35725C1.88582 13.3571 1.57153 13.0428 1.57153 12.5714V9.42855C1.57153 8.95712 1.88582 8.64283 2.35725 8.64283H5.5001C5.97153 8.64283 6.28582 8.95712 6.28582 9.42855V12.5714C6.28582 13.0428 5.97153 13.3571 5.5001 13.3571ZM19.643 7.0714H8.64296C8.17153 7.0714 7.85725 6.75712 7.85725 6.28569V3.14283C7.85725 2.6714 8.17153 2.35712 8.64296 2.35712H19.643C20.1144 2.35712 20.4287 2.6714 20.4287 3.14283V6.28569C20.4287 6.75712 20.1144 7.0714 19.643 7.0714ZM5.5001 7.0714H2.35725C1.88582 7.0714 1.57153 6.75712 1.57153 6.28569V3.14283C1.57153 2.6714 1.88582 2.35712 2.35725 2.35712H5.5001C5.97153 2.35712 6.28582 2.6714 6.28582 3.14283V6.28569C6.28582 6.75712 5.97153 7.0714 5.5001 7.0714Z" />
        </symbol>

        <!-- Feed -->
        <symbol id="feed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
            <g clip-path="url(#clip0_224_2983)">
                <path
                    d="M3.24414 19.4219C3.42074 19.4218 3.59008 19.3516 3.71496 19.2267C3.83984 19.1018 3.91004 18.9325 3.91016 18.7559V5.19922H2.36328C1.73671 5.1999 1.136 5.44911 0.692943 5.89216C0.249889 6.33521 0.000682417 6.93593 0 7.5625V18.7559C5.82292e-05 19.262 0.118621 19.7611 0.346196 20.2132C0.573771 20.6653 0.904035 21.0578 1.31055 21.3593V21.3555C1.31112 20.8428 1.51502 20.3513 1.87751 19.9888C2.24001 19.6263 2.73149 19.4224 3.24414 19.4219Z" />
                <path
                    d="M19.6367 0H7.5625C6.93593 0.000682417 6.33521 0.249889 5.89216 0.692943C5.44911 1.136 5.1999 1.73671 5.19922 2.36328V18.7559C5.19865 19.2742 4.99249 19.7712 4.62596 20.1377C4.25944 20.5042 3.76249 20.7104 3.24414 20.7109C3.0732 20.7109 2.90926 20.7788 2.78839 20.8997C2.66751 21.0206 2.59961 21.1845 2.59961 21.3555C2.59961 21.5264 2.66751 21.6903 2.78839 21.8112C2.90926 21.9321 3.0732 22 3.24414 22H17.918C19.0002 21.9987 20.0378 21.5683 20.803 20.803C21.5683 20.0378 21.9987 19.0002 22 17.918V2.36328C21.9993 1.73671 21.7501 1.136 21.3071 0.692943C20.864 0.249889 20.2633 0.000682417 19.6367 0ZM8.87305 6.05859H14.8887C15.0596 6.05859 15.2236 6.1265 15.3444 6.24737C15.4653 6.36825 15.5332 6.53218 15.5332 6.70312C15.5332 6.87407 15.4653 7.038 15.3444 7.15888C15.2236 7.27975 15.0596 7.34766 14.8887 7.34766H8.87305C8.70211 7.34766 8.53817 7.27975 8.41729 7.15888C8.29642 7.038 8.22852 6.87407 8.22852 6.70312C8.22852 6.53218 8.29642 6.36825 8.41729 6.24737C8.53817 6.1265 8.70211 6.05859 8.87305 6.05859ZM18.3262 15.9414H8.87305C8.70211 15.9414 8.53817 15.8735 8.41729 15.7526C8.29642 15.6318 8.22852 15.4678 8.22852 15.2969C8.22852 15.1259 8.29642 14.962 8.41729 14.8411C8.53817 14.7203 8.70211 14.6523 8.87305 14.6523H18.3262C18.4971 14.6523 18.6611 14.7203 18.7819 14.8411C18.9028 14.962 18.9707 15.1259 18.9707 15.2969C18.9707 15.4678 18.9028 15.6318 18.7819 15.7526C18.6611 15.8735 18.4971 15.9414 18.3262 15.9414ZM18.3262 11.3919H8.87305C8.70211 11.3919 8.53817 11.324 8.41729 11.2031C8.29642 11.0822 8.22852 10.9183 8.22852 10.7473C8.22852 10.5764 8.29642 10.4125 8.41729 10.2916C8.53817 10.1707 8.70211 10.1028 8.87305 10.1028H18.3262C18.4971 10.1028 18.6611 10.1707 18.7819 10.2916C18.9028 10.4125 18.9707 10.5764 18.9707 10.7473C18.9707 10.9183 18.9028 11.0822 18.7819 11.2031C18.6611 11.324 18.4971 11.3919 18.3262 11.3919Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_2983">
                    <rect fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <!-- messege -->
        <symbol id="msg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
            <g clip-path="url(#clip0_224_2977)">
                <path
                    d="M15.2122 1.35876H2.48789C1.1159 1.35876 0 2.47466 0 3.84666V14.997C0 15.5251 0.597223 15.8228 1.01879 15.5217L4.56242 12.9934C4.85977 12.7816 5.20953 12.6694 5.57477 12.6694H13.3689C14.7409 12.6694 15.8568 11.5535 15.8568 10.1815V2.0033C15.8568 1.64751 15.568 1.35876 15.2122 1.35876ZM12.0815 9.16662H4.63461C4.27883 9.16662 3.99008 8.8783 3.99008 8.52209C3.99008 8.1663 4.27883 7.87755 4.63461 7.87755H12.0815C12.4373 7.87755 12.7261 8.1663 12.7261 8.52209C12.7261 8.8783 12.4373 9.16662 12.0815 9.16662ZM12.0815 6.1588H4.63461C4.27883 6.1588 3.99008 5.87048 3.99008 5.51427C3.99008 5.15849 4.27883 4.86974 4.63461 4.86974H12.0815C12.4373 4.86974 12.7261 5.15849 12.7261 5.51427C12.7261 5.87048 12.4373 6.1588 12.0815 6.1588Z" />
                <path
                    d="M21.9998 8.84608V19.996C21.9998 20.5206 21.4056 20.824 20.981 20.5207L17.4374 17.9928C17.1401 17.781 16.7903 17.6688 16.4251 17.6688H8.63096C7.25896 17.6688 6.14307 16.5525 6.14307 15.1805V13.9585H13.3687C15.4514 13.9585 17.1456 12.2642 17.1456 10.1815V6.35776H19.5119C20.8839 6.35776 21.9998 7.47409 21.9998 8.84608Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_2977">
                    <rect fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <!-- Friends -->
        <symbol id="friend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M15.5833 5.49999C15.5833 8.03129 13.5313 10.0833 11 10.0833C8.4687 10.0833 6.41667 8.03129 6.41667 5.49999C6.41667 2.96869 8.4687 0.916656 11 0.916656C13.5313 0.916656 15.5833 2.96869 15.5833 5.49999ZM9.16667 11.9167C5.62284 11.9167 2.75 14.7895 2.75 18.3333C2.75 19.8521 3.98122 21.0833 5.5 21.0833H12.2919C12.688 21.0833 12.9131 20.5994 12.7079 20.2604C12.2057 19.4307 11.9167 18.4574 11.9167 17.4167C11.9167 15.5521 12.8445 13.9042 14.2637 12.9095C14.5968 12.6761 14.5684 12.1405 14.1705 12.0562C13.7392 11.9648 13.2919 11.9167 12.8333 11.9167H9.16667ZM17.4167 13.75C17.9229 13.75 18.3333 14.1604 18.3333 14.6667V16.5H20.1667C20.6729 16.5 21.0833 16.9104 21.0833 17.4167C21.0833 17.9229 20.6729 18.3333 20.1667 18.3333H18.3333V20.1667C18.3333 20.6728 17.9229 21.0833 17.4167 21.0833C16.9104 21.0833 16.5 20.6728 16.5 20.1667V18.3333H14.6667C14.1604 18.3333 13.75 17.9229 13.75 17.4167C13.75 16.9104 14.1604 16.5 14.6667 16.5H16.5V14.6667C16.5 14.1604 16.9104 13.75 17.4167 13.75Z" />
        </symbol>

        <!-- Media -->
        <symbol id="media" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
            <path
                d="M17.0001 0.25H5.00012C3.74035 0.25 2.53216 0.750445 1.64137 1.64124C0.750569 2.53204 0.250124 3.74022 0.250124 5V17C0.245401 17.0163 0.245401 17.0337 0.250124 17.05C0.263294 18.3011 0.769547 19.4965 1.65892 20.3765C2.5483 21.2565 3.74896 21.7501 5.00012 21.75H17.0001C18.2461 21.7475 19.4413 21.2555 20.3279 20.3801C21.2146 19.5047 21.7218 18.3159 21.7401 17.07V5C21.7401 3.74195 21.2411 2.53528 20.3524 1.64477C19.4638 0.754263 18.2582 0.252649 17.0001 0.25ZM20.2501 15L16.0701 10.22C15.8045 9.93727 15.4839 9.71193 15.1278 9.5579C14.7718 9.40387 14.388 9.3244 14.0001 9.3244C13.6122 9.3244 13.2284 9.40387 12.8724 9.5579C12.5164 9.71193 12.1957 9.93727 11.9301 10.22L9.06012 13.5L8.12012 12.36C7.8611 12.0493 7.53694 11.7993 7.17059 11.6277C6.80424 11.4562 6.40465 11.3673 6.00012 11.3673C5.5956 11.3673 5.19601 11.4562 4.82966 11.6277C4.46331 11.7993 4.13915 12.0493 3.88012 12.36L1.75012 14.93V5C1.75276 4.13886 2.09602 3.31374 2.70494 2.70482C3.31386 2.09589 4.13898 1.75264 5.00012 1.75H17.0001C17.8613 1.75264 18.6864 2.09589 19.2953 2.70482C19.9042 3.31374 20.2475 4.13886 20.2501 5V15Z" />
            <path
                d="M6 8C7.10457 8 8 7.10457 8 6C8 4.89543 7.10457 4 6 4C4.89543 4 4 4.89543 4 6C4 7.10457 4.89543 8 6 8Z" />
        </symbol>

        <!-- setting -->
        <symbol id="seting" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
            <path
                d="M20.0819 8.14002C19.6807 8.08175 19.2979 7.93373 18.9618 7.70698C18.6258 7.48023 18.3453 7.1806 18.1411 6.8304C17.9369 6.48019 17.8144 6.08844 17.7826 5.68431C17.7508 5.28018 17.8106 4.87409 17.9575 4.49627C18.0509 4.24927 18.0647 3.97924 17.9969 3.72402C17.929 3.46881 17.7831 3.24121 17.5794 3.07315C16.6802 2.31804 15.6566 1.72485 14.5544 1.32002C14.3034 1.22679 14.0294 1.21514 13.7714 1.28673C13.5134 1.35833 13.2846 1.50952 13.1175 1.71877C12.8661 2.04028 12.5447 2.30032 12.1778 2.47916C11.811 2.65799 11.4082 2.75094 11 2.75094C10.5919 2.75094 10.1891 2.65799 9.82218 2.47916C9.4553 2.30032 9.13395 2.04028 8.88252 1.71877C8.71547 1.50952 8.48664 1.35833 8.22864 1.28673C7.97065 1.21514 7.69663 1.22679 7.44564 1.32002C6.42791 1.69378 5.47636 2.22757 4.62689 2.90127C4.41276 3.07079 4.25853 3.3044 4.18678 3.56791C4.11503 3.83142 4.12952 4.11097 4.22814 4.36565C4.38678 4.75346 4.45233 5.17305 4.41952 5.59077C4.38671 6.00849 4.25646 6.41271 4.03922 6.77099C3.82197 7.12928 3.52378 7.43167 3.16856 7.65389C2.81334 7.87612 2.41098 8.01201 1.99377 8.05065C1.7229 8.07961 1.46848 8.19477 1.26798 8.37919C1.06748 8.5636 0.931481 8.80751 0.880015 9.07502C0.752001 9.70869 0.687515 10.3536 0.687515 11C0.686574 11.5412 0.730264 12.0816 0.81814 12.6156C0.861875 12.8917 0.995341 13.1457 1.1979 13.3383C1.40046 13.5309 1.66084 13.6515 1.93876 13.6813C2.36515 13.7213 2.77574 13.8629 3.13619 14.0941C3.49663 14.3254 3.79643 14.6396 4.0105 15.0105C4.22457 15.3815 4.34667 15.7983 4.3666 16.2261C4.38652 16.6538 4.30368 17.0802 4.12502 17.4694C4.00809 17.7226 3.97909 18.0075 4.04261 18.2791C4.10613 18.5506 4.25854 18.7931 4.47564 18.9681C5.36947 19.7095 6.38316 20.2931 7.47314 20.6938C7.61252 20.7421 7.75877 20.7676 7.90627 20.7694C8.10851 20.769 8.3077 20.72 8.48713 20.6267C8.66656 20.5334 8.82101 20.3985 8.93752 20.2331C9.18255 19.8761 9.51102 19.5843 9.8944 19.3831C10.2778 19.1818 10.7045 19.0771 11.1375 19.0781C11.5571 19.0787 11.9707 19.1772 12.3455 19.3657C12.7202 19.5543 13.0458 19.8278 13.2963 20.1644C13.4629 20.3883 13.6988 20.5509 13.9674 20.6267C14.236 20.7026 14.5222 20.6875 14.7813 20.5838C15.7779 20.1827 16.7058 19.6283 17.5313 18.9406C17.7386 18.7692 17.8863 18.5364 17.953 18.2758C18.0197 18.0151 18.002 17.74 17.9025 17.49C17.7408 17.1072 17.6703 16.692 17.6966 16.2773C17.7228 15.8626 17.8451 15.4596 18.0538 15.1003C18.2625 14.7409 18.5518 14.435 18.899 14.2066C19.2462 13.9782 19.6418 13.8337 20.0544 13.7844C20.322 13.7474 20.5708 13.6262 20.7649 13.4383C20.9589 13.2504 21.0881 13.0056 21.1338 12.7394C21.2442 12.166 21.304 11.5839 21.3125 11C21.3126 10.3841 21.2551 9.76957 21.1406 9.1644C21.0942 8.90404 20.9669 8.66493 20.7769 8.48104C20.5868 8.29715 20.3436 8.17783 20.0819 8.14002ZM14.4375 11C14.4375 11.6799 14.2359 12.3445 13.8582 12.9098C13.4805 13.4751 12.9436 13.9157 12.3155 14.1759C11.6874 14.436 10.9962 14.5041 10.3294 14.3715C9.66258 14.2388 9.05008 13.9114 8.56934 13.4307C8.08859 12.95 7.7612 12.3375 7.62857 11.6706C7.49593 11.0038 7.564 10.3127 7.82418 9.68455C8.08436 9.05643 8.52495 8.51956 9.09024 8.14185C9.65554 7.76413 10.3201 7.56252 11 7.56252C11.9117 7.56252 12.786 7.92469 13.4307 8.56934C14.0754 9.214 14.4375 10.0883 14.4375 11Z" />
        </symbol>

        <!-- happy -->
        <symbol id="happy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
            <g clip-path="url(#clip0_224_2922)">
                <path
                    d="M14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0ZM14 26.25C7.2345 26.25 1.75 20.7655 1.75 14C1.75 7.2345 7.2345 1.75 14 1.75C20.7655 1.75 26.25 7.2345 26.25 14C26.25 20.7655 20.7655 26.25 14 26.25Z" />
                <path
                    d="M9.625 11.375C10.5915 11.375 11.375 10.5915 11.375 9.625C11.375 8.6585 10.5915 7.875 9.625 7.875C8.6585 7.875 7.875 8.6585 7.875 9.625C7.875 10.5915 8.6585 11.375 9.625 11.375Z" />
                <path
                    d="M18.375 11.375C19.3415 11.375 20.125 10.5915 20.125 9.625C20.125 8.6585 19.3415 7.875 18.375 7.875C17.4085 7.875 16.625 8.6585 16.625 9.625C16.625 10.5915 17.4085 11.375 18.375 11.375Z" />
                <path
                    d="M20.125 14C20.125 17.3828 17.3827 20.125 14 20.125C10.6172 20.125 7.875 17.3828 7.875 14H6.125C6.125 18.3492 9.65076 21.875 14 21.875C18.3492 21.875 21.875 18.3492 21.875 14H20.125Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_2922">
                    <rect fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <symbol id="upload_image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <path
                d="M11.9997 14.3333C9.97301 14.3333 8.33301 12.6933 8.33301 10.6667C8.33301 8.64 9.97301 7 11.9997 7C14.0263 7 15.6663 8.64 15.6663 10.6667C15.6663 12.6933 14.0263 14.3333 11.9997 14.3333ZM11.9997 9C11.0797 9 10.333 9.74667 10.333 10.6667C10.333 11.5867 11.0797 12.3333 11.9997 12.3333C12.9197 12.3333 13.6663 11.5867 13.6663 10.6667C13.6663 9.74667 12.9197 9 11.9997 9Z" />
            <path
                d="M19.9998 30.3333H11.9998C4.75984 30.3333 1.6665 27.24 1.6665 20V12C1.6665 4.76001 4.75984 1.66667 11.9998 1.66667H17.3332C17.8798 1.66667 18.3332 2.12001 18.3332 2.66667C18.3332 3.21334 17.8798 3.66667 17.3332 3.66667H11.9998C5.85317 3.66667 3.6665 5.85334 3.6665 12V20C3.6665 26.1467 5.85317 28.3333 11.9998 28.3333H19.9998C26.1465 28.3333 28.3332 26.1467 28.3332 20V13.3333C28.3332 12.7867 28.7865 12.3333 29.3332 12.3333C29.8798 12.3333 30.3332 12.7867 30.3332 13.3333V20C30.3332 27.24 27.2398 30.3333 19.9998 30.3333Z" />
            <path
                d="M24 11.6666C23.4533 11.6666 23 11.2133 23 10.6666V2.66659C23 2.26659 23.24 1.89326 23.6133 1.74659C23.9867 1.59992 24.4133 1.67992 24.7067 1.95992L27.3733 4.62659C27.76 5.01326 27.76 5.65326 27.3733 6.03992C26.9867 6.42659 26.3467 6.42659 25.96 6.03992L25 5.07992V10.6666C25 11.2133 24.5467 11.6666 24 11.6666Z" />
            <path
                d="M21.3331 6.33326C21.0798 6.33326 20.8264 6.23992 20.6264 6.03992C20.2398 5.65326 20.2398 5.01326 20.6264 4.62659L23.2931 1.95992C23.6798 1.57326 24.3198 1.57326 24.7064 1.95992C25.0931 2.34659 25.0931 2.98659 24.7064 3.37326L22.0398 6.03992C21.8398 6.23992 21.5864 6.33326 21.3331 6.33326Z" />
            <path
                d="M3.55958 26.2668C3.23958 26.2668 2.91958 26.1068 2.73291 25.8268C2.42624 25.3735 2.54624 24.7468 2.99958 24.4401L9.57291 20.0268C11.0129 19.0668 12.9996 19.1735 14.3062 20.2801L14.7462 20.6668C15.4129 21.2401 16.5462 21.2401 17.1996 20.6668L22.7462 15.9068C24.1596 14.6935 26.3862 14.6935 27.8129 15.9068L29.9862 17.7735C30.3996 18.1335 30.4529 18.7601 30.0929 19.1868C29.7329 19.6001 29.0929 19.6535 28.6796 19.2935L26.5062 17.4268C25.8396 16.8535 24.7196 16.8535 24.0529 17.4268L18.5062 22.1868C17.0929 23.4001 14.8662 23.4001 13.4396 22.1868L12.9996 21.8001C12.3862 21.2801 11.3729 21.2268 10.6929 21.6935L4.13291 26.1068C3.94624 26.2135 3.74624 26.2668 3.55958 26.2668Z" />
        </symbol>

        <symbol id="upload_video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <g clip-path="url(#clip0_224_2948)">
                <path
                    d="M26.0487 0H5.95125C2.66606 0.0038125 0.0038125 2.66606 0 5.95125V26.0487C0.0038125 29.3339 2.66606 31.9962 5.95125 32H26.0487C29.3339 31.9962 31.9962 29.3339 32 26.0487V5.95125C31.9962 2.66606 29.3339 0.0038125 26.0487 0ZM29.7909 5.95125V7.88069H24.1947L20.0094 2.20906H26.0488C28.1146 2.21137 29.7886 3.88544 29.7909 5.95125ZM17.2639 2.20906L21.4492 7.88069H14.7361L10.5507 2.20906H17.2639ZM2.20906 5.95125C2.21137 3.8855 3.88544 2.21144 5.95125 2.20906H7.80531L11.9907 7.88069H2.20906V5.95125ZM26.0487 29.7909H5.95125C3.8855 29.7886 2.21144 28.1146 2.20906 26.0487V10.0898H29.7909V26.0487C29.7886 28.1145 28.1145 29.7886 26.0487 29.7909Z" />
                <path
                    d="M21.8933 18.9837L13.1549 13.9386C12.6265 13.6336 11.951 13.8146 11.646 14.3429C11.5491 14.5109 11.498 14.7013 11.498 14.8952V24.9856C11.498 25.5956 11.9925 26.0901 12.6025 26.0901C12.7964 26.0901 12.9869 26.0391 13.1549 25.9421L21.8933 20.8969C22.4216 20.5919 22.6026 19.9164 22.2976 19.3881C22.2006 19.2201 22.0612 19.0807 21.8933 18.9837ZM13.7071 23.0724V16.8083L19.132 19.9403L13.7071 23.0724Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_2948">
                    <rect width="32" height="32" fill="white" />
                </clipPath>
            </defs>
        </symbol>

        <symbol id="three_dot" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
            <path
                d="M11.375 14C11.375 15.4472 12.5527 16.625 14 16.625C15.4472 16.625 16.625 15.4472 16.625 14C16.625 12.5527 15.4472 11.375 14 11.375C12.5527 11.375 11.375 12.5527 11.375 14Z" />
            <path
                d="M11.375 22.75C11.375 24.1972 12.5527 25.375 14 25.375C15.4472 25.375 16.625 24.1972 16.625 22.75C16.625 21.3027 15.4472 20.125 14 20.125C12.5527 20.125 11.375 21.3027 11.375 22.75Z" />
            <path
                d="M11.375 5.25C11.375 6.69725 12.5527 7.875 14 7.875C15.4472 7.875 16.625 6.69725 16.625 5.25C16.625 3.80275 15.4472 2.625 14 2.625C12.5527 2.625 11.375 3.80275 11.375 5.25Z" />
        </symbol>

        <symbol id="msgs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
            <path
                d="M14.9994 26.482C14.829 26.482 6.87471 26.482 6.87471 26.482C6.36084 26.482 5.9324 26.2418 5.72855 25.8394C5.52477 25.437 5.58465 24.9494 5.88875 24.5351L6.90986 23.1479C4.74477 20.9977 3.51758 18.0717 3.51758 15C3.51758 8.66887 8.66832 3.51807 14.9994 3.51807C21.3307 3.51807 26.4815 8.66887 26.4815 15C26.4815 21.3313 21.3307 26.482 14.9994 26.482ZM14.9994 24.7242C20.3614 24.7242 24.7237 20.362 24.7237 15C24.7237 9.63812 20.3614 5.27588 14.9994 5.27588C9.63758 5.27588 5.27539 9.63812 5.27539 15C5.27539 17.8328 6.50785 20.5193 8.65678 22.3709L9.27342 22.9022L7.93221 24.7242H14.9994Z"
                fill="black" />
            <path
                d="M11.9389 15C11.9389 15.6756 11.3913 16.2233 10.7157 16.2233C10.0399 16.2233 9.49219 15.6756 9.49219 15C9.49219 14.3242 10.0399 13.7765 10.7157 13.7765C11.3913 13.7765 11.9389 14.3243 11.9389 15Z"
                fill="black" />
            <path
                d="M15.0007 16.2233C15.6763 16.2233 16.224 15.6756 16.224 14.9999C16.224 14.3243 15.6763 13.7766 15.0007 13.7766C14.325 13.7766 13.7773 14.3243 13.7773 14.9999C13.7773 15.6756 14.325 16.2233 15.0007 16.2233Z"
                fill="black" />
            <path
                d="M19.2859 16.2234C19.9615 16.2234 20.5093 15.6756 20.5093 15C20.5093 14.3243 19.9615 13.7766 19.2859 13.7766C18.6102 13.7766 18.0625 14.3243 18.0625 15C18.0625 15.6756 18.6102 16.2234 19.2859 16.2234Z"
                fill="black" />
        </symbol>

        <symbol id="share" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 27">
            <g clip-path="url(#clip0_224_2767)">
                <path
                    d="M26.0789 9.07121L19.967 2.95935C19.4627 2.45505 18.9512 2.19934 18.4467 2.19934C17.7541 2.19934 16.9453 2.72616 16.9453 4.21089V6.29169C12.5048 6.48522 8.35808 8.3063 5.19528 11.4689C1.84539 14.8186 0.00036915 19.2723 9.57666e-09 24.0096C-5.27248e-05 24.3499 0.217687 24.6522 0.540527 24.7599C0.622898 24.7874 0.707326 24.8007 0.79091 24.8007C1.03491 24.8007 1.27111 24.6875 1.42346 24.4848C5.15795 19.5138 10.7805 16.5761 16.9453 16.3441V18.3927C16.9453 19.8774 17.7541 20.4043 18.4467 20.4044H18.4467C18.9512 20.4044 19.4628 20.1486 19.967 19.6443L26.0788 13.5324C26.6729 12.9385 27 12.1464 27 11.3019C27 10.4573 26.6729 9.66516 26.0789 9.07121ZM24.9602 12.4138L18.8484 18.5257C18.7311 18.643 18.6341 18.717 18.5624 18.762C18.5436 18.6796 18.5273 18.5585 18.5273 18.3928V15.5382C18.5273 15.1014 18.1732 14.7472 17.7363 14.7472C14.2217 14.7472 10.8633 15.5525 7.75459 17.1405C5.52287 18.2806 3.48279 19.8153 1.75516 21.6429C2.90445 13.8542 9.63346 7.85653 17.7363 7.85653C18.1732 7.85653 18.5273 7.50236 18.5273 7.06551V4.21089C18.5273 4.04515 18.5436 3.92412 18.5624 3.84175C18.634 3.88674 18.7311 3.96077 18.8484 4.078L24.9602 10.1899C25.2554 10.4851 25.418 10.8799 25.418 11.3019C25.418 11.7237 25.2554 12.1186 24.9602 12.4138Z" />
            </g>
            <defs>
                <clipPath id="clip0_224_2767">
                    <rect width="27" height="27" />
                </clipPath>
            </defs>
        </symbol>

        <symbol id="send" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29">
            <path
                d="M26.7053 12.762L3.32608 1.35743C3.12502 1.25935 2.90423 1.20837 2.68051 1.20837C1.86727 1.20837 1.20801 1.86764 1.20801 2.68087V2.72337C1.20801 2.92096 1.23223 3.11781 1.28016 3.3095L3.52279 12.28C3.58404 12.525 3.79121 12.706 4.0422 12.7339L13.8993 13.8292C14.2411 13.8671 14.4997 14.156 14.4997 14.5C14.4997 14.8441 14.2411 15.133 13.8993 15.1709L4.0422 16.2661C3.79121 16.2941 3.58404 16.4751 3.52279 16.7201L1.28016 25.6905C1.23223 25.8823 1.20801 26.0791 1.20801 26.2767V26.3192C1.20801 27.1324 1.86727 27.7917 2.68051 27.7917C2.90423 27.7917 3.12502 27.7407 3.32608 27.6426L26.7053 16.2381C27.3698 15.914 27.7913 15.2394 27.7913 14.5C27.7913 13.7607 27.3698 13.086 26.7053 12.762Z" />
        </symbol>
    </svg>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


        /*------- Modal Jquery Code Start -------*/
        // $(document).ready(function () {
        //     var modal = $("#modal1");
        //     $(".open-modal-btn").on("click", function () {
        //         var code = $(this).data("code");
        //         $.ajax({
        //             url: "{{ url('get-blog') }}/"+ code,
        //             type: "get",
        //             success:function(response){

        //                 var rawDate = response.data.createdOn;
        //                 var date = new Date(rawDate);

        //                 var months = [
        //                     "January", "February", "March", "April", "May", "June",
        //                     "July", "August", "September", "October", "November", "December"
        //                 ];
        //                 var formattedDate = months[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
        //                 $("#blog-content").html(response.data.body_English);
        //                 $("#blog-date").text(formattedDate);
        //                 $("#blog-ctg").text(response.data.category);
        //                 $("#blog-img").attr("src", response.data.imageUri + "/" + response.data.image);
        //                 $(".blog-content").text(response.data.subject);
        //                 $(".blog-content").text(response.data.subject);
        //                 $(".blog-content").text(response.data.subject);
        //             }
        //         });

        //         modal.style.display = "flex";
        //     });

        //     $(".close").on("click", function () {
        //         modal.style.display = "none";
        //     });

        //     $(window).on("click", function (e) {
        //         if ($(e.target).is(modal)) {
        //             // modal.hide();
        //             modal.style.display = "none";

        //         }
        //     });
        // });

    $(document).ready(function () {
    var modal = $("#modal1");

    $(".open-modal-btn").on("click", function () {
        var code = $(this).data("code");
        $.ajax({
            url: "{{ url('get-blog') }}/" + code, // Laravel blade me chalega
            type: "get",
            success: function (response) {
                var rawDate = response.data.createdOn;
                var date = new Date(rawDate);
                var months = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                var formattedDate = months[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();

                $("#blog-content").html(response.data.body_English);
                $("#blog-date").text(formattedDate);
                $("#blog-ctg").text(response.data.category);
                $("#blog-img").attr("src", response.data.imageUri + "/" + response.data.image);
                $(".blog-content").text(response.data.subject);

                modal.css("display", "flex");
            }
        });
    });

    $(".close").on("click", function () {
        modal.css("display", "none");
    });

    $(window).on("click", function (e) {
        if ($(e.target).is(modal)) {
            modal.css("display", "none");
        }
    });
});

        /*------- Modal Jquery Code End -------*/

        /*------- Email Subscribe Jquery Code Start -------*/
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $("#subscribeBtn").on("click", function(e) {
                e.preventDefault();
                let emailValue = $("#email").val().trim();
                if (emailValue === "") {
                    toastr.error("Please enter your valid email", "Error");

                    return;
                }

                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailValue)) {
                    toastr.error("Please enter a valid email address", "Error");
                    return;
                }
                                // hidden input fill karo
                $("#emailForSubscribe").val(emailValue);
                $.ajax({
                    url: "{{ url('subscribe') }}",
                    type: "POST",
                    data: $("#subscribeForm").serialize(),
                    success: function(response) {
                        toastr.success(response.msg);
                        $("#email").val("");
                        console.log(response);
                    },
                    error: function(xhr) {
                        let errorMsg = "Something went wrong!";
                        if (xhr.responseJSON && xhr.responseJSON.msg) {
                            errorMsg = xhr.responseJSON.msg;
                        }
                        alert(errorMsg);
                        console.error(xhr);
                    }
                });
            });
        });
        /*------- Email Subscribe Jquery Code End -------*/
    </script>

    <script src="{{ asset('assets/js/scripts-libs.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        const profileBtn = document.getElementById('profile-menu');
        const profileDropdown = document.querySelector('.profile-dropdown');

        // profileBtn.addEventListener('click', function(event) {
        //     event.preventDefault();
        //     profileDropdown.classList.toggle('active');
        // });

        profileBtn.addEventListener('mouseenter', function(event) {
            event.preventDefault();
            profileDropdown.classList.toggle('active');
        });

        profileDropdown.addEventListener('mouseleave', function(event) {
            event.preventDefault();
            profileDropdown.classList.toggle('active');
        });

        // profileBtn.addEventListener('mouseleave', function(event) {
        // event.preventDefault();
        // profileDropdown.classList.remove('active');
        // });

        


        const openBtn = document.querySelector('.popup');

        const closeBtn = document.getElementById('closeChat');
        const chatBox = document.getElementById('chatModal');

        openBtn.addEventListener('click', () => {
            chatBox.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            chatBox.classList.remove('active');
        });


        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.querySelector(".custom-dropdown");
            const header = dropdown.querySelector(".dropdown-header");
            const list = dropdown.querySelector(".dropdown-list");
            const selected = dropdown.querySelector(".dropdown-selected");

            header.addEventListener("click", function() {
                header.classList.toggle("active");
                list.classList.toggle("active");
            });

            list.querySelectorAll("li").forEach(item => {
                item.addEventListener("click", function() {
                    selected.textContent = this.textContent;
                    header.classList.remove("active");
                    list.classList.remove("active");
                });
            });

            // Outside click close
            document.addEventListener("click", function(e) {
                if (!dropdown.contains(e.target)) {
                    header.classList.remove("active");
                    list.classList.remove("active");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.pathname === "/") {
                document.body.classList.add("no-slug");
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("modal1");
            const openBtns = document.querySelectorAll(".open-modal-btn");
            const closedBtn = modal.querySelector(".close");

            // Open modal on any button click
            openBtns.forEach(btn => {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    modal.style.display = "flex";

                });
            });

            // Close modal
            closedBtn.addEventListener("click", function() {
                modal.style.display = "none";
                document.body.style.overflow = "auto";

            });

        });

        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#mobile");
            window.intlTelInput(input, {
                initialCountry: "lk", // default Sri Lanka
                preferredCountries: ["lk", "pk", "in"],
                separateDialCode: true
            });
        });

        document.getElementById("mobile").addEventListener("input", function(e) {
            this.value = this.value.replace(/[^0-9]/g, ''); // non-numeric ko hata do
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#flash-message').fadeOut('slow');
            }, 3000);
        });

        document.getElementById("mobile").addEventListener("input", function (e) {
            // Remove non-numeric characters
            this.value = this.value.replace(/[^0-9]/g, '');
            });


    document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".auth-btn");
  
    buttons.forEach(button => {
      if (!button.querySelector(".spinner")) {
        const spinner = document.createElement("span");
        spinner.classList.add("spinner");
        spinner.style.display = "none";
        spinner.innerHTML = `
          <img src="{{ asset('assets/Images/iconn.png') }}" 
               alt="Gamata Logo"
               class="login-logo-uni">
        `;
        button.appendChild(spinner);
      }
  
      const spinner = button.querySelector(".spinner");
      const originalHTML = button.innerHTML; // button ka original content save
      const icon = button.querySelector("img"); // button ke andar icon agar ho
  
      // Back press par button restore ho jaye
      window.addEventListener("pageshow", function () {
        button.classList.remove("loading");
        if (spinner) spinner.style.display = "none";
        if (icon) icon.style.display = "";
        button.style.pointerEvents = "auto";
        button.innerHTML = originalHTML;
      });
  
      button.addEventListener("click", function (e) {
  
        // Button disable aur loading state
        button.classList.add("loading");
        button.style.pointerEvents = "none";
  
        spinner.style.display = "inline-block";
        button.innerHTML = `
         {{ __('messages.please_wait') }}...  <span class="spinner">
          
          </span>
        `;
  
        // Spinner animation (optional)
        const newImg = button.querySelector(".spin-anim");
      //   if (newImg) {
      //     newImg.style.transition = "transform 0.3s linear";
      //     newImg.style.animation = "spin 1s linear infinite";
      //   }
  
        setTimeout(() => {
          button.classList.remove("loading");
          button.innerHTML = originalHTML;
          button.style.pointerEvents = "auto";
        }, 1000);
      });
    });
  });







    </script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Your custom scripts -->
    <script src="scripts.js"></script>
    </script>
</body>

</html>
