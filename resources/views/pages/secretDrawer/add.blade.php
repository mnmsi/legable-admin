@extends('layouts.app')
@section('content')
    <div class="page-title-wrapper">
        <div class="page-name-wrapper">
            <h2>Create a Drawer</h2>
        </div>
        <div class="icon-button-wrapper">
            <p>Newly created drawer will be protected by security key</p>
        </div>
    </div>
    <div class="row block-wrapper drawer-add-wrapper all-form-wrapper">
        <div class="col-lg-6 items-block">
            <h5 class="sub-header5">Secret Drawer</h5>
            <div class="mb-3">
                <label for="dName" class="form-label">Drawer Name</label>
                <input type="email" class="form-control" id="dName" placeholder="Enter drawer name">
            </div>
            <div class="mb-3">
                <label for="dPass" class="form-label">Password</label>
                <input type="password" class="form-control" id="dPass" placeholder="Enter security key">
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="checkPass" checked>
                <label class="form-check-label" for="checkPass">Requires Password</label>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Create Drawer</button>
            </div>
        </div>
        <div class="col-lg-6 items-block">
            <img src="{{asset('/image/drawer/drawerLock.svg')}}" alt="" class="img-fluid">
            <h5>Zero knowledge Architecture</h5>
            <p>Legable Cloud should never be about trust. What’s yours is yours. Unlike mainstream cloud providers, we can
                never see your contents or know what you store on your cloud. Don’t take our word for it – zero-knowledge
                architecture makes that a fact.</p>

        </div>
    </div>
@endsection

