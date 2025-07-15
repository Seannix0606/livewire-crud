<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'id'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function deletePost($id)
    {
        $posts = session()->get('posts', []);
        $filtered = array_filter($posts, fn($post) => $post['id'] !== (int)$id);

        if (count($filtered) === count($posts)) {
            session()->flash('error', 'Post not found.');
            return;
        }

        session()->put('posts', array_values($filtered));
        session()->flash('success', 'Post deleted successfully.');
    }

    public function render()
    {
        $posts = collect(session()->get('posts', []));

        if ($this->search) {
            $posts = $posts->filter(function ($post) {
                return str_contains(strtolower($post['title']), strtolower($this->search)) ||
                       str_contains(strtolower($post['content']), strtolower($this->search));
            });
        }

        $posts = $posts->sortBy([$this->sortField, $this->sortDirection]);

        // Manual pagination for session data
        $perPage = 5;
        $currentPage = $this->page;
        $offset = ($currentPage - 1) * $perPage;
        $paginatedPosts = $posts->slice($offset, $perPage);

        return view('livewire.posts.index', [
            'posts' => $paginatedPosts,
            'totalPosts' => $posts->count(),
            'perPage' => $perPage,
            'currentPage' => $currentPage,
        ]);
    }
} 