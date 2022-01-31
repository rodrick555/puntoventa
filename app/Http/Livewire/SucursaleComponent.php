<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sucursale;
use Livewire\WithPagination;

class SucursaleComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $telefono, $direccion, $descripcion, $editando = false, $sucursale;
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
        return view('livewire.sucursale-component', [
            'sucursales' => Sucursale::paginate(8)
        ])
            ->extends('dashboard.master')
            ->section('content');
    }


    public function save()
    {
        if ($this->editando == true) {
            $this->update($this->sucursale);
        } else {
            $this->validate();
            Sucursale::create([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'descripcion' => $this->descripcion
            ]);
        }
    }
    public function edit(Sucursale $sucursale)
    {
        // dd($Sucursale);
        $this->sucursale = $sucursale;
        $this->editando = true;
        $this->nombre = $sucursale->nombre;
        $this->telefono = $sucursale->telefono;
        $this->direccion = $sucursale->direccion;
        $this->descripcion = $sucursale->descripcion;
    }
    public function update(Sucursale $sucursale)
    {
        $this->validate();
        $this->sucursale->nombre = $this->nombre;
        $this->sucursale->telefono = $this->telefono;
        $this->sucursale->direccion = $this->direccion;
        $this->sucursale->descripcion = $this->descripcion;
        $this->sucursale->save();
    }

    public function destroy(Sucursale $sucursale)
    {
        $sucursale->delete();
    }
}
