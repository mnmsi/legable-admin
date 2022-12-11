@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <x-breadcrumb title="Information" subtitle="Everything is encrypted here!"
                  buttonText="+ New Info " id="newInformationButton"/>

    <div class="block-wrapper block-min-height content-wrappers" id="informationTypeShowDiv">
        <div class="block-wrapper block-min-height content-wrappers">
            <div class="top-block">
                <div class="conten-items">
                    @foreach($information as $key => $info)
                        <div class="all-contents" id="{{encrypt($info->id)}}">
                            <x-information :info-type-id="encrypt($info->informationType->id)"
                                           :info-type-name="$info->informationType->name"
                                           url="{{asset('image/card/card-icon.svg')}}"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('includes.modal.welcomeCardModal')
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#newInformationButton').click(function () {
                $('#cardModal').modal('show');
            });

            $("#informationTypeShowDiv").sortable({
                animation: 200,
                scroll: true,
                scrollSpeed: 300,
                axis: "x,y",
                classes: {
                    "ui-sortable": "highlight"
                },
                tolerance: "pointer",
                items: ".all-contents",
                update: function () {
                    let order = $("#informationTypeShowDiv").sortable('toArray');
                    console.log(order)
                    local.set('informationIds', order);
                }
            });
        });

        function enterInformation(id) {
            window.location.href = "{{route('information.data', '')}}/" + id;
        }
    </script>
@endsection
