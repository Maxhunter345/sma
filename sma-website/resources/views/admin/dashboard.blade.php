@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <img src="{{ asset('images/Logo SMA.png') }}" alt="School Logo" class="school-logo">
        <h1>ADMIN DASHBOARD</h1>
        <h2>SMA NEGERI 6 TANGERANG</h2>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center g-4">
        <!-- E-Learning Management -->
        <div class="col-md-4">
            <div class="admin-card">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-laptop-code icon-large text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">E-Learning</h4>
                        <p class="card-text mb-4">Manage courses, materials, and student access for online learning.</p>
                        <a href="/admin/e-learning" class="btn btn-primary w-100">Manage E-Learning</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- E-News Management -->
        <div class="col-md-4">
            <div class="admin-card">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-newspaper icon-large text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">E-News</h4>
                        <p class="card-text mb-4">Manage school news, announcements, and updates.</p>
                        <a href="/admin/e-news" class="btn btn-primary w-100">Manage E-News</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prestasi Management -->
        <div class="col-md-4">
            <div class="admin-card">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-trophy icon-large text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">Prestasi</h4>
                        <p class="card-text mb-4">Manage and update student and school achievements.</p>
                        <a href="/admin/prestasi" class="btn btn-primary w-100">Manage Prestasi</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- PPDB Management -->
        <div class="col-md-4">
            <div class="admin-card">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-user-graduate icon-large text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">PPDB</h4>
                        <p class="card-text mb-4">Manage student admissions and registration process.</p>
                        <a href="/admin/ppdb" class="btn btn-primary w-100">Manage PPDB</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- E-Library Management -->
        <div class="col-md-4">
            <div class="admin-card">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-book-reader icon-large text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">E-Library</h4>
                        <p class="card-text mb-4">Manage digital library resources and student access.</p>
                        <a href="/admin/e-library" class="btn btn-primary w-100">Manage E-Library</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.icon-large {
    font-size: 2.5rem;
}

.admin-card {
    transition: transform 0.3s ease;
}

.admin-card:hover {
    transform: translateY(-10px);
}

.card {
    border: none;
    border-radius: 15px;
    background: white;
}

.btn-primary {
    background-color: #1C2E4E;
    border-color: #1C2E4E;
    padding: 10px 20px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #162441;
    border-color: #162441;
    transform: translateY(-2px);
}

.text-primary {
    color: #1C2E4E !important;
}

.hero-section {
    background-image: url('{{ asset('images/guru.png') }}');
    background-size: cover;
    background-position: center;
    height: 400px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 30px;
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
    color: white;
}

.hero-content h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.hero-content h2 {
    font-size: 2rem;
    font-weight: 500;
}

.school-logo {
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
}
</style>
@endsection