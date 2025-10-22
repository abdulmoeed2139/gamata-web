@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url('index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>

        <form class="login-form-uni" id="loginForm" action="{{url('login2')}}">

            <!-- STEP 1: MOBILE NUMBER -->
            <div id="stepMobile">
                <label for="mobile" id="mobileLabel" class="login-label-uni">
                    Enter Mobile Number
                    <span title="Enter your last 9-digit mobile number">
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
                    </span>
                </label>
                <input type="text" id="mobile" class="login-input-uni" inputmode="numeric" maxlength="9" pattern="[0-9]*">
                <span id="mobileError" class="error-text hidden" style="margin-top:0; margin-bottom:14px;">Please enter a valid 9-digit numbers</span>

                <button type="button" id="continueBtn" class="auth-btn common-btn-1">
                    Get OTP <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>
            </div>

            <!-- STEP 2: OTP -->
            <div id="stepOtp" class="hidden">
                 <label for="mobile" class="login-label-uni">
                    Enter OTP
                    <span title="Enter the 6-digit code sent to your mobile">
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
                <span id="otpError" class="error-text hidden">Please enter a valid 6-digit OTP</span>

                <button type="submit" class="auth-btn common-btn-1">
                    Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>
                <div class="resendOtp" style="padding-top:20px;">
                    <a href="{{ route('password.request') }}" class="backButton">Resend OTP 00:34s</a>
                </div>
            </div>

            <!-- STEP 3: PASSWORD RESET -->
            <div id="stepPassword" class="hidden">
                <label class="login-label-uni">New Password<span title="Create a strong password (min 8 characters)">
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
                    </span>
                </label>
                <input type="password" id="password" class="login-input-uni">
                <span id="passwordError" class="error-text hidden">Password must be at least 8 characters</span>

                <label class="login-label-uni" style="margin-top:10px;">Confirm Password<span title="Re-enter your password for confirmation">
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
                    </span>
                </label>
                <input type="password" id="confirmPassword" class="login-input-uni">
                <span id="confirmError" class="error-text hidden">Passwords do not match</span>

                <button type="submit" class="auth-btn common-btn-1">
                    Reset Password <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
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

<script>
    // STEP 1: MOBILE VALIDATION
    document.getElementById('continueBtn').addEventListener('click', function () {
        let mobile = document.getElementById('mobile');
        let mobileError = document.getElementById('mobileError');
        let value = mobile.value.trim();

        if (value.length === 9 && /^\d+$/.test(value)) {
            mobile.classList.remove('error-border');
            mobileError.classList.add('hidden');
            document.getElementById('stepMobile').classList.add('hidden');
            document.getElementById('stepOtp').classList.remove('hidden');
        } else {
            // mobile.classList.add('error-border');
            mobileError.classList.remove('hidden');
        }
    });
    
    mobile.addEventListener('input', function () {
        if (this.value.length > 0 && this.value[0] === '0') {
            this.value = this.value.substring(1);
        }
    });

    // OTP INPUTS AUTO-FOCUS
    const inputs = document.querySelectorAll(".otp-input");
    inputs.forEach((input, index) => {
        input.addEventListener("input", () => {
            input.value = input.value.replace(/[^0-9]/g, "");
            if (input.value && index < inputs.length - 1) inputs[index + 1].focus();
        });
        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && !input.value && index > 0) inputs[index - 1].focus();
        });
    });

    // STEP 2: OTP VERIFICATION
    document.querySelector('#stepOtp button[type="submit"]').addEventListener('click', function (e) {
        e.preventDefault();
        let otpError = document.getElementById('otpError');
        let enteredOtp = '';
        inputs.forEach(input => enteredOtp += input.value);

        if (enteredOtp.length === 6) {
            otpError.classList.add('hidden');
            document.getElementById('stepOtp').classList.add('hidden');
            document.getElementById('stepPassword').classList.remove('hidden');
        } else {
            otpError.classList.remove('hidden');
        }
    });

    // STEP 3: PASSWORD VALIDATION
    document.querySelector('#stepPassword button[type="submit"]').addEventListener('click', function (e) {
        e.preventDefault();
        let password = document.getElementById('password');
        let confirmPassword = document.getElementById('confirmPassword');
        let passwordError = document.getElementById('passwordError');
        let confirmError = document.getElementById('confirmError');
        let valid = true;

        if (password.value.length < 8) {
            passwordError.classList.remove('hidden');
            password.classList.add('error-border');
            valid = false;
        } else {
            passwordError.classList.add('hidden');
            password.classList.remove('error-border');
        }

        if (password.value !== confirmPassword.value || confirmPassword.value === "") {
            confirmError.classList.remove('hidden');
            confirmPassword.classList.add('error-border');
            valid = false;
        } else {
            confirmError.classList.add('hidden');
            confirmPassword.classList.remove('error-border');
        }

        if (valid) {
            document.getElementById('loginForm').submit();
        }
    });
</script>

@endsection
