@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Dashboard" subtitle="Welcome, IOTA Infotech Limited 👋 "
                  buttonIcon="{{asset('image/dashboard/document.svg')}}" buttonText="Upload Files"/>
    {{--    page content start--}}
    {{--    qick access--}}
    <div class="row mt-5">
        <div class="col-lg-4">
            <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        </div>
        <div class="col-lg-4">
            <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        </div>
        <div class="col-lg-4">
            <x-card icon="{{asset('image/card/card-icon.svg')}}" title=" Document" date="Sep 25, 2022, 13:25 PM"/>
        </div>

    </div>
    {{--    qick access--}}
    {{--    page content end--}}
@endsection
