<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    //habilitamos la carga de documentos
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf|max:1024'
    ];

    //Este metodo se inicializa al montarse el componente
    public function mount(Vacante $vacante)
    {
        //le asignmos la vacante que le manda el showVacante a este componente livewire y se la asignamos a su atributo de clase
        $this->vacante = $vacante;
    }


    public function inscribirse()
    {
        $datos =   $this->Validate();


        //  ALMACENAR CV EN EL DISCO DURO
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);


        //  REAMOS CANDIDATO A LA VACANTE Y LO GUARDAMOS EN LA TABLA CANDIDATO CON LOS CAMPOS REFERIDOS EN SU FILABLE DE MODELO

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
            //la column a vacante_id de la  tabla candidatos se rellena con la relación que hemos puesto en el modelo Vacante
        ]);


        // CREAR NOTIFICACION Y ENVIAR EMAIL

        // con el metodo recultador de vacante tomamos el uusario que la creo y el el metodo notify el la notifacion, que toma como parametro la notficacion con sus argumentos requerios
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // MOSTAR AL USUARIO MENSAJE DE OK 

        //Creamos una sesión con un mesaje flash. esta session la controlamos en la vista de postular-vacante.blade
        session()->flash('mensaje', 'Se envio correctamente tu información');

        //lo redirigimos un paso atras
        return redirect()->back();
    }






    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
