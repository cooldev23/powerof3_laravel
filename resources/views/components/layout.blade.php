<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/vendor.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://use.fontawesome.com/4f7bb7e630.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-gray-50">
        @include('layouts.partials.nav')
        
        {{-- @if (!Request::is('help'))
        @include('partials.breadcrumbs')
        @endif --}}
        
        {{-- @include('partials.alerts') --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        

        @stack('modals')
        @stack('scripts')

        {{-- <script src="{{ asset('js/manifest.js') }}"></script>
        <script src="{{ asset('js/vendor.js') }}"></script> --}}
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>