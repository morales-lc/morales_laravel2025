<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>

    </style>
</head>
<body>
    @include('nav')
    <div class="container" style="margin-left:auto; margin-right:auto; max-width:700px;">
        <h2>Welcome to Your Dashboard, {{ session('user')->first_name }}!</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <a href="{{ route('upload.index') }}" class="dashboard-btn text-center mb-3">
                    <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/cloud-arrow-up.svg" alt="Uploads" style="width:2.2rem;vertical-align:middle;margin-right:1rem;filter:invert(70%) sepia(20%) saturate(500%) hue-rotate(130deg);"> My Uploaded Files
                </a>
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

