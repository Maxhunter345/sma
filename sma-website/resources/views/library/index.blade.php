@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <div class="bg-library-700 text-white">
        <div class="container mx-auto px-4 py-16">
            <h1 class="text-4xl font-bold mb-4">Perpustakaan Digital</h1>
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <div class="w-full md:w-1/2">
                    <input type="text" 
                           id="searchInput" 
                           class="w-full px-4 py-2 rounded-lg text-gray-900 focus:ring-2 focus:ring-library-500 focus:border-transparent" 
                           placeholder="Cari buku...">
                </div>
                <div class="flex gap-2">
                    <button class="category-filter active px-4 py-2 rounded-lg bg-library-600 hover:bg-library-500" data-category="all">Semua</button>
                    <button class="category-filter px-4 py-2 rounded-lg bg-library-800 hover:bg-library-700" data-category="cerpen">Cerpen</button>
                    <button class="category-filter px-4 py-2 rounded-lg bg-library-800 hover:bg-library-700" data-category="puisi">Puisi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Grid -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @forelse($books as $book)
            <div class="book-card" data-category="{{ $book->category }}">
                <div class="book-cover mb-4">
                    <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="rounded shadow">
                </div>
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">{{ $book->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $book->author }}</p>
                <a href="{{ route('library.show', $book->id) }}" 
                   class="inline-block bg-library-600 text-white px-4 py-2 rounded-lg hover:bg-library-500 transition-colors">
                    Baca Sekarang
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Tidak ada buku yang tersedia</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryButtons = document.querySelectorAll('.category-filter');
    const bookCards = document.querySelectorAll('.book-card');

    // Search functionality
    searchInput.addEventListener('input', filterBooks);

    // Category filter
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            categoryButtons.forEach(btn => btn.classList.remove('active', 'bg-library-600'));
            button.classList.add('active', 'bg-library-600');
            filterBooks();
        });
    });

    function filterBooks() {
        const searchTerm = searchInput.value.toLowerCase();
        const activeCategory = document.querySelector('.category-filter.active').dataset.category;

        bookCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const category = card.dataset.category;
            const matchesSearch = title.includes(searchTerm);
            const matchesCategory = activeCategory === 'all' || category === activeCategory;

            card.style.display = matchesSearch && matchesCategory ? 'block' : 'none';
        });
    }
});
</script>
@endpush

@push('styles')
<style>
    .category-filter.active {
        background-color: var(--library-600);
    }
    
    .book-cover img {
        transition: transform 0.3s ease-in-out;
    }
    
    .book-card:hover .book-cover img {
        transform: scale(1.05);
    }
</style>
@endpush
@endsection