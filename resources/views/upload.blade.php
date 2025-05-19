<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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

        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background-color: #3D9394;
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

        h2 {
            color: #2973B2;
            font-weight: 700;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container mt-5">
        <h2>Upload a File</h2>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Choose Files</label>
                <input type="file" name="file[]" class="form-control @error('file.*') is-invalid @enderror" multiple
                    required>
                @error('file.*')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>