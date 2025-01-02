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
                   <a href="{{ route('enews.show', $item->id) }}" class="btn btn-primary w-100">
                       Selengkapnya
                   </a>
               </div>
           </div>
       </div>
       @endforeach
   </div>
</div>
@endsection