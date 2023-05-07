<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardComponent extends Component
{
    public $showCard = false;

    public function showCard()
    {
        $this->showCard = true;
    }

    public function render()
    {
        return view('livewire.card-component');
    }
}
