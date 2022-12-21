<!-- Modal -->
<div class="modal fade global-modal add-box-modal" id="helpCenterModal" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" class="close p-0 border-0" id="helpCenterModalClose" data-bs-dismiss="modal">
                    <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('/image/drawer/modalIcon2.svg')}}" alt="" class="img-fluid"/>
                </div>
                <div class="container all-form-wrapper py-4">
                    <form id="helpCenterForm" action="{{route('help.center')}}" method="POST">
                        @csrf

                        <!-- Email address input -->
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                   placeholder="Enter box name" required>
                            @include('components.utils.form_field_alert', ['name' => 'subject'])
                        </div>

                        <!-- Message input -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" type="text" name="message"
                                      placeholder="Enter Message" style="height: 10rem;" required></textarea>
                            @include('components.utils.form_field_alert', ['name' => 'message'])
                        </div>

                        <!-- Form submit button -->
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary my-4 submit-btn">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
