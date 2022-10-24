@extends('layouts.app')
@section('title','All Contents')

@section('content')
    <div class="content-page">
        @include('includes.pageHeader',['title'=>'All Contents','list'=>['Dashboard','All Contents'],'btn'=>[],'link'=>['url'=>'/file/upload','text'=>'Upload Content']])

        <div class="block-wrapper block-min-height content-wrappers">
            <div class="top-block">
                <h6 class="sub-header6 mb-4">
                    Drawers
                </h6>
                <div class="conten-items">
                    @foreach($drawers as $key => $drawer)
                        <x-drawer title="{{$drawer['name']}}" url="{{asset('image/card/card-icon.svg')}}"
                                  id="drawer_{{$key}}" :data-drawer="$drawer['id']"
                                  :required-pass="$drawer['is_password_required']"/>
                    @endforeach
                </div>
            </div>
            <div class="bottom-block">
                <h6 class="sub-header6 mb-4 border-bottom pb-3 mt-4">
                    All Contents
                </h6>
                <div class="conten-items">
                    @foreach($contents as $content)
                        <x-content title="{{$content['name']}}" url="{{asset('image/content/demo1.svg')}}"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('includes.modal.password',['id'=>'','close_id'=>'','class'=>''])
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            // $('#contentid,#contentid2,#contentid3,#contentid4').on('click', function () {
            //     $('#pageModal').addClass('content-modal');
            //     $('#pageModal').modal('show');
            // });

            $('#addboxid').on('click', function () {
                $('#addBoxModal').modal('show');
            });

            $('#pageModalClose,addBoxModalClose').on('click', function () {
                $('#pageModal').modal('hide');
                $('#addBoxModal').modal('hide');
            });

            //Onclick drawer show security panel
            $('.drawers').on('click', function (event) {
                $('input#drawer-key').val(event.currentTarget.getAttribute('data-drawer'))
                $('#pageModal').removeClass('content-modal').modal('show');
            });

            //Drawer Tag for security panel
            $("#pageModal").on("hidden.bs.modal", function () {
                $("#securityForm").trigger('reset')
                $(this).find("small.text-danger").html("")
            });

            $("#securityForm").submit(function (event) {
                event.preventDefault()
                $.ajax({
                    type: "post",
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    url: "{{route("security.check")}}",
                    data: new FormData(this),
                    success: function (response) {
                        location.href = response.redirectUrl
                    },
                    error: function (error) {
                        $("#message").html(error.responseJSON.message)
                    }
                });
            })
        })


    </script>
@endsection

