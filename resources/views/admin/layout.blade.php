<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <title>Admin</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/layout.css" rel="stylesheet">
    @yield('style')
</head>
<body>
    @include('admin.navbar')

    @yield('body')


    @yield('script')

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>