@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <div id="informationType">
        <x-breadcrumb title="Information" subtitle="Everything is encrypted here!"/>
        <div class="block-wrapper block-min-height content-wrappers informationTypeShowDivCls"
             id="informationTypeShowDiv">
            <div class="block-wrapper block-min-height content-wrappers">
                <div class="top-block">
                    <div class="conten-items">
                        @foreach($information as $key => $info)
                            <div class="all-contents" id="{{encrypt($info->id)}}">
                                <x-information-data :id="encrypt($info->id)"
                                                    :name="$info->name"
                                                    url="{{asset('image/content/demo1.svg')}}"/>
                            </div>
                        @endforeach
                    </div>
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
                    let order = $("#informationTypeShowDiv").sortable('toArray');
                    console.log(order)
                    // local.set('informationIds', order);
                }
            });
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
