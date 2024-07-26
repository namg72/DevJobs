<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;


    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required',
    ];

    public function crearVacante()
    {

        $datos =  $this->validate();
    }

    public function render()
    {
        //consulta BD para pasarla a la vistga

        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
