<!DOCTYPE html>
<html>
<head>
    <title>Student Activation / Change Password</title>
</head>
<body>
    <h1>{{ $data['name'] }}, your account has been activated!</h1>
    <p>Dear {{ $data['name'] }},</p>
    <p>Your student account has been successfully activated. And Your Password is <strong>{{$data['password']}}</strong> Now you can login and check</p>
    <p>Thank you!</p>
</body>
</html>