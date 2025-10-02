@extends('websitePages.master')
@section('content')

<div class="login-wrapper-uni">
    <div class="login-left-uni">
        <a href="{{ url('index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
        </a>
        <form class="login-form-uni" id="numberForm" action="">
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

                <input type="tel" id="mobile" class="login-input-uni " placeholder="" inputmode="numeric" maxlength="10" pattern="[0-9]*" required>
                <small id="mobileError" class="error-text" style="font-size: 14px; margin-top: 0px; display:none; margin-bottom:14px">Mobile number is incorrect</small>

                <button type="submit" id="continueBtn" class="auth-btn common-btn-1">
                    Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>
            </div>
        </form>
        <form class="login-form-uni" id="loginForm" action="{{ url('login2') }} ">

            <!-- STEP 2: OTP -->
            <div id="stepOtp" class="hidden">
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
                        {{-- <svg xmlns="http://www.w3.org/2000/svg"
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
                        </svg> --}}
                      

                </label>

                <div class="otp-wrapper">
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                    <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" />
                </div>

                <!-- ✅ Custom Formik-like error message -->
                <p id="otpError" class="error-message hidden" style="color:red; font-size: 14px; margin-top: 5px;"></p>

                <button type="submit" class="auth-btn common-btn-1 ">
                    Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                </button>

                <div class="resendOtp" style="padding-top:20px;">
                    <a href="{{ route('password.request') }}" class="backButton">Resend OTP 00:34s</a>
                </div>
            </div>

            <!-- STEP 3: Registration -->
            <div id="stepRegistration" class="hidden">
                <h2 style="color:#757575">Welcome to Gamata.lk</h2>
                <label for="mobile" class="login-label-uni" style="margin-bottom:30px">
                    New user Registration


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
                    <span class="custom-popover">Fill this form to register as a new user</span>
                </span>
                    
                    
                </label>

                <!-- First & Last Name -->
                <div class="inline-field" style="display: flex; gap: 10px; margin-bottom:0;">
                    <div style="flex: 1;">
                    <label for="first-name" class="login-label-uni">First Name

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
                    <span class="custom-popover">Please enter your first name</span>
                </span>    
                    
                </label>
                        <input type="text" id="first-name" class="login-input-uni" name="first-name" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="last-name" class="login-label-uni">Last Name

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
                    <span class="custom-popover">Please enter your Last name</span>
                </span>  

                            
                            
                </label>
                        <input type="text" id="last-name" class="login-input-uni" name="last-name" required>
                    </div>
                </div>

                <!-- Email -->
                <div style="margin-bottom: 15px;">
                    <label for="email" class="login-label-uni">Email 

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
                    <span class="custom-popover">Please enter valid email</span>
                </span>  

                        
                </label>
                    <input type="email" id="email" class="login-input-uni" name="email" required>
                </div>

                <!-- District -->
                <div style="margin-bottom: 15px;">
                    <label for="district" class="login-label-uni">District   
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
                    <span class="custom-popover">Select district from the list to continue</span>
                </span>  
                </label>
                    <select id="district" class="login-input-uni" name="district" required>
                        <option value="">Select District</option>
                        <option value="north">North</option>
                        <option value="south">South</option>
                        <option value="east">East</option>
                        <option value="west">West</option>
                    </select>
                </div>

                <!-- Password -->
                <div style="margin-bottom: 15px;">
                    <label for="password" class="login-label-uni">Password 

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
                    <span class="custom-popover">Please enter your Password</span>
                </span>  
                </label>
                    <input type="password" id="password" class="login-input-uni" name="password" required>
                </div>

                <!-- Confirm Password -->
                <div style="margin-bottom: 15px;">
                    <label for="confirm-password" class="login-label-uni">Confirm Password <span class="info-wrapper">
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
                    <span class="custom-popover">Please confirm your Password</span>
                </span>  
                </label>
                    <input type="password" id="confirm-password" class="login-input-uni" name="confirm-password" required>
                </div>

                <label class="checkbox-label">
                    <input type="checkbox" id="terms">
                    <span>I have read and accept terms and conditions</span>
                </label>

                <a href="{{url('login2')}}">
                    <button class="auth-btn common-btn-1">
                        Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                    </button>
                </a>

                <p class="recaptcha-note">
                    This site is protected by reCAPTCHA and Google's
                    <a href="{{ asset('assets/downloads/Gamata Privacy Policy.pdf') }}" download="Gamata Privacy Policy.pdf">Privacy Policy</a> and
                    <a href="{{ asset('assets/downloads/Gamata-legal-v1.0-DRAFT.pdf') }}" download="Gamata-legal-v1.0-DRAFT.pdf">Terms and Conditions</a>
                </p>
            </div>
        </form>
    </div>

    <div class="login-right-uni"></div>
</div>

   <script>
    // // STEP 1: Mobile number validation
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
    //         document.getElementById('stepOtp').classList.remove('hidden');
    //     } else {
    //         // mobile.classList.add('error');
    //         // label.classList.add('error');
    //         errorText.style.display = 'block';
    //     }
    // });

    // mobile.addEventListener('input', function () {
    //     if (this.value.length > 0 && this.value[0] === '0') {
    //         this.value = this.value.substring(1);
    //     }
    // });

    // // OTP inputs auto navigation
    // const inputs = document.querySelectorAll(".otp-input");
    // inputs.forEach((input, index) => {
    //     input.addEventListener("input", () => {
    //         input.value = input.value.replace(/[^0-9]/g, "");
    //         if (input.value && index < inputs.length - 1) {
    //             inputs[index + 1].focus();
    //         }
    //     });
    //     input.addEventListener("keydown", (e) => {
    //         if (e.key === "Backspace" && !input.value && index > 0) {
    //             inputs[index - 1].focus();
    //         }
    //     });
    // });

    // // STEP 2: OTP verification
    // document.querySelector('#stepOtp button[type="submit"]').addEventListener('click', function (e) {
    //     e.preventDefault();

    //     let otpError = document.getElementById('otpError');
    //     let enteredOtp = '';
    //     inputs.forEach(input => enteredOtp += input.value);

    //     if (enteredOtp.length === 6) {
    //         otpError.classList.add('hidden');
    //         otpError.textContent = '';
    //         document.getElementById('stepOtp').classList.add('hidden');
    //         document.getElementById('stepRegistration').classList.remove('hidden');
    //     } else {
    //         otpError.textContent = 'Please enter a valid 6-digit OTP';
    //         otpError.classList.remove('hidden');
    //     }
    // });

    // // STEP 3: Registration validation
    // document.querySelector('#stepRegistration button').addEventListener('click', function (e) {
    //     e.preventDefault(); // stop normal submit

    //     // Collect fields
    //     let firstName = document.getElementById('first-name');
    //     let lastName = document.getElementById('last-name');
    //     let email = document.getElementById('email');
    //     let district = document.getElementById('district');
    //     let password = document.getElementById('password');
    //     let confirmPassword = document.getElementById('confirm-password');
    //     let terms = document.getElementById('terms');

    //     // Remove previous error highlights
    //     document.querySelectorAll('.error-message-reg').forEach(el => el.remove());

    //     let isValid = true;

    //     // Helper to show error
    //     const showError = (field, message) => {
    //         isValid = false;
    //         let error = document.createElement('p');
    //         error.className = 'error-message-reg';
    //         error.style.color = 'red';
    //         error.style.fontSize = '14px';
    //         error.style.marginTop = '5px';
    //         error.style.marginBottom = '7px';
    //         error.textContent = message;
    //         field.insertAdjacentElement('afterend', error);
    //     };

    //     // Validate fields
    //     if (!firstName.value.trim()) showError(firstName, 'First Name is required');
    //     if (!lastName.value.trim()) showError(lastName, 'Last Name is required');
    //     if (!email.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value))
    //         showError(email, 'Enter a valid email');
    //     if (!district.value) showError(district, 'Please select a district');
    //     if (password.value.length < 6) showError(password, 'Password must be at least 6 characters');
    //     if (confirmPassword.value !== password.value)
    //         showError(confirmPassword, 'Passwords do not match');
    //     // if (!terms.checked) showError(terms, 'You must accept terms & conditions');

    //     if (isValid) {
    //         // ✅ Submit the form
    //         document.getElementById('loginForm').submit();
    //     }
    // });
</script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>

        

        
        $(document).ready(function(){
            $("#numberForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ url('send-otp') }}",
                    type: "GET",
                    data: {
                        mobile: $("#mobile").val(),
                        _token: "{{ csrf_token() }}" // Laravel ke liye CSRF token
                    },
                    success:function(response){
                        if (response.message == 'OTP sent successfully') {
                            $("#mobileError")
                                .text(response.message)
                                .removeClass("text-danger")
                                .addClass("text-success")
                                .show().delay(3000).fadeOut();

                            // Redirect after short delay so user sees message
                            setTimeout(function(){
                                window.location.href = "{{ url('/verify-otp') }}?mobile=" + $("#mobile").val();
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
        });


        
    </script>
@endsection
