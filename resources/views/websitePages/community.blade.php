@extends('websitePages.master')
@section('content')


<!-- Banner Section -->
<!-- Banner Section -->
<section>
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
                Community
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
</section>

<div class="community-inner">
    <div class="wrapper">
        <div class="col-1">
            <div class="row-1 hiddenItem">
                <div class="wrap">
                    <div class="image">
                        <img src="{{asset('assets/Images/community/user.jpg')}}" alt="user">
                    </div>
                    <div class="content">
                        <div class="name">John F Kennedy</div>
                        <div class="username">@Johnfken</div>
                    </div>
                </div>
                <div class="mail">john.kennedy@example.com</div>
            </div>
            <div class="row-2  hiddenItem">
                <div class="wrap">
                    <div class="icon">
                        <svg>
                            <use xlink:href="#feed"></use>
                        </svg>
                    </div>
                    <div class="text">News Feed</div>
                </div>
                <div class="wrap" style="display: none">
                    <div class="icon">
                        <svg>
                            <use xlink:href="#msg"></use>
                        </svg>
                    </div>
                    <div class="text">Messages</div>
                </div>
                <div class="wrap" style="display: none">
                    <div class="icon">
                        <svg>
                            <use xlink:href="#friend"></use>
                        </svg>
                    </div>
                    <div class="text">Friends</div>
                </div>
                <div class="wrap" style="display: none">
                    <div class="icon">
                        <svg>
                            <use xlink:href="#media"></use>
                        </svg>
                    </div>
                    <div class="text">Media</div>
                </div>
                <div class="wrap" style="display: none">
                    <div class="icon">
                        <svg>
                            <use xlink:href="#seting"></use>
                        </svg>
                    </div>
                    <div class="text">Settings</div>
                </div>
            </div>
            <div class="row-3">
                <div class="image">
                    <picture>
                    <source media="(max-width: 767px)" srcset="{{ asset('assets/Images/community/1.jpg') }}">
                    <source media="(max-width: 991px)" srcset="{{ asset('assets/Images/community/3.jpg') }}">
                    <img src="{{ asset('assets/Images/community/2.jpg') }}" alt="Flowers">
                    </picture>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="write-post">
                <div class="wrap-1">
                    <input type="text" id="lname" name="lname" placeholder="Write your thoughts...">
                    <div class="icon">
                        <svg>
                            <use xlink:href="#happy"></use>
                        </svg>
                    </div>
                </div>
                <div class="wrap-2">
                    <div class="box">
                        <svg>
                            <use xlink:href="#upload_image"></use>
                        </svg>
                        <div class="text">
                            Add a Image
                        </div>
                    </div>
                    <div class="box">
                        <svg>
                            <use xlink:href="#upload_video"></use>
                        </svg>
                        <div class="text">
                            Add a Video
                        </div>
                    </div>
                    <div class="box"></div>
                </div>
            </div>

            <div class="dropdown">
                <div class="text">Sort by</div>
                <select name="cars" id="cars">
                    <option value="">Most Reacted</option>
                    <option value="date">Date</option>
                    <option value="name">Name</option>
                    <option value="time">Time</option>
                    <option value="order">Order</option>
                </select>
            </div>
            <!-- Dropdown Wrapper -->

            <!--<div class="dropdown">-->
            <!--  <label class="dropdown-label">Sort by</label>-->
            <!--   <div class="custom-dropdown">-->

            <!--   <div class="dropdown-header">-->
            <!--   <span class="dropdown-selected">Most Reacted</span>-->
            <!--   <span class="dropdown-arrow" style="font-size:15px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="20px" viewBox="0,0,256,256"><g fill="#95c11f" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M3,12v-2c0,-0.386 0.223,-0.738 0.572,-0.904c0.349,-0.166 0.762,-0.115 1.062,0.13l10.366,8.482l10.367,-8.482c0.299,-0.245 0.712,-0.295 1.062,-0.13c0.35,0.165 0.571,0.518 0.571,0.904v2c0,0.3 -0.135,0.584 -0.367,0.774l-11,9c-0.369,0.301 -0.898,0.301 -1.267,0l-11,-9c-0.231,-0.19 -0.366,-0.474 -0.366,-0.774z"></path></g></g></svg>-->
            <!--  </span>-->
            <!--   </div>-->
            <!--   <ul class="dropdown-list">-->
            <!--    <li>Date</li>-->
            <!--    <li>Name</li>-->
            <!--    <li>Time</li>-->
            <!--    <li>Order</li>-->
            <!--  </ul>-->
            <!--</div>-->
            <!--</div>-->


            @foreach ($community as $item)
                <div class="image-post">
                    <div class="wrapper">
                        <div class="row-1">
                            <div class="pofile">
                                <div class="image">
                                    <img src="{{ ($item['image1'] ?? 'http://api.aethriasolutions.com/uploads/UploadImage/Sells').'/'.$item['image1'] }}" alt="user">
                                </div>
                                <div class="name">
                                    <div class="text">
                                        {{ $item['posterName'] }}
                                    </div>
                                    <div class="date">
                                        {{ \Carbon\Carbon::parse($item['publish_DateTime'])->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            <div class="icon">
                                <svg>
                                    <use xlink:href="#three_dot"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="row-2">
                            <div class="text">Fresh, sustainable, and full of goodness. 💚 <span>#OrganicLiving  #FreshFromFarm  #GamataCares  #HealthyEating</span></div>
                        </div>
                        <div class="row-3">
                            <div class="image">
                                <img src="{{ ($item['imageUri'] ?? 'http://api.aethriasolutions.com/uploads/UploadImage/Sells').'/'.$item['cover_Image'] }}" alt="sdcv">
                            </div>
                        </div>
                        @php
                            if (! function_exists('number_format_short')) {
                                function number_format_short($n, $precision = 1) {
                                    if ($n < 900) {
                                        $n_format = number_format($n, $precision);
                                        $suffix = '';
                                    } else if ($n < 900000) {
                                        $n_format = number_format($n / 1000, $precision);
                                        $suffix = 'k';
                                    } else if ($n < 900000000) {
                                        $n_format = number_format($n / 1000000, $precision);
                                        $suffix = 'M';
                                    } else {
                                        $n_format = number_format($n / 1000000000, $precision);
                                        $suffix = 'B';
                                    }

                                    if ($precision > 0) {
                                        $dotzero = '.' . str_repeat('0', $precision);
                                        $n_format = str_replace($dotzero, '', $n_format);
                                    }

                                    return $n_format . $suffix;
                                }
                            }
                        @endphp
                        <div class="row-4">
                            <div class="col-1">
                                <div class="box red">
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#heart"></use>
                                        </svg>
                                    </div>
                                    <div class="text">{{ number_format_short($item['totalLikesCount']) }}</div>
                                </div>
                                <div class="box">
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#msgs"></use>
                                        </svg>
                                    </div>
                                    <div class="text">{{ number_format_short($item['totalCommentsCount']) }}</div>
                                </div>
                                <div class="box"></div>
                                <div class="box">
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#share"></use>
                                        </svg>
                                    </div>
                                    <div class="text">32</div>
                                </div>
                            </div>
                            <div class="col-2">
                                <form class="commentForm d-flex">
                                    @csrf
                                    <input type="text" class="comment" name="comment" placeholder="Write Your Comment Here">
                                    <input type="hidden" name="fK_UserID" value="{{ $item['fK_UserID'] }}">
                                    <input type="hidden" name="is_delete" value="{{ $item['isdelete'] ?? false }}">
                                    <input type="hidden" name="FK_Post_Code" value="{{ $item['code'] }}">
                                    @php $time = Carbon\Carbon::now()->toDateString(); @endphp
                                    <input type="hidden" name="dateTime" value="{{ $time }}">
                                    <button type="submit" class="icon" style="border:none; background:none; cursor:pointer;">
                                        <svg>
                                            <use xlink:href="#send"></use>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-post">
                    <div class="wrapper">
                        <div class="row-1">
                            <div class="pofile">
                                <div class="image">
                                    <img src="{{ asset('assets/Images/community/user.jpg')}}" alt="user">
                                </div>
                                <div class="name">
                                    <div class="text">
                                        John f kennedy
                                    </div>
                                    <div class="date">
                                        9 minutes ago
                                    </div>
                                </div>
                            </div>
                            <div class="icon">
                                <svg>
                                    <use xlink:href="#three_dot"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="row-3">
                            <div class="content">
                                How's tech changing farming these days? Are drones and stuff actually useful for small farms?
                            </div>
                        </div>
                        <div class="row-4">
                            <div class="col-1">
                                <div class="box red">
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#heart"></use>
                                        </svg>
                                    </div>
                                    <div class="text">2.3k</div>
                                </div>
                                <div class="box">
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#msgs"></use>
                                        </svg>
                                    </div>
                                    <div class="text">245</div>
                                </div>
                                <div class="box"></div>
                                <div class="box">
                                    <div class="icon">
                                        <svg>
                                            <use xlink:href="#share"></use>
                                        </svg>
                                    </div>
                                    <div class="text">32</div>
                                </div>
                            </div>
                            <div class="col-2">
                                <input type="text" id="lname" name="lname" placeholder="Write Your Comment Here">
                                <div class="icon">
                                    <svg>
                                        <use xlink:href="#send"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="row-5">
                            <div class="wrap">
                                <ul class="main-cmnt">
                                    <li class="has-sub">
                                        <div class="wrp">
                                            <div class="rw-1">
                                                <div class="image">
                                                    <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="dsvv">
                                                </div>
                                            </div>
                                            <div class="rw-2">
                                                <div class="cl-1">
                                                    <div class="name">Kai Kyle</div>
                                                    <div class="time">12 minutes ago</div>
                                                </div>
                                                <div class="cl-2">
                                                    <div class="comment">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                        in voluptate velit esse
                                                    </div>
                                                </div>
                                                <div class="cl-3">
                                                    <div class="wrap">
                                                        <div class="icon">
                                                        <svg>
                                                            <use xlink:href="#heart"></use>
                                                        </svg>
                                                        </div>
                                                        <div class="text">
                                                            2.3k
                                                        </div>
                                                    </div>
                                                    <div class="wrap">
                                                        <div class="icon">
                                                        <svg>
                                                            <use xlink:href="#msgs"></use>
                                                        </svg>
                                                        </div>
                                                        <div class="text">
                                                            Reply
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="sub-com">
                                            <li>
                                                <div class="wrp">
                                                    <div class="rw-1">
                                                        <div class="image">
                                                            <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="dsvv">
                                                        </div>
                                                    </div>
                                                    <div class="rw-2">
                                                        <div class="cl-1">
                                                            <div class="name">Kai Kyle</div>
                                                            <div class="time">12 minutes ago</div>
                                                        </div>
                                                        <div class="cl-2">
                                                            <div class="comment">
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                                in voluptate velit esse
                                                            </div>
                                                        </div>
                                                        <div class="cl-3">
                                                            <div class="wrap">
                                                                <div class="icon">
                                                                <svg>
                                                                    <use xlink:href="#heart"></use>
                                                                </svg>
                                                                </div>
                                                                <div class="text">
                                                                    2.3k
                                                                </div>
                                                            </div>
                                                            <div class="wrap">
                                                                <div class="icon">
                                                                <svg>
                                                                    <use xlink:href="#msgs"></use>
                                                                </svg>
                                                                </div>
                                                                <div class="text">
                                                                    Reply
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="wrp">
                                                    <div class="rw-1">
                                                        <div class="image">
                                                            <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="dsvv">
                                                        </div>
                                                    </div>
                                                    <div class="rw-2">
                                                        <div class="cl-1">
                                                            <div class="name">Kai Kyle</div>
                                                            <div class="time">12 minutes ago</div>
                                                        </div>
                                                        <div class="cl-2">
                                                            <div class="comment">
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                                in voluptate velit esse
                                                            </div>
                                                        </div>
                                                        <div class="cl-3">
                                                            <div class="wrap">
                                                                <div class="icon">
                                                                <svg>
                                                                    <use xlink:href="#heart"></use>
                                                                </svg>
                                                                </div>
                                                                <div class="text">
                                                                    2.3k
                                                                </div>
                                                            </div>
                                                            <div class="wrap">
                                                                <div class="icon">
                                                                <svg>
                                                                    <use xlink:href="#msgs"></use>
                                                                </svg>
                                                                </div>
                                                                <div class="text">
                                                                    Reply
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row-6">
                            <div class="sub-btn">
                                <a href="#">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function(){

    $(document).on('submit', '.commentForm', function(e){
        e.preventDefault();
        var formData= $(this).serialize();
        $.ajax({
            url: '{{ url("create-comment") }}',
            method: 'POST',
            data: formData,
            success:function(response){
                console.log(response.message)
            }
        })
    });
});
</script>
