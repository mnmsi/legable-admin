<!-- Modal -->
<div class="modal fade global-modal add-box-modal" id="addBoxModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" class="close p-0 border-0" id="addBoxModalClose" data-bs-dismiss="modal">
                    <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('/image/drawer/modalIcon.svg')}}" alt="" class="img-fluid"/>
                <div class="row all-form-wrapper mt-5">
                    <div class="col-12">
                        <div>
                            <h3 class="sub-header3 mb-0">Create new Box</h3>
                            <p class="form-label-2">add a box to this drawer</p>
                        </div>
                        <div class="mb-3">
                            <label for="dName" class="form-label">Box Name</label>
                            <input type="text" class="form-control" id="dName" placeholder="Enter box name">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Information Template</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>select a template</option>
                                <option value="1">template One</option>
                                <option value="2">template Two</option>
                                <option value="3">template Three</option>
                            </select>
                        </div>
                        <div class="form-check form-switch d-flex justify-content-end align-items-center">
                            <input class="form-check-input" type="checkbox" id="checkPass" checked>
                            <label class="form-check-label ms-3" for="checkPass">Box Requires a Password</label>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary my-4 submit-btn">Add to Drawer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
