@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url('index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>

        <form class="login-form-uni" id="verifyForForgetPasswordForm">
            @csrf
            <!-- STEP 1: MOBILE NUMBER -->
            <div id="stepMobile">
                <label for="mobile" id="mobileLabel" class="login-label-uni">
                    Enter Mobile Number

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
                    <span class="custom-popover">Enter your mobile number</span>
                  </span>

                </label>
                <input type="text" id="mobile" name="mobile" class="login-input-uni" inputmode="numeric" maxlength="10" pattern="[0-9]*">
                <input type="hidden" id="mode" name="mode" value="forgot_password">
                <span id="mobileError" class="error-text" style="font-size: 14px; margin-top: 0px; display:none; margin-bottom:14px">Please enter a valid number</span>

                <button type="submit" id="continueBtn" class="auth-btn common-btn-1">
                    Get OTP <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>
            </div>
        </form>
    </div>

    <div class="login-right-uni"></div>
</div>

<style>
.error-text {
    color: red;
    font-size: 14px;
    display: block;
    margin-top: 7px;
    margin-bottom:10px;
}
.hidden {
    display: none;
}
.error-border {
    border: 1px solid red !important;
}
</style>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $("#verifyForForgetPasswordForm").submit(function(e){
        e.preventDefault();
        var formData= $(this).serialize();
        $.ajax({
            url: "{{ url('get-otp-for-forget-password') }}",
            type: "GET",
            data: formData,
            success:function(response){
                if (response.message == 'OTP_SEND') {
                    // $("#mobileError")
                        // .text('OTP sent successfully')
                        // .removeClass("text-danger")
                        // .addClass("text-success")
                        // .show().delay(3000).fadeOut();

                    // setTimeout(function(){
                        window.location.href = "{{ url('/forgot-password/verify-otp') }}?mobile=" + $("#mobile").val();
                    // }, 1000);
                } else if (response.message == 'password_already_exists') {
                    $("#mobileError")
                        .text(response.message)
                        .removeClass("text-success")
                        .addClass("text-danger")
                        .show().delay(3000).fadeOut();

                        setTimeout(function(){
                            window.location.href = "{{ url('/login-by-password') }}?mobile=" + $("#mobile").val();
                        }, 1000);
                }
            },
            error: function(xhr) {
                let res = JSON.parse(xhr.responseText);
                let errorObj = {};
                try {
                    errorObj = JSON.parse(res.error);
                } catch(e) {}

                let message = errorObj.text || res.message || "Something went wrong";

                $("#mobileError")
                    .text(message)
                    .removeClass("text-success")
                    .addClass("text-danger")
                    .show().delay(3000).fadeOut();
            }
        });
    });
</script>

@endsection
