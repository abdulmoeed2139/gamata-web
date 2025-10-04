@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url('index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>

        <form class="login-form-uni" id="loginForm" action="{{ url('welcome') }}">

            {{-- <!-- STEP 1: MOBILE NUMBER -->
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

                <input type="tel" id="mobile" class="login-input-uni " placeholder="" inputmode="numeric" maxlength="10" pattern="[0-9]*">

                <small id="mobileError" class="error-text" style="color:red; font-size: 14px; margin-top: 0px; display:none; margin-bottom:14px">Mobile number is incorrect</small>

                <button type="button" id="continueBtn" class="auth-btn common-btn-1">
                    Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>
            </div> --}}

            <!-- STEP 2: PASSWORD -->
            <div id="stepPassword">
                <label for="password" class="login-label-uni">Enter Your Password
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
                    <span class="custom-popover">Enter your password here</span>
                </span>
                </label>
                <input type="password" id="password" class="login-input-uni" placeholder="">
                <small id="passwordError" class="error-text" style="color:red;display:none;">Password is required</small>

                <button type="submit" class="auth-btn common-btn-1">
                    Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>

                <div class="forgot-password-uni" style="padding-top:20px;">
                    <a href="{{ route('password.request') }}" class="backButton">Forgot your password?</a>
                </div>
            </div>
        </form>
    </div>

    <div class="login-right-uni"></div>
</div>

<style>
    .hidden { display: none; }
    .login-input-uni.error { border-color: red; }
    .login-label-uni.error { color: red; }
</style>

 <script>


  // STEP 1: Mobile number validation
    // document.getElementById('continueBtn').addEventListener('click', function () {
    //     let mobile = document.getElementById('mobile');
    //     let label = document.getElementById('mobileLabel');
    //     let errorText = document.getElementById('mobileError');
    //     let value = mobile.value.trim();

    //     if (value.length === 9 && /^\d+$/.test(value)) {
    //         mobile.classList.remove('error');
    //         label.classList.remove('error');
    //         errorText.style.display = 'none';

    //         document.getElementById('stepMobile').classList.add('hidden');
    //         document.getElementById('stepPassword').classList.remove('hidden');
    //     } else {
    //         // mobile.classList.add('error');
    //         // label.classList.add('error');
    //         errorText.style.display = 'block';
    //     }
    // });

    //   mobile.addEventListener('input', function () {
    //     if (this.value.length > 0 && this.value[0] === '0') {
    //         this.value = this.value.substring(1);
    //     }
    // });


// // STEP 2: Password validation
// document.querySelector('#stepPassword button[type="submit"]').addEventListener('click', function (e) {
//     let passwordField = document.getElementById('password');
//     let errorText = document.getElementById('passwordError');
//     if (!passwordField.value.trim()) {
//         e.preventDefault();
//         passwordField.classList.add('error');
//         errorText.style.display = 'block';
//     } else {
//         passwordField.classList.remove('error');
//         errorText.style.display = 'none';
//     }
// });
</script>

@endsection
