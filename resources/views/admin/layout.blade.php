<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    @yield('style')
</head>
<body>
    @include('admin.navbar')

    @yield('body')


    @yield('script')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>