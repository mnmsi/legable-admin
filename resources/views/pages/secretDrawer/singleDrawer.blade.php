@extends('layouts.app')
@section('content')
    @include('includes.pageHeader',['title'=>'Important','list'=>['Dashboard','Drawers','Important'],'btn'=>['id'=>'123','text'=>'+ Add Box'],'link'=>['url'=>'/drawer/upload','text'=>'Upload File']])
    <div class="block-wrapper block-min-height content-wrappers">
        <div class="top-block">
            <h6 class="sub-header6 mb-4">
                Drawers
            </h6>
            <div class="conten-items">
                <x-drawer title="Most Important" url="{{asset('image/card/card-icon.svg')}}"/>
                <x-drawer title="Documents" url="{{asset('image/card/card-icon.svg')}}"/>
                <x-drawer title="Videos" url="{{asset('image/card/card-icon.svg')}}"/>
            </div>
        </div>
        <div class="bottom-block">
            <h6 class="sub-header6 mb-4 border-bottom pb-3 mt-4">
                All Contents
            </h6>
            <div class="conten-items">
                <x-content title="Certificate" url="{{asset('image/content/demo1.svg')}}"/>
                <x-content title="Contract Fom" url="{{asset('image/content/demo1.svg')}}"/>
                <x-content title="goNDA - Notes" url="{{asset('image/content/demo1.svg')}}"/>
                <x-content title="Legable concept" url="{{asset('image/content/demo1.svg')}}"/>
            </div>
        </div>
    </div>
@endsection
