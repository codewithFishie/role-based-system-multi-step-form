<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User ID Created</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #111827;">
    <h2>Registration completed successfully</h2>

    <p>Hello {{ $user->name }},</p>

    <p>Your registration form has been submitted successfully.</p>

    <p><strong>Your User ID:</strong> {{ $user->login_id }}</p>
    <p><strong>Your temporary password:</strong> {{ $temporaryPassword }}</p>

    <p>Use this User ID and temporary password to sign in.</p>
    <p>For security, you will be required to change your password on your first login.</p>

    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>