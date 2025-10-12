@extends('websitePages.master')
@section('content')
    <!-- Banner Section -->
    <section>
        <div class="product-banner">
            <div class="wrapper">
                <div class="breadcrum">
                    <a href="{{ url('/index') }}" class="link">
                        {{ __('messages.home') }}
                    </a>
                    <svg>
                        <use xlink:href="#breadcrum"></use>
                    </svg>
                    <div class="current">
                        {{ __('messages.contact_us') }}
                    </div>
                </div>
                <div class="heading">
                    {{ __('messages.shop_best') }}
                </div>
                <div class="desc">
                    {{ __('messages.shop_desc') }}
                </div>
            </div>
        </div>
    </section>




    <div class="contactContainer">


        <div class="contact-wrapper-uni">

            <div class="contact-wrapper">
                <!--<img src="{{ asset('assets/Images/logo.png') }}" alt="Gamata Logo" class="login-logo-uni">-->
                {{-- Flash message --}}
                @if (session('message'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            toastr.success("{{ session('message') }}");
                        });
                    </script>
                @elseif (session('error'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            toastr.error("{{ session('error') }}", "Error");
                        });
                    </script>
                @endif



              <form class="login-form-uni" id="contactForm" action="{{ url('/insert-anonymous-inquiry') }}" method="POST">
                    @csrf
                    <div id="Contactform">

                        <!-- First & Last Name -->
                        <div class="inline-field" style="display: flex; gap: 10px; margin-bottom:15px;">
                            <div style="flex:1;">
                                <label for="first-name" class="login-label-uni">{{ __('messages.first_name') }}</label>
                                <input type="text" id="first_name" name="first_name" class="login-input-uni" required>
                                @error('first_name')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div style="flex:1;">
                                <label for="last-name" class="login-label-uni">{{ __('messages.last_name') }}</label>
                                <input type="text" id="last_name" name="last_name" class="login-input-uni" required>
                                @error('last_name')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div style="margin-bottom:15px;">
                            <label for="email" class="login-label-uni">{{ __('messages.email') }}</label>
                            <input type="email" id="email" name="email" class="login-input-uni" required>
                            @error('email')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <!-- Subject -->
                        <div style="margin-bottom:15px;">
                            <label for="subject" class="login-label-uni">{{ __('messages.subject') }}</label>
                            <input type="text" id="subject" name="subject" class="login-input-uni" required>
                            @error('subject')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div style="margin-bottom:15px;">
                            <label for="message" class="login-label-uni">{{ __('messages.message') }}</label>
                            <textarea id="message" name="message" class="login-input-uni" rows="5" required></textarea>
                            @error('message')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <button type="submit" class="auth-btn common-btn-1">
                            {{ __('messages.submit') }}
                            <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo" class="login-logo-uni">
                        </button>
                    </div>
                </form>

            </div>

            <div class="contact-right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9323793984013!2d79.8470804683254!3d6.898691103469264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2595e3e2c9461%3A0x8d7c700bc3878693!2sMarine%20Drive%2C%20Colombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2s!4v1756995201469!5m2!1sen!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

@endsection
