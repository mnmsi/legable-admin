@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Dashboard" subtitle="Welcome, IOTA Infotech Limited 👋 "
                  buttonIcon="{{asset('image/dashboard/document.svg')}}" buttonText="Upload Files"/>
    {{--    page content start--}}
    <div class="row mb-5 mt-4">
        <div class="col-lg-9">
            {{-- ligable welcome bar start--}}
            @include("components.welcomeCard")
            {{-- ligable welcome bar end --}}
            {{--    qick access--}}
            <div class="row mt-5">
                <div class="col-lg-4">
                    <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                            date="Sep 25, 2022, 13:25 PM"/>
                </div>
                <div class="col-lg-4">
                    <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                            date="Sep 25, 2022, 13:25 PM"/>
                </div>
                <div class="col-lg-4">
                    <x-card icon="{{asset('image/card/card-icon.svg')}}" title=" Document"
                            date="Sep 25, 2022, 13:25 PM"/>
                </div>

            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                            date="Sep 25, 2022, 13:25 PM"/>
                </div>
                <div class="col-lg-4">
                    <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                            date="Sep 25, 2022, 13:25 PM"/>
                </div>
                <div class="col-lg-4">
                    <x-card icon="{{asset('image/card/card-icon.svg')}}" title=" Document"
                            date="Sep 25, 2022, 13:25 PM"/>
                </div>

            </div>
            {{--    qick access--}}
        </div>
        <div class="col-lg-3 px-4 border-start">
            {{-- Keep your data safe --}}
            <div class="keep-data-safe-wrapper">
                <div class="keep-data-safe-content">
                    <div class="keep-safe-header">
                        <div>Keep your data safe</div>
                        <div>1/3</div>
                    </div>
                    {{--    safe data single  slider card start --}}
                    <div class="safe-slider-card">
                        <div class="slider-card-text">your files are synced, backed up, and always encrypted.</div>
                        <img src="{{asset('image/dashboard/dashboard-slider-card.svg')}}" alt="card">
                    </div>
                    {{--    safe data single  slider card end --}}
                    {{-- devider --}}

                </div>
            </div>
            {{-- Keep your data safe --}}
            <div class="border my-5"></div>
            {{--   hep center card--}}
            <div class="help-center-card-wrapper">
                <div class='help-center-card-content-wrapper'>
                    <div class="help-center-question-mark">
                        <img src="{{asset("image/dashboard/question.svg")}}" alt="question">
                    </div>
                    <div class="help-card-content">
                        <h2>Help Center</h2>
                        <p>Having Trouble in Legable.
                            Please contact us for get supported.</p>
                    </div>
                    <div class="help-card-footer">
                        <a href="#">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    page content end--}}
@endsection
