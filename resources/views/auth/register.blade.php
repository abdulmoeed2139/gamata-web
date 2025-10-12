{{-- 750800036,777397860,0750800984,770923527, 0771234312, 771000312, 765783782
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
        <a href="{{ url(app()->getLocale() . '/index') }}">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="{{ __('messages.gamata_logo') }}" class="login-logo-uni">
        </a>

        {{-- Flash message --}}
        @if (session('message'))
            <div id="flash-message" class="register-success alert-message alert alert-success p-4 text-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div id="flash-message" class="register-error alert-message alert alert-danger p-4 text-danger">
                {{ session('error') }}
            </div>
        @endif

        <form id="registerForm" method="POST" action="{{ url(app()->getLocale() . '/register') }}">
            @csrf
            <div id="stepRegistration">
                <h2 style="color:#757575">{{ __('messages.welcome_gamata') }}</h2>

                <label for="mobile" class="login-label-uni" style="margin-bottom:30px">
                    {{ __('messages.new_user_registration') }}

                    <span class="info-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="info-icon">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="8"></line>
                        </svg>
                        <span class="custom-popover">{{ __('messages.fill_form_to_register') }}</span>
                    </span>
                </label>

                <div class="inline-field" style="display: flex; gap: 10px; margin-bottom:0;">
                    <div style="flex: 1;">
                        <label for="first_name" class="login-label-uni">{{ __('messages.first_name') }}
                            <span class="info-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                                <span class="custom-popover">{{ __('messages.enter_first_name') }}</span>
                            </span>
                        </label>
                        <input type="text" id="first_name" value="{{ old('first_name') }}" class="login-input-uni"
                            name="first_name" required>
                        @error('first_name')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div style="flex: 1;">
                        <label for="last_name" class="login-label-uni">{{ __('messages.last_name') }}
                            <span class="info-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="info-icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                                <span class="custom-popover">{{ __('messages.enter_last_name') }}</span>
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
                    <label for="email" class="login-label-uni">{{ __('messages.email') }}
                        <span class="info-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="info-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            <span class="custom-popover">{{ __('messages.enter_valid_email') }}</span>
                        </span>
                    </label>
                    <input type="email" id="email" value="{{ old('email') }}" class="login-input-uni"
                        name="email" required>
                    <input type="hidden" id="phone" value="{{ request('mobile') }}"
                        name="phone" required>
                    @error('email')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <!-- District -->
                <div style="margin-bottom: 15px;">
                    <label for="district" class="login-label-uni">{{ __('messages.district') }}
                        <span class="info-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="info-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            <span class="custom-popover">{{ __('messages.select_district') }}</span>
                        </span>
                    </label>
                    <select id="district" class="login-input-uni" name="district">
                        <option value="">{{ __('messages.select_district') }}</option>
                        <option value="north">{{ __('messages.north') }}</option>
                        <option value="south">{{ __('messages.south') }}</option>
                        <option value="east">{{ __('messages.east') }}</option>
                        <option value="west">{{ __('messages.west') }}</option>
                    </select>
                </div>

                <!-- Password -->
                <div style="margin-bottom: 15px;">
                    <label for="password" class="login-label-uni">{{ __('messages.password') }}
                        <span class="info-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="info-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            <span class="custom-popover">{{ __('messages.enter_password') }}</span>
                        </span>
                    </label>
                    <input type="password" id="password" class="login-input-uni" name="password" required>
                    @error('password')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div style="margin-bottom: 15px;">
                    <label for="confirm-password" class="login-label-uni">{{ __('messages.confirm_password') }}
                        <span class="info-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="info-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            <span class="custom-popover">{{ __('messages.confirm_password') }}</span>
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
                    <span>{{ __('messages.accept_terms') }}</span>
                </label>

                <button type="submit" class="auth-btn common-btn-1">
                    {{ __('messages.continue') }}
                    <img src="{{ asset('assets/Images/iconn.png') }}" alt="{{ __('messages.gamata_logo') }}"
                        class="login-logo-uni">
                </button>

                <p class="recaptcha-note">
                    {{ __('messages.recaptcha_note') }}
                    <a href="{{ asset('assets/downloads/Gamata Privacy Policy.pdf') }}" download="Gamata Privacy Policy.pdf">
                        {{ __('messages.privacy_policy') }}
                    </a>
                    {{ __('messages.and') }}
                    <a href="{{ asset('assets/downloads/Gamata-legal-v1.0-DRAFT.pdf') }}" download="Gamata-legal-v1.0-DRAFT.pdf">
                        {{ __('messages.terms_conditions') }}
                    </a>
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
