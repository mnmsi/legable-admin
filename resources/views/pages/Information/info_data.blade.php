@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <x-breadcrumb title="Information" subtitle="Everything is encrypted here!"/>

    <div class="block-wrapper block-min-height content-wrappers">
        <div class="block-wrapper block-min-height content-wrappers">
            <div class="top-block">
                <div class="conten-items">
                    @foreach($information as $key => $info)
                        <div class="all-contents" id="{{encrypt($info->id)}}">
                            <x-information-data :id="encrypt($info->id)"
                                                url="{{asset('image/content/demo1.svg')}}"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('includes.modal.file_show')
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#fileShowModal').on('hidden.bs.modal', function () {
                $('#allTypeContent').attr('src', '');
                $('#informationDiv').html('');
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
