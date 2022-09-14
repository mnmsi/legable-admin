@extends("layouts.app")
@section('content')
    @include('includes.pageHeader',['title'=>'My Devices','list'=>['Dashboard','My Device'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        <div class="add-device-wrapper">
            <h2 class="add-device-title">Total Active Sessions (2)</h2>
        </div>
        {{--  main page content--}}
        
        {{--  main page end--}}
    </div>
@endsection
