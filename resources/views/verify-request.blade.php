<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Your Email</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
            max-width: 450px;
        }
        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background-color: #3D9394;
        }
        h3 {
            color: #2973B2;
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="container">
        <a class="btn btn-outline-secondary mb-3" href="{{ route('login') }}">Go back</a>
        <h3 class="mb-4 text-center">Verify Your Email</h3>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form action="{{ route('verify.email.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Send Verification Email</button>
        </form>
    </div>
</div>
</body>
</html>
