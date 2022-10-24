@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <x-breadcrumb id="openPopup" title="Dashboard" subtitle="Everything is encrypted here!"
                  buttonIcon="{{ asset('image/dashboard/document.svg') }}" buttonText="Upload Files" id="dashmodalid"/>
    {{-- page content start --}}
    <div class="block-min-height block-wrapper">
        <div class="row mb-5 mt-4">
            <div class="col-lg-9">
                {{-- ligable welcome bar start --}}
                @include('components.welcomeCard')
                {{-- ligable welcome bar end --}}
                {{-- qick access --}}

                <div class="row mt-5">
                    <h2 class="dashboard-section-title mb-4">Suggested</h2>
                    @foreach($drawers as $drawer)
                        <div class="col-lg-4 col-6">
                            <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="{{$drawer['name']}}"
                                    date="{{$drawer['date']}}"/>
                        </div>
                    @endforeach
                </div>
                {{-- qick access --}}
            </div>
            <div class="col-lg-3 px-4 border-start">
                {{-- Keep your data safe --}}
                <div class="keep-data-safe-wrapper">
                    <div class="keep-data-safe-content">
                        <div class="keep-safe-header">
                            <div>Keep your data safe</div>
                            <div>1/3</div>
                        </div>
                        {{-- safe data single  slider card start --}}
                        <div class="safe-slider-card">
                            <div class="slider-card-text">your files are synced, backed up, and always encrypted.</div>
                            <div class="slider-card-image-wrapper">
                                <img src="{{ asset('image/dashboard/dashboard-slider-card.svg') }}" alt="card"
                                     class="img-fluid">
                            </div>
                        </div>
                        {{-- safe data single  slider card end --}}
                        {{-- devider --}}

                    </div>
                </div>
                {{-- Keep your data safe --}}
                <div class="border my-lg-5 my-0 d-lg-block d-none"></div>
                {{-- hep center card --}}
                <div class="help-center-card-wrapper">
                    <div class='help-center-card-content-wrapper'
                         style="background-image: url('{{ asset('image/dashboard/helpCard.svg') }}')">
                        <div class="help-center-question-mark">
                            <img src="{{ asset('image/dashboard/question.svg') }}" alt="question">
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
            {{-- document only visible phone --}}
            <div class="res-recently-open-dock-wrapper">
                <div class="mb-4 mt-2">
                    <x-section-title title="Recently Opened"/>
                </div>
                <x-document icon="{{ asset('image/document/Word.svg') }}" name="Projects.docx" date="Novemaber 22.2020"
                            size="300kb"/>
                <x-document icon="{{ asset('image/document/image.svg') }}" name="Images.png" date="Novemaber 22.2020"
                            size="300kb"/>
            </div>
            {{-- document only visible phone --}}
            {{-- add new button --}}
            <x-add-new-icon id="createNew"/>
            {{-- add new button --}}
        </div>
    </div>
    @include('includes.modal.fileUpload')
    @include('includes.modal.addBox')
    @include('includes.modal.welcomeCardModal')
    @include('includes.offcanvas.new-offcanvas')
    @include('includes.offcanvas.new-information')
    {{-- page content end --}}
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            //upload file
            $('#dashmodalid').on('click', function () {
                $('#uploadFile').modal('show');
            });

            //create box
            $('#dashCreateBox').on('click', function () {
                $('#addBoxModal').modal('show');
            });

            //new info
            $('#newInfo').on('click', function () {
                $('#cardModal').modal('show');
            });

            //hide all modal
            $('#addBoxModalClose,#addBoxModalClose,#infoModalClose').on('click', function () {
                $('#uploadFile').modal('hide');
                $('#addBoxModal').modal('hide');
                $('#cardModal').modal('hide');
            });

            //open new functionality

            $("#createNew").on("click", function () {
                $('#newOffcanvas').offcanvas('show');
                $('#closeNewOffcanvas').offcanvas('hide');
            });
            $("#openNewInfo").on("click", function () {
                $('#newOffcanvas').offcanvas('hide');
                $("#informationOfCanvas").offcanvas('show');
            });

            @if ($errors->any())
                $('#uploadFile').modal('show');
            @endif
        })
    </script>
@endsection
