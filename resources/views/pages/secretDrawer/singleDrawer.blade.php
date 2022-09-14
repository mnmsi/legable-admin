@extends('layouts.app')
@section('content')
    @include('includes.pageHeader',['title'=>'Important','list'=>['Dashboard','Drawers','Important'],'btn'=>['id'=>'addboxid','text'=>'+ Add Box'],'link'=>['url'=>'/drawer/upload','text'=>'Upload File']])
    <div class="block-wrapper block-min-height content-wrappers">
        <div class="top-block">
            <h6 class="sub-header6 mb-4">
                Drawers
            </h6>
            <div class="conten-items">
                <x-drawer title="Most Important" url="{{asset('image/card/card-icon.svg')}}" id="drawerid" />
                <x-drawer title="Documents" url="{{asset('image/card/card-icon.svg')}}" id="drawerid2" />
                <x-drawer title="Videos" url="{{asset('image/card/card-icon.svg')}}" id="drawerid3" />
            </div>
        </div>
        <div class="bottom-block">
            <h6 class="sub-header6 mb-4 border-bottom pb-3 mt-4">
                All Contents
            </h6>
            <div class="conten-items">
                <x-content title="Certificate" url="{{asset('image/content/demo1.svg')}}" id="contentid" />
                <x-content title="Contract Fom" url="{{asset('image/content/demo1.svg')}}" id="contentid2"/>
                <x-content title="goNDA - Notes" url="{{asset('image/content/demo1.svg')}}" id="contentid3"/>
                <x-content title="Legable concept" url="{{asset('image/content/demo1.svg')}}" id="contentid4"/>
            </div>
        </div>
    </div>
    @include('includes.modal.password',['id'=>'','close_id'=>'','class'=>''])
    @include('includes.modal.addBox')
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#drawerid,#drawerid2,#drawerid3').on('click', function () {
                $('#pageModal').removeClass('content-modal');
                $('#pageModal').modal('show');
            });

            $('#contentid,#contentid2,#contentid3,#contentid4').on('click', function () {

                $('#pageModal').addClass('content-modal');
                $('#pageModal').modal('show');
            });

            $('#addboxid').on('click', function () {
                $('#addBoxModal').modal('show');
            });

            $('#pageModalClose,addBoxModalClose').on('click', function () {
                $('#pageModal').modal('hide');
                $('#addBoxModal').modal('hide');
            });
        })
    </script>
@endsection
