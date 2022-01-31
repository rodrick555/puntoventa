<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $descripcion, $tipo, $editando = false, $rol;
    protected $rules = [
        'nombre' => 'required|max:15',
        'tipo' => 'required|max:15',
        'descripcion' => 'required|max:25',
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset('nombre', 'descripcion', 'tipo');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.role-component', [
            'roles' => Role::paginate(5)
        ])
            ->extends('dashboard.master')
            ->section('content');
    }


    public function save()
    {
        if ($this->editando == true) {
            $this->update($this->rol);
        } else {
            $this->validate();
            Role::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'tipo' => $this->tipo
            ]);
        }
    }
    public function edit(Role $role)
    {
        // dd($role);
        $this->rol = $role;
        $this->editando = true;
        $this->nombre = $role->nombre;
        $this->descripcion = $role->descripcion;
        $this->tipo = $role->tipo;
    }
    public function update(Role $role)
    {
        $this->validate();
        $this->rol->nombre = $this->nombre;
        $this->rol->descripcion = $this->descripcion;
        $this->rol->tipo = $this->tipo;
        $this->rol->save();
    }

    public function destroy(Role $role)
    {
        $role->delete();
    }
}
