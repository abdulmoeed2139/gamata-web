@extends('websitePages.master')
@section('content')

<section>
    <!-- Banner Section -->
    <div class="product-banner">
        <div class="wrapper">
            <div class="breadcrum">
                <a href="{{ url('/index') }}" class="link">Home</a>
                <svg><use xlink:href="#breadcrum"></use></svg>
                <div class="current">Journal</div>
            </div>
            <div class="heading">
                Planned Your Harvest Today
            </div>
            <div class="desc">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard  dummy text ever since the 1500s, when an unknown printer took a galley
            </div>
        </div>
    </div>

    <!-- Blogs Section -->
    <section class="product-listing blogsSec">

        <div class="wrapper">
            <div class="col-12">
                     <div class="heading">Blog Category</div>
            </div>

            <div class="col-12">
                <div class="blogs">
                    {{-- @for ($i = 0; $i < 6; $i++)
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
                                        Explore
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endfor --}}

                    @if ($blogs)
                        @foreach ($blogs as $item)
                        <a href="#" data-code="{{ $item['code'] }}"; class="open-modal-btn item" style="text-decoration: none; color: inherit;">
                                <div class="image">
                                    <img src="http://feapi.aethriasolutions.com/uploads/Blog/{{ $item['image'] }}" alt="journal Image">
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
                                            Explore
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
</section>

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

@endsection



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    var modal = $("#modal1");

    // Blog item par click
    $(".open-modal-btn").on("click", function () {
        var code = $(this).data("code");
        $.ajax({
            url: "{{ url('get-blog') }}/"+ code,
            type: "get",
            success:function(response){

                var rawDate = response.data.createdOn;
                var date = new Date(rawDate);

                var months = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                var formattedDate = months[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();

                // console.log(response.data);
                $("#blog-content").html(response.data.body_English);
                $("#blog-date").text(formattedDate);
                $("#blog-ctg").text(response.data.category);
                $("#blog-img").attr("src", "http://feapi.aethriasolutions.com/uploads/Blog/" + response.data.image);
                $(".blog-content").text(response.data.subject);
                $(".blog-content").text(response.data.subject);
                $(".blog-content").text(response.data.subject);
            }
        });
        modal.show();
    });

    // Modal band karna
    $(".close").on("click", function () {
        modal.hide();
    });

    $(window).on("click", function (e) {
        if ($(e.target).is(modal)) {
            modal.hide();
        }
    });
});
</script>
