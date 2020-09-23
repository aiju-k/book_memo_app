<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('common.header')

    <main>
        @yield('content')
    </main>

    @yield('scripts')
    <script src="/js/app.js"></script>

</body>
</html>