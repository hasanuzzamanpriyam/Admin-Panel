<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP send to user</title>
</head>
<body>
    <h1>Welcome <strong>{{ $data['username'] }}</strong></h1>
    <h2>Your OTP is <strong>{{ $data['otp'] }}</strong></h2>
</body>
</html>
