<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Password Reset</h2>
        <p>Hello {{ $candidateName }},</p>
        <p>We received a request to reset your password. Click the button below to reset it:</p>
        <a href="{{ $resetUrl }}" style="display: inline-block; background-color: #1362a1; color: #ffffff; padding: 10px 20px; border-radius: 5px; margin-top: 15px; text-decoration: none; text-align: center;">Reset Password</a>
        <p>If you didn't request a password reset, you can ignore this email.</p>
        <p>Thank you!</p>
    </div>
</body>
</html>
