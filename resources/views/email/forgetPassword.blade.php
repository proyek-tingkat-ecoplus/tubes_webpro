<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password Email</title>
</head>
<body>
    <h1>Forget Password Email</h1>
    <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
</body>
</html>
