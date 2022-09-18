<!-- Modal -->
<div class="modal fade plan-modal-wrapper" id="planModal" tabindex="-1" aria-labelledby="plan-modal-wrapper"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width plan-modal-block">
        <div class="modal-content">
            <div class="modal-body">
                <div class="top-block">
                    <div class="left-block">
                        <h2>Get Instant Access to Legable <span>PRO</span></h2>
                        <h3><sup>$</sup><span>30</span>/month</h3>
                        <div class="list-block">
                            <div class="details-block">
                                <img src="{{asset('image/global/frameIcon.svg')}}" alt="" class="img-fluid">
                                <p><span>Access to all pro features</span> ( access all premium templates, get the best
                                    security system, secure your files).</p>
                            </div>

                            <div class="details-block">
                                <img src="{{asset('image/global/frameIcon.svg')}}" alt="" class="img-fluid">
                                <p><span>Always get notfied</span> ( get important notification before every important
                                    actions).</p>
                            </div>
                            <div class="details-block">
                                <img src="{{asset('image/global/frameIcon.svg')}}" alt="" class="img-fluid">
                                <p><span>Review your plan every month</span> ( cancel anytime and you will never charged
                                    again. you’ll get notified before the renewal).</p>
                            </div>
                        </div>
                    </div>
                    <div class="right-block all-form-wrapper">
                        <form method="get" action="/" enctype="multipart/form-data">
                            @csrf
                            @method('get')
                            <div class="top-sec">
                                <h4>Your Legable Subscription</h4>
                                <span id="closePlanModal"><img src="{{asset('image/global/close1.svg')}}" alt="" class="img-fluid"></span>
                            </div>
                            <div class="mb-3">
                                <label for="dName" class="form-label">EMAIL ADDRESS</label>
                                <input type="email" class="form-control" id="dName" placeholder="example@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="dName" class="form-label">Card Number</label>
                                <input type="number" class="form-control" id="dName" placeholder="0000 5432 2367 0275" size='20' autocomplete='off'>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dName" class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" id="dName" placeholder="month/year" autocomplete='off' size='8'>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dName" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="dName" placeholder="321" autocomplete='off' size='4'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="mt-4 submit-btn">Get Legable Pro</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bottom-block">
                    <div class="testimonial">
                        <div class="avatar">
                            <img src="{{asset('image/common/profile.svg')}}" alt="" class="img-fluid">
                        </div>
                        <p>Dolor sit amet, consectetur adipiscing elit. Suspendisse arcu netus neque hendrerit sed
                            turpis diam sodales.</p>
                        <h3>Darren C. Bass</h3>
                    </div>

                    <div class="testimonial">
                        <div class="avatar">
                            <img src="{{asset('image/common/profile.svg')}}" alt="" class="img-fluid">
                        </div>
                        <p>Dolor sit amet, consectetur adipiscing elit. Suspendisse arcu netus neque hendrerit sed
                            turpis diam sodales.</p>
                        <h3>David Williams</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
