<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #eaf6f6 0%, #48A6A7 100%) !important;
        }

        .card {
            border-radius: 22px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.13);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            margin-top: 48px;
            max-width: 400px;
            width: 100%;
        }

        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s, box-shadow 0.3s;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px 0 rgba(72, 166, 167, 0.10);
        }

        .btn-primary:hover {
            background-color: #3D9394;
            box-shadow: 0 4px 16px 0 rgba(72, 166, 167, 0.13);
        }

        h2 {
            color: #2973B2;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .login-links {
            display: flex;
            justify-content: center;
            gap: 1.2rem;
            margin-top: 1.5rem;
        }

        .login-link {
            color: #48A6A7;
            background: #eaf6f6;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px 0 rgba(72, 166, 167, 0.07);
        }

        .login-link:hover {
            background: #2973B2;
            color: #fff;
            box-shadow: 0 4px 16px 0 rgba(72, 166, 167, 0.13);
            text-decoration: none;
        }

        .register-link {
            display: block;
            margin: 2rem auto 0 auto;
            color: #48A6A7;
            font-weight: 700;
            background: #eaf6f6;
            border-radius: 8px;
            padding: 0.7rem 0;
            width: 100%;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }

        .register-link:hover {
            background: #2973B2;
            color: #fff;
        }

        @media (max-width: 600px) {
            .card {
                padding: 1.2rem 0.5rem 1.2rem 0.5rem;
            }

            .login-links {
                flex-direction: column;
                gap: 0.7rem;
            }
        }
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