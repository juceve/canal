<div>
    @section('template_title')
    Reporte Ingresos-Egresos
    @endsection
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <h4>Reporte Ingresos-Egresos</h4>
            {{--
            <div class="float-right">
                @can('clientes.create')
                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"
                    data-placement="left">
                    <i class="fas fa-plus"></i> Nuevo
                </a>
                @endcan
            </div> --}}
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Desde</span>
                            <input type="date" class="form-control" wire:model.defer='fechaI'>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Hasta</span>
                            <input type="date" class="form-control" wire:model.defer='fechaF'>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-3 d-grid">
                        <button class="btn btn-outline-primary mb-3" wire:click='filtrar'>Filtrar <i
                                class="fas fa-filter"></i></button>
                    </div>
                </div>
                <hr>
                @if ($resultados->count())
                <div class="row g-2 mb-2">
                    <div class="col-12 col-md-6 col-xl-8"></div>
                    <div class="col-6 col-md-3 col-xl-2 d-grid">
                        <button class="btn btn-danger" title="Exportar en detalle" wire:click='exportarDetallado'><i
                                class="fas fa-file-pdf"></i>
                            Detallado</button>
                    </div>
                    <div class="col-6 col-md-3 col-xl-2 d-grid" title="Exportar Consolidado">
                        <button class="btn btn-info" wire:click='exportarConsolidado'><i class="fas fa-file-pdf"></i>
                            Consolidado</button>
                    </div>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable5D">
                        <thead>
                            <tr class="table-primary">
                                <th style="width: 60px;" class="text-center">ID</th>
                                <th style="width: 150px;" class="text-center">FECHA</th>
                                <th>DETALLE</th>
                                <th>CUENTA</th>
                                <th style="width: 100px;" class="text-end">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resultados as $item)
                            <tr>
                                <td class="text-center">{{$item->id}}</td>
                                <td class="text-center">{{$item->fecha}}</td>
                                <td>{{$item->glosa}}</td>
                                <td>{{$item->cuenta}}</td>
                                <td class="text-end">{{number_format($item->importe,2,'.')}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center"><i>No se encontraron resultados.</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($resultados->count())
                <hr>
                <div class="table-responsive mt-3">
                    <table class="table table-striped" style="font-weight: 500">
                        <tbody>
                            <tr>
                                <td class="text-end">TOTAL INGRESOS:</td>
                                <td style="width: 100px;" class="text-end">{{number_format($resultados->where('tipo',
                                    'INGRESO')->sum('importe') ,2,'.')}}</td>
                            </tr>
                            <tr>
                                <td class="text-end">TOTAL EGRESOS:</td>
                                <td style="width: 100px;" class="text-end">{{number_format($resultados->where('tipo',
                                    'EGRESO')->sum('importe') ,2,'.')}}</td>
                            </tr>
                            <tr class="table-success">
                                <td class="text-end">RESULTADOS:</td>
                                <td style="width: 100px;" class="text-end">{{number_format($resultados->where('tipo',
                                    'INGRESO')->sum('importe') -
                                    $resultados->where('tipo', 'EGRESO')->sum('importe'),2,'.')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    Livewire.on('renderDetalle', msg => {
        var win = window.open("../pdf/ingresos-egresos/"+msg, '_blank');
        win.focus();
    });
</script>
@endsection