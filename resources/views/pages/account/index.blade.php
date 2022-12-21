@extends("layouts.app")
@section('title','Account Settings')
@section('content')
    @include('includes.pageHeader',['title'=>'Account Settings','list'=>['Dashboard','Account Settings'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{--        main page content--}}
        {{--        title bar start--}}
        <div class="account-page-title-wrapper">
            <div class="account-page-title">
                <p>Personal Information's</p>
            </div>
            <div class="account-edit-icon">
                <a href="{{route("user.edit")}}">
                    <img src="{{asset("image/common/edit.svg")}}" alt="edit"
                         class="img-fluid">
                </a>
            </div>
        </div>
        {{--        title bar end--}}
        {{--        address start--}}
        <div class="row address-container">
            <div class="col-md-12 col-lg-5">
                <div class="account-settings-content">
                    <label>Name</label>
                    <div class="change-name-content">
                        <p>{{$user['name']}}</p>
                        <div class="change-text">verified</div>
                    </div>
                </div>
                <div class="account-settings-content">
                    <label>Phone Number</label>
                    <div class="change-content-wrapper">
                        <p>{{$user['phone']}}</p>
                        <div class="change-text">{{$phone_verification_status}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="account-settings-content">
                    <label>Email Address</label>
                    <div class="change-content-wrapper">
                        <p>{{$user['email']}}</p>
                        <div class="change-text">{{$email_verification_status}}</div>
                    </div>
                </div>
            </div>
        </div>
        {{--        address end--}}
        {{--        title bar start--}}
        <div class="account-page-title-wrapper mt-5">
            <div class="account-page-title">
                <p>Address</p>
            </div>
            <div class="account-edit-icon">
                @if(!is_null($edit_address))
                    <a href="{{route('user.address.edit', $edit_address)}}"><img
                            src="{{asset("image/common/edit.svg")}}" alt="edit" class="img-fluid"></a>
                @endif
            </div>
            <div class="create-account-button">
                <a href="#"><img src="{{asset("image/common/squire-add.svg")}}" alt="edit" class="img-fluid"></a>
            </div>
        </div>
        {{--  title bar end--}}
        <div class="row align-items-stretch mt-3">
            @foreach($addresses as $key => $address)
                <div class="col-lg-4 pe-lg-4 mb-4">
                    <div class="single-address-box">
                        <div class="single-address-box-content-wrapper">
                            <div class="single-address-box-header">
                                <div class="address-title">Address {{$key + 1}}</div>
                                @if($address['status'])
                                    <div>
                                        <img src="{{asset("image/common/golden-sign.svg")}}" alt="image"
                                             class="img-fluid">
                                    </div>
                                @else
                                    <a href="{{route('user.address.active', $address['id'])}}">
                                        <img src="{{asset("image/billing/ellipse_outlined.svg")}}" alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="address-box-content">
                                <p>{{$address['full_address']}}</p>
                            </div>
                            <a href="#" class="edit-address-button">Edit Address</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-4  pe-lg-4 mb-4">
                <a href="{{route("user.address.add")}}" class="text-decoration-none">
                    <div class="single-address-box add-new-box">
                        <div class="address-box-add-content">
                            <div class="add-new-button">
                                <img src="{{asset("image/common/squire-add.svg")}}" alt="add">
                            </div>
                            <p>Add New Address</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{--  main page end--}}
    </div>
@endsection
