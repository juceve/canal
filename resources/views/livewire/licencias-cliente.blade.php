<div>
    @section('template_title')
    Licencias
    @endsection


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong>Licencias - {{$cliente->nombre}}</strong>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="text-secondary"><strong>Agregar Licencia</strong></label>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Fecha:</span>
                                <input type="date" class="form-control" wire:model='fecha'>
                                <button class="btn btn-outline-info" type="button" id="button-addon2"
                                    wire:click='agregar'>Agregar
                                    <i class="fas fa-plus"></i></button>
                            </div>
                            @error('fecha')
                            <small class="text-danger">El campo Fecha es requerido</small>
                            @enderror

                        </div>
                        <hr>
                        <label class="text-secondary"><strong>Historial de Licencias</strong></label>
                        <div class="table">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="table-info">
                                        <th>FECHA</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cliente->licencias as $item)
                                    <tr>
                                        <td>{{$item->fecha}}</td>
                                        <td class="text-end">
                                            <button class="btn btn-outline-danger" title="Eliminar Licencia"
                                                onclick="eliminar({{$item->id}})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>

</div>
@section('js')
<script>
    function eliminar(id){
            Swal.fire({
                title: "ELIMINAR LICENCIA",
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
</script>
@endsection