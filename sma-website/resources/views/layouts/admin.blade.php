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
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/Logo SMA.png') }}" alt="School Logo" style="width: 45px; height: 45px; margin-right: 10px;">
            Admin SMA 6 Tangerang
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
    .hero-section {
        background-image: url('{{ asset('images/guru.png') }}');
        background-size: cover;
        background-position: center;
        height: 500px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: -25px;
    }

    .hero-overlay {
        background: rgba(0,0,0,0.6);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        padding: 20px;
    }

    .hero-content h1, 
    .hero-content h2 {
        color: white;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .hero-content h1 {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .hero-content h2 {
        font-size: 2rem;
        font-weight: 600;
    }
.navbar {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    background-color: white;
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

/* Mobile menu styles */
.navbar-toggler {
    border-color: #1C2E4E;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(108, 117, 125, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

@media (max-width: 991.98px) {
    .navbar-collapse {
        background-color: white;
        padding: 1rem;
        border-radius: 0.25rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .nav-link {
        color: #1C2E4E !important;
    }
    
    .nav-link:hover {
        color: #1C2E4E !important;
    }
}
</style>