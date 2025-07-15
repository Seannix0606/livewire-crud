<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Edit Post
            </div>
            <div class="float-end">
                <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3 row">
                    <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                    <div class="col-md-6">
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="content" class="col-md-4 col-form-label text-md-end text-start">Content</label>
                    <div class="col-md-6">
                        <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="5" required></textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Update Post</span>
                            <span wire:loading>Updating...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 