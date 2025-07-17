<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Create extends Component
{
    public $title = '';
    public $content = '';

    protected $rules = [
        'title' => 'required|max:255',
        'content' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $posts = session()->get('posts', []);
        $nextId = session()->get('post_id_counter', 1);

        $newPost = [
            'id' => $nextId,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => now()->toDateTimeString(),
        ];

        $posts[] = $newPost;

        session()->put('posts', $posts);
        session()->put('post_id_counter', $nextId + 1);

        session()->flash('success', 'Post created successfully.');
        return $this->redirectRoute('posts.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
} 