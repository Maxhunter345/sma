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

.sejarah-container {
    padding: 50px 0;
}

.sejarah-title {
    text-align: center;
    color: black;
    font-weight: bold;
    margin-bottom: 40px;
    font-size: 28px;
}

.sejarah-content {
    background-color: #1C2E4E;
    border-radius: 10px;
    padding: 30px;
    color: white;
}

.sejarah-text {
    font-size: 15px;
    line-height: 1.8;
    text-align: justify;
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
    <div class="sejarah-container">
        <h2 class="sejarah-title">Sejarah</h2>
        <div class="sejarah-content">
            <div class="row">
                <div class="col-md-6 pe-md-4">
                    <div class="sejarah-text">
                        <br>Lembaga SMA Negeri 6 Kota Tangerang, pada awalnya adalah alih fungsi dari SPG Negeri Tangerang pada tahun 1970 dan berlokasi di Jl. Babakan PDAM Tangerang. Pada tahun 1971, Pemda/Bupati Tangerang telah menyerahkan satu unit bangunan sederhana bekas permainan casino di atas lahan 800 m2, yang terletak di Jl. Sudirman No.4 (sekarang Jl. Bouraq No.4 Tangerang). Dari tahun 1980 SPG Negeri Tangerang mulai menampakkan kemajuan-kemajuan dalam berbagai bidang terutama dalam menyiapkan tenaga pendidik untuk Sekolah Dasar (SD). Sebelum pembangunan fisik SPG dari tahun 1970 sampai dengan 1979, kurang lebih kurun waktu 1 (satu) Dasawarsa (10 tahun), keadaannya belum menggembirakan ditinjau dari segi kwantitas maupun kwalitas secara umum.</br>

                        <br>Animo masuk ke SPG Negeri dari tahun 1970 sampai tahun 1979 rata-rata tiap tahunnya hanya berkisar 50 orang siswa/siswi. Tetapi setelah tahun 1980 sampai menjelang alih fungsi ke SMA Negeri tahun 1989/1990 (kurun waktu 10 tahun) perkembangan SPG Negeri Tangerang terus meningkat, dan animo masuk ke SPG Negeri Tangerang terus meningkat. Hal ini dapat dilihat dari jumlah siswa baru kelas 1 (satu) yang dapat ditampung atau diterima hanya rata-rata 25% dari jumlah pendaftar. Meninjau kembali luas tanah dan bangunan SPG Negeri Tangerang yang hanya 800 m2 (berukuran 20 m2 x 40 m2), maka lembaga berusaha untuk memindahkannya ke lokasi yang lebih memadai atau layak. Hal ini pernah direncanakan ke daerah Cisauk Kecamatan Serpong, ke daerah Priang, ke daerah Bencongan, Perumnas II Tangerang, ke Cikokol dan bahkan ketanah milik Departemen Kehakiman (dari tahun 1983 s/d 1987) namun selalu tidak membuahkan hasil.</br>
                    </div>
                </div>
                <div class="col-md-6 ps-md-4">
                    <div class="sejarah-text">
                        <br>Pada tahun 1989 SPG diseluruh Indonesia dihapus dan diganti dengan LPTK (Lembaga Pendidikan dan Tenaga Kependidikan) atau setara dengan D II. Sehubungan dengan penggantian tersebut, maka SPG Negeri Tangerang beralih fungsi menjadi SMA Negeri 5 Tangerang. Memperhatikan luas tanah yang hanya 800 m2 sepertinya tidak layak lagi digunakan apalagi jumlah siswa yang semakin meningkat. Hal inilah Lembaga berinisiatif menugaskan salah seorang guru untuk mengupayakan pencarian dan pemindahan lokasi SMU Negeri 5 Tangerang ketempat yang lebih luas serta layak. Melalui proses yang cukup alot dan tapi pasti, maka pada tanggal 20 Juni 1996 (dalam waktu 6 tahun) permohonan tanah untuk lokasi gedung SMU Negeri 6 Tangerang dapat terwujud dengan status pinjam pakai selama 25 tahun dan dapat diperpanjang di lokasi tanah milik PAP II dengan persetujuan Menteri Perhubungan dan Surat Menteri Keuangan.</br>

                        <br>Dengan terwujudnya lokasi untuk gedung SMU Negeri 6 dari PAP II, yang menjadi pemikiran adalah masalah pembangunan gedung atau fisiknya apalagi adanya pembicaraan dari pihak PAP II dengan lembaga SMU Negeri 6 Tangerang yaitu : "Apabila lokasi yang diberikan oleh PAP II tidak segera dibangun, maka PAP II akan mencabut kembali perjanjian Pinjam Pakai" . Hal inilah yang memacu lembaga SMU Negeri 6 Tangerang semakin kerja keras sekalipun dalam keadaan cemas dan khawatir. Namun dibalik kecemasan dan kekhawatiran itu, lembaga SMU Negeri 6 Tangerang selalu eksis menempuh misi dengan melalui 3 (tiga) sumber proyek yang mendanai pembangunan gedung SMU Negeri 6 Tangerang, dan hal ini dilakukan dengan melalui : Pembangunan Gedung Bantuan Kodya Tangerang, Pembangunan Gedung Bantuan APBN Kanwil Depdikbud Prop. Jawa Barat, dan Pembangunan Gedung Bantuan EOCF.</br>
                    </div>
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