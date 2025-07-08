@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <h4>Register</h4>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <div class="text-center mt-3">
            <small class="text-muted">
                Already have an account?
                <a href="{{ route('login') }}" class="text-decoration-none">Login here</a>
            </small>
        </div>
    </div>
</div>
@endsection
