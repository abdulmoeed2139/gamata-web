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
            border: 4px solid rgba(0, 0, 0, 0.2);
            border-top-color: #000;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }


        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- Banner Section -->
    <section>
        <div class="product-banner">
            <div class="wrapper">
                <div class="breadcrum">
                    <a href="{{ url(app()->getLocale() . '/index') }}" class="link">
                        {{ __('messages.home') }}
                    </a>
                    <svg>
                        <use xlink:href="#breadcrum"></use>
                    </svg>
                    <div class="current">
                        {{ __('messages.shop') }}
                    </div>
                </div>
                <div class="heading">{{ __('messages.heading') }}</div>

                <div class="desc">
                    {{ __('messages.desc') }}</div>
            </div>
        </div>
        </div>
    </section>

    <!-- Listing -->
    <div class="product-listing">
        <div class="wrapper">
            <div class="col-1">
                <div class="search-bars">
                    <form id="productSearchForm" method="GET">
                        <div class="wrapper">
                            <input type="text" class="productSearchBox" name="search" value="{{ request('search') }}" placeholder="{{ __('messages.Search_your_Product') }}">
                            {{-- <svg>
                                <use xlink:href="#inner_search"></use>
                            </svg> --}}
                            <button type="submit" class="search-button">
                                <svg>
                                    <use xlink:href="#inner_search"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="filter">
                    <div class="filter-header">
                        <span class="filter-title">{{ __('messages.Sellers') }}</span>
                        <span class="toggle-icon">−</span>
                    </div>
                    <div class="filter-content">
                        @foreach ($sellers as $item)
                            <label><input type="checkbox">{{ $item['sellerName'] }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-header">
                        <span class="filter-title">{{ __('messages.Fresh_Products') }}</span>
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
                        <span class="filter-title">{{ __('messages.Categories') }}</span>
                        <span class="toggle-icon">−</span>
                    </div>
                    <div class="filter-content">
                        @foreach ($ctg as $item)
                            @if (app()->getLocale() == "en")
                                <label><input type="checkbox">{{ $item['productNameEnglish'] }}</label>
                            @elseif (app()->getLocale() == "si")
                                <label><input type="checkbox">{{ $item['productNameSinhala'] }}</label>
                            @elseif (app()->getLocale() == "ta")
                                <label><input type="checkbox">{{ $item['productNameTamil'] }}</label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-header">
                        <span class="filter-title"> {{ __('messages.District') }}</span>
                        <span class="toggle-icon">−</span>
                    </div>
                    <div class="filter-content">
                        @foreach ($districts as $item)
                            @if (app()->getLocale() == "en")
                                <label><input type="checkbox">{{ $item['name_English'] }}</label>
                            @elseif (app()->getLocale() == "si")
                                <label><input type="checkbox">{{ $item['name_Sinhala'] }}</label>
                            @elseif (app()->getLocale() == "ta")
                                <label><input type="checkbox">{{ $item['name_Tamil'] }}</label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-header">
                        <span class="filter-title">{{ __('messages.Price') }}</span>
                        <span class="toggle-icon">−</span>
                    </div>
                    <div class="filter-content">
                        <div class="price">
                            <div class="price-input">
                                <label for="min-price">{{ __('messages.price_min_label') }}</label>
                                <input type="text" id="min-price"
                                    placeholder="{{ __('messages.price_min_placeholder') }}">
                            </div>
                            <div class="price-input">
                                <label for="max-price">{{ __('messages.price_max_label') }}</label>
                                <input type="text" id="max-price"
                                    placeholder="{{ __('messages.price_max_placeholder') }}">
                            </div>
                        </div>


                        <a href="#" target="_blank" class="common-btn-1 btn-p">
                            <svg>
                                <use xlink:href="#btn_arr"></use>
                            </svg>
                            {{ __('messages.Filter') }}
                        </a>

                    </div>
                </div>
                {{-- <a href="#" target="_blank" class="common-btn-1 btn-p">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        {{ __('Filter') }}
             </a> --}}
            </div>
            <div class="col-2" style="position: relative;">

                <!-- Loader (spinner only) -->
                <div id="loader"
                    style="
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
                            <div class="text">{{ __('messages.sort') }}</div>
                            <svg id= "gridViewBtn" class=" sort-grid active">
                                <use xlink:href="#grid"></use>
                            </svg>
                            <svg id ="listViewBtn" class="sort-list">
                                <use xlink:href="#column"></use>
                            </svg>
                        </div>
                        <div class="right">
                            <div class="text">
                                {{ __('messages.showing_results', ['from' => $pagination['from'], 'to' => $pagination['to'], 'total' => $pagination['total']]) }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-2">
                    <div id="food-list" class="food-list grid-view">
                        @if (request('childCode'))
                            @forelse ($paginatedProducts as $item)
                                <a href="{{ url(app()->getLocale().'/product-view/'.$item['sell_Code']) }}">
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
                                                <img src="{{ $item['imageUri'] . '/' . $item['image01'] }}" alt="Best Selling Item">
                                            </div>
                                            <div class="content">
                                                <div class="pro-name">
                                                    <div class="sin">{{ $item['product_Name_Sinhala'] }}</div>
                                                    <div class="eng">{{ $item['product_Name_English'] }}</div>
                                                    <div class="tam">{{ $item['product_Name_Tamil'] }}</div>
                                                </div>
                                                <div class="price">Rs. <span>{!! number_format($item['unit_Price'], 2) !!}</span> (1 Kg)</div>
                                                <div class="stock">{{ $item['quantity'] }}
                                                    {{ __('messages.kilo_available_in_stock') }} </div>
                                                <div class="common-btn-1">
                                                    <svg>
                                                        <use xlink:href="#btn_arr"></use>
                                                    </svg>
                                                    {{ __('messages.buy_now') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <a href="#">Product Not Found</a>
                            @endforelse
                        @else
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
                                                <img src="{{ $item['imageUri'] . '/' . $item['imageUrl'] }}"
                                                    alt="Best Selling Item">
                                            </div>
                                            <div class="content">
                                                <div class="pro-name">
                                                    <div class="sin">{{ $item['childNameSinhala'] }}</div>
                                                    <div class="eng">{{ $item['childNameEnglish'] }}</div>
                                                    <div class="tam">{{ $item['childNameTamil'] }}</div>
                                                </div>
                                                <div class="price">Rs. <span>{!! number_format($item['avgPrice'], 2) !!}</span> (1 Kg)</div>
                                                <div class="stock">{{ $item['totalAvlQty'] }}
                                                    {{ __('messages.kilo_available_in_stock') }} </div>
                                                <div class="common-btn-1">
                                                    <svg>
                                                        <use xlink:href="#btn_arr"></use>
                                                    </svg>
                                                    {{ __('messages.buy_now') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="postsPagination">
                    <div class="arrow-left">
                        @if ($paginatedProducts->onFirstPage() == false)
                            <a href="{{ $paginatedProducts->previousPageUrl() }}">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    transform="rotate(180)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                        fill="#000000"></path>
                                </svg>
                            </a>
                        @endif
                    </div>

                    <div class="numbers">
                        @for ($i = 1; $i <= $paginatedProducts->lastPage(); $i++)
                            <div class="num {{ $paginatedProducts->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $paginatedProducts->url($i) }}"
                                    style="text-decoration: none; color: #707070;">
                                    {{ $i }}
                                </a>
                            </div>
                        @endfor
                    </div>

                    <div class="arrow-right">
                        @if ($paginatedProducts->hasMorePages())
                            <a href="{{ $paginatedProducts->nextPageUrl() }}">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#productSearchForm').submit(function(e){
                e.preventDefault();

                // Both Pagination hide
                $('.postsPagination').hide();
                $('.related-pagination').hide();

                const searchValue = $(this).val().trim();
                const formData = $(this).serialize();
                $("#food-list").html('');
                $('#loader').show();
                $.ajax({
                        url: "{{ url('get-product') }}",
                        type: 'GET',
                        data: formData,
                        success: function(response) {
                            $('#loader').hide();
                            $("#food-list").html(''); // Clear any previous results

                            const products = response.paginatedProducts.data;
                            if(products.length >= 9){
                                $('.postsPagination').show();
                            }

                            if (products.length === 0) {
                                $("#food-list").html('<p>No products found.</p>');
                                return;
                            }

                            products.forEach(function(item) {
                                let htmlContent = `
                                    <a href="#" data-child-code="${item.childCode}" class="product-link">
                                        <div class="items">
                                            <div class="wrap">
                                                <div class="wishlist">
                                                    <svg>
                                                        <use xlink:href="#heart"></use>
                                                    </svg>
                                                </div>
                                                <div class="image">
                                                    <img src="${item.imageUri}/${item.imageUrl}" alt="${item.childNameEnglish}">
                                                </div>
                                                <div class="content">
                                                    <div class="pro-name">
                                                        <div class="sin">${item.childNameSinhala}</div>
                                                        <div class="eng">${item.childNameEnglish}</div>
                                                        <div class="tam">${item.childNameTamil}</div>
                                                    </div>
                                                    <div class="price">Rs. <span>${parseFloat(item.avgPrice).toLocaleString(undefined, {minimumFractionDigits: 2})}</span> (1 Kg)</div>
                                                    <div class="stock">${item.totalAvlQty} {{ __('messages.kilo_available_in_stock') }}</div>
                                                    <div class="common-btn-1">
                                                        <svg>
                                                            <use xlink:href="#btn_arr"></use>
                                                        </svg>
                                                        {{ __('messages.buy_now') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                `;
                                $("#food-list").append(htmlContent);
                            });
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr);
                        }
                    });
            });


            let currentChildCode = null;
            let relatedProductsContainer = $('#food-list');

            $(document).on('click', '.product-link', function(e) {
                e.preventDefault();
                currentChildCode = $(this).data('child-code');
                loadRelatedProducts(currentChildCode, 1);
            });

            function loadRelatedProducts(childCode, page) {
                $('.postsPagination').hide();
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
                    url: '{{ url('/related-products') }}/' + childCode,
                    type: 'GET',
                    data: {
                        page: page,
                        items_per_page: 9
                    },
                    success: function(response) {
                        relatedProductsContainer.empty();
                        $('.related-pagination').remove();
                        $('.pagination').empty();
                        setTimeout(function() {
                            $('#loader').hide();
                            console.log(response.related_products);
                            if (response.related_products && response.related_products.length >
                                0) {
                                response.related_products.forEach(function(item) {
                                    let productHtml = `
                                <a href="{{ url(app()->getLocale() . '/product-view') }}/${item.sell_Code}">
                                    <div class="items">
                                        <div class="wrap">
                                            <div class="wishlist">
                                                <svg>${wishlistIcon}</use></svg>
                                            </div>
                                            <div class="image">
                                                <img src="${item.imageUri}/${item.image01}" alt="...">
                                            </div>
                                            <div class="content">
                                                <div class="pro-name">
                                                    <div class="sin">${item.product_Name_Sinhala}</div>
                                                    <div class="eng">${item.product_Name_English}</div>
                                                    <div class="tam">${item.product_Name_Tamil}</div>
                                                </div>
                                                <div class="price">Rs. <span>${item.unit_Price}</span> (1Kg)</div>
                                                <div class="stock">${item.quantity} {{ __('messages.kilo_available_in_stock') }} </div>
                                                 <div class="common-btn-1">
                                                        <svg><use xlink:href="#btn_arr"></use></svg>
                                                    {{ __('messages.buy_now') }}
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </a>`;
                                    relatedProductsContainer.append(productHtml);
                                });

                                // Create pagination
                                let $pagination = $(
                                    '<div class="related-pagination " style="margin-top:20px; text-align:center;"></div>'
                                );
                                for (let i = 1; i <= response.pagination.last_page; i++) {
                                    let activeClass = (i === response.pagination.current_page) ?
                                        'active' : '';
                                    $pagination.append(
                                        `<button class="page-btn num ${activeClass}" data-page="${i}">${i}</button>`
                                    );
                                }
                                relatedProductsContainer.after($pagination);

                                // Button click
                                $('.page-btn').off('click').on('click', function() {
                                    let page = $(this).data('page');
                                    loadRelatedProducts(childCode, page);
                                });

                            } else {
                                relatedProductsContainer.html(
                                    '<div class="no-product">No related products found</div>'
                                );
                            }
                        }, 100);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                        relatedProductsContainer.html(
                            '<div class="no-product">Something went wrong!</div>');
                    }
                });
            }

        });
    </script>
@endsection
