@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Upload File" subtitle="upload and get the the best security for your files"/>
    <div class="block-wrapper block-min-height content-upload-wrapper all-form-wrapper">
        <div class="form-body">

            <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data" class="upload_form">
                @csrf
                <input type="hidden" name="use_master_key" value="1">
                <div class="mb-3">
                    <h5 class="sub-header5 mb-3">Upload a File</h5>
                    <label for="file-upload" class="custom-file-upload">
                        select a file to upload
                    </label>
                    <input id="file-upload" type="file" name="file"/>
                    @include("components.utils.form_field_alert", ['name'=> 'file'])
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select Drawer</label>
                    @if(request()->has("drawer"))
                        <select class="form-select" aria-label="Default select example" name="drawer">
                            <option value="">select a drawer</option>
                            @foreach($drawers as $drawer)
                                <option
                                    value="{{$drawer['id']}}" {{old('drawer', request("drawer")) == $drawer['id'] ? 'selected':''}}>{{$drawer['name']}}</option>
                            @endforeach
                        </select>
                    @else
                        <select class="form-select" aria-label="Default select example" name="drawer">
                            <option value="">select a drawer</option>
                            @foreach($boxes as $box)
                                <option
                                    value="{{$box['id']}}" {{old('drawer', request("box")) == $box['id'] ? 'selected':''}}>{{$box['name']}}</option>
                            @endforeach
                        </select>
                    @endif
                    @include("components.utils.form_field_alert", ['name'=> 'drawer'])
                </div>

                <div class="form-check form-switch d-flex justify-content-end">
                    <input class="form-check-input" type="checkbox" id="checkPass" name="file_password_required"
                           value="1">
                    <label class="form-check-label ms-3" for="checkPass">File Requires a Password</label>
                </div>

                <div class="mb-3" style="display: none" id="passwordField">
                    <label for="security_key" class="form-label">Password</label>
                    <input type="password" class="form-control" id="security_key" name="security_key"
                           placeholder="Enter password" value="{{old('security_key')}}">
                    @include('components.utils.form_field_alert', ['name' => 'security_key'])
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary my-4 submit-btn">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#checkPass").change(function () {
                if ($(this).is(":checked")) {
                    $('#passwordField').show('fast');
                } else {
                    $('#passwordField').hide('fast');
                }
            });
            //    show file name
            $("#file-upload").on("change", function (e) {
                $(".custom-file-upload").text($(this).val().replace(/C:\\fakepath\\/i, ''));
            })
        })
    </script>
@endsection
