@extends('websitePages.master')

@section('content')

<link rel="stylesheet" href="">

<!-- Typography -->
<!-- headings -->
<div class="ant-heading-wrapper">
    <div class="element-head">Headings</div>
    <h1 class="ant-heading-1">HEADING 1</h1>
    <h2 class="ant-heading-2">HEADING 2</h2>
    <h4 class="ant-heading-4">HEADING 3</h4>
    <h5 class="ant-heading-5">HEADING 4</h5>
</div>

<div class="ant-body-wrapper">
<!-- Body-text -->
    <div class="element-head">Body Text</div>
    <!--  -->
    <div class="ant-body-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
</div>

<!-- Buttons -->
<!-- Primary Button 1 -->
<div class="main-button-wrap">
    <div class="element-head ant-text-left">Primary Button 1</div>
    <!--  -->
    <div class="ant-primary-bttn-wrap">
        <a href="#" class="ant-primary-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>

<!-- Secondary Button 1 -->
<div class="main-button-wrap">
    <div class="element-head ant-text-left">Secondary Button 1</div>
    <!--  -->
    <div class="ant-secondary-bttn-wrap">
        <a href="#" class="ant-secondary-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>
<!-- Outlined Button -->
<div class="main-button-wrap">
    <div class="element-head ant-text-left">Outlined Button</div>
    <!--  -->
    <div class="ant-outlined-bttn-wrap">
        <a href="#" class="ant-outlined-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>

<div class="main-button-wrap">
    <!-- Outline Secondary Button -->
    <div class="element-head ant-text-left">Outline Secondary Button</div>
    <!--  -->
    <div class="ant-outlined-sec-bttn-wrap">
        <a href="#" class="ant-outlined-sec-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>

<div class="main-button-wrap">
    <!-- Disable-Primary-bttn -->
    <div class="element-head ant-text-left">Disable-Primary-bttn</div>
    <!--  -->
    <div class="ant-primary-bttn-wrap disable-bttn">
        <a href="#" class="ant-primary-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>


<div class="main-button-wrap">
    <!-- Disable Secondary Bttn -->
    <div class="element-head ant-text-left">Disable Secondary Bttn</div>
    <!--  -->
    <div class="ant-secondary-bttn-wrap disable-bttn">
        <a href="#" class="ant-secondary-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>

<div class="main-button-wrap">
    <!-- Disable Outlined Button -->
    <div class="element-head ant-text-left">Disable Outlined Button</div>
    <!--  -->
    <div class="ant-outlined-bttn-wrap disable-bttn">
        <a href="#" class="ant-outlined-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>

<div class="main-button-wrap">
    <!-- Disable Outline Secondary Button -->
    <div class="element-head ant-text-left">Disable Outline Secondary Button</div>
    <!--  -->
    <div class="ant-outlined-sec-bttn-wrap disable-bttn">
        <a href="#" class="ant-outlined-sec-bttn">
            <svg>
                <use xlink:href="#btn_arr"></use>
            </svg>
            Button Text
        </a>
    </div>
</div>

<!-- Paginations -->
<div class="main-pagi-wrap">
    <div class="element-head ">Paginations</div>
    <!--  -->
    <div class="ant-pagination">
        <div class="arrow-left">
            <svg>
                <use xlink:href="#left_arr"></use>
            </svg>
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
            <svg>
                <use xlink:href="#right_arr"></use>
            </svg>
        </div>
    </div>
</div>

<!-- Checkboxes -->
<div class="main-check-wrap">
    <div class="element-head ant-text-left">Checkboxes</div>
    <!--  -->
    <div class="ant-filter-content">
        <label class="ant-custom-checkbox"><input type="checkbox" id="int-1"/><span class="checkmark"></span>GreenHarvest Suppliers</label>
        <label class="ant-custom-checkbox"><input type="checkbox" id="int-2"/><span class="checkmark"></span>GreenHarvest Suppliers</label>
        <label class="ant-custom-checkbox"><input type="checkbox" id="int-3"/><span class="checkmark"></span>GreenHarvest Suppliers</label>
        <label class="ant-custom-checkbox"><input type="checkbox" id="int-4"/><span class="checkmark"></span>GreenHarvest Suppliers</label>
    </div>
</div>

<!-- Cards -->
<div class="main-card-wrap">
    <div class="element-head"> Cards</div>
    <!--  -->
    <div class="ant-main-card-wrap">
        <div class="ant-cards-items">
            <div class="wrap">
                <div class="wishlist">
                    <svg>
                        <use xlink:href="#heart"></use>
                    </svg>
                </div>
                <div class="image">
                    <img src="{{ asset('elements/Images/items/1.png') }}" alt="Best Selling Item">
                </div>
                <div class="content">
                    <div class="pro-name">
                        <div class="sin">ලංකා ලොකු ළුණු</div>
                        <div class="eng">Lanka Big Onion</div>
                        <div class="tam">சிலோன் பெரிய வெங்காயம்</div>
                    </div>
                    <div class="price">Rs. <span>260.00</span> (1kg)</div>
                    <div class="stock">100 Kilo Available in Stock</div>
                    <a href="#" class="common-btn-1">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Buy Now
                    </a>
                </div>
            </div>
        </div>

        <div class="ant-cards-items">
            <div class="wrap">
                <div class="wishlist">
                    <svg>
                        <use xlink:href="#heart"></use>
                    </svg>
                </div>
                <div class="image">
                    <img src="{{ asset('elements/Images/items/3.png') }}" alt="Best Selling Item">
                </div>
                <div class="content">
                    <div class="pro-name">
                        <div class="sin">කරවිල</div>
                        <div class="eng">Bitter Gourd</div>
                        <div class="tam">பாகற்காய்</div>
                    </div>
                    <div class="price">Rs. <span>160.00</span> (1kg)</div>
                    <div class="stock">100 Kilo Available in Stock</div>
                    <a href="#" class="common-btn-1">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Buy Now
                    </a>
                </div>
            </div>
        </div>

        <div class="ant-cards-items disabled-card">
            <div class="wrap">
                <div class="wishlist">
                    <svg>
                        <use xlink:href="#heart"></use>
                    </svg>
                </div>
                <div class="image">
                    <img src="{{ asset('elements/Images/items/1.png') }}" alt="Best Selling Item">
                </div>
                <div class="content">
                    <div class="pro-name">
                        <div class="sin">ලංකා ලොකු ළුණු</div>
                        <div class="eng">Lanka Big Onion</div>
                        <div class="tam">சிலோன் பெரிய வெங்காயம்</div>
                    </div>
                    <div class="price">Rs. <span>260.00</span> (1kg)</div>
                    <div class="stock">100 Kilo Available in Stock</div>
                    <a href="#" class="common-btn-1">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Buy Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- bread-crumbs -->
<div class="main-bread-wrap">
    <div class="element-head ant-text-left"> bread-crumbs</div>
    <!--  -->
    <div class="ant-bread-crumbs">
        <a class="ant-bread-link"href="#">Home</a>
        <svg>
            <use xlink:href="#bread-arrw"></use>
        </svg>
        <span class="ant-current">Our Products</span>
    </div>
</div>

<!-- Arrows -->
<div class="main-arr-wrap">
    <!-- Active -->
    <div class="element-head">Arrows Active</div>
    <!--  -->
    <div class="ant-button-nav">
        <button type="button" role="presentation" class="ant-prev disabled">
            <svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg></button>
        <button type="button" role="presentation" class="ant-next">
            <svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg></button>
    </div>

    <!-- Disabled -->
    <div class="element-head">Arrows Disabled</div>
    <!--  -->
    <div class="ant-button-nav ant-disabled-arr">
        <button type="button" role="presentation" class="ant-prev disabled">
            <svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg></button>
        <button type="button" role="presentation" class="ant-next">
            <svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg></button>
    </div>
</div>

<!-- Tabs -->
<div class="main-tab-wrap">
    <div class="element-head">Tabs</div>
    <!--  -->
    <div class="ant-tab-buttons">
        <button class="ant-tab-btn active" data-tab="tab1">Tab 1</button>
        <button class="ant-tab-btn" data-tab="tab2">Tab 2</button>
        <button class="ant-tab-btn" data-tab="tab3">Tab 3</button>
    </div>
</div>

<!-- Accordion -->
<div class="main-acc-wrap">
    <div class="element-head ant-text-left">Accordion</div>
    <!--  -->
    <div class="ant-accordion">
        <div class="ant-acc-inner">
            <span class="acc-title">Lorem ipsum dolor sit amet, consectetur</span>
            <span class="toggle-icon">
                <svg>
                    <use xlink:href="#acc-arr-down"></use>
                </svg>
            </span>
        </div>
        <div class="ant-acc-content">
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
        </div>
    </div>
    <div class="ant-accordion">
        <div class="ant-acc-inner">
            <span class="acc-title">Lorem ipsum dolor sit amet, consectetur</span>
            <span class="toggle-icon">
                <svg>
                    <use xlink:href="#acc-arr-down"></use>
                </svg>
            </span>
        </div>
        <div class="ant-acc-content">
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
        </div>
    </div>
</div>


<!-- Time Picker -->
<div class="main-time-wrap">
    <div class="element-head ant-text-left">Time Picker</div>
    <!--  -->
    <div class="ant-timer-picker">
        <div class="ant-dropdown" id="dropdown-year">
            <div class="ant-select">Year</div> 
                <!-- visible “box” -->
                <svg>
                    <use xlink:href="#acc-arr-down"></use>
                </svg>  
                <ul class="ant-options">
                    <li data-value="2000">2000</li>
                    <li data-value="2001">2001</li>
                    <li data-value="2002">2002</li>
                    <li data-value="2003">2003</li>
                    <li data-value="2004">2004</li>
                    <li data-value="2005">2005</li>
                    <li data-value="2006">2006</li>
                </ul>
            <input type="hidden" name="year" id="year-val" />
        </div>

        <!-- Month -->
        <div class="ant-dropdown" id="dropdown-month">
            <div class="ant-select">Month</div>
                <svg>
                    <use xlink:href="#acc-arr-down"></use>
                </svg>
                <ul class="ant-options">
                    <li data-value="January">January</li>
                    <li data-value="February">February</li>
                    <li data-value="March">March</li>
                    <li data-value="April">April</li>
                    <li data-value="May">May</li>
                    <li data-value="June">June</li>
                    <li data-value="July">July</li>
                    <li data-value="August">August</li>
                    <li data-value="September">September</li>
                    <li data-value="October">October</li>
                    <li data-value="November">November</li>
                    <li data-value="December">December</li>
                </ul>
            <input type="hidden" name="month" id="month-val" />
        </div>

        <!-- Date -->
        <div class="ant-dropdown" id="dropdown-date">
            <div class="ant-select">Date</div>
                <svg>
                    <use xlink:href="#acc-arr-down"></use>
                </svg>
                <ul class="ant-options">
                    <li data-value="01">01</li>
                    <li data-value="02">02</li>
                    <li data-value="03">03</li>
                    <li data-value="04">04</li>
                </ul>
            <input type="hidden" name="date" id="date-val" />
        </div>
    </div>
</div>

<!-- Input Fields -->
<div class="main-input-wrap ">
    <div class="element-head ant-text-left">Input Fields</div>
    <!--  -->
    <div class="ant-input">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder= "First Name">
    </div>

    <!-- Input Field with Error -->
    <div class="element-head ant-text-left">Input Field with Error</div>
    <!--  -->
    <div class="ant-input ant-error">
        <label for="fname">First Name*</label>
        <input type="text" id="fname" name="fname" placeholder= "First Name">
    </div>
</div>

<!-- Radio Buttons -->
<div class="main-radio-wrap">
    <div class="element-head ant-text-left">Radio Buttons</div>
    <!--  -->
    <div class="ant-radio">
        <div class="ant-radio-wrap">
            <input type="radio" id="inactive" name="rad" value="Inactive">
            <label for="inactive">Inactive</label>
        </div>

        <div class="ant-radio-wrap">
            <input type="radio" id="active" name="rad" value="Active">
            <label for="active">Active</label>
        </div>

        <div class="ant-radio-wrap ant-radio-dis">
            <input type="radio" id="disable" name="rad" value="Disable" disabled>
            <label for="disable">Disable</label>
        </div>
    </div>
</div>

<!-- Dropdown -->
<div class="main-drop-wrap">
    <div class="element-head ant-text-left">Dropdown</div>
    <!--  -->
    <div class="ant-drop-wrap">
        <div class="ant-dropdown">
            <div class="dropdown-select">
                <span class="selected-text">Select</span>
                <span class="dropdown-icon">
                    <svg class="arrow-icon">
                        <use xlink:href="#acc-arr-down"></use>
                    </svg>
                </span>
            </div>
            <ul class="dropdown-options">
                <li data-value="1">Option 1</li>
                <li data-value="2">Option 2</li>
                <li data-value="3">Option 3</li>
                <li data-value="4">Option 4</li>
                <li data-value="5">Option 5</li>
                <li data-value="6">Option 6</li>
                <li data-value="7">Option 7</li>
                <li data-value="8">Option 8</li>
            </ul>
            <input type="hidden" name="dropdown-value" />
        </div>
    </div>
</div>

<!-- Loading -->
<div class="main-load-wrap">
    <div class="element-head ant-text-left">Loading</div>
    <!--  -->
    <div class="ant-loading">
        <div class="ant-loading-1">
            <div class="ant-circle-full"></div>
            <span class="load-1">Fully Loaded</span>
        </div>
        <div class="ant-loading-2">
            <div class="ant-circle-load"></div>
            <span class="load-2">Loading</span>
        </div>
    </div>
</div>

<!-- Progress Bar -->
<div class="main-prog-wrap">
    <div class="element-head ant-text-left">Progress Bar</div>
    <!--  -->
    <div class="ant-progress-bar">
        <div class="ant-prog-wrap">
            <div class="ant-done">
                <span class="ant-text">Order</span>
                <span class="ant-line"></span>
            </div>
            <div class="ant-stopped">
                <span class="ant-text">Payment</span>
                <span class="ant-line"></span>
            </div>
            <div class="ant-att">
                <span class="ant-text">Payment</span>
                <span class="ant-line"></span>
            </div>
            <div class="ant-pend">
                <span class="ant-text">Confirm</span>
            </div>
        </div>
    </div>
</div>

<!-- Grids with filter -->
<div class="main-grid-wrap">
    <div class="element-head">Grids with filter</div>

    <div class="table-wrapper">

    <!-- Table Header -->
        <div class="table-header">
            <div class="right-tools">
                <input id="tab-search" type="text" placeholder="Type Your Keyword" />
                <span>
                    <svg class="td-svgs td-sear">
                        <use xlink:href="#td-search"></use>
                    </svg>
                </span>
                <div class="td-select">
                    <select required>
                        <option value="" disabled selected hidden>Select Year</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
            </div>
        </div>

    <!-- Scrollable Table Container -->
        <div class="table-scroll-container">
            <table class="account-table">
                <thead>
                    <tr>
                    <th class="th-zero-col"><input id="main-check" type="checkbox" /></th>
                    <th class="th-first-col">
                        <svg class="th-svgs td-sear">
                            <use xlink:href="#td-search"></use>
                        </svg>
                        Account
                        <svg class="th-svgs td-acc-asc">
                            <use xlink:href="#td-asc"></use>
                        </svg>
                    </th>
                    <th class="th-sec-col">
                        <span class="stats">Status</span>
                    </th>
                    <th class="th-thir-col">
                        <span class="bala">Balance</span>
                    </th>
                    <th class="th-four-col">
                        <span class="eme">Email</span>
                    </th>
                    <th class="th-five-col">
                        <span class="act">Activation</span>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- FIRST ROW -->
                    <tr>
                        <td class="ant-first-col"><input type="checkbox" /></td>
                        <td class="user-info">
                            <span class="avatar-icon">
                                <svg class="td-svgs td-pro">
                                    <use xlink:href="#td-profile"></use>
                                </svg>
                            </span>
                            <div>
                            <div class="name">Albert Flores</div>
                            <div class="org">UnitedHealth Group</div>
                            </div>
                            <span class="dots-menu">⋮</span>
                        </td>
                        <td class="status error">
                            <span class="status-wrap">
                                <span class="status-icon">
                                    <svg class="td-svgs">
                                        <use xlink:href="#td-err"></use>
                                    </svg>
                                </span>
                                <span class="status-text">Error</span>
                            </span>
                        </td>
                        <td class="ant-balance">
                            <span class="bala-wrap">
                                <span class="price">$589.99 </span>
                                <span class="arrow">↑</span>
                            </span>
                        </td>
                        <td class="ant-tab-email">debbie.baker@example.com</td>
                        <td class="ant-activ">
                            <label class="switch">
                                <input id="tog-activ "type="checkbox" checked />
                                <span class="slider round"></span> 
                            </label>
                            <span class="toggle-text">On</span>
                        </td>
                    </tr>

                    <!-- SECOND ROW -->

                    <tr>
                        <td class="ant-first-col"><input type="checkbox" /></td>
                        <td class="user-info">
                            <span class="avatar-icon">
                                <svg class="td-svgs td-pro">
                                    <use xlink:href="#td-profile"></use>
                                </svg>
                            </span>
                            <div>
                            <div class="name">Albert Flores</div>
                            <div class="org">UnitedHealth Group</div>
                            </div>
                            <span class="dots-menu">⋮</span>
                        </td>
                        <td class="status error">
                            <span class="status-wrap">
                                <span class="status-icon">
                                    <svg class="td-svgs">
                                        <use xlink:href="#td-war"></use>
                                    </svg>
                                </span>
                                <span class="status-text">Warning</span>
                            </span>
                        </td>
                        <td class="ant-balance">
                            <span class="bala-wrap">
                                <span class="price">$589.99 </span>
                                <span class="arrow">↑</span>
                            </span>
                        </td>
                        <td class="ant-tab-email">debbie.baker@example.com</td>
                        <td class="ant-activ">
                            <label class="switch">
                                <input id="tog-activ "type="checkbox" checked />
                                <span class="slider round"></span> 
                            </label>
                            <span class="toggle-text">On</span>
                        </td>
                    </tr>

                    <!-- THIRD ROW -->

                    <tr>
                        <td class="ant-first-col"><input type="checkbox" /></td>
                        <td class="user-info">
                            <span class="avatar-icon">
                                <svg class="td-svgs td-pro">
                                    <use xlink:href="#td-profile"></use>
                                </svg>
                            </span>
                            <div>
                            <div class="name">Albert Flores</div>
                            <div class="org">UnitedHealth Group</div>
                            </div>
                            <span class="dots-menu">⋮</span>
                        </td>
                        <td class="status error">
                            <span class="status-wrap">
                                <span class="status-icon">
                                    <svg class="td-svgs">
                                        <use xlink:href="#td-corr"></use>
                                    </svg>
                                </span>
                                <span class="status-text">Success</span>
                            </span>
                        </td>
                        <td class="ant-balance">
                            <span class="bala-wrap">
                                <span class="price">$589.99 </span>
                                <span class="arrow">↑</span>
                            </span>
                        </td>
                        <td class="ant-tab-email">debbie.baker@example.com</td>
                        <td class="ant-activ">
                            <label class="switch">
                                <input id="tog-activ "type="checkbox" checked />
                                <span class="slider round"></span> 
                            </label>
                            <span class="toggle-text">On</span>
                        </td>
                    </tr>

                    <!-- FOURTH ROW -->

                    <tr>
                        <td class="ant-first-col"><input type="checkbox" /></td>
                        <td class="user-info">
                            <span class="avatar-icon">
                                <svg class="td-svgs td-pro">
                                    <use xlink:href="#td-profile"></use>
                                </svg>
                            </span>
                            <div>
                            <div class="name">Albert Flores</div>
                            <div class="org">UnitedHealth Group</div>
                            </div>
                            <span class="dots-menu">⋮</span>
                        </td>
                        <td class="status error">
                            <span class="status-wrap">
                                <span class="status-icon">
                                    <svg class="td-svgs">
                                        <use xlink:href="#td-err"></use>
                                    </svg>
                                </span>
                                <span class="status-text">Error</span>
                            </span>
                        </td>
                        <td class="ant-balance">
                            <span class="bala-wrap">
                                <span class="price">$589.99 </span>
                                <span class="arrow">↑</span>
                            </span>
                        </td>
                        <td class="ant-tab-email">debbie.baker@example.com</td>
                        <td class="ant-activ">
                            <label class="switch">
                                <input id="tog-activ "type="checkbox" checked />
                                <span class="slider round"></span> 
                            </label>
                            <span class="toggle-text">On</span>
                        </td>
                    </tr>

                    <!-- FIFTH ROW -->
                    
                    <tr>
                        <td class="ant-first-col"><input type="checkbox" /></td>
                        <td class="user-info">
                            <span class="avatar-icon">
                                <svg class="td-svgs td-pro">
                                    <use xlink:href="#td-profile"></use>
                                </svg>
                            </span>
                            <div>
                            <div class="name">Albert Flores</div>
                            <div class="org">UnitedHealth Group</div>
                            </div>
                            <span class="dots-menu">⋮</span>
                        </td>
                        <td class="status error">
                            <span class="status-wrap">
                                <span class="status-icon">
                                    <svg class="td-svgs">
                                        <use xlink:href="#td-corr"></use>
                                    </svg>
                                </span>
                                <span class="status-text">Success</span>
                            </span>
                        </td>
                        <td class="ant-balance">
                            <span class="bala-wrap">
                                <span class="price">$589.99 </span>
                                <span class="arrow">↑</span>
                            </span>
                        </td>
                        <td class="ant-tab-email">debbie.baker@example.com</td>
                        <td class="ant-activ">
                            <label class="switch">
                                <input id="tog-activ "type="checkbox" checked />
                                <span class="slider round"></span> 
                            </label>
                            <span class="toggle-text">On</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Upload Flies -->
<div class="main-upload-wrap">
    <div class="element-head ant-text-left">Upload Flies</div>
    <!--  -->
    <div class="ant-main-upload">
        <div class="ant-upload-container">
            <div class="upload-header">
                <div class="header-icon">
                    <span>
                        <svg class="td-svgs td-pro">
                             {{-- <defs> --}}
               {{-- <symbol id="up-cloud" viewBox="0 0 43 42">
                 <path d="M13.436 33.6034H10.1075C5.01085 33.2393 2.72266 29.3215 2.72266 25.8371C2.72266 22.3527 5.01087 18.4175 10.0208 18.0708C10.7316 18.0015 11.3556 18.5562 11.4076 19.2843C11.4596 19.995 10.9223 20.6191 10.1942 20.6711C6.83115 20.9138 5.32297 23.4448 5.32297 25.8544C5.32297 28.264 6.83115 30.795 10.1942 31.0377H13.436C14.1467 31.0377 14.7361 31.6271 14.7361 32.3379C14.7361 33.0486 14.1467 33.6034 13.436 33.6034Z" fill="#292D32"/>
                 <path d="M29.4011 33.603C29.3664 33.603 29.3491 33.603 29.3144 33.603C28.6037 33.603 27.945 33.0136 27.945 32.3028C27.945 31.5574 28.4997 31.0027 29.2278 31.0027C31.36 31.0027 33.2669 30.2573 34.7578 28.9224C37.4621 26.5648 37.6354 23.1671 36.9074 20.7748C36.1793 18.3998 34.151 15.6781 30.6146 15.2448C30.0425 15.1754 29.5917 14.742 29.4877 14.17C28.7943 10.0095 26.5581 7.13176 23.1604 6.09163C19.6586 4.9995 15.5674 6.0743 13.019 8.74396C10.5401 11.3269 9.96802 14.9501 11.4069 18.9372C11.6496 19.6133 11.3029 20.3587 10.6269 20.6014C9.95077 20.8441 9.20531 20.4974 8.96261 19.8213C7.21173 14.9327 8.00918 10.2521 11.1469 6.95841C14.354 3.59533 19.5026 2.26049 23.9231 3.61265C27.9796 4.8608 30.8399 8.20655 31.88 12.8525C35.4165 13.6499 38.2595 16.3369 39.3863 20.0467C40.6171 24.0858 39.5077 28.2464 36.474 30.8813C34.5497 32.6149 32.0361 33.603 29.4011 33.603Z" fill="#292D32"/>
                 <path d="M21.3063 38.6999C17.8218 38.6999 14.5628 36.845 12.7773 33.846C12.5866 33.5513 12.3959 33.2046 12.2399 32.8232C11.6505 31.5924 11.3384 30.1882 11.3384 28.732C11.3384 23.2367 15.8109 18.7642 21.3063 18.7642C26.8016 18.7642 31.2742 23.2367 31.2742 28.732C31.2742 30.2056 30.9622 31.5924 30.3381 32.8752C30.1994 33.2046 30.0087 33.5513 29.8007 33.8807C28.0498 36.845 24.7907 38.6999 21.3063 38.6999ZM21.3063 21.3645C17.2498 21.3645 13.9387 24.6756 13.9387 28.732C13.9387 29.8068 14.1641 30.8123 14.5975 31.7311C14.7361 32.0258 14.8575 32.2685 14.9961 32.4938C16.3136 34.7301 18.7233 36.0996 21.2889 36.0996C23.8546 36.0996 26.2642 34.7301 27.5643 32.5285C27.7204 32.2685 27.8591 32.0258 27.9631 31.7831C28.4312 30.8296 28.6565 29.8242 28.6565 28.7494C28.6738 24.6755 25.3628 21.3645 21.3063 21.3645Z" fill="#292D32"/>
                 <path d="M20.3177 31.7479C19.9884 31.7479 19.659 31.6266 19.399 31.3665L17.6827 29.6503C17.18 29.1476 17.18 28.3155 17.6827 27.8128C18.1854 27.31 19.0175 27.31 19.5203 27.8128L20.3524 28.6449L23.1261 26.0792C23.6635 25.5938 24.4782 25.6285 24.9636 26.1486C25.449 26.6686 25.4144 27.5007 24.8943 27.9861L21.2019 31.4012C20.9418 31.6266 20.6298 31.7479 20.3177 31.7479Z" fill="#292D32"/>
               </symbol>
             </defs> --}}
                                       <use xlink:href="#up-cloud2"></use>
                        </svg>
                    </span>
                </div>
                <div class="header-text">
                    <div class="up-title">Upload files</div>
                    <div class="up-para">Select and upload the files of your choice</div>
                </div>
            </div>
            <div class="upload-divider">
                <div class="drag-drop-area">
                    <div class="drag-drop-content">
                        <div class="drag-drop-icon">
                            <svg class="td-svgs td-pro">
                                <use xlink:href="#up-cloud2"></use>
                            </svg>
                        </div>
                        <div class="drag-drop-text">
                            Choose a file or drag & drop it here
                        </div>
                        <div class="file-formats">JPEG, PNG, PDG, and MP4 formats, up to 50MB</div>
                        <button class="browse-button">Browse File</button>
                    </div>
                    <input type="file" id="fileInput" style="display: none;">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Calendar View -->
<div class="main-calend-wrap">
    <div class="element-head ant-text-left">Calendar View</div>
    <!--  -->
    <div class="ant-main-cale">
        <div class="ant-calendar">
            <div class="calendar-header">
                <button class="nav-button left-butt">
                    <svg class="left-cal">
                        <use xlink:href="#left_arr"></use>
                    </svg>
                </button>
                <div class="month-year">
                    <span class="month">April</span>
                    <span class="year">2021</span>
                </div>
                <button class="nav-button right-butt">
                    <svg class="right-cal">
                        <use xlink:href="#right_arr"></use>
                    </svg>
                </button>
            </div>
            <div class="calendar-days-header">
                <div>Mo</div>
                <div>Tu</div>
                <div>We</div>
                <div>Th</div>
                <div>Fr</div>
                <div>Sa</div>
                <div>Su</div>
            </div>
            <div class="calendar-grid spec-grid">
                <div class="date faded">29</div>
                <div class="date faded">30</div>
                <div class="date faded">31</div>
                <div class="date">1</div>
                <div class="date">2</div>
                <div class="date">3</div>
                <div class="date">4</div>
                <div class="date">5</div>
                <div class="date">6</div>
                <div class="highlighted date">7</div>
                <div class="date">8</div>
                <div class="date">9</div>
                <div class="date">10</div>
                <div class="date">11</div>
                <div class="date">12</div>
                <div class="date">13</div>
                <div class="highlighted-range-start date">14</div>
                <div class="highlighted-range date">15</div>
                <div class="highlighted-range date">16</div>
                <div class="highlighted-range date">17</div>
                <div class="highlighted-range-end date">18</div>
                <div class="highlighted-range date">19</div>
                <div class="highlighted-range date">20</div>
                <div class="highlighted-range date">21</div>
                <div class="highlighted-range date">22</div>
                <div class="highlighted-selected date">23</div>
                <div class="date">24</div>
                <div class="date">25</div>
                <div class="date">26</div>
                <div class="date">27</div>
                <div class="date">28</div>
                <div class="date">29</div>
                <div class="date">30</div>
                <div class="faded date">1</div>
                <div class="faded date">2</div>
            </div>
        </div>
    </div>
</div>


<!-- Cards Version 2 -->
<div class="main-card-2-wrap">
    <div class="element-head ant-text-space">Cards Version 2</div>
    <!--  -->
    <div class="ant-cards-ver2">
        <div class="ant-wrap">
            <div class="image">
                <img  src="{{ asset('elements/Images/elements/suitcase.png') }}" alt="suitcase">
            </div>
            <div class="content">
                <div class="cont-title">
                    Card Title
                </div>
                <div class="pro-name">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit 
                </div>
                <div class="butt-card">
                    <a href="#" class="butt-card-wrap">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Button Text
                    </a>
                </div>
            </div>
        </div>

        <div class="ant-wrap">
            <div class="image">
                <img src="{{ asset('elements/Images/elements/suitcase.png') }}" alt="suitcase">
            </div>
            <div class="content">
                <div class="cont-title">
                    Card Title 2
                </div>
                <div class="pro-name">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit 
                </div>
                <div class="butt-card">
                    <a href="#" class="butt-card-wrap">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Button Text
                    </a>
                </div>
            </div>
        </div>

        <div class="ant-wrap ant-wrap-dis">
            <div class="image">
                <img src="{{ asset('elements/Images/elements/suitcase.png') }}"  alt="suitcase">
            </div>
            <div class="content">
                <div class="cont-title">
                    Card Title
                </div>
                <div class="pro-name">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit 
                </div>
                <div class="butt-card">
                    <a href="#" class="butt-card-wrap">
                        <svg>
                            <use xlink:href="#btn_arr"></use>
                        </svg>
                        Button Text
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<svg xmlns="//www.w3.org/2000/svg" style="display:none" aria-hidden="true">

<symbol id="up-cloud2" viewBox="0 0 43 42" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M13.436 33.6034H10.1075C5.01085 33.2393 2.72266 29.3215 2.72266 25.8371C2.72266 22.3527 5.01087 18.4175 10.0208 18.0708C10.7316 18.0015 11.3556 18.5562 11.4076 19.2843C11.4596 19.995 10.9223 20.6191 10.1942 20.6711C6.83115 20.9138 5.32297 23.4448 5.32297 25.8544C5.32297 28.264 6.83115 30.795 10.1942 31.0377H13.436C14.1467 31.0377 14.7361 31.6271 14.7361 32.3379C14.7361 33.0486 14.1467 33.6034 13.436 33.6034Z" fill="#292D32"/>
	<path d="M29.4011 33.603C29.3664 33.603 29.3491 33.603 29.3144 33.603C28.6037 33.603 27.945 33.0136 27.945 32.3028C27.945 31.5574 28.4997 31.0027 29.2278 31.0027C31.36 31.0027 33.2669 30.2573 34.7578 28.9224C37.4621 26.5648 37.6354 23.1671 36.9074 20.7748C36.1793 18.3998 34.151 15.6781 30.6146 15.2448C30.0425 15.1754 29.5917 14.742 29.4877 14.17C28.7943 10.0095 26.5581 7.13176 23.1604 6.09163C19.6586 4.9995 15.5674 6.0743 13.019 8.74396C10.5401 11.3269 9.96802 14.9501 11.4069 18.9372C11.6496 19.6133 11.3029 20.3587 10.6269 20.6014C9.95077 20.8441 9.20531 20.4974 8.96261 19.8213C7.21173 14.9327 8.00918 10.2521 11.1469 6.95841C14.354 3.59533 19.5026 2.26049 23.9231 3.61265C27.9796 4.8608 30.8399 8.20655 31.88 12.8525C35.4165 13.6499 38.2595 16.3369 39.3863 20.0467C40.6171 24.0858 39.5077 28.2464 36.474 30.8813C34.5497 32.6149 32.0361 33.603 29.4011 33.603Z" fill="#292D32"/>
	<path d="M21.3063 38.6999C17.8218 38.6999 14.5628 36.845 12.7773 33.846C12.5866 33.5513 12.3959 33.2046 12.2399 32.8232C11.6505 31.5924 11.3384 30.1882 11.3384 28.732C11.3384 23.2367 15.8109 18.7642 21.3063 18.7642C26.8016 18.7642 31.2742 23.2367 31.2742 28.732C31.2742 30.2056 30.9622 31.5924 30.3381 32.8752C30.1994 33.2046 30.0087 33.5513 29.8007 33.8807C28.0498 36.845 24.7907 38.6999 21.3063 38.6999ZM21.3063 21.3645C17.2498 21.3645 13.9387 24.6756 13.9387 28.732C13.9387 29.8068 14.1641 30.8123 14.5975 31.7311C14.7361 32.0258 14.8575 32.2685 14.9961 32.4938C16.3136 34.7301 18.7233 36.0996 21.2889 36.0996C23.8546 36.0996 26.2642 34.7301 27.5643 32.5285C27.7204 32.2685 27.8591 32.0258 27.9631 31.7831C28.4312 30.8296 28.6565 29.8242 28.6565 28.7494C28.6738 24.6755 25.3628 21.3645 21.3063 21.3645Z" fill="#292D32"/>
	<path d="M20.3177 31.7479C19.9884 31.7479 19.659 31.6266 19.399 31.3665L17.6827 29.6503C17.18 29.1476 17.18 28.3155 17.6827 27.8128C18.1854 27.31 19.0175 27.31 19.5203 27.8128L20.3524 28.6449L23.1261 26.0792C23.6635 25.5938 24.4782 25.6285 24.9636 26.1486C25.449 26.6686 25.4144 27.5007 24.8943 27.9861L21.2019 31.4012C20.9418 31.6266 20.6298 31.7479 20.3177 31.7479Z" fill="#292D32"/>
</symbol>

<!-- Left Arrow -->
	<symbol id="left_arr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M7.07277 15.3372L0.311162 8.57546C-0.10378 8.16052 -0.10378 7.48774 0.311162 7.0728L7.07277 0.311189C7.48771 -0.103752 8.16049 -0.103752 8.57543 0.311189C8.99037 0.726131 8.99037 1.39877 8.57543 1.81371L3.62758 6.7617L20.8958 6.7617C21.4826 6.7617 21.9583 7.23742 21.9583 7.8242C21.9583 8.41098 21.4826 8.8867 20.8958 8.8867L3.62758 8.8867L8.57543 13.8346C8.99037 14.2495 8.99037 14.9223 8.57543 15.3372C8.16049 15.7521 7.48771 15.7521 7.07277 15.3372Z"/>
	</symbol>

	<!-- Right Arrow -->
	<symbol id="right_arr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M14.8855 0.311196L21.6471 7.07292C22.062 7.48786 22.062 8.16063 21.6471 8.57558L14.8855 15.3372C14.4705 15.7521 13.7978 15.7521 13.3828 15.3372C12.9679 14.9222 12.9679 14.2496 13.3828 13.8347L18.3307 8.88668H1.0625C0.475702 8.88668 0 8.41096 0 7.82418C0 7.23739 0.475702 6.76168 1.0625 6.76168H18.3307L13.3828 1.8138C12.9679 1.39887 12.9679 0.726123 13.3828 0.311196C13.7978 -0.103732 14.4705 -0.103732 14.8855 0.311196Z"/>
	</symbol>
</svg>

@endsection