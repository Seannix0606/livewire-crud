<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Laravel 11 CRUD Application Tutorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @livewireStyles
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="mt-3">
                    <a href="{{ route('products.index') }}" wire:navigate class="text-decoration-none text-dark">
                        Laravel 11 CRUD Application
                    </a>
                </h3>
            </div>
            <div class="col-md-4 text-end">
                @auth
                    <div class="mt-3">
                        <span class="text-muted">Welcome, {{ auth()->user()->name }}!</span>
                        @livewire('auth.logout')
                    </div>
                @endauth
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>