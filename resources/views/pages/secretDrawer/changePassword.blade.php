@extends('layouts.app')
@section('content')
    <div class="modal-content">
        <div class="modal-body">
            <div class="d-flex justify-content-center">
                <img src="{{asset('/image/drawer/modalIcon2.svg')}}" alt="" class="img-fluid"/>
            </div>
            <div class="row all-form-wrapper mt-5 d-flex justify-content-center">
                <div class="col-md-11">
                    <div>
                        <h3 class="sub-header3 mb-0">Change drawer Password</h3>
                        <p class="form-label-2">Change password for Drawer Name Here</p>
                    </div>

                    <div class="mt-5">
                        <form action="{{route('drawer.change.password', $id)}}" method="post" id="boxCreateFormId">
                            @csrf

                            <div class="row">
                                <input type="hidden" name="prev_url" value="{{$prev_url}}">

                                <div class="col-lg-6 col-md-12 lg-mb-0 mb-4">
                                    <div class="form-group all-form-wrapper">
                                        <label for="new_password" class="mb-3 form-label">New Password</label>
                                        <input type="password" class="form-control"
                                               placeholder="Enter new password"
                                               id="new_password" name="new_password" autocomplete="off">
                                        <label for="new_password" class="password-eye">
                                            <img src="{{asset("image/common/eyeOpen.svg")}}" alt="eye">
                                        </label>
                                    </div>
                                    @include('components.utils.form_field_alert', ['name' => 'new_password'])
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group all-form-wrapper">
                                        <label for="new_password_confirmation" class="mb-3 form-label">Re-Enter
                                            Password</label>
                                        <input type="password" class="form-control" placeholder="Enter password again"
                                               id="new_password_confirmation" name="new_password_confirmation"
                                               autocomplete="off">
                                        <label for="new_password_confirmation" class="password-eye">
                                            <img src="{{asset("image/common/eyeOpen.svg")}}" alt="eye">
                                        </label>
                                    </div>
                                    @include('components.utils.form_field_alert', ['name' => 'new_password_confirmation'])
                                </div>
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary my-4 submit-btn">Rename Drawer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(".password-eye").on("click", function () {
                let type = $(this).prev().attr("type");
                if (type === "password") {
                    $(this).children().attr("src", "/image/common/eyeClose.svg")
                    $(this).prev().attr("type", "text")
                } else {
                    $(this).prev().attr("type", "password")
                    $(this).children().attr("src", "/image/common/eyeOpen.svg")
                }
            })
        })
    </script>
@endsection
