<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public $currentRoute;

    public function mount()
    {
        $this->currentRoute = request()->path() === '/' ? '/' : request()->path();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
