<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    @stack('style')
    @yield('style')
</head>
<body>

<!--Main layout-->
<main>
    {{--    <div class="loader" id="loader">--}}
    {{--        <div class="loader-image">--}}
    {{--            <img src="{{asset("image/common/loader.svg")}}" class="img-fluid" alt="image">--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!--Main Navigation-->
    @include('includes.nav')
    @include('includes.responsive.nav')
    @include('includes.responsive.offcanvas')
    <!--Main Navigation-->
    {{-- sidebar --}}
    @include('includes.sidebar')
    <div class="mt-4">
        <div class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.footer')
</main>
<!--Main layout-->
<script src="{{asset('/vendor/jquery-3.6.1.min.js')}}"></script>
<scritpt src="{{asset("js/jquery-ui.min.js")}}"></scritpt>
<script src="{{asset('js/commonMethods.js')}}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
<script src="{{asset('vendor/toastr.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
@yield('script')
@stack('script')
<script src="{{ asset('/sw.js') }}"></script>
<script>
    // $(window).on('load', function () {
    //     $("#loader").fadeOut();
    // })
    @if(Session::has('success'))
    toastr.success('<?php echo session('success'); ?>')
    @endif
    @if(Session::has('warning'))
    toastr.warning('<?php echo session('warning'); ?>')
    @endif
    @if(Session::has('error'))
    toastr.error('<?php echo session('error'); ?>')
    @endif
    if (!navigator.serviceWorker?.controller) {
        navigator.serviceWorker?.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</body>
</html>
