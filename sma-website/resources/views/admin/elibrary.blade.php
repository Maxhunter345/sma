@extends('layouts.admin')

@section('title', 'E-Library Management')

@section('content')
<div class="container">
    <h1 class="my-4">Manage Borrow Requests</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Book Title</th>
                <th>Request Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowRequests as $request)
            <tr>
                <td>{{ $request->student->name }}</td>
                <td>{{ $request->book->title }}</td>
                <td>{{ $request->created_at->format('d M Y') }}</td>
                <td>
                    <form action="{{ route('admin.elibrary.approve', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.elibrary.decline', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Decline</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection