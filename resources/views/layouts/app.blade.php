<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
</html>
<body class="bg-green-500">
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>