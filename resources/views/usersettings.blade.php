<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #F2EFE7;
        }

        .navbar {
            background-color: #48A6A7;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .logout-btn {
            background-color: #2973B2;
            border-color: #2973B2;
        }

        .logout-btn:hover {
            background-color: #9ACBD0;
            border-color: #9ACBD0;
        }

        .container {
            margin-top: 20px;
        }
    </style>
    
</head>
<body>
    @include('nav')
    
    <div class="container mt-4">
        <h2>User Management</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
</html>