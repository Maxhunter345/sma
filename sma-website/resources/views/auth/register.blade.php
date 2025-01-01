@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="mt-3 card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="my-3">Register</h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.login-container {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
}

.btn-primary {
    background-color: #1C2E4E;
    border: none;
}

.btn-primary:hover {
    background-color: #1C2E4E;
}

.card {
    border: none;
    border-radius: 10px;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    background-color: #1C2E4E !important;
}

.form-control:focus {
    border-color: #1C2E4E;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

a:hover {
    color: #1C2E4E;
}
</style>
@endsection