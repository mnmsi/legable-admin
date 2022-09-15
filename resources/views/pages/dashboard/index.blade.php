@extends('layouts.app')
@section('content')
    <x-breadcrumb id="openPopup" title="Dashboard" subtitle="Welcome, IOTA Infotech Limited 👋 "
                  buttonIcon="{{asset('image/dashboard/document.svg')}}" buttonText="Upload Files"/>
    {{--    page content start--}}
    <div class="block-min-height block-wrapper">
        <div class="row mb-5 mt-4">
            <div class="col-lg-9">
                {{-- ligable welcome bar start--}}
                @include("components.welcomeCard")
                {{-- ligable welcome bar end --}}
                {{-- qick access--}}

                <div class="row mt-5">
                    <h2 class="dashboard-section-title mb-4">Suggested</h2>
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
                        <x-card id="card-1" icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                                date="Sep 25, 2022, 13:25 PM"/>
                    </div>
                    <div class="col-lg-4">
                        <x-card id="card-3" icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                                date="Sep 25, 2022, 13:25 PM"/>
                    </div>
                    <div class="col-lg-4">
                        <x-card id="card-2" icon="{{asset('image/card/card-icon.svg')}}" title=" Document"
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
                            <div class="slider-card-image-wrapper">
                                <img src="{{asset('image/dashboard/dashboard-slider-card.svg')}}" alt="card">
                            </div>
                        </div>
                        {{--    safe data single  slider card end --}}
                        {{-- devider --}}

                    </div>
                </div>
                {{-- Keep your data safe --}}
                <div class="border my-5"></div>
                {{--   hep center card--}}
                <div class="help-center-card-wrapper">
                    <div class='help-center-card-content-wrapper'
                         style="background-image: url('{{asset('image/dashboard/helpCard.svg')}}')">
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
    </div>

    {{--    page content end--}}
@endsection
