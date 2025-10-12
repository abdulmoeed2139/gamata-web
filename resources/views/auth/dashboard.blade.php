@extends('websitePages.master')
@section('content')

<section class="account-wrapper">

    <h1 class="account-title">{{ __('messages.account') }}</h1>
    <p>{{ __('messages.account_description') }}</p>

    <div class="card-container" style="padding-top:50px">
        <div class="card card-account">
            <div class="icon"><img src="https://meezodev.com/assets/Images/1.png" ></div>
            <h3>{{ __('messages.account_settings') }}</h3>
            <p>{{ __('messages.account_settings_desc') }}</p>
        </div>

        <div class="card card-orders">
            <div class="icon"><img src="https://meezodev.com/assets/Images/5.png" ></div>
            <h3>{{ __('messages.orders') }}</h3>
            <p>{{ __('messages.orders_desc') }}</p>
        </div>

        <div class="card card-wallet">
            <div class="icon"><img src="https://meezodev.com/assets/Images/2.png" ></div>
            <h3>{{ __('messages.wallet') }}</h3>
            <p>{{ __('messages.wallet_desc') }}</p>
        </div>

        <div class="card card-job">
            <div class="icon"><img src="https://meezodev.com/assets/Images/4.png"></div>
            <h3>{{ __('messages.posted_job_count') }}</h3>
            <p>{{ __('messages.posted_job_count_desc') }}</p>
        </div>

        <div class="card card-selling">
            <div class="icon"><img src="https://meezodev.com/assets/Images/3.png" ></div>
            <h3>{{ __('messages.selling_count') }}</h3>
            <p>{{ __('messages.selling_count_desc') }}</p>
        </div>

        <div class="card card-plans">
            <img src="https://meezodev.com/assets/Images/6.png" alt="{{ __('messages.number_of_active_plans') }}">
            <h3>{{ __('messages.number_of_active_plans') }}</h3>
            <p>{{ __('messages.number_of_active_plans_desc') }}</p>
        </div>
    </div>

</section>

@endsection
