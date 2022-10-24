@extends('layouts.app')
@section('title','All Contents')

@section('content')
    <div class="content-page">
        @include('includes.pageHeader',['title'=>'All Contents','list'=>['Dashboard','All Contents'],'btn'=>[],'link'=>['url'=>'/file/upload','text'=>'Upload Content']])

        <div id="contents">
            @include('components.contents.content')
        </div>
    </div>

    @include('includes.modal.password',['id'=>'','close_id'=>'','class'=>''])
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

            $(".public-drawer").on('click', function (event) {
                $("#contents").load(`{{url("drawer/items")}}/${event.currentTarget.getAttribute('data-drawer')}`, function (responseTxt, statusTxt) {
                    console.log(responseTxt, statusTxt)
                })
            })

            $("#securityForm").submit(function (event) {
                event.preventDefault()
                let formData = $(this).serialize()
                $("#contents").load(`{{url("security/check")}}?${formData}`, function (responseTxt, statusTxt) {
                    if (statusTxt === 'error') {
                        let rep = JSON.parse(responseTxt);
                        $("#message").html(rep.message)
                    } else {
                        $("#pageModal").modal('hide')
                        $("#securityForm").trigger('reset')
                        $(this).find("small.text-danger").html("")
                    }
                })
            })
        })


    </script>
@endsection

