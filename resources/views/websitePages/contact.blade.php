@extends('websitePages.master')
@section('content')
    <!-- Banner Section -->
    <section>
        <div class="product-banner">
            <div class="wrapper">
                <div class="breadcrum">
                    <a href="{{ url('/index') }}" class="link">
                        Home
                    </a>
                    <svg>
                        <use xlink:href="#breadcrum"></use>
                    </svg>
                    <div class="current">
                        Contact Us
                    </div>
                </div>
                <div class="heading">
                    Shop the Best of Gamata
                </div>
                <div class="desc">
                    Explore fresh products, connect with featured sellers, and shop with ease. From trending items to
                    detailed searches, Gamata makes
                    buying and selling effortless for the farming community.
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
                <div id="flash-message" class="alert-message alert alert-success p-4 text-success">
                    {{ session('message') }}
                </div>
                @elseif (session('error'))
                    <div id="flash-message" class="alert-message alert alert-danger p-4 text-danger">
                        {{ session('error') }}
                    </div>
                @endif


                <form class="login-form-uni" id="contactForm" action="{{ url('/insert-anonymous-inquiry') }}"
                    method="POST">
                    @csrf
                    <div id="Contactform">
                        <!--<label class="login-label-uni" style="margin-bottom:30px">Contact Us</label>-->

                        <!-- First & Last Name -->
                        <div class="inline-field" style="display: flex; gap: 10px; margin-bottom:15px;">
                            <div style="flex:1;">
                                <label for="first-name" class="login-label-uni">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="login-input-uni" required>
                                @error('first_name')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div style="flex:1;">
                                <label for="last-name" class="login-label-uni">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="login-input-uni" required>
                                @error('last_name')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div style="margin-bottom:15px;">
                            <label for="email" class="login-label-uni">Email</label>
                            <input type="email" id="email" name="email" class="login-input-uni" required>
                            @error('email')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <!-- Subject -->
                        <div style="margin-bottom:15px;">
                            <label for="subject" class="login-label-uni">Subject</label>
                            <input type="text" id="subject" name="subject" class="login-input-uni" required>
                            @error('subject')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div style="margin-bottom:15px;">
                            <label for="message" class="login-label-uni">Message</label>
                            <textarea id="message" name="message" class="login-input-uni" name="message" rows="5" required></textarea>
                            @error('message')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <button type="submit" class="auth-btn common-btn-1">
                            Submit <img src="{{ asset('assets/Images/iconn.png') }}" alt="Gamata Logo"
                                class="login-logo-uni">
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
