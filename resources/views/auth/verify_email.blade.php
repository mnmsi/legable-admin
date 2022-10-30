@extends('layouts.signup')
@section('content')
    @include("components.auth.signup-hero",['title'=>'Verify Email Address','subtitle'=>'Just ome more step, lets verify your email address'])
    <div class="signup-section-break"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="registration-form-wrapper">
                    <div class="verify_bread_crumb">
                        <p>VERIFICATION STEP 1/2</p>
                    </div>
                    <div class="verify_image_wrapper">
                        <img src="{{asset("image/Auth/email.svg")}}" alt="">
                    </div>
                   <div class="row justify-content-center">
                       <div class="col-lg-8">
                           <p class="verification_instruction">
                               We’ve sent a six digit verification code to your email address <span class="verify_email">example@legable.com</span> please check your inbox and insert the code below
                           </p>
                       </div>
                   </div>
                    <form onsubmit="onSubmit(event)" class="signup-form-wrapper">
                        <div class="verify_code">
                            <input name='code' class='code-input' required/>
                            <input name='code' class='code-input' required/>
                            <input name='code' class='code-input' required/>
                            <input name='code' class='code-input' required/>
                            <input name='code' class='code-input' required/>
                            <input name='code' class='code-input' required/>
                        </div>
                        <div class="signup_button_wrapper">
                            <button class="signup_button" type="submit">Verify Email Address <img src="{{asset("image/Auth/arrow.svg")}}" alt="arrow"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{asset("js/verify_email.js")}}"></script>
@endsection
