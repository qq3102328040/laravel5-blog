<!doctype html>
<html lang="en">
<head>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/auth/login.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form class="form-signin" action="{{ url('/auth/login') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="User Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</body>
</html>
