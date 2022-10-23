@extends('layouts.app')
@section('title','Drawers')

@section('content')

    <x-breadcrumb title="Drawers" subtitle="Everything is encrypted here!" buttonText="+ Add Drawer "
                  link="/drawer/add"/>
    <div class="block-wrapper block-min-height wrapper-block">
        @foreach($drawers as $drawer)
            <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="{{$drawer['name']}}"
                    date="{{$drawer['date']}}" />
        @endforeach
        {{-- add new button --}}
        <x-add-new-icon id="fileUpload"/>
        {{-- add new button --}}
    </div>
@endsection
