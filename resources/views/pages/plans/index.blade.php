@extends("layouts.app")
@section('title','My Plan')

@section('content')
    @include('includes.pageHeader',['title'=>'My Plan','list'=>['Dashboard','Plans & Subscriptions'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{--  main page content--}}
        {{--        title bar start--}}
        <div class="my-plan-title-bar">
            <p>Your Plan Details</p>
        </div>
        {{--        title bar end--}}
        <div class="row align-items-stretch lg-mt-3 mt-0">
            <div class="col-lg-6 col-md-6 lg-mb-0 mb-4">
                <div class="plan-box-wrapper">
                    <div class="plan-box-content-wrapper">
                        <div class="plan-card-header">
                            <div class="plan-card-title">14 days Free Trial</div>
                            <div>
                                <img src="{{asset("image/common/golden-sign.svg")}}" alt="image" class="img-fluid">
                            </div>
                        </div>
                        <div class="plan-box-content">
                            <p>10 days remaining in your free trial</p>
                        </div>
                        <div class="cancel-subscription-button-wrapper">
                            <a href="#">Cancel Subscription</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 lg-mb-0 mb-4 ">
                <div class="plan-box-wrapper"
                     style="background: url('{{asset("image/plans/premium-bg.svg")}}') no-repeat center; background-size: cover;">
                    <div class="plan-card-header">
                        <div class="plan-type">
                            <h3>Premium</h3>
                        </div>
                        <div class="plan-price">
                            <h3>
                                <sup>$</sup>
                                30/<span>month</span>
                            </h3>
                        </div>
                    </div>
                    <div class="premium-body">
                        <p> 30 days cycle</p>
                    </div>
                    <div class="upgrade-plan-button">
                        <button type="button" id="proPlanid">Upgrade your plan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="plan-footer">
                <div class="plan-footer-title">Enable auto renewal</div>
                <div class="all-form-wrapper">
                    <div class="form-check form-switch d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="checkPass"
                               onchange="autoRenewal('{{route('myPlan.auto-renewal')}}')"
                               value="1" {{$auto_renewal ? 'checked' : ''}}>
                        <label class="form-check-label ms-2 mt-2" for="checkPass">Active</label>
                    </div>
                </div>
            </div>

            <div id="autoRenewalStatus"></div>

            <p class="plan-footer-text">If this option is checked, system will renew your subscription automatically for
                this product . If the
                current plan expires, However this might prevent you from</p>
        </div>
        {{--  main page end--}}
    </div>
    @include('includes.modal.planModal')
@endsection

@section('script')
    <script src="{{asset('js/myPlan.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#proPlanid').on('click', function () {
                $('#planModal').modal('show');
            });

            //hide all modal
            $('#closePlanModal').on('click', function () {
                $('#planModal').modal('hide');
            });
        })
    </script>
@endsection
