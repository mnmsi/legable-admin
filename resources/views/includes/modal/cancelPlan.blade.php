<!-- Modal -->
<div class="modal fade global-modal add-box-modal file-upload-modal" id="cancelPlan" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" class="close p-0 border-0" id="addBoxModalClose" data-bs-dismiss="modal">
                    <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                </button>
            </div>
            <div class="modal-body cancel-plan-modal">
        {{--  cancel plan content start --}}
                <h2>Sad to see you go</h2>
                {{-- form start --}}
                <form action="">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-9 col-md-12 mb-lg-0 mb-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="1">
                                <label class="form-check-label" for="1">
                                    It’s too costly
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="2">
                                <label class="form-check-label" for="2">
                                    i found another product that fulfills my needs.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="3">
                                <label class="form-check-label" for="3">
                                    I don’t use it enough
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 mb-lg-0 d-lg-block d-none">
                            <img src="{{asset("image/plans/cancel.png")}}" alt="image" class="img-fluid">
                        </div>
                    </div>
                </form>
                {{--  form end --}}
        {{--  cancel plan content end  --}}
            </div>
        </div>
    </div>
</div>
