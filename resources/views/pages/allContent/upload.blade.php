@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Upload File" subtitle="upload and get the the best security for your files"/>
    <div class="block-wrapper block-min-height content-upload-wrapper all-form-wrapper">
        <div class="form-body">
            <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="use_master_key" value="on">

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
                    <select class="form-select" aria-label="Default select example" name="drawer">
                        <option selected>select a drawer</option>
                        @foreach($drawers as $drawer)
                            <option
                                value="{{$drawer['id']}}" {{old('drawer') == $drawer['id'] ? 'selected':''}}>{{$drawer['name']}}</option>
                        @endforeach
                    </select>
                    @include("components.utils.form_field_alert", ['name'=> 'drawer'])
                </div>
                <div class="form-check form-switch d-flex justify-content-end">
                    <input class="form-check-input" type="checkbox" id="checkPass" name="password_required" checked>
                    <label class="form-check-label ms-3" for="checkPass">File Requires a Password</label>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary my-4 submit-btn">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection
