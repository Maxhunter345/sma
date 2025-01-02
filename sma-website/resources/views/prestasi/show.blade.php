@extends('layouts.app')

@section('styles')
<style>
.prestasi-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1C2E4E;
    text-align: center;
}

.prestasi-meta {
    font-size: 1rem;
    color: #666;
}

.prestasi-main-image {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 10px;
    margin: 20px 0;
}

.prestasi-content {
    text-align: justify;
    line-height: 1.8;
}

.additional-images {
    margin-top: 30px;
}

.additional-images img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 20px;
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="prestasi-title mb-4">{{ $prestasi->title }}</h1>
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="prestasi-meta">
                    <i class="fas fa-calendar-alt me-2"></i>
                    {{ $prestasi->created_at->format('d F Y') }} 
                    {{ $prestasi->day }}
                </div>
                <div class="prestasi-meta">
                    <i class="fas fa-user me-2"></i>
                    {{ $prestasi->writer_name }}
                </div>
            </div>

            <!-- Gambar Utama -->
            @if($prestasi->image)
                <img src="{{ asset('storage/' . $prestasi->image) }}" class="prestasi-main-image" alt="{{ $prestasi->title }}">
            @endif

            <!-- Konten -->
            <div class="prestasi-content mb-5">
                {!! nl2br(e($prestasi->content)) !!}
            </div>

            <!-- Gambar Tambahan -->
            @if($prestasi->additional_images && is_array(json_decode($prestasi->additional_images)))
                <div class="additional-images">
                    <div class="row">
            @foreach(json_decode($prestasi->additional_images) as $image)
                <div>
                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="Additional Image">
                </div>
            @endforeach
        </div>
    </div>
@endif

            <div class="text-center mt-4">
                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Prestasi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection