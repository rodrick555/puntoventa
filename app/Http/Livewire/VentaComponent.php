<?php

namespace App\Http\Livewire;


use App\Models\User;
use App\Models\Venta;
use Livewire\Component;
use App\Models\Sucursale;
use Livewire\WithPagination;

class VentaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $precio, $cantidad, $fecha, $user_id, $sucursale_id, $editando = false, $venta;
    protected $rules = [
        'precio' => 'required|max:20',
        'cantidad' => 'required|max:20',
        'fecha'=>'required',
        'user_id' => 'required',
        'sucursale_id' => 'required',
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset('precio', 'cantidad','fecha','user_id', 'sucursale_id');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.venta-component',  [
            'ventas' => Venta::paginate(8),
            'user' => User::all(),
            'sucursale' => Sucursale::all(),
        ])
            ->extends('dashboard.master')
            ->section('content');
    }

    public function save()
    {
        if ($this->editando == true) {
            $this->update($this->venta);
        } else {
            $this->validate();
            Venta::create([
                'precio' => $this->precio,
                'cantidad' => $this->cantidad,
                'fecha' => $this->fecha,
                'user_id' => $this->user_id,
                'sucursale_id' => $this->sucursale_id,
            ]);
        }
    }
    public function edit(Venta $venta)
    {
        // dd($ventae);
        $this->venta = $venta;
        $this->editando = true;
        $this->precio = $venta->precio;
        $this->cantidad = $venta->cantidad;
        $this->fecha = $venta->fecha;
        $this->user_id = $venta->user_id;
        $this->sucursale_id = $venta->sucursale_id;
    }
    public function update(Venta $venta)
    {
        
        $this->venta->precio = $this->precio;
        $this->venta->cantidad = $this->cantidad;
        $this->venta->fecha = $this->fecha;
        $this->venta->user_id = $this->user_id;
        $this->venta->sucursale_id = $this->sucursale_id;
        $this->venta->save();
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
    }
}

