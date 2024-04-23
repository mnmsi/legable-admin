@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="row justify-content-center login-form-wrapper">
            <div class="col-md-12">
                <div class="login-form-title-wrapper">
                    <h2>Reset Password</h2>
                </div>
                <div class="card form-container-card">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            @if (session('status'))
                                <div class="alert alert-success py-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}" class="login-form">
                                @csrf
                                <div class="form-group all-form-wrapper input-wrapper">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="text"
                                           class="form-control " name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span style="font-size: 12px; padding-top: 14px" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- remember me and forget password --}}
                                {{-- remember me and forget password--}}
                                <div class="submit-button-wrapper">
                                    <button type="submit">
                                        Send Password Reset Link
                                    </button>
                                    <div class="auth_text text-center mt-3"><a
                                            href="{{route("login")}}">Back</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
