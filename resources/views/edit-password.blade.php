<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
@include('nav')


@if (session('success') || $errors->any())
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
    <div id="feedbackToast" class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0" role="alert">
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
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

<br>
<div class="container">
    <h2>Change Password</h2>



    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Old Password</label>
            <input type="password" name="old_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
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




