<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Success</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #eaf6f6 0%, #48A6A7 100%);
            min-height: 100vh;
        }
        .container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.12);
            padding: 32px 32px 24px 32px;
            margin-top: 48px;
            max-width: 500px;
        }
        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background-color: #3D9394;
        }
        h4 {
            color: #2973B2;
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h4 class="mb-3">Registration Successful!</h4>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
            <p>Please check your email to verify your account before logging in.</p>
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Go to Login</a>
        </div>
    </div>
</div>
</body>
</html>
