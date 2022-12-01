@extends('layouts.app')
@section('title','Drawers')
@section('content')
    <div id="contents">
        <x-breadcrumb title="Drawers" subtitle="Everything is encrypted here!" buttonText="+ Add Drawer "
                      link="/drawer/add"/>
        <div class="block-wrapper block-min-height wrapper-block" id="secretDrawer">
            @foreach($drawers as $drawer)
                <div class="drawerDownload" id="{{$drawer['id']}}">
                    <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="{{$drawer['name']}}"
                            date="{{$drawer['date']}}" :data-drawer="$drawer['id']" :data-drawer-name="$drawer['name']"
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
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".addBoxCls").on("click", function () {
                $('#addBoxModal').modal('show');
            });

            $("#secretDrawer").sortable({
                animation: 200,
                // dropOnEmpty: false,
                scroll: true,
                scrollSpeed: 300,
                axis: "x,y",
                classes: {
                    "ui-sortable": "highlight"
                },
                tolerance: "pointer",
                items: ".drawerDownload",
                update: function () {
                    var order = $("#secretDrawer").sortable('toArray');
                    orderDrawer('{{route('drawer.order')}}', order)
                }
            });
        })
    </script>
@endsection

