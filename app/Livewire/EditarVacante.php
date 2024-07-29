<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class EditarVacante extends Component

{



    public $vacante_id;     //No lo podemos nombrar como id puesto que id es una palabra reservada de livewire
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    // mount es un hook que se dispara al montarse el componente parecio a useEfect de React
    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    use WithFileUploads;

    //establecemos las reglas salvo en la imagen puesto que no es necesario guardar nuva imagen
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',   //Con nullable le decimos que el campo puede ir vacio pero si tiene una imagen debe cumplir las reglas posteriores 

    ];




    public function editarVacante()
    {
        $datos =  $this->validate();    //datos es lo que está acutalmente en el formulario y tiene que guardar las reglas de validación


        // Si hay una nueva imagen
        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/vacantes');     // la guardamoes en la carpeta storage/public/vancantes
            $datos['imagen'] = str_replace('public/vacantes', '', $imagen);     //reemplazamos el nombre de la imagen para quitarle la extensión
        }

        // Encontrar la vacante a editar

        $vacante = Vacante::find($this->vacante_id);         //vacante contiene la información de la bd que tenemos que reescribir

        // Asignar Valores

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;   // si ha imagen la guardamos y si no sequeda como esta



        // Guardar la vacante

        $vacante->save();

        // redireccionar

        session()->flash('mensaje', 'La vacante se actualizó correctamente');

        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
