@extends('layouts.app')

@section('content')
<div class="elearning-dashboard">
    <div class="container py-4">
        <!-- User Info -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar mb-3">
                            <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Avatar" class="rounded-circle" style="width: 100px">
                        </div>
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        <p class="card-text text-muted">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">My Courses</h4>
                            @if(Auth::user()->isAdmin())
                                <a href="/e-learning/manage-courses" class="btn btn-primary">Manage Courses</a>
                            @endif
                        </div>
                        
                        <div class="row g-4">
                            @foreach($courses as $course)
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $course->name }}</h5>
                                        <p class="card-text text-muted">{{ $course->code }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <a href="#" class="btn btn-outline-primary btn-sm">Enter Course</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection