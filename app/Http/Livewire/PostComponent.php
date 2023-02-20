<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostComponent extends Component
{
    protected $rules = [
        'nickname' => 'required|unique',
        'content' => 'required',
        'category' => 'required'
    ];

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->first();

        $post->delete();
 
        $this->redirect('/confirmation');
    }

    public function render()
    {
        $posts = Post::all();
        return view('livewire.crud.post-component', ['posts' => $posts])->layout('livewire.layouts.base');
    }
}