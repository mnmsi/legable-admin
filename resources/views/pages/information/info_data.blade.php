@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <div id="informationType">
        <x-breadcrumb title="Information" subtitle="Everything is encrypted here!"/>
        <div class="block-wrapper block-min-height content-wrappers informationTypeShowDivCls"
             id="informationTypeShowDiv">
            <div class="block-wrapper block-min-height content-wrappers">
                <div class="top-block">
                    <div class="conten-items" id="contentsDivId"></div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.modal.file_show')
@endsection
@section('script')
    <script src="{{asset("js/localStorage.js")}}"></script>
    <script>
        $(document).ready(function () {

            $('#fileShowModal').on('hidden.bs.modal', function () {
                $('#allTypeContent').attr('src', '');
                $('#informationDiv').html('');
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
                    local.set('informationDataIds', $("#informationTypeShowDiv").sortable('toArray'));
                }
            });

            let informationDataHtml = '';
            let informationDataIds = local.get('informationDataIds');
            let informationData = <?= json_encode($information); ?>;
            let filterInformationData = [];

            if (!informationDataIds) {
                filterInformationData = informationData;
            } else {
                for (let infoId in informationDataIds) {
                    let data = informationData.find(info => info.id.toString() === informationDataIds[infoId]);
                    if (data !== undefined) {
                        filterInformationData.push(data);
                    }
                }

                filterInformationData = filterInformationData.concat(informationData.filter(function (information) {
                    return !informationDataIds.includes(information.id.toString());
                }));
            }

            for (let info of filterInformationData) {
                informationDataHtml += '<div class="all-contents" id="' + info.id + '">';
                informationDataHtml += '<div class="content-block-2 text-decoration-none" id="' + info.id + '" onclick="getInformationData(' + info.id + ')">';
                informationDataHtml += '<img src="{{asset('image/thumb/information.svg')}}" alt="" class="img-fluid top-icon"/>';
                informationDataHtml += '<div class="footer-item">';
                informationDataHtml += '<p>' + info.name + '</p>';
                informationDataHtml += '</div></div></div>';
            }

            $("#contentsDivId").html(informationDataHtml);
        });

        function getInformationData(id) {
            $("#allTypeContent").hide();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('information.show', '')}}/" + id,
                type: "POST",
                data: {
                    "id": id
                },
                success: function (data) {

                    if (data.status) {
                        $('#infoName').html(data.name);
                        $('#informationDiv').html(data.information);
                    } else {
                        showAjaxMessageOnDivById('statusDiv', 'danger', data.msg)
                    }

                    $('#fileShowModal').modal('show');
                },
                error: function (error) {
                    showAjaxMessageOnDivById('statusDiv', 'danger', error.responseJSON.msg)
                }
            });
        }
    </script>
@endsection
