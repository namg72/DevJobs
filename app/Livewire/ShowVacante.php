<?php

namespace App\Livewire;

use League\Flysystem\UrlGeneration\PublicUrlGenerator;
use Livewire\Component;

class ShowVacante extends Component
{
    public $vacante;


    public function render()
    {

        return view('livewire.show-vacante');
    }
}
