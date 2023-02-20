<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreateComponent extends Component
{
    public $nickname;
    public $content;
    public $category = '';
    
    public function render()
    {
        return view('livewire.crud.create-component')->layout('livewire.layouts.base');
    }

    public function create() {
        $this->validate([
            'nickname' => 'required|unique:posts',
            'content' => 'required',
            'category' => 'required'
        ]);

        // Post::create([
        //     'nickname' => $this->nickname,
        //     'content' => $this->content,
        //     'category' => $this->category,
        // ])

        
        $post = new Post();

        $post->nickname = $this->nickname;
        $post->content = $this->content;
        $post->category = $this->category;

        $post->save();

        // $this->dispatchBrowserEvent('success', ['message'=>'New student added successfully!']);
        session()->flash('message', 'Post has been created successfully');
        $this->nickname = '';
        $this->content = '';
        $this->category = '';
    }
}
