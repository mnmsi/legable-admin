@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Create a Drawer" subtitle="Newly created drawer will be protected by security key "/>
    <div class="row block-wrapper drawer-add-wrapper all-form-wrapper block-min-height">
        <div class="col-lg-6 items-block">
            <form action="{{route('drawer.create')}}" method="POST">
                @csrf

                <h5 class="sub-header5 mb-4">Secret Drawer</h5>
                <div class="mb-3">
                    <label for="dName" class="form-label">Drawer Name</label>
                    <input type="text" class="form-control" id="dName" name="drawer_name"
                           placeholder="Enter drawer name" value="{{old('drawer_name')}}">
                    @include('components.utils.form_field_alert', ['name' => 'drawer_name'])
                </div>
                <div class="mb-3">
                    <label for="dPass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="dPass" name="drawer_password"
                           placeholder="Enter security key" value="{{old('drawer_password')}}">
                    @include('components.utils.form_field_alert', ['name' => 'drawer_password'])
                </div>
                <div class="form-check form-switch d-flex justify-content-end">
                    <input class="form-check-input" type="checkbox" id="checkPass" name="password_required" checked>
                    <label class="form-check-label ms-3" for="checkPass">Requires Password</label>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary my-4 submit-btn">Create Drawer</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 items-block">
            <div class="add-wrap-right">
                <img src="{{asset('/image/drawer/drawerLock.svg')}}" alt="" class="img-fluid">
                <h5>Zero knowledge Architecture</h5>
                <p>Legable Cloud should never be about trust. What’s yours is yours. Unlike mainstream cloud providers,
                    we can
                    never see your contents or know what you store on your cloud. Don’t take our word for it –
                    zero-knowledge
                    architecture makes that a fact.</p>
            </div>
        </div>
    </div>
@endsection

