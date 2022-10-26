@extends('layouts.app')
@section('title','Devices')
@section('content')
    @include('includes.pageHeader', [
        'title' => 'My Devices',
        'list' => ['Dashboard', 'My Device'],
        'btn' => [],
        'link' => [],
    ])
    <div class="block-min-height block-wrapper">
        <div class="add-device-wrapper">
            <h2 class="add-device-title">Total Active Sessions ({{count($devices)}})</h2>

            {{-- main page content --}}
            <div class="row gap-lg-0 gap-2 align-items-stretch">

                @foreach($devices as $device)
                    <div class="col-lg-5 mb-4">
                        <div class="single-card-wrapper">
                            <div class="device-card-content-wrapper">
                                <div class="device-icon-wrapper">
                                    <img src="{{ asset('image/device/device.svg') }}" alt="">
                                </div>
                                <div class="device-card-content">
                                    <div
                                        class="device-name">{{$device['device_name'] . " " . ($device['this_device'] ? "(This Device)" : "")}}</div>
                                    <div class="device-location">{{$device['location']}}</div>
                                    @if ($device['this_device'])
                                        <p class="logged-date">Logged in till {{$device['logged_at']}}</p>
                                    @else
                                        <div class="logout-device-button">
                                            <a href="{{route('device.remove', $device['id'])}}">Remove this device</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


        {{-- main page end --}}
    </div>
@endsection
