@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <!-- Book Cover -->
                <div class="md:w-1/3">
                    <div class="aspect-w-3 aspect-h-4">
                        <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="object-cover w-full h-full">
                    </div>
                </div>
                
                <!-- Book Details -->
                <div class="md:w-2/3 p-6">
                    <div class="mb-4">
                        <h1 class="text-3xl font-bold mb-2">{{ $book->title }}</h1>
                        <p class="text-gray-600 text-lg">oleh {{ $book->author }}</p>
                    </div>
                    
                    <div class="mb-6">
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">
                            {{ ucfirst($book->category) }}
                        </span>
                    </div>
                    
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-2">Deskripsi</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $book->description }}
                        </p>
                    </div>
                    
                    <div class="flex space-x-4">
                        <a href="{{ Storage::url($book->file_path) }}" target="_blank" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Baca Sekarang
                        </a>
                        <a href="{{ Storage::url($book->file_path) }}" download 
                           class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('library.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Perpustakaan
            </a>
        </div>
    </div>
</div>
@endsection