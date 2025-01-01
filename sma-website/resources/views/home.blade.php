@extends('layouts.app')

@section('styles')
<style>
.ekskul-section {
    padding: 50px 0;
    background: #fff;
}

.ekskul-title {
    text-align: center;
    color: #1C2E4E;
    font-weight: 600;
    margin-bottom: 40px;
}

.carousel-container {
    max-width: 800px;
    margin: 0 auto;
}

.carousel-item {
    background: white;
    border-radius: 10px;
    border: 1px solid #eee;
    padding: 20px;
}

.ekskul-logo {
    width: 200px;
    height: 200px;
    object-fit: contain;
    margin: 0 auto;
    display: block;
}

.ekskul-name {
    text-align: center;
    color: #1C2E4E;
    font-weight: 500;
    margin-top: 15px;
    font-size: 1.2rem;
}

.ekskul-desc {
    text-align: center;
    color: #666;
    font-size: 0.9rem;
    margin-top: 5px;
}

.carousel-control-prev,
.carousel-control-next {
    width: 40px;
    height: 40px;
    background: #1C2E4E;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 1;
}

.carousel-control-prev {
    left: -50px;
}

.carousel-control-next {
    right: -50px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
}

.contact-section {
    background-color: #1C2E4E;
    color: white;
}

.social-media a {
    transition: opacity 0.3s ease;
}

.social-media a:hover {
    opacity: 0.8;
}

.contact-info i {
    width: 20px;
}

.maps-container {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

footer {
    background-color: #162441;
}

@media (max-width: 768px) {
    .contact-info {
        font-size: 0.9rem;
    }
    
    .social-media h3 {
        font-size: 1.5rem;
    }
}
</style>
@endsection

@section('content')
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <img src="{{ asset('images/Logo SMA.png') }}" alt="School Logo" class="school-logo">
        <h1>SMA NEGERI 6</h1>
        <h2>TANGERANG</h2>
    </div>
</div>

<div class="container py-5">
<div class="menu-grid">
    <a href="/prestasi" class="menu-item">
        <i class="fas fa-trophy menu-icon"></i>
        <span class="menu-text">Prestasi</span>
    </a>
    <a href="/ppdb" class="menu-item">
        <i class="fas fa-user-graduate menu-icon"></i>
        <span class="menu-text">PPDB</span>
    </a>
    <a href="https://lms.sman6tangerang.sch.id/login/index.php" class="menu-item" target="_blank">
        <i class="fas fa-laptop-code menu-icon"></i>
        <span class="menu-text">E-Learning</span>
    </a>
    <a href="/e-news" class="menu-item">
        <i class="fas fa-newspaper menu-icon"></i>
        <span class="menu-text">E-News</span>
    </a>
    <a href="/e-library" class="menu-item">
        <i class="fas fa-book-reader menu-icon"></i>
        <span class="menu-text">E-Library</span>
    </a>
</div>
</div>

<div class="ekskul-section">
    <div class="container">
        <h2 class="ekskul-title">Ekstrakurikuler</h2>
        <div class="carousel-container">
            <div id="ekskulCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/ekstrakurikuler/basket.png') }}" class="ekskul-logo" alt="Basket">
                        <h3 class="ekskul-name">Basket</h3>
                        <p class="ekskul-desc">Basket SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/anggar.png') }}" class="ekskul-logo" alt="Anggar">
                        <h3 class="ekskul-name">Anggar</h3>
                        <p class="ekskul-desc">Anggar SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/badminton.png') }}" class="ekskul-logo" alt="Badminton">
                        <h3 class="ekskul-name">Badminton</h3>
                        <p class="ekskul-desc">Badminton SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/esport.png') }}" class="ekskul-logo" alt="E-Sport">
                        <h3 class="ekskul-name">E-Sport</h3>
                        <p class="ekskul-desc">E-Sport SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/fotografi.png') }}" class="ekskul-logo" alt="Fotografi">
                        <h3 class="ekskul-name">Fotografi</h3>
                        <p class="ekskul-desc">Fotografi SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/futsal.png') }}" class="ekskul-logo" alt="Futsal">
                        <h3 class="ekskul-name">Futsal</h3>
                        <p class="ekskul-desc">Futsal SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/it.png') }}" class="ekskul-logo" alt="IT Club">
                        <h3 class="ekskul-name">IT Club</h3>
                        <p class="ekskul-desc">IT Club SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/karate.png') }}" class="ekskul-logo" alt="Karate">
                        <h3 class="ekskul-name">Karate</h3>
                        <p class="ekskul-desc">Karate SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/moderndance.png') }}" class="ekskul-logo" alt="Modern Dance">
                        <h3 class="ekskul-name">Modern Dance</h3>
                        <p class="ekskul-desc">Modern Dance SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/mpk.png') }}" class="ekskul-logo" alt="MPK">
                        <h3 class="ekskul-name">MPK</h3>
                        <p class="ekskul-desc">MPK SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/paskibra.png') }}" class="ekskul-logo" alt="Paskibra">
                        <h3 class="ekskul-name">Paskibra</h3>
                        <p class="ekskul-desc">Paskibra SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/pramuka.png') }}" class="ekskul-logo" alt="Pramuka">
                        <h3 class="ekskul-name">Pramuka</h3>
                        <p class="ekskul-desc">Pramuka SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/rohis.png') }}" class="ekskul-logo" alt="Rohis">
                        <h3 class="ekskul-name">Rohis</h3>
                        <p class="ekskul-desc">Rohis SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/science.png') }}" class="ekskul-logo" alt="Science Club">
                        <h3 class="ekskul-name">Science Club</h3>
                        <p class="ekskul-desc">Science Club SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/taekwondo.png') }}" class="ekskul-logo" alt="Taekwondo">
                        <h3 class="ekskul-name">Taekwondo</h3>
                        <p class="ekskul-desc">Taekwondo SMA Negeri 6 Tangerang</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ekstrakurikuler/tradance.png') }}" class="ekskul-logo" alt="Traditional Dance">
                        <h3 class="ekskul-name">Traditional Dance</h3>
                        <p class="ekskul-desc">Traditional Dance SMA Negeri 6 Tangerang</p>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#ekskulCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#ekskulCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="contact-container rounded" style="background-color: #1C2E4E; padding: 40px; margin-bottom: 60px;">
        <h2 class="text-center text-white mb-4 fw-bold">SMA Negeri 6 Tangerang</h2>
        
        <!-- Google Maps -->
        <div class="mb-4">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2834006505607!2d106.6317775!3d-6.2269306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fbad1b9f159b%3A0x4e89c8hypothetical!2sSMA%20Negeri%206%20Tangerang!5e0!3m2!1sen!2sid!4v1630000000000!5m2!1sen!2sid" 
                width="100%" 
                height="300" 
                style="border-radius: 8px; border: none;"
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <!-- Contact Info -->
        <div class="text-center text-white mb-5">
            <p class="mb-2">
                <i class="fas fa-map-marker-alt me-2"></i>
                Jln. Nyimas Melati No. 5 Karanganyer Neglasari Kota Tangerang 18121
            </p>
            <p class="mb-2">
                <i class="fas fa-phone me-2"></i>
                (021) 5587229
            </p>
            <p>
                <i class="fas fa-envelope me-2"></i>
                sman6tangerangkota@gmail.com
            </p>
        </div>

        <!-- Logo and Social Media -->
        <div class="row justify-content-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <div class="bg-white rounded p-3" style="display: inline-block;">
                    <img src="{{ asset('images/Logo SMA.png') }}" alt="School Logo" style="width: 150px; height: 150px;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white rounded p-4">
                    <h3 class="text-dark fw-bold mb-3">Social Media</h3>
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <i class="fab fa-instagram me-2"></i>@sman6tng
                        </a>
                        <a href="#" class="text-dark text-decoration-none">
                            <i class="fab fa-instagram me-2"></i>@perpus_ud
                        </a>
                        <a href="#" class="text-dark text-decoration-none">
                            <i class="fab fa-youtube me-2"></i>sman6tangerang
                        </a>
                        <a href="#" class="text-dark text-decoration-none">
                            <i class="fab fa-twitter me-2"></i>@sman6tng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center text-white py-3" style="background-color: #162441;">
    <p class="mb-0">Copyright © 2017 | SMA Negeri 6 Tangerang</p>
    <p class="mb-0">Created by UMN TEAM</p>
</footer>
@endsection

