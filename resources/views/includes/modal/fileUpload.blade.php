<!-- Modal -->
<div class="modal fade global-modal add-box-modal file-upload-modal" id="uploadFile" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <div class="mb-3">
                            <h5 class="sub-header5 mb-3">Upload a File</h5>
                            <label for="file-upload" class="custom-file-upload">
                                select a file to upload
                            </label>
                            <input id="file-upload" type="file"/>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Drawer</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>select a Drawer</option>
                                @foreach($drawers as $drawer)
                                    <option value="{{$drawer['id']}}">{{$drawer['name']}}</option>
                                @endforeach
                            </select>
                        </div>
{{--                        <div class="form-check form-switch d-flex justify-content-end align-items-center">--}}
{{--                            <input class="form-check-input" type="checkbox" id="checkPass" checked>--}}
{{--                            <label class="form-check-label ms-3" for="checkPass">File Requires a Password</label>--}}
{{--                        </div>--}}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary my-4 submit-btn">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
