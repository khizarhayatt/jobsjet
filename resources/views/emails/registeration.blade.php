<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
</head>

<body>
    <h1>Welcome to Our Website!</h1>

    <p>Dear {{ $user['first_name'] }} {{ $user['last_name'] }},</p>

    <p>Thank you for registering on our website. Your account has been successfully created.</p>

    <p>Your account details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $user['first_name'] }} {{ $user['last_name'] }}</li>
        <li><strong>Email:</strong> {{ $user['email'] }}</li>
    </ul>

    <p>You can now log in using your email and password. Please feel free to explore our website and enjoy our services.
    </p>

    <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>

    <p>Thank you for choosing our platform!</p>

    <p>Best regards,<br>Your Website Team</p>
</body>

</html>
