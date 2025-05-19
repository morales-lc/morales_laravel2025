<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

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
            margin-top: 40px;
        }
        h2 {
            color: #2973B2;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        .dashboard-btn {
            display: block;
            width: 100%;
            padding: 2rem 1rem;
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            background: #48A6A7;
            border: none;
            border-radius: 14px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 16px 0 rgba(72, 166, 167, 0.10);
            transition: background 0.3s, transform 0.2s;
        }
        .dashboard-btn:hover {
            background: #3D9394;
            color: #fff;
            transform: translateY(-3px) scale(1.03);
        }
        @media (max-width: 600px) {
            .container {
                padding: 16px 8px 12px 8px;
            }
            .dashboard-btn {
                font-size: 1.1rem;
                padding: 1.2rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    @include('nav')
    <div class="container" style="margin-left:auto; margin-right:auto; max-width:700px;">
        <h2>Settings</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <a href="{{ route('profile.edit') }}" class="dashboard-btn text-center mb-3">
                    <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/person-circle.svg" alt="Profile" style="width:2.2rem;vertical-align:middle;margin-right:1rem;filter:invert(70%) sepia(20%) saturate(500%) hue-rotate(130deg);"> Edit Profile
                </a>
                <a href="{{ route('password.edit') }}" class="dashboard-btn text-center">
                    <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/key.svg" alt="Password" style="width:2.2rem;vertical-align:middle;margin-right:1rem;filter:invert(70%) sepia(20%) saturate(500%) hue-rotate(130deg);"> Change Password
                </a>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

