@extends('layouts.app')

@section('styles')
<style>
.login-container {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
}

.login-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.login-header {
    background: #1C2E4E;
    color: white;
    padding: 20px;
    border-radius: 10px 10px 0 0;
    text-align: center;
}

.login-body {
    padding: 30px;
}

.form-control:focus {
    border-color: #1C2E4E;
    box-shadow: 0 0 0 0.2rem rgba(28, 46, 78, 0.25);
}

.btn-login {
    background: #1C2E4E;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    width: 100%;
}

.btn-login:hover {
    background: #162441;
    color: white;
}
</style>
@endsection

@section('content')
<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-card">
                    <div class="login-header">
                        <h4 class="mb-0">Sign In E-Learning</h4>
                    </div>
                    <div class="login-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember username</label>
                            </div>

                            <button type="submit" class="btn btn-login">Log in</button>
                            
                            <div class="mt-3 text-center">
                                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection