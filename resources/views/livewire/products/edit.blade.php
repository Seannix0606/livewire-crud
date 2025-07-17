<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Edit Product
            </div>
            <div class="float-end">
                <a href="{{ route('products.index') }}" wire:navigate class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                    <div class="col-md-6">
                        <input type="text" wire:model="code" class="form-control @error('code') is-invalid @enderror" id="code">
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                    <div class="col-md-6">
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                    <div class="col-md-6">
                        <input type="number" wire:model="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity">
                        @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                    <div class="col-md-6">
                        <input type="number" step="0.01" wire:model="price" class="form-control @error('price') is-invalid @enderror" id="price">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                    <div class="col-md-6">
                        <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="image" class="col-md-4 col-form-label text-md-end text-start">Product Image</label>
                    <div class="col-md-6">
                        @if($currentImage)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $currentImage) }}" alt="Current image" class="img-thumbnail" style="max-height: 150px;">
                                <small class="d-block text-muted">Current image</small>
                            </div>
                        @endif
                        <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Optional. Leave empty to keep current image. Max size: 1MB. Accepted formats: JPG, PNG, GIF, SVG</small>
                        
                        @if ($image)
                            <div class="mt-2">
                                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="max-height: 100px;">
                                <small class="d-block text-muted">New image preview</small>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Update Product</span>
                            <span wire:loading>Updating...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 