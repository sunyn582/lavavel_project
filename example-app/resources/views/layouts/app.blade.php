<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel Shop')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.nav')
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>