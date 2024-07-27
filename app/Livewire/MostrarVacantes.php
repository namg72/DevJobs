<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()

    {

        //no traemos la vacantes que corresponda al usaurio que esta autenteicado y la paginamos
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}