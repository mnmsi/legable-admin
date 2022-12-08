<!-- Modal -->
<div class="modal fade plan-modal-wrapper" id="planModal" tabindex="-1" aria-labelledby="plan-modal-wrapper"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width plan-modal-block">
        <div class="modal-content">
            <div class="modal-body">
                <div class="res-top-block">
                    <div class="text-top">
                        <button id="closePlanModal">
                            <img src="{{asset("/image/global/backIcon.svg")}}" alt="" class="img-fluid">
                        </button>
                        <h3>Go Pro</h3>
                    </div>
                    <img src="{{asset("/image/plans/pro_plan_logo.svg")}}" alt="" class="img-fluid modal-top-icon">
                </div>
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
                        <form method="post" action="{{route('subscribe')}}" id="planFormId">
                            @csrf

                            <div class="top-sec">
                                <h4>Your Legable Subscription</h4>
                                <span id="closePlanModal" onclick="hidePlanModal()">
                                    <img src="{{asset('image/global/close1.svg')}}" alt=""
                                                               class="img-fluid"></span>
                            </div>

                            <div style="margin-bottom: 10px">
                                @include("components.utils.form_field_alert", ['name' =>"invalidCard"])
                            </div>


                            <div class="mb-3">
                                <label for="dName" class="form-label">Card Holder</label>
                                <input type="text" class="form-control" id="dName" name="name" placeholder="Enter name"
                                       value="{{old('name')}}">
                                @include('components.utils.form_field_alert', ['name' => 'name'])
                            </div>
                            <div class="mb-3">
                                <label for="dName" class="form-label d-flex justify-content-between align-items-center">
                                    <span>
                                        Card Number
                                    </span>
                                    <span>
                                        <span class="pe-3">
                                            <img class="img-fluid"
                                                 src="{{asset("image/billing/mastercard.svg")}}"
                                                 alt="">
                                        </span>
                                        <span>
                                            <img class="img-fluid" src="{{asset("image/billing/visa.svg")}}"
                                                 alt="">
                                        </span>
                                    </span>

                                </label>
                                <input type="number" class="form-control" id="dName" name="number"
                                       placeholder="0000 5432 2367 0275" size='20' autocomplete='off'
                                       value="{{old('number')}}">
                                @include('components.utils.form_field_alert', ['name' => 'number'])
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group input-wrapper">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <div class="input-group">
                                            <input autocomplete="off"
                                                   value="{{old('exp_month')}}"
                                                   class="exp form-control @error('expiry_date') is-invalid @enderror"
                                                   id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical"
                                                   placeholder="MM" type="text" data-pattern-validate
                                                   name="exp_month"/>

                                            <input autocomplete="off"
                                                   value="{{old('exp_year')}}"
                                                   class="exp form-control @error('expiry_date') is-invalid @enderror"
                                                   id="year"
                                                   maxlength="4" pattern="[0-9]*" inputmode="numerical"
                                                   placeholder="YYYY"
                                                   type="text" data-pattern-validate
                                                   name="exp_year"/>
                                        </div>
                                        @include('components.utils.form_field_alert', ['name' => 'exp_month'])
                                        @include('components.utils.form_field_alert', ['name' => 'exp_year'])
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dName" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="dName" name="cvc" placeholder="321"
                                               autocomplete='off' size='4'>
                                        @include('components.utils.form_field_alert', ['name' => 'cvc'])
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
                        <p><img src="{{asset("image/plans/m_comment.png")}}" alt=""> Dolor sit amet, consectetur
                            adipiscing elit. Suspendisse arcu netus neque hendrerit sed
                            turpis diam sodales.</p>
                        <h3 class="ps-4">Darren C. Bass</h3>
                    </div>
                    <div class="testimonial">
                        <div class="avatar">
                            <img src="{{asset('image/common/profile.svg')}}" alt="" class="img-fluid">
                        </div>
                        <p><img src="{{asset("image/plans/m_comment.png")}}" alt=""> Dolor sit amet, consectetur
                            adipiscing elit. Suspendisse arcu netus neque hendrerit sed
                            turpis diam sodales.</p>
                        <h3 class="ps-4">David Williams</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
