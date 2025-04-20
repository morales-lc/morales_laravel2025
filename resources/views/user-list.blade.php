


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
@include('nav');

<div class="container">
    <h2>User List</h2>
    <form method="GET" action="{{ route('user.list') }}" class="mb-3 d-flex flex-wrap gap-2">
    <input type="text" name="name" placeholder="Search by name" value="{{ request('name') }}" class="form-control" style="max-width: 200px;">
    <input type="text" name="email" placeholder="Search by email" value="{{ request('email') }}" class="form-control" style="max-width: 200px;">
    <button type="submit" class="btn btn-primary">Filter</button>

    @if(request('name') || request('email'))
        <a href="{{ route('user.list') }}" class="btn btn-secondary">Clear Filters</a>
    @endif
</form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Username</th><th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->user_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
</div>
</body>
</html>


