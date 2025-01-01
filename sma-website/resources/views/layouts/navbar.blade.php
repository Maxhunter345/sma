<nav class="navbar navbar-expand-lg bg-white py-3">
    <div class="container">
        <a href="/" class="logo-container d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/Logo SMA.png') }}" alt="SMA Logo" class="navbar-logo">
            <h1 class="school-name mb-0">SMA NEGERI 6 TANGERANG</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/visimisi">Visi dan Misi</a></li>
                        <li><a class="dropdown-item" href="/sejarah">Sejarah</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    @if(Auth::check() && Auth::user()->is_admin)
                        <a class="nav-link" href="{{ route('admin.guru.index') }}">Guru</a>
                    @else
                        <a class="nav-link" href="{{ route('guru.page') }}">Guru</a>
                    @endif
                </li>
                @guest
                <li class="nav-item ms-3">
                    <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                </li>
                <li class="nav-item ms-2">
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                </li>
                @else
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Welcome, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
li .btn-primary {
    background-color: #1C2E4E;
    border: none;
}

li .btn-primary:hover {
    background-color: #1C2E4E;
}
</style>