@extends('layouts.admin')

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

.image-preview {
    max-width: 200px;
    margin-top: 10px;
}

.existing-images {
    display: flex;
    gap: 10px;
    margin-top: 10px;
    flex-wrap: wrap;
}

.existing-images img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 4px;
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
                            <th>Penulis</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prestasis as $prestasi)
                        <tr>
                            <td>
                                @if($prestasi->image)
                                    <img src="{{ asset('storage/' . $prestasi->image) }}" class="prestasi-thumbnail" alt="{{ $prestasi->title }}">
                                @endif
                            </td>
                            <td>{{ $prestasi->title }}</td>
                            <td>{{ $prestasi->writer_name }}</td>
                            <td>{{ $prestasi->day }}</td>
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
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="writer_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="published_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control" name="image" required>
                        <div id="mainImagePreview" class="image-preview mt-2"></div>
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
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="writer_name" value="{{ $prestasi->writer_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="published_date" 
                               value="{{ $prestasi->created_at->format('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control" name="image">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        @if($prestasi->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $prestasi->image) }}" alt="Current Image" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tambah Gambar Tambahan</label>
                        <input type="file" class="form-control" name="additional_image">
                        <small class="text-muted">Upload satu gambar tambahan</small>
                        @if($prestasi->additional_images)
                            <div class="existing-images mt-2">
                                @php $additionalImages = json_decode($prestasi->additional_images) ?? []; @endphp
                                @foreach($additionalImages as $index => $image)
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Additional image">
                                        <form action="{{ route('admin.prestasi.remove-image', ['prestasi' => $prestasi->id, 'index' => $index]) }}" 
                                              method="POST" class="position-absolute" style="top: 0; right: 0;">
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
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mendapatkan nama hari dalam Bahasa Indonesia
    function getDayName(date) {
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        return days[date.getDay()];
    }

    // Untuk form create
    const createDateInput = document.querySelector('#createPrestasiModal input[name="published_date"]');
    if(createDateInput) {
        createDateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const dayName = getDayName(selectedDate);
            
            // Membuat hidden input untuk hari
            let hiddenDayInput = document.querySelector('#createPrestasiModal input[name="day"]');
            if (!hiddenDayInput) {
                hiddenDayInput = document.createElement('input');
                hiddenDayInput.type = 'hidden';
                hiddenDayInput.name = 'day';
                this.parentNode.appendChild(hiddenDayInput);
            }
            hiddenDayInput.value = dayName;
        });
    }

    // Untuk form edit
    const editModals = document.querySelectorAll('[id^="editPrestasiModal"]');
    editModals.forEach(modal => {
        const dateInput = modal.querySelector('input[name="published_date"]');
        if(dateInput) {
            dateInput.addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                const dayName = getDayName(selectedDate);
                
                // Membuat hidden input untuk hari
                let hiddenDayInput = modal.querySelector('input[name="day"]');
                if (!hiddenDayInput) {
                    hiddenDayInput = document.createElement('input');
                    hiddenDayInput.type = 'hidden';
                    hiddenDayInput.name = 'day';
                    this.parentNode.appendChild(hiddenDayInput);
                }
                hiddenDayInput.value = dayName;
            });

            // Set initial day value on page load
            const initialDate = new Date(dateInput.value);
            const initialDayName = getDayName(initialDate);
            let hiddenDayInput = modal.querySelector('input[name="day"]');
            if (!hiddenDayInput) {
                hiddenDayInput = document.createElement('input');
                hiddenDayInput.type = 'hidden';
                hiddenDayInput.name = 'day';
                dateInput.parentNode.appendChild(hiddenDayInput);
            }
            hiddenDayInput.value = initialDayName;
        }
    });

    // Image preview untuk gambar utama
    document.querySelector('input[name="image"]').addEventListener('change', function(e) {
        const preview = document.getElementById('mainImagePreview');
        preview.innerHTML = '';
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '200px';
            img.style.height = 'auto';
            img.style.marginTop = '10px';
            img.style.borderRadius = '4px';
            preview.appendChild(img);
        }
        reader.readAsDataURL(this.files[0]);
    });
});
</script>
@endsection