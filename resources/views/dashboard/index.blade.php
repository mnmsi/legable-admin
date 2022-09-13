@extends('layouts.app')
@section('content')
    <div class="page-title-wrapper">
        <div class="page-name-wrapper">
            <h2>Dashboard</h2>
        </div>
        <div class="icon-button-wrapper">
            <p>Everything is encrypted here!</p>
            <a href=""><img src="{{asset("image/dashboard/document.svg")}}" alt="">
                <div>Upload Files</div>
            </a>
        </div>
    </div>
@endsection
