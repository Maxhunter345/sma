@extends('layouts.admin') 

@section('title', 'Kelola Guru') 

@section('content') 
<div class="container"> 
    <h1 class="my-4">List Guru & Mata Pelajaran</h1> 

    <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data"> 
        @csrf 
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3"> 
                    <label>Nama Guru:</label> 
                    <input type="text" name="name" class="form-control" required> 
                </div> 
                <div class="form-group mb-3"> 
                    <label>Mata Pelajaran:</label> 
                    <input type="text" name="subject" class="form-control" required> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3"> 
                    <label>Email:</label> 
                    <input type="email" name="email" class="form-control"> 
                </div>
                <div class="form-group mb-3"> 
                    <label>No. Telepon:</label> 
                    <input type="text" name="phone" class="form-control"> 
                </div>
                <div class="form-group mb-3"> 
                    <label>Foto:</label> 
                    <input type="file" name="photo" class="form-control" accept="image/*"> 
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Tambah Guru</button> 
    </form> 

    <table class="table mt-4"> 
        <thead> 
            <tr> 
                <th>Foto</th>
                <th>Nama Guru</th> 
                <th>Mata Pelajaran</th>
                <th>Email</th>
                <th>No. Telepon</th> 
                <th>Aksi</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($teachers as $subject => $group) 
                <tr> 
                    <td colspan="6" class="bg-light"><strong>{{ $subject }}</strong></td>
                </tr>
                @foreach($group as $teacher)
                <tr> 
                    <td>
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Foto {{ $teacher->name }}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded-circle">
                        @else
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                {{ strtoupper(substr($teacher->name, 0, 1)) }}
                            </div>
                        @endif
                    </td>
                    <td>{{ $teacher->name }}</td> 
                    <td>{{ $teacher->subject }}</td> 
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td> 
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $teacher->id }}">
                            Edit
                        </button>
                        
                        <form action="{{ route('admin.guru.delete', $teacher->id) }}" method="POST" class="d-inline"> 
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button> 
                        </form> 
                    </td> 
                </tr> 

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $teacher->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data Guru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.guru.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label>Nama Guru:</label>
                                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Mata Pelajaran:</label>
                                        <input type="text" name="subject" class="form-control" value="{{ $teacher->subject }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" value="{{ $teacher->email }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>No. Telepon:</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $teacher->phone }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Foto:</label>
                                        <input type="file" name="photo" class="form-control" accept="image/*">
                                        @if($teacher->photo)
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach 
        </tbody> 
    </table> 

    <!-- Tombol Navigasi -->
    <div class="d-flex justify-content-between mt-4">
        @if($currentPage > 1)
            <a href="{{ route('admin.guru.index', ['page' => $currentPage - 1]) }}" class="btn btn-secondary">← Sebelumnya</a>
        @else
            <button class="btn btn-secondary" disabled>← Sebelumnya</button>
        @endif

        @if($currentPage < $totalPages)
            <a href="{{ route('admin.guru.index', ['page' => $currentPage + 1]) }}" class="btn btn-secondary">Berikutnya →</a>
        @else
            <button class="btn btn-secondary" disabled>Berikutnya →</button>
        @endif
    </div>
</div> 
@endsection