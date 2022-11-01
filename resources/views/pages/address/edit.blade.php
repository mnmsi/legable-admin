@extends("layouts.app")
@section('style')
    <link rel="stylesheet" href="{{asset("css/select2.min.css")}}">
@endsection
@section('title','Add new address')
@section('content')

    @include('includes.pageHeader',['title'=>'Account Settings','list'=>['Dashboard','Account Settings'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{-- address form start--}}
        <form action="">
            <div class="address_header">
                <h2 class="address_form_title">Edit Address</h2>
                <p>edit and update your address</p>
            </div>
            {{-- Input start --}}
            <div class="row">
                <div class="address_input_wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="address_line_one" class="form-label">Address Line 1</label>
                                <input id="address_line_one" type="text"
                                       class="form-control @error('address_line_one') is-invalid @enderror" name="address_line_one"
                                       required autocomplete="false" autofocus placeholder="Enter your zip code">
                                @error('address_line_one')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="address_line_two" class="form-label">Address Line 2</label>
                                <input id="address_line_two" type="text"
                                       class="form-control @error('address_line_two') is-invalid @enderror" name="address_line_two"
                                       required autocomplete="false" autofocus placeholder="Enter your address">
                                @error('address_line_two')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="address_line_two" class="form-label">Select Country</label>
                                <select name="" id="" class="form-control country-select">
                                    <option value="" selected>Country</option>
                                    <option value="bn">Bangladesh</option>
                                </select>
                                @error('address_line_two')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="city" class="form-label">City</label>
                                <input id="city" type="text"
                                       class="form-control @error('city') is-invalid @enderror" name="city"
                                       required autocomplete="false" autofocus placeholder="Enter your city">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="region" class="form-label">Region</label>
                                <input id="region" type="text"
                                       class="form-control @error('region') is-invalid @enderror" name="region"
                                       required autocomplete="false" autofocus placeholder="Enter your region">
                                @error('region')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="zip" class="form-label">Zip Code</label>
                                <input id="zip" type="text"
                                       class="form-control @error('zip') is-invalid @enderror" name="zip"
                                       required autocomplete="false" autofocus placeholder="Enter your zip code">
                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="address_submit_wrapper">
                                <button type="submit">Update Address</button>
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
    <script src="{{asset("js/select2.min.js")}}"></script>
    <script>
        $(document).ready(function() {
            $('.country-select').select2({
                placeholder: 'Select an option',
            });
        });
    </script>
@endsection
