@extends('layouts.admin')

@section('styles')
<style>
.admin-news-card {
    transition: transform 0.3s ease;
}

.admin-news-card:hover {
    transform: translateY(-5px);
}

.news-thumbnail {
        max-width: 150px;
        max-height: 100px;
        object-fit: cover;
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola E-News</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNewsModal">
            <i class="fas fa-plus me-2"></i>Tambah Berita
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/app/public/' . $item->image) }}" class="news-thumbnail" alt="{{ $item->title }}" style="max-width: 150px; max-height: 100px; object-fit: cover;">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->writer_name }}</td>
                            <td>{{ $item->published_date }}</td>
                            <td>{{ $item->created_at->format('d F Y') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#editNewsModal{{ $item->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.enews.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="createNewsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.enews.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Berita Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="writer_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" name="published_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Tambahan</label>
                        <input type="file" class="form-control" name="additional_images[]" multiple>
                        <small class="text-muted">Upload beberapa gambar tambahan (opsional)</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konten</label>
                        <textarea class="form-control" name="content" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach($news as $item)
<div class="modal fade" id="editNewsModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.enews.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" value="{{ $item->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="writer_name" value="{{ $item->writer_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" name="published_date" value="{{ $item->published_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="image">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Tambahan</label>
                        <input type="file" class="form-control" name="additional_images[]" multiple>
                        <small class="text-muted">Upload beberapa gambar tambahan (opsional)</small>
                            @if($item->additional_images)
                                <div class="existing-images mt-2">
                                    @php $additionalImages = json_decode($item->additional_images) ?? []; @endphp
                                @foreach($additionalImages as $index => $image)
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ asset('storage/app/public/' . $image) }}" class="news-thumbnail">
                                        <form action="{{ route('admin.enews.remove-image', ['news' => $item->id, 'index' => $index]) }}" method="POST" class="position-absolute" style="top: 0; right: 0;">
                                    @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus gambar ini?')">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        @endif
    </div>
                    <div class="mb-3">
                        <label class="form-label">Konten</label>
                        <textarea class="form-control" name="content" rows="5" required>{{ $item->content }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
