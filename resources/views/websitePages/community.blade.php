@extends('websitePages.master')
@section('content')
    <style>

        .comment-item {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.4s ease;
            margin-bottom: 0;
        }

        .comment-item.show {
            max-height: 500px; /* enough height for each comment */
            opacity: 1;
            margin-bottom: 10px;
        }

        form.write-post label {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        div.write-post {
            border-bottom: none !important;
        }

        .write-post [type="submit"] {
            color: #fff;
            text-decoration: none;
            font-family: "Barlow", serif;
            font-size: 14px;
            font-style: normal;
            font-weight: 800;
            line-height: 27px;
            letter-spacing: 3.92px;
            text-transform: uppercase;
            background: #9fcd22;
            border-color: #9fcd22;
            padding: 2px 27px;
            cursor: pointer;

        }

        div.box {
            display: flex !important;
            align-items: center;
            flex-direction: column;
            gap: 5px !important;
        }

        div.box .file-name {
            margin-top: 3x;
            display: block;
        }


        .loader {
            display: none;
            width: 18px;
            height: 18px;
            border: 3px solid #9fcd22;
            border-top: 3px solid #9fcd22;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            vertical-align: middle;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }


        @media screen and (max-width:767px) {

            .write-post [type="submit"] {
                padding: 2px 15px;
            }

            form.write-post label {
                gap: 0;

            }

        }
    </style>

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
                    Explore fresh products, connect with featured sellers, and shop with ease. From trending items to
                    detailed searches, Gamata makes
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
                            <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="user">
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
                    <form enctype="multipart/form-data" class="write-post-form">
                        <div class="wrap-1">
                            <input type="text" id="post_name" name="post_name" placeholder="Write your thoughts..."
                                required>
                            <div class="icon">
                                <svg>
                                    <use xlink:href="#happy"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="wrap-2">
                            <div class="box">
                                <label for="imageUploadd">
                                    <svg>
                                        <use xlink:href="#upload_image"></use>
                                    </svg>
                                    <div class="text">Add an Image</div>
                                </label>
                                <input type="file" id="imageUploadd" name="image01" accept="image/*"
                                    style="display: none;">
                                <div class="file-name" id="imageFileName"></div>
                            </div>



                        <!-- Add Cover Image -->
                        <div class="box">
                        <label for="coverUpload">
                            <svg>
                            <use xlink:href="#upload_image"></use>
                            </svg>
                            <div class="text">Add Cover Image</div>
                        </label>
                        <input type="file" id="coverUpload" name="coverUpload" accept="image/*" style="display: none">
                        <div class="file-name" id="coverImagefile"></div>
                        </div>
                            <div class="box">
                                <button type="submit">Post</button>
                            </div>
                        </div>
                    </form>
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
                <div class="postDev">
                    @foreach ($community as $item)
                        <div class="image-post">
                            <div class="wrapper">
                                <div class="row-1">
                                    <div class="pofile">
                                        <div class="image">
                                            <img src="{{ ($item['image1'] ?? 'http://api.aethriasolutions.com/uploads/UploadImage/Sells') . '/' . $item['image1'] }}"
                                                alt="user">
                                        </div>
                                        <div class="name    ">
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
                                    <div class="text">
                                        {{ $item['name'] ?? 'Fresh, sustainable, and full of goodness. 💚 <span>#OrganicLiving  #FreshFromFarm  #GamataCares  #HealthyEating</span>' }}
                                    </div>
                                </div>
                                <div class="row-3">
                                    <div class="image">
                                        <img src="{{ ($item['imageUri'] ?? 'http://api.aethriasolutions.com/uploads/UploadImage/Sells') . '/' . $item['cover_Image'] }}"
                                            alt="sdcv">
                                    </div>
                                </div>
                                @php
                                    if (!function_exists('number_format_short')) {
                                        function number_format_short($n, $precision = 1)
                                        {
                                            if ($n < 900) {
                                                $n_format = number_format($n, $precision);
                                                $suffix = '';
                                            } elseif ($n < 900000) {
                                                $n_format = number_format($n / 1000, $precision);
                                                $suffix = 'k';
                                            } elseif ($n < 900000000) {
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
                                        <div class="box post-like" data-post-id="{{ $item['code'] }}">
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
                                            <div class="text">{{ number_format_short($item['totalCommentsCount']) }}
                                            </div>
                                        </div>
                                        <div class="box"></div>
                                        <div class="box">
                                            <div class="icon">
                                                <svg>
                                                    <use xlink:href="#share"></use>
                                                </svg>
                                            </div>
                                            <div class="text">{{ number_format_short($item['totalsharesCount'] ?? 0) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <form class="commentForm d-flex com">
                                            @csrf
                                            <input type="text" class="comment" name="comment"
                                                placeholder="Write Your Comment Here">
                                            <input type="hidden" id="fK_UserID" name="fK_UserID"
                                                value="{{ $item['fK_UserID'] }}">
                                            <input type="hidden" id="is_delete" name="is_delete"
                                                value="{{ $item['isdelete'] ?? false }}">
                                            <input type="hidden" id="FK_Post_Code" name="FK_Post_Code"
                                                value="{{ $item['code'] }}">
                                            @php $time = Carbon\Carbon::now()->toDateString(); @endphp
                                            <input type="hidden" name="dateTime" value="{{ $time }}">
                                            <button type="submit" class="icon"
                                                style="border:none; background:none; cursor:pointer;">
                                                <svg class="submitBtn">
                                                    <use xlink:href="#send"></use>
                                                </svg>
                                                <div class="loader" style="display: none;"></div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="image-post comment-container">
                            <div class="wrapper">
                                <div class="row-1" style="display: none;">
                                    <div class="pofile">
                                        <div class="image">
                                            <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="user">
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
                                <div class="row-3" style="display: none;">
                                    <div class="content">
                                        How's tech changing farming these days? Are drones and stuff actually useful for
                                        small farms?
                                    </div>
                                </div>
                                <div class="row-4" style="display: none;">
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
                                        <input type="text" id="lname" name="lname"
                                            placeholder="Write Your Comment Here">
                                        <div class="icon submitBtn">
                                            <svg>
                                                <use xlink:href="#send"></use>
                                            </svg>
                                        </div>
                                        <div class="loader" style="display: none;"></div>
                                    </div>
                                </div>
                                <div class="row-5">
                                    <div class="wrap">
                                        <ul class="main-cmnt">
                                            <li class="has-sub">
                                                @forelse ($item['comments'] as $comment)
                                                <div class="wrp comment-item">
                                                        <div class="rw-1">
                                                            <div class="image">
                                                                <img src="{{ asset('assets/Images/community/user.jpg') }}" alt="user">
                                                            </div>
                                                        </div>
                                                        <div class="rw-2">
                                                            <div class="cl-1">
                                                                <div class="name">{{ $comment['usersName'] }}</div>
                                                                <div class="time">{{ \Carbon\Carbon::parse(\Carbon\Carbon::parse($comment['commented_DateTime'])->format('Y-m-d H:i:s'))->diffForHumans() }}
                                                                                                    </div>
                                                            </div>
                                                            <div class="cl-2">
                                                                <div class="comment">{{ $comment['comment'] }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="wrp comment-item show no-commentt">
                                                        <div class="rw-2">
                                                            <div class="cl-1"><div class="name">Comment Not Yet</div></div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row-6">
                                    <div class="sub-btn">
                                        <a href="#" id="toggle-comments">Show more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <!-- <div class="pagination">
                        {{-- Left Arrow --}}
                        @if($pagination['page'] > 1)
                            <a href="{{ url()->current() }}?page={{ $pagination['page'] - 1 }}">
                                &laquo; Previous
                            </a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach($pagination['links'] as $link)
                            @if($link['label'] != 'Next &raquo;' && $link['label'] != '&laquo; Previous')
                                <a href="{{ url()->current() }}?page={{ $link['page'] }}"
                                class="{{ $link['active'] ? 'active' : '' }}">
                                {{ $link['label'] }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Right Arrow --}}
                        @if($pagination['page'] < $pagination['last_page'])
                            <a href="{{ url()->current() }}?page={{ $pagination['page'] + 1 }}">
                                Next &raquo;
                            </a>
                        @endif
                    </div> -->

                    <div class="pagination">
                        {{-- Left Arrow --}}
                        <div class="arrow-left">
                            @if(isset($pagination['page']) && $pagination['page'] > 1)
                                <a href="{{ url()->current() }}?page={{ $pagination['page'] - 1 }}">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                            fill="#000000"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>

                        {{-- Page Numbers --}}
                        <div class="numbers">
                            @if(isset($pagination['links']))
                                @foreach($pagination['links'] as $link)
                                    @if(is_numeric($link['label'])) {{-- Sirf numbers show kare --}}
                                        <div class="num {{ $link['active'] ? 'active' : '' }}">
                                            <a href="{{ url()->current() }}?page={{ $link['page'] }}" style="text-decoration: none; color: #707070;">
                                                {{ $link['label'] }}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        {{-- Right Arrow --}}
                        <div class="arrow-right">
                            @if(isset($pagination['page'], $pagination['last_page']) && $pagination['page'] < $pagination['last_page'])
                                <a href="{{ url()->current() }}?page={{ $pagination['page'] + 1 }}">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                            fill="#000000"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>



    <script>
        document.getElementById("imageUploadd").addEventListener("change", function() {
            let fileName = this.files[0] ? this.files[0].name : "";
            document.getElementById("imageFileName").textContent = fileName;
        });

        // Video File Name Show
        // Cover Image File Name Show - ADD THIS
        document.getElementById("coverUpload").addEventListener("change", function() {
        let fileName = this.files[0] ? this.files[0].name : "";
        document.getElementById("coverImagefile").textContent = fileName;
        });

        document.addEventListener("DOMContentLoaded", function () {
    const allPosts = document.querySelectorAll(".comment-container"); // har post ka container

    allPosts.forEach(post => {
        const comments = post.querySelectorAll(".comment-item");
        const toggleBtn = post.querySelector("#toggle-comments");
        if (!toggleBtn || comments.length === 0) return;

        const step = 3;
        let visibleCount = step;

        // Pehle 3 comments show karo
        comments.forEach((comment, index) => {
            if (index < visibleCount) comment.classList.add("show");
        });

        // Agar 3 se kam comments hain to button hide kar do
        if (comments.length <= step) {
            toggleBtn.style.display = "none";
            return; // Is post ke liye aage kuch mat karo
        }

        // Button click functionality
        toggleBtn.addEventListener("click", function (e) {
            e.preventDefault();

            if (toggleBtn.textContent === "Show more") {
                // Next 3 comments show karo
                let nextCount = visibleCount + step;
                for (let i = visibleCount; i < nextCount && i < comments.length; i++) {
                    comments[i].classList.add("show");
                }
                visibleCount = Math.min(nextCount, comments.length);

                // Agar sab show ho gaye to button text change karo
                if (visibleCount >= comments.length) {
                    toggleBtn.textContent = "Show less";
                }
            } else {
                // Last wale 3 comments hide karo (pehle 3 visible rehne do)
                let hideCount = visibleCount - step;
                for (let i = visibleCount - 1; i >= hideCount && i >= 0; i--) {
                    if (i >= step) comments[i].classList.remove("show");
                }
                visibleCount = Math.max(hideCount, step);

                // Agar sirf 3 comments visible hain to button text reset karo
                if (visibleCount <= step) {
                    toggleBtn.textContent = "Show more";
                }
            }
        });
    });
});

    </script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.write-post-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: '{{ url('/create-post') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Post created successfully:', response);
                        alert('Post created successfully!');
                        $('.write-post-form')[0].reset();

                        const newPost = `
                    <div class="image-post">
                        <div class="wrapper">
                            <div class="row-1">
                                <div class="pofile">
                                    <div class="image">
                                        <img src="${URL.createObjectURL(formData.get('coverUpload'))}" alt="user">
                                    </div>
                                    <div class="name">
                                        <div class="text">You</div>
                                        <div class="date">Just now</div>
                                    </div>
                                </div>
                                <div class="icon">
                                    <svg><use xlink:href="#three_dot"></use></svg>
                                </div>
                            </div>
                            <div class="row-2">
                                <div class="text">${formData.get('post_name')}</div>
                            </div>
                            <div class="row-3">
                                <div class="image">
                                    <img src="${URL.createObjectURL(formData.get('image01'))}" alt="post image">
                                </div>
                            </div>
                            <div class="row-4">
                                <div class="col-1">
                                    <div class="box red">
                                        <div class="icon"><svg><use xlink:href="#heart"></use></svg></div>
                                        <div class="text">0</div>
                                    </div>
                                    <div class="box">
                                        <div class="icon"><svg><use xlink:href="#msgs"></use></svg></div>
                                        <div class="text">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-post">
                        <div class="wrapper">
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
                `;
                        $('.postDev').prepend(newPost);

                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                        window.location.href = "{{ url('/login') }}";
                    }
                });
            });

            var userImage = "{{ asset('assets/Images/community/user.jpg') }}";
            $(document).on('submit', '.commentForm', function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = form.serialize();
                $.ajax({
                    url: '{{ url("create-comment") }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response.message);
                        var commentInput = form.find('input[name="comment"]');
                        var commentText = commentInput.val();
                        var userName = response.username;
                        var dateTime = form.find('input[name="dateTime"]').val();

                        var newComment = `
                    <div class="wrp" >
                        <div class="rw-1">
                            <div class="image">
                                <img src="${userImage}" alt="user">
                            </div>
                        </div>
                        <div class="rw-2" style="min-width:315px;">
                            <div class="cl-1">
                                <div class="name">${userName}</div>
                                <div class="time">${dateTime}</div>
                            </div>
                            <div class="cl-2">
                                <div class="comment">${commentText}</div>
                            </div>
                        </div>
                    </div>
                `;

                        // ✅ Naya selector
                        var targetUL = form.closest('.image-post').next('.comment-container')
                            .find('.has-sub');

                        if (targetUL.length) {
                            var noCommentDiv = targetUL.find('.no-commentt');
                            if (noCommentDiv.length) {
                                noCommentDiv.remove();
                            }
                            targetUL.prepend(newComment);
                            commentInput.val(''); // clear box
                        } else {
                            alert('Cannot find comment list container');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        window.location.href = "{{ url('/login') }}";
                    }
                })
            });

            $(document).on('click', '.post-like', function() {
                let postId = $(this).data('post-id');
                let likeBox = $(this);
                let wrapper = likeBox.closest('.image-post');
                let FK_Post_Code = wrapper.find('#FK_Post_Code').val();
                let is_delete = wrapper.find('#is_delete').val() ?? false;

                // Get current count number
                let countElement = likeBox.find('.text');
                let currentCount = parseInt(countElement.text().replace(/,/g, '')) || 0;

                $.ajax({
                    url: '{{ url('/like-post') }}', // apni route ka URL
                    type: 'POST',
                    data: {
                        postId: postId,
                        FK_Post_Code: FK_Post_Code,
                        is_delete: is_delete,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Post liked:', response);
                        if (response.message.includes('added')) {
                            likeBox.addClass('red');
                            countElement.text(currentCount + 1);
                        }
                        else if (response.message.includes('removed')) {
                            likeBox.removeClass('red');
                            if (currentCount > 0) {
                                countElement.text(currentCount - 1);
                            }
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                        window.location.href ="{{ url('/login') }}";
                    }
                });
            });

        });



        $(document).ready(function() {
            // ✅ Show loader when typing a comment
            $(document).on('input', '.comment', function() {
                const input = $(this);
                const form = input.closest('form');
                const submitBtn = form.find('.submitBtn');
                const loader = form.find('.loader');

                // Hide button, show loader immediately
                submitBtn.hide();
                loader.show();


                // Clear previous typing timer
                clearTimeout(input.data('typingTimer'));

                // Wait 0.5 seconds after typing stops
                const timer = setTimeout(() => {
                    loader.hide();
                    submitBtn.show();
                }, 500);

                input.data('typingTimer', timer);
            });
        });
    </script>
@endsection
