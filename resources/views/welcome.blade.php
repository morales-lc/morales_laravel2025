<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Elect 3 Web Systems Technology - Finals Project</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #eaf6f6 0%, #48A6A7 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #223127;
        }
        .landing-container {
            max-width: 600px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.13);
            padding: 48px 36px 36px 36px;
            text-align: center;
        }
        .landing-title {
            color: #2973B2;
            font-weight: 800;
            font-size: 2.3rem;
            margin-bottom: 0.5rem;
        }
        .landing-desc {
            color: #3D9394;
            font-size: 1.15rem;
            margin-bottom: 2.2rem;
        }
        .landing-btn {
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.8rem 2.2rem;
            margin: 0 0.5rem;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }
        .landing-btn-primary {
            background: #48A6A7;
            color: #fff;
            border: none;
        }
        .landing-btn-primary:hover {
            background: #2973B2;
            color: #fff;
            box-shadow: 0 4px 16px 0 rgba(72, 166, 167, 0.13);
        }
        .landing-btn-outline {
            background: #fff;
            color: #48A6A7;
            border: 2px solid #48A6A7;
        }
        .landing-btn-outline:hover {
            background: #48A6A7;
            color: #fff;
        }
        .footer {
            margin-top: 2.5rem;
            color: #7a8a8a;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <div class="landing-title">IT Elect 3 Web Systems Technology</div>
        <div class="landing-desc">
            <strong>Finals Project</strong><br>
            This Laravel web application is a comprehensive file management and user administration system, developed as a finals requirement for the IT Elective 3: Web Systems Technology course. It features secure authentication, user registration, file uploads, reporting, and modern UI/UX design. The project demonstrates practical skills in building robust, secure, and user-friendly web systems using Laravel and Bootstrap.
        </div>
        <div class="mb-4">
            <a href="{{ route('login') }}" class="btn landing-btn landing-btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn landing-btn landing-btn-outline">Register</a>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} IT Elect 3 Web Systems Technology Finals Project
        </div>
    </div>
</body>
</html>
