<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
<body>
    <div id="app">
        @include('layouts.partials.navbar')
        @include('layouts.partials.section')

        <main class="py-4 px-4">
            <div class="content ">
                <div class="row justify-content-center">
                    @include('flash::message')
                    @include('layouts._errors')
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
