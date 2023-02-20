<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class EditComponent extends Component
{

    public $nickname, $content, $category, $post_id;

    public function mount($id) {
        $post = Post::where('id', $id)->first();

        $this->nickname = $post->nickname;
        $this->content = $post->content;
        $this->category = $post->category;


        $this->post_id = $post->id;
    }

    public function updatePost() {
        $this->validate([
            'nickname' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $post = Post::where('id', $this->post_id)->first();

        $post->nickname = $this->nickname;
        $post->content = $this->content;
        $post->category = $this->category;

        $post->save();

        session()->flash('message','Post has been updated successfully');
    }

    public function render()
    {
        return view('livewire.crud.edit-component')->layout('livewire.layouts.base');
    }
}
