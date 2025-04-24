<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>

    </style>
</head>

<body>
    <!--TODO: BUHATA NGA MAG DISPLAY UG SUCCESS MESSAGE LATERS!!!!!! -->

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login</h2>


            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"
                    class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group position-relative">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                        <i id="togglePasswordIcon" class="bi bi-eye-slash"></i>
                    </span>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            const icon = document.getElementById("togglePasswordIcon");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>

</body>

</html>