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
            <div class="float-start">Post List</div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> Add New Post
                    </a>
                </div>
                <div class="col-md-6">
                    <input wire:model.live="search" type="text" class="form-control" placeholder="Search posts...">
                </div>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">
                            <a href="#" wire:click.prevent="sortBy('id')" class="text-decoration-none">
                                ID
                                @if($sortField === 'id')
                                    @if($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">
                            <a href="#" wire:click.prevent="sortBy('title')" class="text-decoration-none">
                                Title
                                @if($sortField === 'title')
                                    @if($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">Content</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $index => $post)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $post['id'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ Str::limit($post['content'], 100) }}</td>
                        <td>{{ $post['created_at'] ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <button wire:click="deletePost({{ $post['id'] }})" 
                                    wire:confirm="Are you sure you want to delete this post?" 
                                    class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <span class="text-danger">
                                <strong>No Posts Found!</strong>
                            </span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            @if($totalPosts > $perPage)
                <div class="d-flex justify-content-center">
                    <nav>
                        <ul class="pagination">
                            @if($currentPage > 1)
                                <li class="page-item">
                                    <button wire:click="setPage({{ $currentPage - 1 }})" class="page-link">Previous</button>
                                </li>
                            @endif

                            @for($i = 1; $i <= ceil($totalPosts / $perPage); $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <button wire:click="setPage({{ $i }})" class="page-link">{{ $i }}</button>
                                </li>
                            @endfor

                            @if($currentPage < ceil($totalPosts / $perPage))
                                <li class="page-item">
                                    <button wire:click="setPage({{ $currentPage + 1 }})" class="page-link">Next</button>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</div> 