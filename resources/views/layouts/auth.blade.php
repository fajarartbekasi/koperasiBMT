<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials._head')

    <body>
        <div id="app">
            @yield('content')
        </div>
    </body>
</html>