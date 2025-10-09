@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url('index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>
        <form class="login-form-uni" id="OTPForm" action="{{ url('login2') }} ">

            <!-- STEP 2: OTP -->
            <div id="stepOtp">
            <!-- ✅ Custom Formik-like error message -->
            <p id="otpError" class="error-message hidden error-text alert-danger" style="color:red; font-size: 14px; margin-top: 5px;"></p>

                <label for="mobile" class="login-label-uni">
                    Enter OTP

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
                    <span class="custom-popover">Enter the 6-digit code sent to your mobile</span>
                </span>

                </label>

                <div class="otp-wrapper">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                </div>



                <form id="OTPForm">
                    <input type="hidden" name="mobile" value="{{ request('mobile') }}"/>
                    <button type="submit" class="auth-btn common-btn-1 ">
                        Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                    </button>
                </form>

                <div class="resendOtp" style="padding-top:20px;">
                    {{-- <a href="{{ route('password.request') }}" class="backButton">Resend OTP 00:34s</a> --}}
                    {{-- <a href="{{ route('password.request') }}" class="backButton" id="resendLink" style="pointer-events:none; opacity:0.6;">
                        Resend OTP 01:00s
                    </a>
                    <a href="" id="resendOTP">Resend OTP</a> --}}

                    <a href="javascript:void(0)" class="backButton" id="resendLink" style="pointer-events:none; opacity:0.6;">
                        Resend OTP 01:00s
                    </a>
                    <a href="javascript:void(0)" id="resendOTP" style="display:none;">Resend OTP</a>
                    {{-- <p id="otpError" class="error-message hidden" style="color:red; font-size: 14px; margin-top: 5px;"></p> --}}
                </div>
            </div>
        </form>
    </div>

    <div class="login-right-uni"></div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){

            let phoneNumber = new URLSearchParams(window.location.search).get("mobile");

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
                    resendLink.textContent = `Resend OTP ${minutes}:${seconds}s`;

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
                    url: "{{ url('get-result') }}",
                    type: "get",
                    data: { mobile: phoneNumber },
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

            $("#OTPForm").submit(function(e){
                e.preventDefault();
                let otpCode = "";
                $(".otp-input").each(function(){
                    otpCode += $(this).val();
                });

                if(otpCode.length !== 6){ // yaha length check kar sakte ho
                    $("#otpError").text("Please enter 6 digit OTP").removeClass("hidden");
                    return;
                }

                $.ajax({
                    url: "{{ url('otp-verify') }}",
                    type: "POST",
                    data: {
                        otpCode: otpCode,
                        mobile : phoneNumber,
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(response){
                        console.log("OTP verified", response);
                        if(response.data && response.data.isAuthenticated==false){
                            setTimeout(() => {
                                $("#otpError").text(response.data.message).removeClass("hidden");
                            }, 2000);
                        } else {
                            window.location.href="{{ url('/register?mobile=') }}"+phoneNumber;
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


        document.addEventListener("DOMContentLoaded", function() {
  const buttons = document.querySelectorAll(".auth-btn");

  buttons.forEach(button => {
    if (!button.querySelector(".spinner")) {
      const spinner = document.createElement("span");
      spinner.classList.add("spinner");
      button.appendChild(spinner);
    }

    button.addEventListener("click", function(e) {
      // Show spinner
      button.classList.add("loading");
      const spinner = button.querySelector(".spinner");
      const icon = button.querySelector("img");

      if (icon) icon.style.display = "none";
      if (spinner) spinner.style.display = "inline-block";

      // Prevent multiple clicks
      button.style.pointerEvents = "none";

      // ✅ Auto-hide spinner after 3s if no redirect happens
      setTimeout(() => {
        button.classList.remove("loading");
        if (spinner) spinner.style.display = "none";
        if (icon) icon.style.display = "";
        button.style.pointerEvents = "auto";
      }, 1000);
    });
  });
});
    </script>
@endsection
