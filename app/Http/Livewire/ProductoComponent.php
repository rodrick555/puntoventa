<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ProductoComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $tipo, $descripcion, $image, $proveedore_id, $editando = false, $producto, $valor;
    protected $rules = [
        'nombre' => 'required|max:20',
        'tipo' => 'required|max:20',
        'proveedore_id' => 'required',
        'descripcion' => 'required|max:70'
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset('nombre', 'tipo', 'proveedore_id', 'descripcion', 'image');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.producto-component',  [
            'productos' => Producto::paginate(5),
            'proveedores' => Proveedore::all(),
        ])
            ->extends('dashboard.master')
            ->section('content');
    }


    public function save()
    {
        if ($this->editando == true) {
            $this->update($this->producto);
            //notificacion Toast
            $this->dispatchBrowserEvent('dispararToast',[
                'tipo'=>'success',
                'titulo'=>'Hecho!',
                'mensaje'=>"El registro fue actualizado Correctamente"
            ]);
        } 
        else {
            $this->validate();
            Producto::create([
                'nombre' => $this->nombre,
                'tipo' => $this->tipo,
                'descripcion' => $this->descripcion,
                'image' => $this->image,
                'proveedore_id' => $this->proveedore_id,
            ]);
            //notificacion Toast
            $this->dispatchBrowserEvent('dispararToast',[
                'tipo'=>'successs',
                'titulo'=>'Realizado!',
                'mensaje'=>"Registro guardado Satisfactoriamente"
            ]);
        }
    }
        
    public function edit(Producto $producto)
    {
        // dd($productoe);
        $this->producto = $producto;
        $this->editando = true;
        $this->nombre = $producto->nombre;
        $this->tipo = $producto->tipo;
        $this->descripcion = $producto->descripcion;
        $this->image = $producto->image;
        $this->proveedore_id = $producto->proveedore_id;
    }
    public function update(Producto $producto)
    {

        $this->producto->nombre = $this->nombre;
        $this->producto->tipo = $this->tipo;
        $this->producto->descripcion = $this->descripcion;
        $this->producto->image = $this->image;
        $this->producto->proveedore_id = $this->proveedore_id;
        $this->producto->save();
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        //notificacion Toast
        $this->dispatchBrowserEvent('dispararToast',[
            'tipo'=>'warning',
            'titulo'=>'Realizado!',
            'mensaje'=>"Registro Elimino con Exito!"
        ]);
    }

    public function SubirFoto(Producto $producto)
    {
        //dd($request->fotop);
        $this->validate([
            'image' => 'required|mimes:png,jpg,bmp|max:10240'
        ]);

        $filename = time() . "." . $this->image->extension();
        //para blade
        //$this->image->move(public_path('images'), $filename);

        $this->image->storeAs('imagenes', $filename, 'eldiscodevisha');

        $producto->image = $filename;

        $producto->save();
        //notificacion Toast
        $this->dispatchBrowserEvent('dispararToast',[
            'tipo'=>'info',
            'titulo'=>'Realizado!',
            'mensaje'=>"La imagen fue cargada con Exito!"
        ]);
    }
        
    public function destroyimage(Producto $producto)
    {
        //dd($producto);
        Storage::disk('eldiscodevisha')->delete('imagenes/' . $producto->image);
        $producto->image = null;
        $producto->save();

        $this->dispatchBrowserEvent('dispararToast',[
            'tipo'=>'info',
            'titulo'=>'Realizado!',
            'mensaje'=>"La imagen fue borrada con Exito!"
        ]);

        
    }
}
