<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class UserComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $apellido, $telefono, $email,$password, $password_confirmation, $role_id, $editando = false, $user;
    protected $rules = [
        'name' => 'required|max:20',
        'apellido' => 'required|max:30',
        'telefono' => 'required|max:8',
        'email' => 'required|string|email|max:255|unique:users,email',
        'role_id' => 'required',
        'password' => 'required|min:8|string|confirmed',
        
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset('name', 'apellido', 'telefono', 'email', 'role_id', 'password', 'password_confirmation');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.user-component',  [
            'users' => User::paginate(8),
            'roles' => Role::all(),
        ])
            ->extends('dashboard.master')
            ->section('content');
    }


    public function save()
    {
        if ($this->editando == true) {
            $this->update($this->user);
        } else {
            $this->validate();
            User::create([
                'name' => $this->name,
                'apellido' => $this->apellido,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'password' => $this->password,
            ]);
        }
    }
    public function edit(User $user)
    {
        // dd($usere);
        $this->user = $user;
        $this->editando = true;
        $this->name = $user->name;
        $this->apellido = $user->apellido;
        $this->telefono = $user->telefono;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
    }
    public function update(User $user)
    {
        $this->validate([
            'email' => [
                'required', 'string', 'max:255',
                Rule::unique('users,email')->ignore($this->user->id),
            ],
            'name' => 'required|max:15',
            'apellido' => 'required|max:15',
            'telefono' => 'required|max:25',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role_id' => 'required|max:25',
            'password' => 'required|min:8|confirmed',
        ]);
        $this->user->name = $this->name;
        $this->user->apellido = $this->apellido;
        $this->user->telefono = $this->telefono;
        $this->user->email = $this->email;
        $this->user->role_id = $this->role_id;
        $this->user->password = $this->password;
        $this->user->save();
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
