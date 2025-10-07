@extends('websitePages.master')
@section('content')
    <div class="login-wrapper-uni">
        <div class="login-left-uni">

            {{-- Flash message --}}
            @if (session('message'))
                <div id="flash-message" class="alert-message">
                    {{ session('message') }}
                </div><br>
            @endif

            <a href="{{ url('index') }}">
                <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
            </a>
            <form class="login-form-uni" id="numberForm" action="">
                <!-- STEP 1: MOBILE NUMBER -->
                <div id="stepMobile">
                    <label for="mobile" id="mobileLabel" class="login-label-uni">
                        Enter Mobile Number
                        <span class="info-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="info-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            <span class="custom-popover">Enter your mobile number</span>
                        </span>


                    </label>

                    <input type="tel" id="mobile" class="login-input-uni " placeholder="" inputmode="numeric"
                        maxlength="9" pattern="[0-9]*" required>
                    <small id="mobileError" class="error-text"
                        style="font-size: 14px; margin-top: 0px; display:none; margin-bottom:14px">Mobile number is
                        incorrect</small>

                    <button type="submit" id="continueBtn" class="auth-btn common-btn-1">
                        Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                    </button>
                </div>
            </form>
        </div>

        <div class="login-right-uni"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#numberForm-old").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('send-otp') }}",
                    type: "GET",
                    data: {
                        mobile: $("#mobile").val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.message == 'OTP sent successfully') {
                            $("#mobileError")
                                .text(response.message)
                                .removeClass("text-danger")
                                .addClass("text-success")
                                .show().delay(3000).fadeOut();

                            setTimeout(function() {
                                window.location.href =
                                    "{{ url('/verify-otp') }}?mobile=" + $("#mobile")
                                    .val();
                            }, 1500);
                        } else {
                            $("#mobileError")
                                .text(response.message)
                                .removeClass("text-success")
                                .addClass("text-danger")
                                .show().delay(3000).fadeOut();
                        }
                    },
                    error: function(xhr) {
                        let res = JSON.parse(xhr.responseText);
                        let errorObj = {};
                        try {
                            errorObj = JSON.parse(res.error);
                        } catch (e) {}

                        let message = errorObj.text || res.message || "Something went wrong";

                        $("#mobileError")
                            .text(message)
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .show().delay(3000).fadeOut();
                    }
                });
            });

            $("#numberForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('get-result') }}",
                    type: "GET",
                    data: {
                        mobile: $("#mobile").val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.message == 'OTP_SEND') {
                            // $("#mobileError")
                            //     .text('OTP sent successfully')
                            //     .removeClass("text-danger")
                            //     .addClass("text-success")
                            //     .show().delay(3000).fadeOut();

                            // setTimeout(function() {
                                window.location.href =
                                    "{{ url('/register') }}?mobile=" + $("#mobile")
                                    .val();
                            // }, 1000);
                        } else if (response.message == 'password_already_exists') {
                            $("#mobileError")
                                // .text(response.message)
                                // .removeClass("text-success")
                                // .addClass("text-danger")
                                // .show().delay(3000).fadeOut();

                            // setTimeout(function() {
                                window.location.href =
                                    "{{ url('/login-by-password') }}?mobile=" + $(
                                        "#mobile").val();
                            // }, 1000);
                        }
                    },
                    error: function(xhr) {
                        let res = JSON.parse(xhr.responseText);
                        let errorObj = {};
                        try {
                            errorObj = JSON.parse(res.error);
                        } catch (e) {}

                        let message = errorObj.text || res.message || "Something went wrong";

                        $("#mobileError")
                            .text(message)
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .show().delay(3000).fadeOut();
                    }
                });
            });

        });
    </script>
@endsection
