<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div id="feedbackToast"
                class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0"
                role="alert">
                <div class="d-flex">
                    <div class="toast-body">
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
                    <div class="card-header text-center fw-bold">Change Password</div>
                    <div class="card-body p-4">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" id="old_password" name="old_password"
                                    class="form-control form-control-md @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="form-control form-control-md @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="form-control form-control-md @error('confirm_password') is-invalid @enderror">
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-md">Update Password</button>
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
            const toastEl = document.getElementById('feedbackToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                toast.show();
            }
        });
    </script>

</body>

</html>