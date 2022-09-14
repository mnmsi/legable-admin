@extends("layouts.app")
@section('content')
    @include('includes.pageHeader',['title'=>'My Devices','list'=>['Dashboard','My Device'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        <div class="add-device-wrapper">
            <h2 class="add-device-title">Total Active Sessions (2)</h2>
        </div>
        {{--  main page content--}}
        <div class="row align-items-stretch">
            <div class="col-lg-5">
                <div class="single-card-wrapper">
                    <div class="device-card-content-wrapper">
                        <div class="device-icon-wrapper">
                            <img src="{{asset("image/device/device.svg")}}" alt="">
                        </div>
                        <div class="device-card-content">
                            <div class="device-name">Windows PC (This Device)</div>
                            <div class="device-location">Dhaka, Bangladsh</div>
                            <p class="logged-date">Logged in till January 20, 2022</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="single-card-wrapper">
                    <div class="device-card-content-wrapper">
                        <div class="device-icon-wrapper">
                            <img src="{{asset("image/device/phone.svg")}}" alt="">
                        </div>
                        <div class="device-card-content">
                            <div class="device-name">iPhone 13 Pro</div>
                            <div class="device-location">Dhaka, Bangladsh</div>
                            <div class="logout-device-button">
                                <a href="#">Remove this device</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--  main page end--}}
    </div>
@endsection
