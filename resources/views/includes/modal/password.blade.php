<div class="modal fade global-modal" id="pageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" class="close p-0 border-0" id="pageModalClose" data-bs-dismiss="modal">
                    <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('/image/drawer/modalIcon.svg')}}" alt="" class="img-fluid top-modal-img"/>
                </div>
                <form action="{{route('security.check')}}" method="post" id="securityForm" onsubmit="checkSecurity(event, this,'{{route('security.check')}}')">
                    @csrf

                    <div class="row all-form-wrapper mt-5">
                        <div class="col-12">
                            <div class="mb-3">
                                <h3 class="sub-header3 mb-0">Enter your password</h3>
                                <label for="security_key" class="form-label-2 mb-4">Enter security key to unlock this
                                    drawer</label>
                                <input type="password" class="form-control" id="security_key" name="security_key"
                                       placeholder="Enter security key" required>
                                <input type="hidden" id="drawer-key" name="drawer_key">
                                <input type="hidden" id="drawer-name">
                                <small class="text-small text-danger ml-3" id="message"></small>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary my-4 submit-btn">Unlock Drawer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
