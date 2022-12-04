<!-- Modal -->
<div class="modal fade global-modal add-box-modal file-upload-modal" id="uploadFileAjax" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" class="close p-0 border-0" id="addBoxModalClose" data-bs-dismiss="modal">
                    <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('/image/drawer/modalIcon.svg')}}" alt="" class="img-fluid modal-top-image"/>
                </div>
                <div class="row all-form-wrapper mt-5">
                    <div class="col-12">
                        <form action="" method="post" enctype="multipart/form-data" id="fileUploadForm"
                              onsubmit="uploadFileByAjax(event, this, '{{route('file.store.ajax')}}')">
                            @csrf

                            <div class="mb-3">
                                <h5 class="sub-header5 mb-3">Upload a File</h5>
                                <label for="file-upload" class="custom-file-upload">
                                    select a file to upload
                                </label>
                                <input id="file-upload" type="file" name="file"/>
                                @include("components.utils.form_field_alert", ['name'=> 'file'])
                            </div>

                            <div class="mb-3" id="contentDrawerDiv" style="display: none">
                                <label for="formFile" class="form-label">Select Drawer</label>
                                <select class="form-select" aria-label="Default select example" name="drawer"
                                        id="drawerSelectId">
                                    <option value="">select a Drawer</option>
                                    @foreach($drawers as $drawer)
                                        <option value="{{$drawer['id']}}">{{$drawer['name']}}</option>
                                    @endforeach
                                </select>
                                @include("components.utils.form_field_alert", ['name'=> 'drawer'])
                            </div>

                            <div class="mb-3" id="contentBoxDiv" style="display: none">
                                <label for="formFile" class="form-label">Select Box</label>
                                <select class="form-select" aria-label="Default select example" name="drawer"
                                        id="boxSelectId">
                                    <option value="">select a Drawer</option>
                                    @foreach($boxes as $box)
                                        <option value="{{$box['id']}}">{{$box['name']}}</option>
                                    @endforeach
                                </select>
                                @include("components.utils.form_field_alert", ['name'=> 'drawer'])
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="masterKey"
                                               name="use_master_key" value="1" checked>
                                        <label class="form-check-label ms-3" for="masterKey">Use master key</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="checkPass"
                                               name="file_password_required"
                                               value="1">
                                        <label class="form-check-label ms-3" for="checkPass">File Requires a
                                            Password</label>
                                    </div>
                                </div>
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
            </div>
        </div>
    </div>
</div>
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
