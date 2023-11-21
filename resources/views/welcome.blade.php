<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Login Example</title>
</head>

<body>
    <h1>Welcome to the Google Login Example</h1>

    @if(auth()->check())
    <p>Hello, {{ auth()->user()->name }}! <a href="/logout">Logout</a></p>
    @else
    <p><a href="/auth/google">Login with Google</a></p>
    @endif
</body>

</html>