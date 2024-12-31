<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'SMAN 6 Tangerang')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="dashboard">
            <img src="{{ asset('images/Logo SMA.png') }}" alt="School Logo" style="width: 45px; height: 45px; margin-left: 50px; margin-right: 10px;">
            Admin SMAN 6 Tangerang
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.ppdb') }}">
                        PPDB
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.prestasi') }}">
                        Prestasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.enews') }}">
                        E-News
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="container-fluid py-4">
        @yield('content')
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (needed for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @stack('scripts')
</body>
</html>
<style>
.navbar {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.navbar-brand {
    font-weight: 600;
    font-size: 1.2rem;
    color: #1C2E4E;
}

.navbar-brand:hover {
    color: #1C2E4E;
    opacity: 0.8;
}

.nav-link {
    padding: 0.8rem 1rem !important;
    transition: all 0.3s ease;
    color: #1C2E4E;
    font-weight: 500;
}

.nav-link:hover {
    color: #1C2E4E;
    opacity: 0.8;
}
</style>