@extends("layouts.app")
@section('style')
    <link rel="stylesheet" href="{{asset("css/select2.min.css")}}">
@endsection
@section('title','Add new address')
@section('content')

    @include('includes.pageHeader',['title'=>'Account Settings','list'=>['Dashboard','Account Settings'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{-- address form start--}}
        <form action="{{route('user.address.store')}}" method="post">
            @csrf

            {{--address page header start --}}
            <div class="address_header">
                <h2 class="address_form_title">Add Address</h2>
                <p>Add your address</p>
            </div>
            {{--address page header end --}}
            {{-- Input start --}}
            <div class="row">
                <div class="address_input_wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="address_line_one" class="form-label">Address Line 1</label>
                                <input id="address_line_one" type="text"
                                       class="form-control @error('address_line_one') is-invalid @enderror" name="address_line_one"
                                       required autocomplete="false" autofocus placeholder="Enter your address" value="{{ old('address_line_one') }}">
                                @include('components.utils.form_field_alert', ['name' => 'address_line_one'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="address_line_two" class="form-label">Address Line 2</label>
                                <input id="address_line_two" type="text"
                                       class="form-control @error('address_line_two') is-invalid @enderror" name="address_line_two"
                                       autocomplete="false" autofocus placeholder="Enter your address" value="{{ old('address_line_two') }}">
                                @include('components.utils.form_field_alert', ['name' => 'address_line_two'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="country" class="form-label">Select Country</label>
                                <select name="country" id="country" class="form-control country-select" required >
                                    <option value="">Country</option>
                                    @foreach($countries as $country)
{{--                                        <option value="{{$country['id']}}">{{$country['name']}}</option>--}}
                                        <option value="{{$country['id']}}" {{ old($country['id']) == $country['id'] ? 'selected' : null}}>{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                @include('components.utils.form_field_alert', ['name' => 'country'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="city" class="form-label">City</label>
                                <input id="city" type="text"
                                       value="{{ old('city') }}"
                                       class="form-control @error('city') is-invalid @enderror" name="city"
                                       required autocomplete="false" autofocus placeholder="Enter your city">
                                @include('components.utils.form_field_alert', ['name' => 'city'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="region" class="form-label">Region</label>
                                <input id="region" type="text"
                                       class="form-control @error('region') is-invalid @enderror" name="region"
                                       required autocomplete="false" autofocus placeholder="Enter your region" value="{{ old('region') }}">
                                @include('components.utils.form_field_alert', ['name' => 'region'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="zip" class="form-label">Zip Code</label>
                                <input onkeypress="return /[0-9]/i.test(event.key)"  id="zip" type="text"
                                       class="form-control @error('zip') is-invalid @enderror" name="zip"
                                       required autocomplete="false" autofocus placeholder="Enter your zip code" value="{{ old('zip') }}">
                                @include('components.utils.form_field_alert', ['name' => 'zip'])
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="address_submit_wrapper">
                                <a href="{{route('acc.setting')}}">Cancel</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="address_submit_wrapper">
                                <button type="submit">Add Address</button>
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
