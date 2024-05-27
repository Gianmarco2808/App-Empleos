<?php

namespace App\Livewire;

use Livewire\Component;

class ShowVacante extends Component
{
    public $vacante;

    public function render()
    {
        return view('livewire.show-vacante');
    }
}
