@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <x-breadcrumb title="Information" subtitle="Everything is encrypted here!"
                  buttonText="+ New Info " id="newInformationButton"/>

    <div class="block-wrapper block-min-height content-wrappers" id="informationTypeShowDiv">
        <div class="block-wrapper block-min-height content-wrappers">
            <div class="top-block">
                <div class="conten-items" id="contentsDivId">
                    {{--                    @foreach($information as $key => $info)--}}
                    {{--                        <div class="all-contents" id="{{$info->id}}">--}}
                    {{--                            <x-information :info-type-id="encrypt($info->informationType->id)"--}}
                    {{--                                           :info-type-name="$info->informationType->name"--}}
                    {{--                                           url="{{asset('image/card/card-icon.svg')}}"/>--}}
                    {{--                        </div>--}}
                    {{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>

    @include('includes.modal.welcomeCardModal')
@endsection
@section('script')
    <script src="{{asset('js/localStorage.js')}}"></script>
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
                    local.set('informationIds', $("#informationTypeShowDiv").sortable('toArray'));
                }
            });

            let informationHtml = '';
            let informationIds = local.get('informationIds');
            let informationData = <?= json_encode($information); ?>;
            let filterInformationData = [];

            if (!informationIds) {
                filterInformationData = informationData;
            } else {
                for (let infoId in informationIds) {
                    filterInformationData.push(informationData.find(info => info.id.toString() === informationIds[infoId]))
                }

                filterInformationData = filterInformationData.concat(informationData.filter(function (information) {
                    return !informationIds.includes(information.id.toString());
                }));
            }

            for (let info of filterInformationData) {
                informationHtml += '<div class="all-contents" id="' + info.id + '">';
                informationHtml += '<div class="content-block text-truncate" id="' + info.information_type.id + '" data-info-type-name="' + info.information_type.name + '" onclick="enterInformation(' + info.id + ')">';
                informationHtml += '<img src="{{asset('image/card/card-icon.svg')}}" alt="" class="img-fluid"/>';
                informationHtml += '<h2 class="sub-header2 info-title mb-0">' + info.information_type.name + '</h2>';
                informationHtml += '</div></div>';
            }

            $("#contentsDivId").html(informationHtml);
        });

        function enterInformation(id) {
            window.location.href = "{{route('information.data', '')}}/" + id;
        }
    </script>
@endsection
