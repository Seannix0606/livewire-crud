<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="float-start">Product List</div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('products.create') }}" wire:navigate class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> Add New Product
                    </a>
                </div>
                <div class="col-md-6">
                    <input wire:model.live="search" type="text" class="form-control" placeholder="Search products...">
                </div>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">
                            <a href="#" wire:click.prevent="sortBy('code')" class="text-decoration-none">
                                Code
                                @if($sortField === 'code')
                                    @if($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">
                            <a href="#" wire:click.prevent="sortBy('name')" class="text-decoration-none">
                                Name
                                @if($sortField === 'name')
                                    @if($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">Image</th>
                        <th scope="col">
                            <a href="#" wire:click.prevent="sortBy('quantity')" class="text-decoration-none">
                                Quantity
                                @if($sortField === 'quantity')
                                    @if($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">
                            <a href="#" wire:click.prevent="sortBy('price')" class="text-decoration-none">
                                Price
                                @if($sortField === 'price')
                                    @if($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-height: 50px; max-width: 50px;">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" wire:navigate class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-eye-fill"></i> View
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" wire:navigate class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <button type="button" wire:click.prevent="deleteProduct({{ $product->id }})" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <span class="text-danger">
                                <strong>No Product Found!</strong>
                            </span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div> 