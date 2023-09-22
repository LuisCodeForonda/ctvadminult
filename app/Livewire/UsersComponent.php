<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Livewire\WithPagination;
use Pest\Plugins\Only;

class UsersComponent extends Component
{

    use WithPagination;

    public $id;
    public $name = '';
    public $email = '';
    public $status = false;
    public $password = '';
    public $password_confirmation = '';

    public $paginado = 5;
    public $search = '';
    public $modal = false;

    public function crear()
    {
        $this->limpiar();
        $this->modal = true;
    }

    public function cancel()
    {
        $this->limpiar();
        $this->modal = false;
    }

    public function store()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'status' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
                'password' => Hash::make($this->password),
            ]
        );

        $this->modal = false;
        $this->limpiar();
    }

    public function change($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => $user->status == 1 ? 0 : 1]);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }

    public function limpiar()
    {
        $this->id = '';
        $this->name = '';
        $this->email = '';
        $this->status = false;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.users-component', ['data' => \App\Models\User::where('name', 'LIKE', '%'.$this->search.'%')->paginate($this->paginado)]);
    }
}
