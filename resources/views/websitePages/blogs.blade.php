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
                    @for ($i = 0; $i < 6; $i++)
                
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
                </div>
            </div>
        </div>
    </section>
</section>



@endsection
