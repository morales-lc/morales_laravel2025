<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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

        .btn-primary {
            background-color: #48A6A7;
            border: none;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background-color: #3D9394;
        }

        .btn-success {
            background-color: #2973B2;
            border: none;
        }

        .btn-success:hover {
            background-color: #48A6A7;
        }

        .btn-outline-secondary {
            border-color: #48A6A7;
            color: #48A6A7;
        }

        .btn-outline-secondary:hover {
            background-color: #48A6A7;
            color: #fff;
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

        .table-primary {
            background-color: #48A6A7 !important;
            color: #fff !important;
        }
    </style>
</head>

<body>

    @include('nav')

    @if (session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    @if ($errors->has('delete'))
    <div class="alert alert-danger mt-2">{{ $errors->first('delete') }}</div>
    @endif

    <div class="container mt-5">
        <h2>User List</h2>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('user.list') }}">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label for="searchName" class="form-label">Search by Name</label>
                            <input type="text" id="searchName" name="name" placeholder="e.g. John"
                                value="{{ request('name') }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="searchEmail" class="form-label">Search by Email</label>
                            <input type="text" id="searchEmail" name="email" placeholder="e.g. john@example.com"
                                value="{{ request('email') }}" class="form-control">
                        </div>
                        <div class="col-md-4 d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            @if(request('name') || request('email'))
                            <a href="{{ route('user.list') }}" class="btn btn-outline-secondary">Clear Filters</a>
                            @endif
                            <div class="col-md-4">
                                <a href="{{ route('user.export', request()->query()) }}"
                                    class="btn btn-success">Download
                                    CSV</a>
                            </div>

                        </div>



                    </div>
                </form>
            </div>
        </div>


        <div class="table-responsive shadow-sm rounded bg-white p-3">
            <table class="table table-hover align-middle mb-0 bg-white">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ ucfirst($user->user_type) }}</td>
                        <td class="text-center">
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-md">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-center mt-4">
            {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

</body>

</html>