@extends('layouts.app') 

@section('title', 'Halaman Guru') 

@section('content') 

@include('partials.hero') 

<!-- Bagian Guru & Staff -->
<div class="text-center py-4" style="background-color: white;">
    <h2 style="font-weight: bold; color: #1C2E4E;">Guru & Staff</h2>
</div>

<!-- Bagian Card Besar (Dengan Tombol Navigasi) -->
<div style="background-color: #1C2E4E; padding: 20px; position: relative;"> 

    <!-- Tombol Navigasi Kiri & Kanan -->
    <a href="{{ route('guru.page', ['page' => $currentPage - 1]) }}" class="btn btn-navigation" style="
        position: absolute; 
        top: 20px; 
        left: 85px; 
        background-color: white; 
        color: #1C2E4E; 
        border-radius: 50%;
        width: 40px; 
        height: 40px; 
        font-size: 18px;
        border: 2px solid #1C2E4E;
        {{ $currentPage <= 1 ? 'pointer-events: none; opacity: 0.5;' : '' }}
    ">
        ←
    </a>

    <a href="{{ route('guru.page', ['page' => $currentPage + 1]) }}" class="btn btn-navigation" style="
        position: absolute; 
        top: 20px; 
        right: 85px; 
        background-color: white; 
        color: #1C2E4E; 
        border-radius: 50%;
        width: 40px; 
        height: 40px; 
        font-size: 18px;
        border: 2px solid #1C2E4E;
        {{ $currentPage >= $totalPages ? 'pointer-events: none; opacity: 0.5;' : '' }}
    ">
        →
    </a>

<div style="margin-top: 80px;"></div>
    <!-- Bagian Card Guru -->
        <div class="row g-4"> 
            @foreach($teachers->skip(($currentPage - 1) * 8)->take(8) as $subject => $group)
                <div class="col-md-6">
                    <div class="p-3 shadow-sm" style="background-color: white; width: 80%; height: 300px; margin-left: 70px; margin-bottom: 30px;">
                        <h5 class="card-title" style="color: #1C2E4E; font-weight: bold">{{ $subject }}</h5>
                            <hr style="border: 1px solid black;">
                            <ol style="color: #1C2E4E; padding-left: 20px;">
                            @foreach($group as $teacher)
    <li>
        <a href="{{ route('guru.show', ['teacher' => $teacher->id]) }}" 
           style="color: #1C2E4E; text-decoration: none;">
            {{ $teacher->name }}
        </a>
    </li>
@endforeach
</ol>
                    </div>
                </div>
            @endforeach
        </div> 
    </div> 

<!-- Spacer untuk Footer -->
<div style="background-color: white;"></div>

<!-- Footer -->
<footer class="text-center py-3" style="background-color: #1C2E4E; color: white; margin-top: 100px;"> 
    Copyright © 2017 | SMA Negeri 6 Tangerang<br> 
    Created by UMN TEAM 
</footer> 

@endsection
