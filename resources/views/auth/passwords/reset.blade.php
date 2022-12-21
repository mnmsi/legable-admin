@extends('layouts.login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="login-form-title-wrapper">
                <h2>Reset Password</h2>
            </div>
            @if (session('password_changed'))
                <div class="alert alert-success py-2" role="alert">
                    {{ session('password_changed') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger py-2" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card form-container-card">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form method="POST" action="{{ route('password.update') }}" class="login-form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="form-group all-form-wrapper input-wrapper">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">
                            </div>
                            <div class="form-group all-form-wrapper input-wrapper">
                                <label for="password" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password')
                                <span style="font-size: 12px; padding-top: 14px" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- remember me and forget password --}}
                            {{-- remember me and forget password--}}

                            <div class="submit-button-wrapper">
                                <button type="submit">
                                    Update Password
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







