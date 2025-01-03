@extends('layouts.app')

@section('styles')
<style>
.news-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1C2E4E;
    text-align: center;
}

.news-meta {
    font-size: 1rem;
    color: #666;
    text-align: center;
}

.news-main-image {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 10px;
    margin: 20px 0;
}

.news-content {
    text-align: justify;
    line-height: 1.8;
}

.additional-images img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 10px;
}

.additional-images .image-container {
    margin-bottom: 20px;
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="news-title mb-4">{{ $news->title }}</h1>

            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="news-meta me-3">
                    <i class="fas fa-user me-2"></i>{{ $news->writer_name }}
                </div>
                <div class="news-meta">
                    <i class="fas fa-calendar-alt me-2"></i>{{ $news->published_date }}
                </div>
            </div>

            <!-- Gambar Utama -->
            @if($news->image)
                <img src="{{ asset('storage/app/public/' . $news->image) }}" class="news-main-image" alt="{{ $news->title }}">
            @endif

            <!-- Konten -->
            <div class="news-content mb-5">
                {!! nl2br(e($news->content)) !!}
            </div>

            <!-- Gambar Tambahan -->
            @if($news->additional_images)
                <div class="additional-images">
                    <div class="row">
                        @php $additionalImages = json_decode($news->additional_images) @endphp
                        @foreach($additionalImages as $image)
                        <div>
                            <img src="{{ asset('storage/app/public/' . $image) }}" class="img-fluid" alt="Additional Image">
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('enews.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
