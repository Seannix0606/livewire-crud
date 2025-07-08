@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-6">
        @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
        @endsession
        @session('error')
        <div class="alert alert-danger" role="alert">
            {{ $value }}
        </div>
        @endsession
        <div class="card">
            <div class="card-header text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                <form action="{{ route('login') }}" method="post">
                    @csrf   
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <small class="text-muted">
                        Don't have an account yet?
                        <a href="{{ route('register') }}" class="text-decoration-none">Register here</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 