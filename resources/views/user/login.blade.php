<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Panel</title>
</head>
<body>
    <form action="/login" method="post">
        @csrf
        <input type="email" name="email" placeholder="Please Enter Your Email Address">
        <input type="password" name="password" placeholder="Please Enter Your Password">
        <input type="submit" value="Login">
    </form>

    @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
    @endif
</body>
</html>