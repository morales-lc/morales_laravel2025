<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registration.css">

    <style>
        body {
            background: linear-gradient(135deg, #48A6A7 0%, #3D9394 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.2);
            border: none;
            margin-top: 40px;
        }

        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background-color: #3D9394;
        }

        .btn-secondary {
            background-color: #3D9394;
            border: none;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #2973B2;
        }

        .form-label {
            color: #2973B2;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: #48A6A7;
            box-shadow: 0 0 0 0.2rem rgba(72, 166, 167, 0.25);
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .card h2 {
            color: #48A6A7;
            font-weight: 700;
        }

        .form-check-label {
            color: #3D9394;
        }

        .navbar-brand {
            color: #48A6A7 !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        #password-strength {
            font-size: 0.9rem;
        }

        .strength-weak {
            color: #dc3545;
        }

        /* red */
        .strength-medium {
            color: #ffc107;
        }

        /* yellow */
        .strength-strong {
            color: #28a745;
        }

        /* green */
    </style>
</head>


<body>
    <nav class="nav bar navbar-expanded-lg">
        <div class="container">
            <a class="navbar-brand" href="#">

            </a>
        </div>

    </nav>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h2 class="mb-3">Register</h2>
                    <form method="POST" action="{{ route('register.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                id="firstname" name="firstname" value="{{ old('firstname') }}">
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                id="lastname" name="lastname" value="{{ old('lastname') }}">
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bod" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('bod') is-invalid @enderror" id="bod"
                                name="bod" value="{{ old('bod') }}">
                            @error('bod')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="" disabled {{ old('sex') ? '' : 'selected' }}>Select</option>
                                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            <div id="password-strength" class="mt-1 fw-semibold"></div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror"
                                id="terms" name="terms" {{ old('terms') ? 'checked' : '' }}>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="form-check-label" for="terms">I agree with the Privacy Policy and Terms and
                                Conditions</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                        <br><br>
                        <button type="button" class="btn btn-secondary w-100" onclick="window.history.back()">Go Back
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>
    <script src="{{ asset('js/password-strength.js') }}"></script>
    <script>
        // Password match indicator
        const password = document.getElementById('password');
        const confirm = document.getElementById('password_confirmation');
        if (password && confirm) {
            confirm.addEventListener('input', function() {
                if (confirm.value !== password.value) {
                    confirm.classList.add('is-invalid');
                } else {
                    confirm.classList.remove('is-invalid');
                }
            });
        }
    </script>

</body>

</html>