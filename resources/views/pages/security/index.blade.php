@extends("layouts.app")
@section('title','Security Settings')
@section('content')
    @include('includes.pageHeader',['title'=>'Security Settings','list'=>['Dashboard','Account Settings'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{--  main page content--}}

        <div class="security-settings-wrapper">
            {{--        title bar start--}}
            <div class="setting-title-bar-wrapper">
                <div class="change-password-title-content">
                    <h4>Change Password</h4>
                    <p>create a unique password to secure your account</p>
                </div>
            </div>

            {{--  title bar end--}}
            {{--   form start--}}
            <form action="{{route('user.password.change')}}" method="post" autocomplete="off">
                @csrf

                @if (Session::has('password_changed'))
                    <div class="alert alert-success justify-content-center">
                        {{ Session::get('password_changed') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-6 col-md-12 lg-mb-0 mb-4">
                        <div class="form-group all-form-wrapper">
                            <label for="old_password" class="mb-3 form-label">Old Password</label>
                            <input type="password" class="form-control" placeholder="Enter your current password"
                                   id="old_password" name="old_password" autocomplete="off">
                            <div class="password-eye">
                                <img src="{{asset("image/common/eyeOpen.svg")}}" alt="eye">
                            </div>
                        </div>
                        @include('components.utils.form_field_alert', ['name' => 'old_password'])
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group all-form-wrapper">
                            <label for="new_password" class="mb-3 form-label">New Password</label>
                            <input type="password" class="form-control" placeholder="Enter new password"
                                   id="new_password" name="new_password" autocomplete="off">
                            <div class="password-eye">
                                <img src="{{asset("image/common/eyeOpen.svg")}}" alt="eye">
                            </div>
                        </div>
                        @include('components.utils.form_field_alert', ['name' => 'new_password'])
                    </div>
                    {{--                change password button start --}}
                    <div class="col-lg-12 col-md-12">
                        <div class="change-password-button-wrapper">
                            <button type="submit" class="change-password-button">Change Password</button>
                        </div>
                    </div>
                    {{--  change password button end --}}
                </div>
            </form>
            {{--   form end--}}
            <form action="{{route('user.master-key.set')}}" method="post">
                @csrf

                {{--  title bar start--}}
                <div class="setting-title-bar-wrapper">
                    <div class="change-password-title-content">
                        <h4>Master Key</h4>
                        <div class="activate-switch-wrapper">
                            <p>Generate a master key to unlock all contents at a time </p>
                            <div class="all-form-wrapper">
                                <div class="form-check form-switch d-flex justify-content-end">
                                    <input class="form-check-input" type="checkbox" id="checkPass" value="1" checked>
                                    <label class="form-check-label ms-3" for="checkPass">Activate</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  title bar end--}}
                {{--  master key form start--}}
                <div class="row align-items-end">

                    @if (Session::has('generate_master_key'))
                        <div class="alert alert-success justify-content-center">
                            {{ Session::get('generate_master_key') }}
                        </div>
                    @endif

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group all-form-wrapper">
                            <label for="master_key" class="mb-3 form-label">Generate Key</label>
                            <input type="password" class="form-control" placeholder="Enter Master Key" id="master_key"
                                   name="master_key">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div>
                            <button type="submit" class="generate-key-submit-button">Set Master Key</button>
                        </div>
                    </div>
                </div>
                {{--  master key form end--}}
            </form>
            {{--  main page end--}}
        </div>
    </div>
@endsection
