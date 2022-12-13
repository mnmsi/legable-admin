@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <div id="contents">
        <x-breadcrumb title="Drawers" subtitle="Everything is encrypted here!" buttonText="+ Add Drawer "
                      link="/drawer/add"/>
        <div class="block-wrapper block-min-height wrapper-block" id="contents">
            @foreach($drawers as $drawer)
                <div class="all-contents" id="{{$drawer['id']}}">
                    <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="{{$drawer['name']}}"
                            date="{{$drawer['date']}}" :data-drawer="$drawer['id']" :data-drawer-name="$drawer['name']"
                            :id="$drawer['id']"
                            :required-pass="$drawer['password_required']" :drawer-name="$drawer['name']"
                            :type="$drawer['content_type']"/>
                </div>
            @endforeach
        </div>
        {{-- add new button --}}
        <x-add-new-icon id="fileUpload"/>
        {{-- add new button --}}
    </div>

    @include('includes.modal.password',['id'=>'','close_id'=>'','class'=>''])
    @include('includes.modal.addBox')
    @include('includes.modal.fileUploadAjax')
    @include('includes.modal.file_show')

@endsection

@section('script')
    <script src="{{asset("js/content.js")}}"></script>
    <script>
        $(document).ready(function () {
            $(".addBoxCls").on("click", function () {
                $('#addBoxModal').modal('show');
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
                    let order = $("#contents").sortable('toArray');
                    console.log(order)
                    orderDrawer('{{route('drawer.order')}}', order)
                }
            });

            $("#checkPassA").change(function () {
                if ($(this).is(":checked")) {
                    $('#passwordField').show('fast');
                } else {
                    $('#passwordField').hide('fast');
                }
            });
            //    show file name
            $("#fileUpload").on("change", function (e) {
                $(".custom-file-upload").text($(this).val().replace(/C:\\fakepath\\/i, ''));
            })
        })
    </script>
@endsection

