<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmationComponent extends Component
{
    public function render()
    {
        return view('livewire.crud.confirmation-component')->layout('livewire.layouts.base');
    }
}
