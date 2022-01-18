<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('frontOffice.layout.includes.links.styleLinks')
    @yield('styles')
</head>
<body>


    <div class="ha-app">

        @include('frontOffice.layout.includes.navbar')
        @include('frontOffice.layout.includes.header')

        @yield('content-wrapper')


        @include('frontOffice.layout.includes.footer')




    </div>


    @include('frontOffice.layout.includes.links.scriptLinks')
    @stack('scripts')
</body>
</html>


