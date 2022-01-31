<div class="row">
    <div class="col-md-12">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent ">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="text-white mb-0">Productos</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" wire:click="resetInputs" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target='#createModal'>Crear</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">tipo</th>
                                    <th scope="col">proveedor</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">foto</th>
                                    <th scope="col">acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($productos as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->proveedore->nombre }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        @if ($item->image)
                                            <td class="row align-items-start"><a href="#"
                                                    class="avatar avatar-sm rounded-circle"
                                                    data-original-title=" {{ $item->nombre }}">
                                                    <img src="{{ asset('imagenes/' . $item->image) }}"
                                                        style="width: 50px;height:50px;">

                                                    <a href="#" class="btn btn-sm btn-danger float-right"
                                                        wire:click="destroyimage({{ $item->id }})">x</a>

                                                </a>

                                            </td>

                                        @else
                                            <td><button class="btn">
                                                    Sin foto <span class="badge badge-primary"></span>
                                                </button></td>
                                        @endif

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <button class="dropdown-item" data-toggle="modal"
                                                        data-target='#createModal'
                                                        wire:click="edit({{ $item->id }})">
                                                        Modificar
                                                    </button>

                                                    <button class="dropdown-item" data-toggle="modal"
                                                        data-target='#deleteModal{{ $item->id }}'>
                                                        Eliminar
                                                    </button>


                                                    <button class="dropdown-item" data-toggle="modal"
                                                        data-target='#fotoModal{{ $item->id }}'>
                                                        Agregar Foto
                                                    </button>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Esta seguro de
                                                        eliminar el registro {{ $item->nombre }}?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <a href="#" class="btn btn-primary"
                                                        wire:click="destroy({{ $item->id }})"
                                                        data-dismiss="modal">Confirmar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal foto -->
                                    <div wire:ignore.self class="modal fade" id="fotoModal{{ $item->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Agregar foto a Producto
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <input type="file" wire:model="image">

                                                @error('image') <span class="error">{{ $message }}</span>
                                                @enderror
                                                @if ($image)

                                                    <img src="{{ $image->temporaryUrl() }}">
                                                @endif

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <a href="#" class="btn btn-primary" data-dismiss="modal"
                                                        wire:click="SubirFoto({{ $item->id }})">Confirmar</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                    </div>
                    @endforeach
                    @if ($productos->count() == 1)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

{{ $productos->links() }}

<div wire:ignore.self>
    {!! Toastr::message() !!}
</div>


<!-- Modal Create -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <h1>Crear nuevo Producto</h1>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" align-items="left">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nombre</label>
                                <input class="form-control" type="text" wire:model.lazy="nombre">
                            </div>
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tipo</label>
                                <input class="form-control" type="text" wire:model.lazy="tipo">
                            </div>
                            @error('tipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Proveedor</label>
                                <select class="form-control" type="text" wire:model="proveedore_id">
                                    @foreach ($proveedores as $item)
                                        <option value="{{ $item->id }}">
                                            <td>{{ $item->nombre }}</td>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('proveedore_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Descripcion</label>
                                <input class="form-control" type="text" wire:model.lazy="descripcion">
                            </div>
                            @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="#" class="btn btn-default" wire:click="save" data-dismiss="modal">Guardar</a>
            </div>
        </div>
    </div>
</div>


















