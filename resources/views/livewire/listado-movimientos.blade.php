<div>
    <div class="table-responsive scrolljvg">
        <div class="row g-2">
            <div class="col-12 col-md-3">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Desde</span>
                    <input type="date" class="form-control" wire:model.lazy='fechaI'>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Hasta</span>
                    <input type="date" class="form-control" wire:model.lazy='fechaF'>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xxl-3">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    <input type="search" class="form-control" placeholder="Buscar por Glosa o Cuenta"
                        wire:model.debounce.500ms='search'>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-2 g-2">
            <div class="col-6 col-md-2 col-xl-2 d-grid">
                <button class="btn btn-outline-success" wire:click='exportExcel'><i class="fas fa-file-excel"></i>
                    Exportar</button>
            </div>
            <div class="col-6 col-md-2 col-xl-2 d-grid">
                <button class="btn btn-outline-danger" wire:click='exportPDF'><i class="fas fa-file-pdf"></i>
                    Exportar</button>
            </div>

        </div>
        <table class="table table-striped table-hover table-bordered table-sm text-uppercase "
            style="vertical-align: middle">
            <thead class="thead table-info">
                <tr>
                    <th class="text-center">No</th>

                    <th class="text-center">Fecha</th>
                    <th>Glosa</th>
                    <th>Cuenta</th>
                    <th class="text-end">Importe</th>
                    <th class="text-center">Estado</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>

                    <td class="text-center">{{ $movimiento->fecha }}</td>
                    <td>{{ substr($movimiento->glosa,0,30) }}</td>
                    <td>
                        {{$movimiento->cuenta}}
                    </td>
                    <td class="text-end">{{ number_format($movimiento->importe,2,'.') }}</td>
                    <td class="text-center">
                        @if ($movimiento->status)
                        <span class="badge rounded-pill bg-primary">Activo</span>
                        @else
                        <span class="badge rounded-pill bg-secondary">Anulado</span>
                        @endif
                    </td>

                    <td class="text-end">
                        <form action="{{ route('movimientos.destroy',$movimiento->id) }}" method="POST"
                            onsubmit="return false" class="delete">
                            <a class="btn btn-sm btn-primary " href="{{ route('movimientos.show',$movimiento->id) }}"
                                title="Ver Info"><i class="fa fa-fw fa-eye"></i></a>
                            @can('movimientos.edit')
                            <a class="btn btn-sm btn-success" href="{{ route('movimientos.edit',$movimiento->id) }}"
                                title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('movimientos.destroy')
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                    class="fa fa-fw fa-trash"></i></button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            {{ $movimientos->links() }}
        </div>
    </div>
</div>
@section('js')
<script>
    Livewire.on('renderMovimientos', () => {
        var win = window.open("pdf/movimientos", '_blank');
        win.focus();
    });
</script>
@endsection