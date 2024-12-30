@extends('layouts.app')

@section('styles')
<style>
.admin-prestasi-card {
   transition: transform 0.3s ease;
}

.admin-prestasi-card:hover {
   transform: translateY(-5px);
}

.prestasi-thumbnail {
   width: 100px;
   height: 100px;
   object-fit: cover;
   border-radius: 8px;
}
</style>
@endsection

@section('content')
<div class="container py-5">
   <div class="d-flex justify-content-between align-items-center mb-4">
       <h2>Kelola Prestasi</h2>
       <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPrestasiModal">
           <i class="fas fa-plus me-2"></i>Tambah Prestasi
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
                           <th>Tanggal</th>
                           <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($prestasis as $prestasi)
                       <tr>
                           <td>
                               <img src="{{ asset('storage/' . $prestasi->image) }}" class="prestasi-thumbnail" alt="{{ $prestasi->title }}">
                           </td>
                           <td>{{ $prestasi->title }}</td>
                           <td>{{ $prestasi->created_at->format('d F Y') }}</td>
                           <td>
                               <button class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#editPrestasiModal{{ $prestasi->id }}">
                                   <i class="fas fa-edit"></i>
                               </button>
                               <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}" method="POST" class="d-inline">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">
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
<div class="modal fade" id="createPrestasiModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
       <div class="modal-content">
           <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-header">
                   <h5 class="modal-title">Tambah Prestasi Baru</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="mb-3">
                       <label class="form-label">Judul</label>
                       <input type="text" class="form-control" name="title" required>
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Gambar</label>
                       <input type="file" class="form-control" name="image" required>
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
@foreach($prestasis as $prestasi)
<div class="modal fade" id="editPrestasiModal{{ $prestasi->id }}" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
       <div class="modal-content">
           <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="modal-header">
                   <h5 class="modal-title">Edit Prestasi</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="mb-3">
                       <label class="form-label">Judul</label>
                       <input type="text" class="form-control" name="title" value="{{ $prestasi->title }}" required>
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Gambar</label>
                       <input type="file" class="form-control" name="image">
                       <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Konten</label>
                       <textarea class="form-control" name="content" rows="5" required>{{ $prestasi->content }}</textarea>
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

@section('scripts')
<script>
function deletePrestasi(id) {
   if(confirm('Apakah Anda yakin ingin menghapus prestasi ini?')) {
       fetch(`/admin/prestasi/${id}`, {
           method: 'DELETE',
           headers: {
               'X-CSRF-TOKEN': '{{ csrf_token() }}'
           }
       }).then(response => {
           if(response.ok) {
               window.location.reload();
           }
       });
   }
}
</script>
@endsection