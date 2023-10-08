<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class CategoriasComponent extends Component
{
    use WithPagination;

    public $id;
    #[Rule('required|max:50')]
    public $titulo;
    
    public $slug;

    public $paginado = 5;
    public $search = '';
    public $modal = false;
    public $modal_confirmation = false;

    public function new(){
        $this->modal = true;
        $this->limpiar();
    }

    public function cancel(){
        $this->modal = false;
        $this->limpiar();
    }

    public function store(){
        $this->validate();

        

        Categoria::updateOrCreate(['id'=> $this->id],
        [
            'titulo' => $this->titulo,
            'slug' => Str::slug($this->titulo),
        ]);

        $this->modal = false;
        $this->limpiar();
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        $this->id = $categoria->id;
        $this->titulo = $categoria->titulo;

        $this->modal = true;
    }

    public function deleteId($id){
        $this->id = $id;
        $this->modal_confirmation = true; //mostramos el modal de confirmacion
    }

    public function delete(){
        Categoria::find($this->id)->delete();
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
        $this->slug = '';
    }

    public function updatingSearch(){
        $this->resetPage(); //resetear el paginado en base a la variable search
    }

    public function render()
    {
        return view('livewire.categorias-component', ['data' => \App\Models\Categoria::where('titulo', 'LIKE', '%'.$this->search.'%')->paginate($this->paginado)]);
    }
}
