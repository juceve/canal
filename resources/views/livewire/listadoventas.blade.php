<div>

    <div class="row mb-3">
        <div class="col-12 col-md-3 mb-2">
            <label><small><strong>Fecha Inicio</strong></small></label>
            <input type="date" class="form-control" wire:model.defer='fechaI'>
        </div>
        <div class="col-12 col-md-3 mb-2">
            <label><small><strong>Fecha Final</strong></small></label>
            <input type="date" class="form-control" wire:model.defer='fechaF'>
        </div>
        <div class="col-12 col-md-3 mb-2">
            <label><small><strong>Estado</strong></small></label>
            <select class="form-select" wire:model.defer='estado'>
                <option value="">TODOS</option>
                <option value="1">ACTIVOS</option>
                <option value="0">ANULADOS</option>
            </select>
        </div>
        <div class="col-12 col-md-3 mb-2 d-flex align-items-end">
            <div class="d-grid w-100">
                <button class="btn btn-primary" wire:click='filtrar' wire:loading.attr="disabled">

                    <div wire:loading.remove>
                        Filtrar <i class="fas fa-filter"></i>
                    </div>

                    <div class="spinner-border spinner-border-sm" role="status" wire:loading>
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <h5 class="text-secondary text-center">LISTADO DE VENTAS</h5>
        <table class="table table-striped table-hover dataTableD">
            <thead class="thead table-primary">
                <tr>
                    <th class="text-center">ID</th>
                    <th>CLIENTE</th>
                    <th class="text-center">FECHA</th>
                    <th class="text-end">IMPORTE</th>
                    <th class="text-center">ESTADO</th>
                    <th width=10></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td class="text-center">{{$venta->id}}</td>
                    <td>{{$venta->cliente}}</td>
                    <td class="text-center">{{$venta->fecha}}</td>
                    <td class="text-end">{{number_format($venta->importe,2,'.')}}</td>
                    <td class="text-center">
                        @if ($venta->status)
                        <span class="badge rounded-pill bg-success">Activo</span>
                        @else
                        <span class="badge rounded-pill bg-secondary">Anulado</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary btn-sm">Accción</button>
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden">Opciones</span>
                            </button>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{route('vntventas.show',$venta->id)}}"><i
                                        class="fas fa-fw fa-eye"></i>
                                    Detalles</a>
                                @can('pos.edit')
                                <a href="ventas/{{$venta->id}}/edit" class="dropdown-item"><i class="fas fa-edit"></i>
                                    Editar</a>
                                <button class="dropdown-item" onclick='devolucion({{$venta->id}})'>
                                    <i class="fas fa-undo"></i>
                                    Devolución</button>
                                @endcan
                                @can('pos.destroy')
                                <button class="dropdown-item" onclick='eliminar({{$venta->id}})'>
                                    <i class="fas fa-trash"></i>
                                    Eliminar</button>
                                @endcan

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('js')
<script>
    function eliminar(id){
                 Swal.fire({
                    title: "ELIMINAR REGISTRO",
                    text: "¿Está seguro de realizar esta operación?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, continuar",
                    cancelButtonText: "No, cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('eliminar',id);
                    }
                });
        }
    function devolucion(id){
                 Swal.fire({
                    title: "DEVOLVER PRODUCTOS Y ANULAR VENTA",
                    text: "¿Está seguro de realizar esta operación?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, continuar",
                    cancelButtonText: "No, cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('devolucion',id);
                    }
                });
        }
       
</script>
@endsection