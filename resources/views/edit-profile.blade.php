<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
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
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.12);
            border: none;
        }
        .card-header {
            background: #48A6A7;
            color: #fff;
            border-radius: 18px 18px 0 0;
            font-size: 1.3rem;
            font-weight: 600;
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
        .toast {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    @include('nav')

    @if (session('success') || $errors->any())
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div class="toast fade show shadow-lg text-white {{ session('success') ? 'bg-success' : 'bg-danger' }}"
                role="alert" style="min-width: 300px;">
                <div class="d-flex">
                    <div class="toast-body fs-6">
                        @if(session('success'))
                            {{ session('success') }}
                        @else
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center fw-bold">Edit Profile</div>
                    <div class="card-body p-3">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name"
                                    value="{{ old('first_name', session('user')->first_name) }}">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name"
                                    value="{{ old('last_name', session('user')->last_name) }}">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username"
                                    value="{{ old('username', session('user')->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-md">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                toast.show();
            }
        });
    </script>

</body>

</html>