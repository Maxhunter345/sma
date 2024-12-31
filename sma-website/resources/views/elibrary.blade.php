@extends('layouts.app')

@section('title', 'E-Library')

@section('content')
<div class="container">
    <h1 class="my-4">E-Library</h1>

    <!-- Bagian Membaca Buku Online -->
    <div class="online-books mb-4">
        <iframe style="width:80%;height:600px;margin: 110px;margin-top: 10px;margin-bottom: 10px; " src="https://fliphtml5.com/bookcase/lorcu/red" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe>
    </div>

    <!-- Bagian Peminjaman Buku -->
    <div class="borrow-books">
        <h2 class="mb-3">Peminjaman Buku</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Available Copies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->available_copies }}</td>
                    <td>
                        @if($book->available_copies > 0)
                        <form action="{{ route('library.elibrary.request', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Request</button>
                        </form>
                        @else
                        <button class="btn btn-secondary" disabled>Unavailable</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
