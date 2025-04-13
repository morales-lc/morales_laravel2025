<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Uploaded Files</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Edit Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="user">Users</a></li>
            </ul>
            
        </div>
        <div>
        <a class="btn btn-primary logout-btn" href="{{ route('login') }}">Logout</a>
        </div>
    </div>
</nav>