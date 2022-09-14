@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Drawers" subtitle="Welcome, IOTA Infotech Limited 👋 " buttonText="+ Add Drawer " link="/drawer/add"/>
    <div class="block-wrapper block-min-height wrapper-block">
        <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{asset('image/card/card-icon.svg')}}" title="Document"
                date="Sep 25, 2022, 13:25 PM"/>
@endsection
