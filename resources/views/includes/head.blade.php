<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="theme-color" content="#6777ef"/>
<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('image/favicon.png')}}"/>
<title>{{ config('app.name', 'Legable') }}</title>
<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
