@extends('layouts.app')
@section('content')
    @section('title','Drawers')
    
    <x-breadcrumb title="Drawers" subtitle="Everything is encrypted here!" buttonText="+ Add Drawer "
                  link="/drawer/add"/>
    <div class="block-wrapper block-min-height wrapper-block">
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        <x-card icon="{{ asset('image/card/card-icon.svg') }}" title="Document" date="Sep 25, 2022, 13:25 PM"/>
        {{-- add new button --}}
        <x-add-new-icon id="fileUpload"/>
        {{-- add new button --}}
    </div>
@endsection
