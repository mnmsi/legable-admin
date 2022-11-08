<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    @stack('style')
</head>
<body class="signup-body">
<!--Main layout-->
<main>
{{--    <div class="loader" id="loader">--}}
{{--        <div class="loader-image">--}}
{{--            <img src="{{asset("image/common/loader.svg")}}" class="img-fluid" alt="image">--}}
{{--        </div>--}}
{{--    </div>--}}
    @yield('content')
</main>
<!--Main layout-->
<script src="{{asset('/vendor/jquery-3.6.1.min.js')}}"></script>
@yield('script')
@stack('script')
<script src="{{ asset('/sw.js') }}"></script>
<script>
    // $(window).on('load', function () {
    //     $("#loader").fadeOut();
    // })

    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</body>
</html>
