<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCanditato;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{

    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme(){

        $datos = $this->validate($this->rules);
        
        //almacenar la imagen
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','',$cv);

        //crear canditado a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //crear notificacion
        $this->vacante->reclutador->notify(new NuevoCanditato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //mostrar al usuario que se envio correctamente
        session()->flash('mensaje', 'El cv se envio correctamente');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
