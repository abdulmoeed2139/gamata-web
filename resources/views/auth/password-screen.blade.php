@extends('websitePages.master')
@section('content')

<style>
    .hidden { display: none; }
    .login-input-uni.error { border-color: red; }
    .login-label-uni.error { color: red; }
</style>
<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url(app()->getLocale() . '/index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>

  <form class="login-form-uni" id="LoginByPasswordForm">
    @csrf
    <div id="stepPassword">
        <small id="passwordError" class="error-text alert-danger" style="color:red;display:none;">
            {{ __('messages.password_required') }}
        </small>

        <label for="password" class="login-label-uni">
            {{ __('messages.enter_password') }}
            <span class="info-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="info-icon">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="8"></line>
                </svg>
                <span class="custom-popover">{{ __('messages.enter_password_here') }}</span>
            </span>
        </label>
        <input type="password" id="password" name="password" class="login-input-uni" placeholder="">
        <input type="hidden" id="phoneNumber" name="phoneNumber">

        <button type="submit" class="auth-btn common-btn-1">
            {{ __('messages.continue') }}
            <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </button>

        <div class="forgot-password-uni" style="padding-top:20px;">
            <a href="{{ route('password.request', app()->getLocale()) }}" class="backButton">{{ __('messages.forgot_password') }}</a>
        </div>
    </div>
</form>

    </div>

    <div class="login-right-uni"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    $("#LoginByPasswordForm").submit(function(e){
        e.preventDefault();
        let urlParams = new URLSearchParams(window.location.search);
        let getNumber = urlParams.get("mobile");
        $('#phoneNumber').val(getNumber);
        let formData = $(this).serialize();
        $.ajax({
            url: "{{ url(app()->getLocale().'/password-login') }}",
            type: "POST",
            data: formData,
            success:function(response){
                console.log(response.message);
                if(response.status== true){
                    window.location.href="{{ url(app()->getLocale().'/index') }}";
                    // $("#passwordError")
                    //     .text(Object.values(response.message)[0][0])
                    //     .show().delay(3000).fadeOut();
                }
            },
            error:function(xhr){
                console.log("Error:", xhr.responseJSON);
                if(xhr.status === 422){
                    let errors = xhr.responseJSON.message;
                    let firstError = Object.values(errors)[0][0];
                    $("#passwordError")
                        .text(firstError)
                        .show()
                } else if (xhr.status === 401) {
                    let firstError = xhr.responseJSON.message;
                    $("#passwordError")
                        .text(firstError)
                        .css("display", "block")

                }
            }
        });
    });



</script>

@endsection
