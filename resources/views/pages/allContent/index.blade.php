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
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#addboxid').on('click', function () {
                $('#addBoxModal').modal('show');
            });
            $('#pageModalClose,addBoxModalClose').on('click', function () {
                $('#pageModal').modal('hide');
                $('#addBoxModal').modal('hide');
            });
        })
    </script>
    <script src="{{asset('js/content.js')}}"></script>
@endsection

