@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url(app()->getLocale() . '/index') }}"> 
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>

        <form class="login-form-uni" id="verifyOtpForPasswordResetForm">
            <!-- STEP 2: OTP -->
            <div id="stepOtp" class="">
            <span id="otpError" class="error-text alert-danger hidden">{{ __('messages.otp_error') }}</span>

                 <label for="mobile" class="login-label-uni">
                {{ __('messages.enter_otp') }}

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
                    <span class="custom-popover">{{ __('messages.enter_6_digit_otp') }}</span>
                  </span>


                </label>
                <div class="otp-wrapper">
                    <input type="text" maxlength="1" class="otp-input" />
                    <input type="text" maxlength="1" class="otp-input" />
                    <input type="text" maxlength="1" class="otp-input" />
                    <input type="text" maxlength="1" class="otp-input" />
                    <input type="text" maxlength="1" class="otp-input" />
                    <input type="text" maxlength="1" class="otp-input" />
                </div>

                <button type="submit" class="auth-btn common-btn-1">
                 {{ __('messages.continue') }} <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>
                <div class="resendOtp" style="padding-top:20px;">
                    <a href="javascript:void(0)" class="backButton" id="resendLink" style="pointer-events:none; opacity:0.6;">
                      {{ __('messages.resend_otp_timer', ['time' => '01:00s']) }}
                    </a>
                    <a href="javascript:void(0)" id="resendOTP" style="display:none;">{{ __('messages.resend_otp') }}</a>
                </div>
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

            const inputs = $(".otp-input");
            inputs.on("input", function () {
                const $this = $(this);
                if ($this.val().length === 1) {
                    $this.next(".otp-input").focus();
                }
            });

            inputs.on("keydown", function (e) {
                if (e.key === "Backspace" && $(this).val() === "") {
                    $(this).prev(".otp-input").focus();
                }
            });

            let timerDuration = 60;
            let resendLink = document.getElementById("resendLink");
            let resendOTP = document.getElementById("resendOTP");
            let phoneNumber = new URLSearchParams(window.location.search).get("mobile");
            function startTimer() {
                let timer = timerDuration;
                resendLink.style.display = "inline-block";
                resendOTP.style.display = "none";
                resendLink.style.pointerEvents = "none";
                resendLink.style.opacity = "0.6";

                let countdown = setInterval(() => {
                    let minutes = Math.floor(timer / 60);
                    let seconds = timer % 60;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
                    resendLink.textContent = `{{ __('messages.resend_otp') }} ${minutes}:${seconds}s`;

                    if (timer <= 0) {
                        clearInterval(countdown);
                        resendLink.style.display = "none";
                        resendOTP.style.display = "inline-block";
                    }
                    timer--;
                }, 1000);
            }

            startTimer();

            resendOTP.addEventListener("click", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('resend-otp') }}",
                    type: "get",
                    data: { phoneNumber: phoneNumber },
                    success: function(response) {
                        console.log(response);
                        if(response && response.message){
                            let otpError = $("#otpError");
                            otpError.text(response.message).css('color', 'green').removeClass('hidden').show();
                            setTimeout(() => { otpError.fadeOut(); }, 5000);
                        }
                        startTimer();
                    }
                });
            });

            $("#verifyOtpForPasswordResetForm").submit(function(e){
                e.preventDefault();
                let otpCode = "";
                $(".otp-input").each(function(){
                    otpCode += $(this).val();
                });

                if(otpCode.length !== 6){
                    $("#otpError").text("Please enter 6 digit OTP").removeClass("hidden");
                    return;
                }

                let urlParams = new URLSearchParams(window.location.search);
                let mobile = urlParams.get("mobile");
                $.ajax({
                    url: "{{ url('/forgot-password/verifyotp') }}",
                    type: "POST",
                    data: {
                        otpCode: otpCode,
                        mobile: mobile,
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(response){
                        console.log("OTP verified", response);
                        if(response.result){
                            setTimeout(() => {
                                $("#otpError").text(response.result).removeClass("hidden");
                            }, 2000);
                            window.location.href="{{ url('/forgot-password/reset?mobile=') }}"+mobile;
                        }
                    },
                    error: function(xhr){
                        let errorMsg = "Something went wrong!";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        setTimeout(() => {
                            $("#otpError").text(errorMsg).removeClass("hidden");
                        }, 2000);
                    }
                });
            });
});


</script>


@endsection
