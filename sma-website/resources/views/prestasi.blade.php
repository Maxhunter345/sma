@extends('layouts.app')

@section('styles')
<style>
.prestasi-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    height: 100%;
}

.prestasi-card:hover {
    transform: translateY(-5px);
}

.prestasi-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.prestasi-title {
    color: #1C2E4E;
    font-weight: 600;
    font-size: 1.2rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.prestasi-date {
    color: #666;
    font-size: 0.9rem;
}

.modal-image {
    max-width: 100%;
    height: auto;
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Prestasi SMAN 6 Tangerang</h2>
    
    <div class="row g-4">
        @foreach($prestasis as $prestasi)
        <div class="col-md-4">
            <div class="prestasi-card card">
                <img src="{{ asset('storage/' . $prestasi->image) }}" class="prestasi-image" alt="{{ $prestasi->title }}">
                <div class="card-body">
                    <h5 class="prestasi-title mb-2">{{ $prestasi->title }}</h5>
                    <p class="prestasi-date mb-2">
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ $prestasi->created_at->format('d F Y') }}
                    </p>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#prestasiModal{{ $prestasi->id }}">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal untuk setiap prestasi -->
        <div class="modal fade" id="prestasiModal{{ $prestasi->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $prestasi->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $prestasi->image) }}" class="modal-image mb-3" alt="{{ $prestasi->title }}">
                        <p class="prestasi-date mb-3">
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ $prestasi->created_at->format('d F Y') }}
                        </p>
                        <div class="prestasi-content">
                            {!! $prestasi->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection