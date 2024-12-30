@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="/images/Logo SMA.png" alt="Logo" class="mb-4" style="width: 100px">
                    <h2 class="card-title mb-4">PPDB SMAN 6 TANGERANG</h2>
                    <p class="mb-4">Hasil Seleksi Penerimaan Peserta Didik Baru (PPDB) 2024</p>
                    
                    <form action="{{ route('ppdb.check') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN/No. Pendaftaran" required value="{{ old('nisn') }}">
                                    <button class="btn btn-primary" type="submit">Cek Hasil</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if(isset($result))
                        @if($accepted)
                            <div class="alert alert-success">
                                <h4 class="alert-heading">Selamat! 🎉</h4>
                                <p class="mb-0">Anda diterima di SMA Negeri 6 Tangerang!</p>
                                @if(isset($student))
                                <hr>
                                <div class="text-start">
                                    <p class="mb-1"><strong>NISN:</strong> {{ $student->nisn }}</p>
                                    <p class="mb-1"><strong>Nama:</strong> {{ $student->name }}</p>
                                    <p class="mb-0"><strong>Asal Sekolah:</strong> {{ $student->asal_sekolah }}</p>
                                </div>
                                @endif
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <h4 class="alert-heading">Mohon Maaf</h4>
                                <p class="mb-0">Anda belum diterima di SMA Negeri 6 Tangerang.</p>
                                <hr>
                                <p class="mb-0">Tetap semangat dan jangan menyerah!</p>
                            </div>
                        @endif
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection