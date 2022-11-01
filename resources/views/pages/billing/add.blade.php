@extends("layouts.app")
@section('style')
    <link rel="stylesheet" href="{{asset("css/select2.min.css")}}">
@endsection
@section('title','Add Payment Card')
@section('content')

    @include('includes.pageHeader',['title'=>'Add Payment Card','list'=>['Dashboard','Add Payment Card'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{-- address form start--}}
        <form action="">
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
                                <label for="email" class="form-label">Email Adress</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       required autocomplete="false" autofocus placeholder="Enter your address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="card_number" class="form-label image_contain_label">Card Number <span class="card_logo_container">
                                        <img src="{{asset("image/plans/master_card_large.svg")}}" alt="image" class="img-fluid">
                                        <img src="{{asset("image/plans/mastercard_logo_large.svg")}}" alt="image" class="img-fluid">
                                    </span></label>
                                <input id="card_number" type="text"
                                       size="16"
                                       class="form-control card_number  @error('card_number') is-invalid @enderror"
                                       name="card_number"
                                       required autocomplete="false" autofocus placeholder="0000 5432 2367 0275">
                                @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="expiry_date" class="form-label">Expiry Date</label>
                                <input id="expiry_date" type="text"
                                       class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date"
                                       required autocomplete="false" autofocus placeholder="month/year">
                                @error('expiry_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="cvc" class="form-label">CVC</label>
                                <input id="cvc" type="text"
                                       class="form-control @error('cvc') is-invalid @enderror" name="cvc"
                                       required autocomplete="false" autofocus placeholder="321">
                                @error('cvc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </script>
@endsection
