@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
    <a href="{{ url(app()->getLocale() . '/index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>

    <form class="login-form-uni" id="resetPasswordForm">
        @csrf
        <!-- STEP 3: PASSWORD RESET -->

        <div id="stepPassword">
            <small id="passwordError" class="error-text alert-danger" style="font-size: 14px; margin-top: 0px; display:none; margin-bottom:14px">
                {{ __('password_min_error') }}
            </small>

            <label class="login-label-uni">
                {{ __('new_password') }}

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
                    <span class="custom-popover">{{ __('enter_new_password') }}</span>
                </span>
            </label>
            <input type="password" id="password" name="new_password" class="login-input-uni">
            <input type="hidden" value="{{ request('mobile') }}" name="mobile">

            <label class="login-label-uni">
                {{ __('confirm_password') }}
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
                    <span class="custom-popover">{{ __('enter_match_password') }}</span>
                </span>
            </label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="login-input-uni">

            <button type="submit" class="auth-btn common-btn-1">
                {{ __('reset_password') }} 
                <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
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
    $(document).ready(function(){

        $("#resetPasswordForm").submit(function(e){
            e.preventDefault();
            let password = $("#password").val().trim();
            let confirmPassword = $("#confirmPassword").val().trim();

            if (!password || !confirmPassword) {
                $("#passwordError")
                    .text("Both fields are required.")
                    .show()
                   
                return;
            }

            if (password !== confirmPassword) {
                $("#passwordError")
                    .text("Passwords do not match.")
                    .show()
                  
                return;
            }

            let formData= $(this).serialize();
            $.ajax({
                url: "{{ url('/forgot-password/reset') }}",
                type: "POST",
                data: formData,
                success:function(response){
                    console.log("OTP verified", response);
                    if (response.message) {
                        $("#passwordError")
                            .text(response.message) // ✅ fixed key
                            .removeClass("hidden")
                            .show()
                          
                            window.location.href="{{ url('/') }}";
                    }
                },
                error: function(xhr){
                    let errorMsg = "Something went wrong!";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        let errors = xhr.responseJSON.message;
                        if (errors.password) {
                            errorMsg = errors.password[0];
                        }
                        else if (errors.mobile) {
                            errorMsg = errors.mobile[0];
                        }
                    }
                    $("#passwordError")
                        .text(errorMsg)
                        .removeClass("hidden")
                        .show()
                       
                }
            });
        });

    });


</script>

@endsection
