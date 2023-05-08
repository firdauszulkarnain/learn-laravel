<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public $post, $title, $content, $post_id;
    public $action = false;

    public function resetField()
    {
        $this->title = null;
        $this->content = null;
        $this->post_id  = null;
    }
    public function render()
    {
        $this->post = Post::get();
        return view('livewire.post-index');
    }


    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->action = false;
        $this->resetField();
        $this->emit('post');
    }

    public function edit($id)
    {
        $this->action = true;
        $post = Post::where('id', $id)->first();
        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function cancel()
    {
        $this->action = false;
        $this->resetField();
    }

    public function delete($id)
    {
        if ($id) {
            Post::where('id', $id)->delete();
        }
    }
}
