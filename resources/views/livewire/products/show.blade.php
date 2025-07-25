<div>
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Product Information
            </div>
            <div class="float-end">
                <a href="{{ route('products.index') }}" wire:navigate class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Code:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $product->code }}
                </div>
            </div>
            <div class="row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $product->name }}
                </div>
            </div>
            <div class="row">
                <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $product->quantity }}
                </div>
            </div>
            <div class="row">
                <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $product->price }}
                </div>
            </div>
            <div class="row">
                <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $product->description }}
                </div>
            </div>
            @if($product->image)
            <div class="row">
                <label for="image" class="col-md-4 col-form-label text-md-end text-start"><strong>Product Image:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 300px; border-radius: 8px;">
                </div>
            </div>
            @endif
        </div>
    </div>
</div> 