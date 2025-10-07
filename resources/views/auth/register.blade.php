{{-- 750800036,777397860,0750800984,770923527, 0771234312
khabeeskhan123@gmail.com --}}

@extends('websitePages.master')
@section('content')
    <style>
        .alert-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            font-weight: 500;
        }
    </style>
    <div class="login-wrapper-uni">
        <div class="login-left-uni">
            <a href="{{ url('index') }}">
                <img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">
            </a>
            {{-- Flash message --}}
            @if (session('message'))
                <div id="flash-message" class="alert-message">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div id="flash-message" class="alert-message" style="background-color: #df1717;">
                    {{ session('error') }}
                </div>
            @endif
            <form id="registerForm" method="POST" action="{{ url('/register') }}">
                @csrf
                <div id="stepRegistration">
                    <h2 style="color:#757575">Welcome to Gamata.lk</h2>
                    <label for="mobile" class="login-label-uni" style="margin-bottom:30px">
                        New user Registration


                        <span class="info-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="info-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            <span class="custom-popover">Fill this form to register as a new user</span>
                        </span>
                    </label>


                    <div class="inline-field" style="display: flex; gap: 10px; margin-bottom:0;">
                        <div style="flex: 1;">
                            <label for="first_name" class="login-label-uni">First Name
                                <span class="info-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="info-icon">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    <span class="custom-popover">Please enter your first name</span>
                                </span>
                            </label>
                            <input type="text" id="first_name" value="{{ old('first_name') }}" class="login-input-uni"
                                name="first_name" required>
                            @error('first_name')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div style="flex: 1;">
                            <label for="last_name" class="login-label-uni">Last Name
                                <span class="info-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="info-icon">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    <span class="custom-popover">Please enter your Last name</span>
                                </span>
                            </label>
                            <input type="text" id="last_name" value="{{ old('last_name') }}" class="login-input-uni"
                                name="last_name">
                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div style="margin-bottom: 15px;">
                        <label for="email" class="login-label-uni">Email
                            <span class="info-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                                <span class="custom-popover">Please enter valid email</span>
                            </span>
                        </label>
                        <input type="email" id="email" value="{{ old('email') }}" class="login-input-uni"
                            name="email" required>
                        @error('email')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div style="margin-bottom: 15px; display: none;">
                        <label for="Phone" class="login-label-uni">Phone
                            <span class="info-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                            </span>
                        </label>
                        <input type="tel" id="Phone" class="login-input-uni"
                            value="{{ request('mobile') ?? '' }}" name="Phone" inputmode="numeric" maxlength="10"
                            required>
                    </div>

                    <!-- District -->
                    <div style="margin-bottom: 15px;">
                        <label for="district" class="login-label-uni">District
                            <span class="info-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                                <span class="custom-popover">Select district from the list to continue</span>
                            </span>
                        </label>
                        <select id="district" class="login-input-uni" name="district">
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                                <span class="custom-popover">Please enter your Password</span>
                            </span>
                        </label>
                        <input type="password" id="password" class="login-input-uni" name="password" required>
                        @error('password')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div style="margin-bottom: 15px;">
                        <label for="confirm-password" class="login-label-uni">Confirm Password
                            <span class="info-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                                <span class="custom-popover">Please confirm your Password</span>
                            </span>
                        </label>
                        <input type="password" id="password_confirmation" class="login-input-uni"
                            name="password_confirmation" required>
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }} </p>
                        @enderror
                    </div>

                    <label class="checkbox-label">
                        <input type="checkbox" id="terms">
                        <span>I have read and accept terms and conditions</span>
                    </label>

                    <button type="submit" class="auth-btn common-btn-1">
                        Continue <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo"
                            class="login-logo-uni">
                    </button>

                    <p class="recaptcha-note">
                        This site is protected by reCAPTCHA and Google's
                        <a href="{{ asset('assets/downloads/Gamata Privacy Policy.pdf') }}"
                            download="Gamata Privacy Policy.pdf">Privacy Policy</a> and
                        <a href="{{ asset('assets/downloads/Gamata-legal-v1.0-DRAFT.pdf') }}"
                            download="Gamata-legal-v1.0-DRAFT.pdf">Terms and Conditions</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="login-right-uni"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#flash-message').fadeOut('slow');
            }, 3000);
        });
    </script>
@endsection
