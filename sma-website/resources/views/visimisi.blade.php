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

footer {
    background-color: #162441;
}

.visimisi-container {
    padding: 50px 0;
}

.visimisi-title {
    text-align: center;
    color: #1C2E4E;
    font-weight: bold;
    margin-bottom: 40px;
    font-size: 28px;
}

.visimisi-content {
    background-color: #1C2E4E;
    border-radius: 10px;
    padding: 40px;
    color: white;
    max-width: 1000px;
    margin: 0 auto;
}

.visimisi-row {
    display: flex;
    margin-bottom: 20px;
    align-items: flex-start;
}

.visimisi-label {
    width: 120px;
    font-weight: 500;
    padding-top: 3px;
}

.visimisi-text {
    flex: 1;
}

.misi-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.misi-list li {
    margin-bottom: 10px;
    display: flex;
}

.misi-list li span:first-child {
    margin-right: 10px;
}

@media (max-width: 768px) {
    .visimisi-content {
        padding: 20px;
    }
    
    .visimisi-row {
        flex-direction: column;
    }
    
    .visimisi-label {
        margin-bottom: 10px;
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

<div class="container">
    <div class="visimisi-container">
        <h2 class="visimisi-title">Visi dan Misi</h2>
        <div class="visimisi-content">
            <div class="visimisi-row">
                <div class="visimisi-label">VISI</div>
                <div class="visimisi-text">
                    Terwujud peserta didik yang unggul dalam prestasi berdasarkan iman dan taqwa
                </div>
            </div>
            <div class="visimisi-row">
                <div class="visimisi-label">MISI</div>
                <div class="visimisi-text">
                    <ul class="misi-list">
                        <li><span>1.</span><span>Mengembangkan organisasi sekolah yang terus belajar (learning organization)</span></li>
                        <li><span>2.</span><span>Menerapkan prinsip-prinsip Manajemen Berbasis Sekolah</span></li>
                        <li><span>3.</span><span>Mengembangkan sistem sekolah yang peduli dalam bekerjasama dengan lingkungan sekitar</span></li>
                        <li><span>4.</span><span>Melaksanakan proses pembelajaran dan bimbingan secara efektif</span></li>
                        <li><span>5.</span><span>Mengembangkan budaya kompetitif bagi siswa dalam upaya peningkatan prestasi</span></li>
                        <li><span>6.</span><span>Mengoptimalkan dalam penggunaan perangkat pembelajaran</span></li>
                        <li><span>7.</span><span>Meningkatkan prestasi dalam bidang ekstrakulikuler sesuai dengan potensi yang dimiliki siswa</span></li>
                        <li><span>8.</span><span>Menumbuhkan penghayatan ajaran agama yang dianut dalam bertindak</span></li>
                        <li><span>9.</span><span>Menumbuhkan semangat kebersamaan dan kekeluargaan bagi seluruh warga sekolah</span></li>
                        <li><span>10.</span><span>Menghasilkan lulusan yang memiliki dinding IMTAQ dan IPTEK</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center text-white py-3" style="background-color: #162441;">
    <p class="mb-0">Copyright © 2024 | SMA Negeri 6 Tangerang</p>
    <p class="mb-0">Created by UMN TEAM</p>
</footer>
@endsection