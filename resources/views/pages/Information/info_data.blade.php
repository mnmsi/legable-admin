@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <x-breadcrumb title="Information" subtitle="Everything is encrypted here!"/>

    <div class="block-wrapper block-min-height content-wrappers">
        <div class="block-wrapper block-min-height content-wrappers">
            <div class="top-block">
                <div class="conten-items">
                    @foreach($infoTypeData as $key => $info)
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
        function getInformationData(id) {
            $('#file_show').modal('show');

            /*$.ajax({
                url: "{{route('information.item')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function (data) {
                    $('#file_show').modal('show');
                    $('#file_show .modal-body').html(data);
                }
            });*/
        }
    </script>
@endsection
