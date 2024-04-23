@extends("layouts.app")
@section('style')
    <link rel="stylesheet" href="{{asset("css/select2.min.css")}}">
@endsection
@section('title','Add Payment Card')
@section('content')

    @include('includes.pageHeader',['title'=>'Add Payment Card','list'=>['Dashboard','Add Payment Card'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{-- address form start--}}
        <form action="{{route('billing.card.store')}}" method="post">

            @csrf

            {{--address page header start --}}
            <div class="address_header">
                <h2 class="address_form_title">Add Payment Card</h2>
                <p>Add Your Payment Card</p>
            </div>
            {{--address page header end --}}
            {{-- Input start --}}
            <div class="row">
                <div class="address_input_wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="email" class="form-label">Card Holder Name</label>
                                <input id="email" type="text"
                                       value="{{old('name')}}"
                                       class="form-control @error('email') is-invalid @enderror" name="name"
                                       required autocomplete="false" autofocus placeholder="Enter name">
                                @include('components.utils.form_field_alert', ['name' => 'name'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="card_number" class="form-label image_contain_label">Card Number <span
                                        class="card_logo_container">
                                        <img src="{{asset("image/plans/master_card_large.svg")}}" alt="image"
                                             class="img-fluid">
                                        <img src="{{asset("image/plans/mastercard_logo_large.svg")}}" alt="image"
                                             class="img-fluid">
                                    </span></label>
                                <input id="card_number" type="text"
                                       size="16"
                                       maxlength="20"
                                       value="{{old('number')}}"
                                       class="form-control card_number  @error('number') is-invalid @enderror"
                                       name="number"
                                       required autocomplete="false" autofocus placeholder="0000 5432 2367 0275">
                                @include('components.utils.form_field_alert', ['name' => 'number'])
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-4">
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
                                           class="exp form-control @error('expiry_date') is-invalid @enderror" id="year"
                                           maxlength="4" pattern="[0-9]*" inputmode="numerical" placeholder="YYYY"
                                           type="text" data-pattern-validate
                                           name="exp_year"/>
                                </div>
                                @include('components.utils.form_field_alert', ['name' => 'exp_month'])
                                @include('components.utils.form_field_alert', ['name' => 'exp_year'])
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="cvc" class="form-label">CVC</label>
                                <input id="cvc" type="number"
                                       autocomplete="off"
                                       class="form-control @error('cvc') is-invalid @enderror" name="cvc"
                                       required autofocus placeholder="321"
                                       pattern="[0-9]*" inputmode="numerical" maxlength="4">
                                @include('components.utils.form_field_alert', ['name' => 'cvc'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="address_submit_wrapper">
                                <a href="">Cancel</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="address_submit_wrapper">
                                <button type="submit">Add Card</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Input end --}}
        </form>
        {{-- address form end--}}
    </div>
@endsection
@section("script")
    <script>
        $("#card_number").on("change keyup paste", function () {
            let foo = $(this).val().replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
            $(this).val(foo);
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
