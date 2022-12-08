@extends("layouts.app")
@section('title','My Plan')

@section('content')
    @include('includes.pageHeader',['title'=>'My Plan','list'=>['Dashboard','Plans & Subscriptions'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{--  main page content--}}
        {{--        title bar start--}}
        <div class="my-plan-title-bar">
            <p>Your Plan Details</p>
            @if(session()->has('plan_exists'))
                <div class="alert alert-warning">
                    {{ session()->get('plan_exists') }}
                </div>
            @endif
        </div>

        {{--        title bar end--}}
        <div class="row align-items-stretch lg-mt-3 mt-0">
            @if($isTrial && !$isSubscribed)
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
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a href="javascript:void(0)"
                                       onclick="document.getElementById('logoutForm').submit();">Cancel Subscription</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

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
                    @if($isSubscribed)
                        <div class="upgrade-plan-button">
                            <button type="button">Subscribed</button>
                        </div>
                    @else
                        <div class="upgrade-plan-button">
                            <button type="button" id="proPlanid">Upgrade your plan</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="plan-footer">
                <div class="plan-footer-title">Enable auto renewal</div>
                <div class="all-form-wrapper">
                    <div class="form-check form-switch d-flex align-items-center">
                        <input style="height: 22px; width: 45px;" class="form-check-input" type="checkbox"
                               id="checkPass"
                               onchange="autoRenewal('{{route('myPlan.auto.renewal')}}')"
                               value="1" {{$auto_renewal ? 'checked' : ''}}>
                        <label style="margin-top: 3px" class="form-check-label ms-3" for="checkPass">Active</label>
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
    @include('includes.modal.cancelPlan')
@endsection

@section('script')
    <script src="{{asset('js/myPlan.js')}}"></script>
    <script>
        $(document).ready(function () {
            @if ($errors->any())
            $("#planModal").modal('show');
            @endif
            $('#proPlanid').on('click', function () {
                $('#planModal').modal('show');
            });

            //hide all modal
            $('#closePlanModal').on('click', function () {
                $('#planModal').modal('hide');
            });

            //plan modal
            $("#cancel_subscription").on("click", function () {
                $("#cancelPlan").modal("show");
            })
        })

        const monthInput = document.querySelector('#month');
        const yearInput = document.querySelector('#year');

        const focusSibling = function (target, direction, callback) {
            const nextTarget = target[direction];
            nextTarget && nextTarget.focus();
            // if callback is supplied we return the sibling target which has focus
            callback && callback(nextTarget);
        }

        // input event only fires if there is space in the input for entry.
        // If an input of x length has x characters, keyboard press will not fire this input event.
        monthInput.addEventListener('input', (event) => {

            const value = event.target.value.toString();
            // adds 0 to month user input like 9 -> 09
            if (value.length === 1 && value > 1) {
                event.target.value = "0" + value;
            }
            // bounds
            if (value === "00") {
                event.target.value = "01";
            } else if (value > 12) {
                event.target.value = "12";
            }
            // if we have a filled input we jump to the year input
            2 <= event.target.value.length && focusSibling(event.target, "nextElementSibling");
            event.stopImmediatePropagation();
        });

        yearInput.addEventListener('keydown', (event) => {
            // if the year is empty jump to the month input
            if (event.key === "Backspace" && event.target.selectionStart === 0) {
                focusSibling(event.target, "previousElementSibling");
                event.stopImmediatePropagation();
            }
        });

        const inputMatchesPattern = function (e) {
            const {
                value,
                selectionStart,
                selectionEnd,
                pattern
            } = e.target;

            const character = String.fromCharCode(e.which);
            const proposedEntry = value.slice(0, selectionStart) + character + value.slice(selectionEnd);
            const match = proposedEntry.match(pattern);

            return e.metaKey || // cmd/ctrl
                e.which <= 0 || // arrow keys
                e.which == 8 || // delete key
                match && match["0"] === match.input; // pattern regex isMatch - workaround for passing [0-9]* into RegExp
        };

        document.querySelectorAll('input[data-pattern-validate]').forEach(el => el.addEventListener('keypress', e => {
            if (!inputMatchesPattern(e)) {
                return e.preventDefault();
            }
        }));
    </script>
@endsection
