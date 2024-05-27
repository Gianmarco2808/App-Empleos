<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
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
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'imagen' => 'required|image|max:1024',
        'descripcion' => 'required'
    ];

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }

    public function crearVacante(){
        
        $datos = $this->validate($this->rules);
        
        //almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $nombreImagen = str_replace('public/vacantes/','',$imagen);

        //crear vacantes
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' =>$datos['descripcion'],
            'imagen' => $nombreImagen,
            'user_id' => auth()->user()->id
        ]);

        //crear un mensaje
        session()->flash('mensaje','La vacante se creo correctamente');

        //redireccionar al usuario
        return redirect()->route('vacantes.index');
    }
}
