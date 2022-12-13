@extends('layouts.app')
@section('title','All Contents')
@section('content')
    <div class="content-page">
        <div id="contents">
            @include('components.contents.content', ['showBtn' => false])
        </div>
    </div>
    @include('includes.modal.password',['id'=>'','close_id'=>'','class'=>''])
    @include('includes.modal.file_show')
    @include('includes.modal.addBox')
    @include('includes.modal.fileUploadAjax')
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#addboxid').on('click', function () {
                $('#addBoxModal').modal('show');
            });

            $('#pageModalClose, #addBoxModalClose').on('click', function () {
                $('#pageModal').modal('hide');
                $('#addBoxModal').modal('hide');
            });

            $("#contents").sortable({
                animation: 200,
                // dropOnEmpty: false,
                scroll: true,
                scrollSpeed: 300,
                axis: "x,y",
                classes: {
                    "ui-sortable": "highlight"
                },
                tolerance: "pointer",
                items: ".all-contents",
                update: function () {
                    var order = $("#contents").sortable('toArray');
                    orderDrawer('{{route('drawer.order')}}', order)
                }
            });
        })
    </script>
@endsection

