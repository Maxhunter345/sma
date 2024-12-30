<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMA NEGERI 6 TANGERANG</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    
    .navbar {
        background-color: white !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 15px 0;
    }

    .navbar-logo {
        width: 45px;
        height: 45px;
        margin-right: 15px;
    }

    .school-name {
        color: #1C2E4E;
        font-size: 18px;
        font-weight: 600;
    }

    .nav-link {
        color: #1C2E4E;
        font-weight: 500;
        padding: 8px 16px !important;
    }

    .nav-link:hover {
        color: #1C2E4E;
        opacity: 0.8;
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .dropdown-item {
        padding: 8px 16px;
        color: #1C2E4E;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #1C2E4E;
    }

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
        margin-top: -10px;
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
        margin-bottom: 5px;
    }

    .hero-content h2 {
        font-size: 2rem;
        font-weight: 600;
    }

    .school-logo {
        width: 100px;
        height: 100px;
        margin-bottom: 20px;
        filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.3));
    }

    .menu-grid {
        display: flex;
        justify-content: center;
        gap: 25px;
        padding: 20px;
        margin-top: 30px;
    }

    .menu-item {
        background: #1C2E4E;
        color: white;
        width: 130px;
        height: 130px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 20px 10px;
    }

    .menu-item:hover {
        transform: translateY(-5px);
        color: white;
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    .menu-icon {
        font-size: 28px;
        margin-bottom: 12px;
        color: white;
    }

    .menu-text {
        font-size: 14px;
        text-align: center;
        font-weight: 500;
        color: white;
        margin: 0;
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 400px;
        }

        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-content h2 {
            font-size: 1.5rem;
        }

        .school-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }

        .menu-grid {
            flex-wrap: wrap;
            gap: 15px;
        }

        .menu-item {
            width: 110px;
            height: 110px;
        }

        .menu-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .menu-text {
            font-size: 12px;
        }
    }

    @media (max-width: 576px) {
        .navbar {
            padding: 10px 0;
        }

        .school-name {
            font-size: 16px;
        }

        .navbar-logo {
            width: 35px;
            height: 35px;
        }

        .menu-grid {
            padding: 10px;
        }

        .menu-item {
            width: 100px;
            height: 100px;
        }
    }
    </style>
    @yield('styles')
</head>
<body>
    @include('layouts.navbar')
    @yield('content')
    @yield('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>