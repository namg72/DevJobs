<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component

{

    protected $listener = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        dd('desde el componente padre');
    }

    public function render()
    {
        $vacantes = Vacante::all();

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
