<div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="register">
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                    <div class="col-md-6">
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-md-4 col-form-label text-md-end text-start">Username</label>
                    <div class="col-md-6">
                        <input type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror" id="username" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                    <div class="col-md-6">
                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
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
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Register</span>
                            <span wire:loading>Creating account...</span>
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center mt-3">
                <small class="text-muted">
                    Already have an account?
                    <a href="{{ route('login') }}" wire:navigate class="text-decoration-none">Login here</a>
                </small>
            </div>
        </div>
    </div>
</div> 