<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    @stack('style')
</head>
<body>
<!--Main layout-->
<main>
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
@yield('script')
@stack('script')
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
    $(document).ready(function () {
        // alert(1)
        //    inject code here
    })
</script>
</body>
</html>
