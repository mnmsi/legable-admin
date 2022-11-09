@extends('layouts.signup')
@section('content')
    @include("components.auth.signup-hero",['title'=>'Try Legable free for 14 days','subtitle'=>'No Credit card required'])
    <div class="signup-section-break"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="registration-form-wrapper">
                    <form action="{{route('register')}}" method="post" class="signup-form-wrapper">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="false" autofocus
                                           placeholder="Enter your name">
                                    @include('components.utils.form_field_alert', ['name'=>'name'])
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="false" autofocus
                                           placeholder="example@gmail.com">
                                    @include('components.utils.form_field_alert', ['name'=>'email'])
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input id="phone" type="number"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="false" autofocus
                                           placeholder="Enter phone number">
                                    @include('components.utils.form_field_alert', ['name'=>'phone'])
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="password" class="form-label">PASSWORD</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           value="{{ old('password') }}"
                                           required autocomplete="false" autofocus placeholder="Enter your password">
                                    @include('components.utils.form_field_alert', ['name'=>'password'])
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group input-wrapper">
                                    <label for="address" class="form-label">ADDRESS</label>
                                    <input id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address[address_line_one]"
                                           value="{{ old('address.address_line_one') }}"
                                           required autocomplete="false" autofocus placeholder="Enter your address">
                                    @include('components.utils.form_field_alert', ['name'=>'address.address_line_one'])
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="city" class="form-label">CITY</label>
                                    <input id="city" type="text"
                                           class="form-control @error('password') is-invalid @enderror" name="address[city]"
                                           value="{{ old('address.city') }}"
                                           required autocomplete="false" autofocus placeholder="Enter your city">
                                    @include('components.utils.form_field_alert', ['name'=>'address.city'])
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="region" class="form-label">REGION</label>
                                    <input id="region" type="text"
                                           class="form-control @error('region') is-invalid @enderror" name="address[region]"
                                           value="{{ old('address.region') }}"
                                           required autocomplete="false" autofocus placeholder="Enter your region">
                                    @include('components.utils.form_field_alert', ['name'=>'address.region'])
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="zip_code" class="form-label">ZIP CODE</label>
                                    <input id="zip_code" type="text"
                                           class="form-control @error('zip_code') is-invalid @enderror" name="address[zip]"
                                           value="{{ old('address.zip') }}"
                                           required autocomplete="false" autofocus placeholder="Enter your zip code">
                                    @include('components.utils.form_field_alert', ['name'=>'address.zip'])
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group input-wrapper">
                                    <label for="country" class="form-label">COUNTRY</label>
                                    <select name="address[country]" id="country" class="form-control country-select" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country['id']}}" {{old('address.country') == $country['id'] ? 'selected' : ''}}>{{$country['name']}}</option>
                                        @endforeach
                                    </select>
                                    @include('components.utils.form_field_alert', ['name'=>'address.country'])
                                </div>
                            </div>

                        </div>

                        {{--                     checkbox start --}}
                        {{--                        <div class="checkbox-wrapper">--}}
                        {{--                            <h2>Select default verification method</h2>--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-lg-6 col-md-12">--}}
                        {{--                                    <div class="form-check form-switch">--}}
                        {{--                                        <input class="form-check-input" type="checkbox" id="email_check"--}}
                        {{--                                               name="email_check" value="{{ old('password') }}">--}}
                        {{--                                        <label class="form-check-label" for="email_check">Email Address</label>--}}
                        {{--                                    </div>--}}
                        {{--                                    @include('components.utils.form_field_alert', ['name'=>'email_check'])--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-lg-6 col-md-12">--}}
                        {{--                                    <div class="form-check form-switch">--}}
                        {{--                                        <input class="form-check-input" type="checkbox" id="phone_check"--}}
                        {{--                                               name="phone_check" value="{{ old('phone_check', 1) }}">--}}
                        {{--                                        <label class="form-check-label" for="phone_check">Phone Number</label>--}}
                        {{--                                    </div>--}}
                        {{--                                    @include('components.utils.form_field_alert', ['name'=>'phone_check'])--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{-- checkbox end --}}
                        {{-- submit button--}}
                        <div class="signup_button_wrapper register_button_wrapper">
                            <button class="signup_button" type="submit">Start Verification<img
                                    src="{{asset("image/Auth/arrow.svg")}}" alt="arrow"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
