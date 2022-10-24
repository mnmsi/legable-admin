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
    <script src="{{asset('js/content.js')}}"></script>
@endsection

