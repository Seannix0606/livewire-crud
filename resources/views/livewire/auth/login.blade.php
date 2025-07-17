<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header text-center">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="login">
                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                    <div class="col-md-6">
                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" required autofocus>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                    <div class="col-md-6">
                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Login</span>
                            <span wire:loading>Logging in...</span>
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center mt-3">
                <small class="text-muted">
                    Don't have an account yet?
                    <a href="{{ route('register') }}" wire:navigate class="text-decoration-none">Register here</a>
                </small>
            </div>
        </div>
    </div>
</div> 