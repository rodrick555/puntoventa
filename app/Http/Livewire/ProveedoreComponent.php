<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedore;
use Livewire\WithPagination;

class ProveedoreComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $telefono, $direccion, $descripcion, $editando = false, $proveedore;
    protected $rules = [
        'nombre' => 'required|max:40',
        'telefono' => 'required|max:8',
        'direccion' => 'required|max:70',
        'descripcion' => 'required|max:70',
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset('nombre', 'telefono', 'direccion', 'descripcion');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.proveedore-component', [
            'proveedores' => Proveedore::paginate(3)
        ])
            ->extends('dashboard.master')
            ->section('content');
    }


    public function save()
    {
        if ($this->editando == true) {
            $this->update($this->proveedore);
        } else {
            $this->validate();
            Proveedore::create([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'descripcion' => $this->descripcion
            ]);
        }
    }
    public function edit(Proveedore $proveedore)
    {
        // dd($Proveedore);
        $this->proveedore = $proveedore;
        $this->editando = true;
        $this->nombre = $proveedore->nombre;
        $this->telefono = $proveedore->telefono;
        $this->direccion = $proveedore->direccion;
        $this->descripcion = $proveedore->descripcion;
    }
    public function update(Proveedore $proveedore)
    {
        $this->validate();
        $this->proveedore->nombre = $this->nombre;
        $this->proveedore->telefono = $this->telefono;
        $this->proveedore->direccion = $this->direccion;
        $this->proveedore->descripcion = $this->descripcion;
        $this->proveedore->save();
    }

    public function destroy(Proveedore $proveedore)
    {
        $proveedore->delete();
    }
}
