<?php

namespace App\Livewire;

use App\Models\Programacion;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class ProgramacionsComponent extends Component
{

    use WithPagination;

    public $id = '';

    #[Rule('required|max:50')]
    public $titulo = '';

    #[Rule('required')]
    public $hora = '';

    #[Rule('required')]
    public $horario = 'A';

    public $paginado = 5;
    public $search = '';
    public $modal = false;
    public $modal_confirmation = false;

    public function new(){
        $this->modal = true;
    }

    public function cancel(){
        $this->modal = false;
        $this->limpiar();
    }

    public function store(){
        $this->validate();

        Programacion::updateOrCreate(['id'=> $this->id],
        [
            'titulo' => $this->titulo,
            'hora' => $this->hora,
            'horario' => $this->horario,
        ]);

        $this->modal = false;
        $this->limpiar();
    }

    public function edit($id){
        $programacion = Programacion::findOrFail($id);
        $this->id = $programacion->id;
        $this->titulo = $programacion->titulo;
        $this->hora = $programacion->hora;
        $this->horario = $programacion->horario;

        $this->modal = true;
    }

    public function deleteId($id){
        $this->id = $id;
        $this->modal_confirmation = true; //mostramos el modal de confirmacion
    }

    public function delete(){
        Programacion::find($this->id)->delete();
        $this->modal_confirmation = false; //cerramos el modal
        $this->id = '';
    }

    public function closeModalConfimation(){
        $this->modal_confirmation = false;
        $this->id = '';
    }

    public function limpiar(){
        $this->id = '';
        $this->titulo = '';
        $this->hora = '';
        $this->horario = 'A';
    }

    public function render()
    {
        return view('livewire.programacions-component', ['data' => \App\Models\Programacion::where('titulo', 'LIKE', '%'.$this->search.'%')->paginate($this->paginado)]);
    }
}
