<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Uploaded Files</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
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

        .btn-outline-secondary {
            border-color: #48A6A7;
            color: #48A6A7;
        }

        .btn-outline-secondary:hover {
            background-color: #48A6A7;
            color: #fff;
        }

        .filter-card {
            background-color: #eaf6f6;
            border: 1px solid #48A6A7;
            border-radius: 12px;
            padding: 1rem;
        }

        .form-label {
            color: #2973B2;
            font-weight: 500;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #48A6A7;
            box-shadow: 0 0 0 0.2rem rgba(72, 166, 167, 0.25);
        }

        .table-primary {
            background-color: #48A6A7 !important;
            color: #fff !important;
        }

        h2 {
            color: #2973B2;
            font-weight: 700;
        }

        th {
            text-align: center;
        }

        td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">My Uploaded Files</h2>
            <a href="{{ route('upload.create') }}" class="btn btn-primary">Upload Files</a>
        </div>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="filter-card mb-4">
            <form method="GET" action="{{ route('upload.index') }}" class="row gy-2 gx-3 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="filename" class="form-control" placeholder="Search by filename"
                        value="{{ request('filename') }}">
                </div>
                <div class="col-md-4">
                    <select name="type" class="form-select">
                        <option value="">All File Types</option>
                        <option value="application/pdf" {{ request('type') == 'application/pdf' ? 'selected' : '' }}>PDF
                        </option>
                        <option value="image/png" {{ request('type') == 'image/png' ? 'selected' : '' }}>PNG</option>
                        <option value="image/jpeg" {{ request('type') == 'image/jpeg' ? 'selected' : '' }}>JPEG</option>
                        <option value="application/vnd.openxmlformats-officedocument.wordprocessingml.document" {{ request('type') == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ? 'selected' : '' }}>DOCX</option>
                        <option value="text/plain" {{ request('type') == 'text/plain' ? 'selected' : '' }}>TXT</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-wrap justify-content-md-end justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary">Clear</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle bg-white">
                <thead class=" table-primary text-center">
                    <tr>
                        <th>Filename</th>
                        <th style="width: 18%;">Type</th>
                        <th>Uploaded</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($uploads as $upload)
                    <tr>
                        <td>{{ $upload->original_filename }}</td>
                        <td style="width: 18%;">{{ $upload->type }}</td>
                        <td>{{ $upload->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('upload.download', $upload) }}" class="btn btn-sm btn-success me-1">Download</a>
                            <a href="{{ route('upload.edit', $upload) }}" class="btn btn-sm btn-warning me-1">Update</a>
                            <form action="{{ route('upload.destroy', $upload) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No uploaded files found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $uploads->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>



    </div>
</body>

</html>