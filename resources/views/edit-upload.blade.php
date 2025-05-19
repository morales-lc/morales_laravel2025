@include('nav')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update File</title>
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
            margin-top: 48px;
        }
        .card-header.bg-primary {
            background-color: #48A6A7 !important;
        }
        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background-color: #3D9394;
        }
        .btn-outline-secondary {
            border-color: #48A6A7;
            color: #48A6A7;
        }
        .btn-outline-secondary:hover {
            background-color: #48A6A7;
            color: #fff;
        }
        h2, .card-header {
            color: #2973B2;
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Update File</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('upload.update', $upload) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Current File:</label>
                            <div class="mb-2">{{ $upload->original_filename }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose New File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                            @error('file')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update File</button>
                            <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

