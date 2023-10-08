<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UsersPermissions extends Component
{
    use WithPagination;

    public $user;
    public $id = '';
    public $name = '';
    public $email = '';

    public $search = '';
    public $paginado = 5;
    public $modal = false;
    public $roles = [];
    public $selectedRoles = [];

    public function edit($id){
        $this->user = User::findOrFail($id);
        $this->roles = Role::all()->pluck('name');
        $this->selectedRoles = $this->user->roles->pluck('name')->toArray();
       
        $this->id = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->modal = true;
    }

    public function store(){
        $this->user->syncRoles($this->selectedRoles);
        $this->modal = false;
        $this->limpiar();
    }

    public function cancel(){
        $this->modal = false;
        $this->limpiar();
    }

    public function limpiar(){
        $this->user = null;
        $this->roles = [];
        $this->selectedRoles = [];
        $this->id = '';
        $this->name = '';
        $this->email = '';
    }

    public function updatingSearch(){
        $this->resetPage(); //resetear el paginado en base a la variable search
    }

    public function render()
    {
        return view('livewire.users-permissions', ['data' => \App\Models\User::where('name', 'LIKE', '%'.$this->search.'%')->paginate($this->paginado)]);
    }
}
