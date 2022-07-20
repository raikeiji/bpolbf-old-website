<html>
    <head>
        <title>@yield('title')</title>
        @yield('meta')
    </head>
    <body id="bg">
        <div class="page-wraper">
            <div id="loading-area"></div>
            @yield('header')
            @yield('content')
        </div>

    @yield('footer')
    </body>
    @yield('custom-script')
</html>