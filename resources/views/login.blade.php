<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="card">
            <a class="btn btn-outline-primary mb-3 w-100" href="{{ url('/') }}">&larr; Back to Landing Page</a>
            <h2 class="text-center mb-4">Login</h2>

            @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username"
                        value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="login-links">
                <a href="{{ route('password.request') }}" class="login-link">Forgot Password?</a>
                <a href="{{ route('verify.email.form') }}" class="login-link">Verify Your Email</a>
            </div>
            <a href="{{ route('register') }}" class="register-link">Don't have an account? Register</a>
            @if($errors->any())
            <div class="mt-3">
                @if ($errors->has('email'))
                <div class="alert alert-warning text-center">
                    {{ $errors->first('email') }}
                </div>
                @else
                <div class="alert alert-warning text-danger text-center">{{ $errors->first() }}</div>
                @endif
            </div>
            @endif
        </div>
    </div>
</body>

</html>