@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="row justify-content-center login-form-wrapper">
            <div class="col-md-12">
                <div class="login-form-title-wrapper">
                    <h2>Login in to <span>Legable</span></h2>
                </div>
                <div class="card form-container-card">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            @if (session('success'))
                                <div class="alert alert-success py-2" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" class="login-form">
                                @csrf
                                <div class="form-group all-form-wrapper input-wrapper">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="text"
                                           class="form-control " name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <div class="form-group input-wrapper all-form-wrapper">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="form-control" name="password"
                                           required autocomplete="current-password">
                                    <label for="new_password" class="password-eye">
                                        <img style="vertical-align: baseline" src="{{asset("image/common/eyeOpen.svg")}}" alt="eye">
                                    </label>
                                    @error('email')
                                    <span style="font-size: 12px; padding-top: 14px" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- remember me and forget password --}}
                                <div class="remember_me_wrapper">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="forget-password-link">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                {{-- remember me and forget password--}}
                                <div class="submit-button-wrapper">
                                    <button type="submit">
                                        {{ __('Login') }}
                                    </button>
                                    <div class="auth_text text-center mt-3">Don't have any account? <a
                                            href="{{route("register")}}">Register Here</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $(".password-eye").on("click",function (){
                let type = $(this).prev().attr("type");
                if(type === "password"){
                    $(this).children().attr("src","/image/common/eyeClose.svg")
                    $(this).prev().attr("type","text")
                }else{
                    $(this).prev().attr("type","password")
                    $(this).children().attr("src","/image/common/eyeOpen.svg")
                }
            })
        })

    </script>
@endsection
