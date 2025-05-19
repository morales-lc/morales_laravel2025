<style>
    .navbar {
        background-color: #48A6A7;
    }


    .navbar-brand,
    .nav-link {
        color: white !important;
        transition: background-color 0.3s ease, color 0.3s ease;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .nav-link:hover {
        color: #D0EBF2 !important;
        background-color: #3D9394;
        transform: translateY(-2px);
    }

    .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 2px;
        background-color: #D0EBF2;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }


    .logout-btn {
        background-color: #dc3545 !important;
        border-color: #dc3545 !important;
        color: white !important;
        margin-left: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #b52a37 !important;
        border-color: #b52a37 !important;
        color: white !important;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarMenu">
           
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('upload.index') }}">Uploaded Files</a></li>

                @if(session('user') && session('user')->user_type === 'Admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Users</a></li>
                @endif
                @if(session('user') && session('user')->user_type === 'Admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.reports') }}">Reports</a></li>
                @endif
            </ul>

        </div>
        <div class="d-flex ms-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout-btn btn-danger px-4">Logout</button>
            </form>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>