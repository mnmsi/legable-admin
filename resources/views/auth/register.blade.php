@extends('layouts.signup')
@section('content')
    @include("components.auth.signup-hero",['title'=>'Try Legable free for 14 days','subtitle'=>'No Credit card required'])
    <div class="signup-section-break"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="registration-form-wrapper">
                    <form action="" method="post" class="signup-form-wrapper">
                        <div class="row">
                            @csrf
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="false" autofocus placeholder="Enter your name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="false" autofocus placeholder="example@gmail.com">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="false" autofocus placeholder="Enter phone number">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="password" class="form-label">PASSWORD</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="false" autofocus placeholder="Enter your password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group input-wrapper">
                                    <label for="address" class="form-label">ADDRESS</label>
                                    <input id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address"
                                           required autocomplete="false" autofocus placeholder="Enter your address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="city" class="form-label">CITY</label>
                                    <input id="city" type="text"
                                           class="form-control @error('password') is-invalid @enderror" name="city"
                                           required autocomplete="false" autofocus placeholder="Enter your city">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="state" class="form-label">STATE</label>
                                    <input id="state" type="text"
                                           class="form-control @error('state') is-invalid @enderror" name="city"
                                           required autocomplete="false" autofocus placeholder="Enter your state">
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="zip_code" class="form-label">ZIP CODE</label>
                                    <input id="zip_code" type="text"
                                           class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                           required autocomplete="false" autofocus placeholder="Enter your zip code">
                                    @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="country" class="form-label">COUNTRY</label>
                                    <input id="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror" name="country"
                                           required autocomplete="false" autofocus placeholder="Enter your country">
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    {{-- checkbox start --}}
                        <div class="checkbox-wrapper">
                            <h2>Select default verification method</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="email_check">
                                        <label class="form-check-label" for="email_check">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="phone_check">
                                        <label class="form-check-label" for="phone_check">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- checkbox end --}}
                    {{-- submit button--}}
                        <div class="signup_button_wrapper register_button_wrapper">
                            <button class="signup_button" type="submit">Start Verification<img src="{{asset("image/Auth/arrow.svg")}}" alt="arrow"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
