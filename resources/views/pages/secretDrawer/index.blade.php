@extends('layouts.app')
@section('title','Drawers')

@section('content')

    <x-breadcrumb title="Drawers" subtitle="Everything is encrypted here!" buttonText="+ Add Drawer "
                  link="/drawer/add"/>
    <div id="contents">
        <div class="block-wrapper block-min-height wrapper-block">
            @foreach($drawers as $drawer)
                <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="{{$drawer['name']}}"
                        date="{{$drawer['date']}}" :data-drawer="$drawer['id']"
                        :required-pass="$drawer['password_required']"/>
            @endforeach
        </div>
        {{-- add new button --}}
        <x-add-new-icon id="fileUpload"/>
        {{-- add new button --}}
    </div>

    @include('includes.modal.password',['id'=>'','close_id'=>'','class'=>''])

@endsection

@section('script')
    <script>
        $(document).ready(function () {

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
                console.log(event)
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

