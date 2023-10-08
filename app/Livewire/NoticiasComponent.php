<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class NoticiasComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $id = '';

    #[Rule('required')]
    public $titulo = '';

    public $slug = '';

    #[Rule('required')]
    public $body = '';

    #[Rule('required')]
    public $fecha = '';

    #[Rule('required|image|max:1024|mimes:jpg,png,jpeg')]
    public $image;

    #[Rule('required')]
    public $categoria_id = '';

    public $user_id = '';

    public $paginado = 5;
    public $search = '';
    public $modal = false;
    public $modal_confirmation = false;
    public $oldImage;


    public function new()
    {
        $this->modal = true;
        $this->limpiar();
    }

    public function cancel()
    {
        $this->modal = false;
        $this->limpiar();
    }

    public function store()
    {
        $this->validate();

        if ($this->image) {
            $this->image = $this->image->store('uploads', 'public');
        }

        //eliminando la antigua foto
        if ($this->oldImage) {
            $image_path = 'storage/' . $this->oldImage;
            unlink($image_path);
        }


        Noticia::updateOrCreate(
            ['id' => $this->id],
            [
                'titulo' => $this->titulo,
                'slug' => Str::slug($this->titulo),
                'body' => $this->body,
                'fecha' => $this->fecha,
                'image' => $this->image,
                'categoria_id' => $this->categoria_id,
                'user_id' => Auth::user()->id,
            ]
        );


        $this->modal = false;
        $this->limpiar();
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        $this->id = $noticia->id;
        $this->titulo = $noticia->titulo;
        $this->slug = $noticia->slug;
        $this->body = $noticia->body;
        $this->fecha = $noticia->fecha;
        $this->oldImage = $noticia->image;
        $this->categoria_id = $noticia->categoria_id;

        $this->modal = true;
    }

    public function deleteId($id)
    {
        $this->id = $id;
        $this->modal_confirmation = true; //mostramos el modal de confirmacion
    }

    public function delete()
    {
        $noticia = Noticia::find($this->id);
        $image_path = 'storage/' . $noticia->image;//obtenemos la ruta de imagen
        unlink($image_path);//eliminamos la imagen
        $noticia->delete();
        $this->modal_confirmation = false; //cerramos el modal
        $this->limpiar();
    }

    public function closeModalConfimation()
    {
        $this->modal_confirmation = false;
        $this->limpiar();
    }

    public function limpiar()
    {
        $this->id = '';
        $this->titulo = '';
        $this->slug = '';
        $this->image = '';
        $this->oldImage = '';
        $this->body = '';
        $this->categoria_id = '';
        $this->fecha = '';
        $this->user_id = '';
    }

    public function updatingSearch()
    {
        $this->resetPage(); //resetear el paginado en base a la variable search
    }

    public function render()
    {
        return view('livewire.noticias-component', ['data' => \App\Models\Noticia::paginate($this->paginado), 'categorias' => \App\Models\Categoria::all()]);
    }
}
