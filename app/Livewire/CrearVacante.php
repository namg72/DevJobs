<?php

namespace App\Livewire;

use session;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {

        $datos =  $this->validate();

        // almacenar la imagen

        $imagen = $this->imagen->store('public/vacantes');
        //estraenis el nombre del archivo quitando la ruta de la capeta contenedora
        $nombreImagen = str_replace('public/vacantes/', '', $imagen);
        //reescribimos $datos cono el nuevo nombre de la imagen
        $datos['imagen'] = $nombreImagen;

        // Crear la vacante
        Vacante::create([

            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,  //este es el usuario que está actualmene autenticado
        ]);
        // crear un mensaje


        // Redireccionar al usuario



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
