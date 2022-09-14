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
</main>
<!--Main layout-->
<script src="{{asset('/vendor/jquery-3.6.1.min.js')}}"></script>
@yield('script')
@stack('script')
<script>
    $(document).ready(function () {
        // alert(1)
        //    inject code here
    })
</script>
</body>
</html>
