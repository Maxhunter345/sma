@extends('layouts.app')

@section('styles')
<style>
.news-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    height: 100%;
}

.news-card:hover {
    transform: translateY(-5px);
}

.news-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.news-title {
    color: #1C2E4E;
    font-weight: 600;
    font-size: 1.2rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-date {
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
    <h2 class="text-center mb-4">Berita SMAN 6 Tangerang</h2>
    
    <div class="row g-4">
        @foreach($news as $item)
        <div class="col-md-4">
            <div class="news-card card">
                <img src="{{ asset('storage/' . $item->image) }}" class="news-image" alt="{{ $item->title }}">
                <div class="card-body">
                    <h5 class="news-title mb-2">{{ $item->title }}</h5>
                    <p class="news-date mb-2">
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ $item->created_at->format('d F Y') }}
                    </p>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#newsModal{{ $item->id }}">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal untuk setiap berita -->
        <div class="modal fade" id="newsModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $item->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $item->image) }}" class="modal-image mb-3" alt="{{ $item->title }}">
                        <p class="news-date mb-3">
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ $item->created_at->format('d F Y') }}
                        </p>
                        <div class="news-content">
                            {!! $item->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection