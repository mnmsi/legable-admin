@extends("layouts.app")
@section('content')
    @section('title','Search')
    <x-breadcrumb title="Dashboard" subtitle="Welcome, IOTA Infotech Limited 👋 "
                  buttonIcon="{{asset('image/dashboard/document.svg')}}" buttonText="Upload Files"/>
    {{--    page content start--}}
    <div class="search-page-wrapper block-min-height">
        <div class="search-image-wrapper">
            <img src="{{asset("image/dashboard/empty-folder.svg")}}" alt="" class="img-fluid" loading="lazy">
        </div>
        <div class="search-empty-instruction">
            <p>looks like you didn’t create any drawer yet!</p>
            <a href="#"><img src="{{asset("image/dashboard/add-folder.svg")}}" alt="" class="img-fluid" loading="lazy">
                Try
                Adding One
            </a>
        </div>
    </div>
    {{--    page content end--}}
@endsection
