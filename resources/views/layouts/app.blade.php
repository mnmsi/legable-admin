<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
<!--Main layout-->
<main>
    <!--Main Navigation-->
    @include('includes.nav')
    <!--Main Navigation-->
    {{-- sidebar --}}
    @include('includes.sidebar')
    <div class="mt-3">
        <div class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</main>
<!--Main layout-->
@yield('script')
</body>
</html>
