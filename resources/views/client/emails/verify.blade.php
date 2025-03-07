<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>
</head>

<body>
    <p>Hello {{ $user->name }},</p>
    <p>Your verification code is: <strong>{{ $user->verification_code }}</strong></p>
    <p>Please enter this code on our website to verify your email address.</p>
    <p>Thank you!</p>
</body>

</html>