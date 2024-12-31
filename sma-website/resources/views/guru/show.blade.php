@extends('layouts.app')

@section('title', $teacher->name)

@section('content')
@include('partials.hero')

<div class="container-fluid py-5" style="background-color: #1C2E4E;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Back Button -->
                <a href="{{ route('guru.page') }}" 
                    class="btn btn-light mb-4"
                    style="color: #1C2E4E;">
                    ← Kembali
                </a>
                
                <!-- Teacher Card -->
                <div class="card shadow-lg">
                    <div class="card-body text-center p-5">
                        <!-- Teacher's Photo -->
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" 
                                alt="{{ $teacher->name }}"
                                class="rounded-circle mb-4"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <div class="rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                                style="width: 200px; height: 200px; background-color: #1C2E4E; color: white; font-size: 64px;">
                                {{ strtoupper(substr($teacher->name, 0, 1)) }}
                            </div>
                        @endif

                        <!-- Teacher's Info -->
                        <h2 class="mb-3" style="color: #1C2E4E; font-weight: bold;">
                            {{ $teacher->name }}
                        </h2>
                        
                        <h4 class="mb-4" style="color: #1C2E4E;">
                            {{ $teacher->subject }}
                        </h4>

                        <!-- Contact Information -->
                        <div class="mt-4">
                            @if($teacher->email)
                                <p class="mb-2" style="color: #1C2E4E;">
                                    <i class="fas fa-envelope me-2"></i>
                                    {{ $teacher->email }}
                                </p>
                            @endif

                            @if($teacher->phone)
                                <p class="mb-2" style="color: #1C2E4E;">
                                    <i class="fas fa-phone me-2"></i>
                                    {{ $teacher->phone }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center py-3" style="background-color: #1C2E4E; color: white; margin-top: 100px;"> 
    Copyright © 2017 | SMA Negeri 6 Tangerang<br> 
    Created by UMN TEAM 
</footer>

@endsection