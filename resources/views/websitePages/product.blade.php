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

.spinner {
  width: 40px;
  height: 40px;
  border: 4px solid rgba(0,0,0,0.2);
  border-top-color: #000;
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}


/* .postsPagination .arrow-right {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: 0.0520833333vw solid #d9d9d9;
    }

 .postsPagination .numbers {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 32px;
    }

.postsPagination .num.active {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        color: #fff;
        background: #9fcd22;
        width: 2.4479166667vw;
        height: 2.4479166667vw;
        border-radius: 50%;
        box-shadow: drop-shadow(3.219px 3.219px 12.877px rgba(149, 193, 31, 0.3));
    }

.postsPagination .num.active a{
color:#fff  !important;
}

.postsPagination.numbers .num {
        color: #707070;
        text-align: center;
        font-family: "Roboto", serif;
        font-size: 0.9895833333vw;
        font-weight: 400;
        line-height: 0.7291666667vw;
    }

.postsPagination .arrow-right {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: 0.0520833333vw solid #d9d9d9;
    }

 .postsPagination .arrow-left:hover {
        border-radius: 50%;
        border: none;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        background: #9fcd22;
        border: 1px solid #9fcd22;
    }

.postsPagination .arrow-right:hover,  .postsPagination .arrow-left:hover {
    border-radius: 50%;
    border: none;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    background: #9fcd22;
    border: 0.0520833333vw solid #9fcd22;
} */


@keyframes spin {
  to {
    transform: rotate(360deg);
  }
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
                    @foreach ($sellers as $item)
                    <label><input type="checkbox">{{ $item }}</label>
                    @endforeach
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">Fresh Products</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    @foreach ($fresh_products as $item)
                    <label><input type="checkbox">{{ $item }}</label>
                    @endforeach
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">Categories</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    @foreach ($ctg as $item)
                        <label><input type="checkbox">{{ $item['productNameEnglish'] }}</label>
                    @endforeach
                </div>
            </div>
            <div class="filter">
                <div class="filter-header">
                    <span class="filter-title">District</span>
                    <span class="toggle-icon">−</span>
                </div>
                <div class="filter-content">
                    @foreach ($districts as $item)
                    <label><input type="checkbox">{{ $item }}</label>
                    @endforeach
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
                      Filter
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
        <div class="col-2" style="position: relative;">

            <!-- Loader (spinner only) -->
            <div id="loader" style="
                display: none;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
            ">
                <div class="spinner"></div>
            </div>

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
                            Showing {{ $pagination['from'] }}–{{ $pagination['to'] }} of {{ $pagination['total'] }} Results
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-2">
                <div id="food-list" class="food-list grid-view">
                    @foreach ($paginatedProducts as $item)
                        <a href="#" data-child-code="{{ $item['childCode'] }}" class="product-link">
                            <div class="items">
                                <div class="wrap">
                                    <div class="wishlist">
                                        <svg>
                                            @if (session('access_token'))
                                                <use xlink:href="#heart"></use>
                                            @endif
                                        </svg>
                                    </div>
                                    <div class="image">
                                        <img src="{{$item['imageUri'].'/'.$item['imageUrl']}}" alt="Best Selling Item">
                                    </div>
                                    <div class="content">
                                        <div class="pro-name">
                                            <div class="sin">{{$item['childNameSinhala']}}</div>
                                            <div class="eng">{{$item['childNameEnglish']}}</div>
                                            <div class="tam">{{$item['childNameTamil']}}</div>
                                        </div>
                                        <div class="price">{!! $item['avgPrice'] !!}</div>
                                        <div class="stock">{{$item['totalAvlQty']}}</div>
                                        <div class="common-btn-1">
                                            <svg><use xlink:href="#btn_arr"></use></svg>
                                            Buy Now
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="postsPagination">
                {{-- Left Arrow --}}
                <div class="arrow-left">
                    @if($paginatedProducts->onFirstPage() == false)
                        <a href="{{ $paginatedProducts->previousPageUrl() }}">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#000000"></path>
                            </svg>
                        </a>
                    @endif
                </div>

                {{-- Page Numbers --}}
                <div class="numbers">
                    @for($i = 1; $i <= $paginatedProducts->lastPage(); $i++)
                        <div class="num {{ $paginatedProducts->currentPage() == $i ? 'active' : '' }}">
                            <a href="{{ $paginatedProducts->url($i) }}" style="text-decoration: none; color: #707070;">
                                {{ $i }}
                            </a>
                        </div>
                    @endfor
                </div>

                {{-- Right Arrow --}}
                <div class="arrow-right">
                    @if($paginatedProducts->hasMorePages())
                        <a href="{{ $paginatedProducts->nextPageUrl() }}">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#000000"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>



        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){

    let currentChildCode = null;
    let relatedProductsContainer = $('#food-list');

    $('.product-link').click(function(e) {
        e.preventDefault();
        currentChildCode = $(this).data('child-code');
        loadRelatedProducts(currentChildCode, 1);
    });

    function loadRelatedProducts(childCode, page) {
        $('#loader').show(); // loader visible
        $('.pagination').empty();
        relatedProductsContainer.empty();
        $('.related-pagination').remove();
        let isLoggedIn = {{ session('access_token') ? 'true' : 'false' }};
        if (isLoggedIn) {
            wishlistIcon = `<svg><use xlink:href="#heart"></use></svg>`;
        } else {
            wishlistIcon = '';
        }
        $.ajax({
            url: '{{ url("related-products") }}/' + childCode,
            type: 'GET',
            data: { page: page, items_per_page: 1 },
            success: function(response) {
                relatedProductsContainer.empty();
                $('.related-pagination').remove();
                $('.pagination').empty();
                setTimeout(function() {
                    $('#loader').hide();

                    if (response.related_products && response.related_products.length > 0) {
                        response.related_products.forEach(function(item) {
                            let productHtml = `
                                <a href="{{ url('product-view') }}/${item.sell_Code}" class="product-link">
                                    <div class="items">
                                        <div class="wrap">
                                            <div class="wishlist">
                                                <svg>${wishlistIcon}</use></svg>
                                            </div>
                                            <div class="image">
                                                <img src="${item.imageUri}/${item.image01}" alt="Product">
                                            </div>
                                            <div class="content">
                                                <div class="pro-name">
                                                    <div class="sin">${item.product_Name_Sinhala}</div>
                                                    <div class="eng">${item.product_Name_English}</div>
                                                    <div class="tam">${item.product_Name_Tamil}</div>
                                                </div>
                                                <div class="price">${item.unit_Price}</div>
                                                <div class="stock">${item.quantity}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>`;
                            relatedProductsContainer.append(productHtml);
                        });

                        // Create pagination
                        let $pagination = $('<div class="related-pagination" style="margin-top:20px; text-align:center;"></div>');
                        for (let i = 1; i <= response.pagination.last_page; i++) {
                            let activeClass = (i === response.pagination.current_page) ? 'active' : '';
                            $pagination.append(`<button class="page-btn ${activeClass}" data-page="${i}">${i}</button>`);
                        }
                        relatedProductsContainer.after($pagination);

                        // Button click
                        $('.page-btn').off('click').on('click', function() {
                            let page = $(this).data('page');
                            loadRelatedProducts(childCode, page);
                        });

                    } else {
                        relatedProductsContainer.html('<div class="no-product">No related products found</div>');
                    }
                }, 100);
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
                relatedProductsContainer.html('<div class="no-product">Something went wrong!</div>');
            }
        });
    }

});


</script>


@endsection


