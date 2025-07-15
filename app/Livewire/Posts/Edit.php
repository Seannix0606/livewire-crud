<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Edit extends Component
{
    public $postId;
    public $title = '';
    public $content = '';
    public $post;

    protected function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }

    public function mount($id)
    {
        $this->postId = (int)$id;
        $posts = session()->get('posts', []);
        $this->post = collect($posts)->firstWhere('id', $this->postId);

        if (!$this->post) {
            session()->flash('error', 'Post not found.');
            return redirect()->route('posts.index');
        }

        $this->title = $this->post['title'];
        $this->content = $this->post['content'];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $posts = session()->get('posts', []);
        $updated = false;

        foreach ($posts as &$post) {
            if ($post['id'] === $this->postId) {
                $post['title'] = $this->title;
                $post['content'] = $this->content;
                $post['updated_at'] = now()->toDateTimeString();
                $updated = true;
                break;
            }
        }

        if (!$updated) {
            session()->flash('error', 'Post not found.');
            return redirect()->route('posts.index');
        }

        session()->put('posts', $posts);
        session()->flash('success', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
} 