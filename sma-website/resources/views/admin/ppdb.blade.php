@extends('layouts.admin')

@section('title', 'PPDB Management')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kelola Data PPDB</h3>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger m-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <div class="row mb-4">
                <!-- Form Input Manual -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Input Manual</h5>
                            <form action="{{ route('admin.ppdb.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">NISN</label>
                                    <input type="text" class="form-control" name="nisn" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control" name="asal_sekolah" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Form Import Excel -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Import Excel</h5>
                            <form action="{{ route('admin.ppdb.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">File Excel</label>
                                    <input type="file" class="form-control" name="file" accept=".xlsx,.xls" required>
                                    <small class="text-muted">Format kolom: nisn, name, asal_sekolah</small>
                                </div>
                                <button type="submit" class="btn btn-success">Import Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Daftar Siswa Diterima</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Asal Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                <tr>
                                    <td>{{ $student->nisn }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->asal_sekolah }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="deleteStudent('{{ $student->id }}')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function deleteStudent(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        fetch(`/admin/ppdb/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert('Gagal menghapus data');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
        });
    }
}
</script>
@endpush
@endsection