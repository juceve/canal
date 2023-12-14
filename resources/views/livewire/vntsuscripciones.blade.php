<div>
    @section('template_title')
        Suscripciones para Clientes
    @endsection

    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <div class="mb-3">
                <h4 class="mb-3 mb-md-0">Suscripciones para Clientes</h4>
            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <label for=""><strong>Cliente:</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm bg-white"
                                placeholder="Seleccione un cliente" wire:model='cliente_nombre' readonly>
                            <button class="btn btn-info btn-sm" type="button" id="button-addon2"
                                title="Buscar Clientes" data-bs-toggle="modal" data-bs-target="#modalclientes"><i
                                    class="fas fa-search"></i></button>
                        </div>
                        @error('cliente_nombre')
                            <small class="text-danger">El campo Cliente es requerido.</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <label for=""><strong>Servicios:</strong></label>
                        <div class="input-group">
                            <select class="form-select form-select-sm" id="inputGroupSelect04"
                                aria-label="Example select with button addon" wire:model='selServicio'>
                                <option value="">Seleccione un servicio</option>
                                @foreach ($servicios as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach

                            </select>
                            <button class="btn btn-primary btn-sm" type="button" title="Agregar a Pedido"
                                wire:click='agregaPedido'>Agregar Pedido</button>
                        </div>
                        @error('selServicio')
                            <small class="text-danger">El campo Servicio es requerido.</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <h4 class="mt-3 mb-2">PEDIDO ACTUAL</h4>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table1" id="tablapedido">
                        <thead>
                            <tr>
                                <td style="width: 10px"> <strong> Nro.</strong></td>
                                <td> <strong> DETALLE</strong></td>
                                <td align="center"> <strong> INICIO</strong></td>
                                <td style="width: 130px" align="right"><strong> SUBTOTAL BS.</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($pedido as $item)
                                <tr>
                                    <td align="center">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <strong>Servicio: </strong>{{ $item['nombre'] }}
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <strong>Cant Dias: </strong> {{ $item['cantdias'] }}
                                            </div>
                                        </div>

                                        <strong>Descripción: </strong>{{ $item['descripcion'] }}
                                    </td>
                                    <td align="center">
                                        <input type="date" class="form-control form-control-sm">
                                    </td>
                                    <td align="right">{{ number_format($item['precio'], 2, ',') }}</td>
                                    <td style="width: 10px;">
                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"
                                            wire:click='eliminar({{ $i }})'><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </tbody>
                        @if ($totalPedido)
                            <tfoot>
                                <tr align="right" style="background-color: #eaebfd">
                                    <td colspan="3">
                                        <strong>TOTAL Bs.:</strong>
                                    </td>
                                    <td>
                                        <strong>{{ number_format($totalPedido, 2, ',') }}</strong>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        @endif

                    </table>
                </div>
            </div>
        </div>
        @if ($totalPedido)
            <div class="row mt-4">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <a href="{{ route('ventas.suscripciones') }}" class="btn btn-secondary py-2 d-grid">
                        <h4><i class="fas fa-ban"></i> Cancelar</h4>
                    </a>
                </div>
                <div class="col-12 col-md-4 text-end d-grid">
                    <button class="btn btn-primary py-2" wire:click='initPago' data-bs-toggle="modal" data-bs-target="#modalPago">
                        <h4>Procesar <i class="fas fa-cash-register"></i></h4>
                    </button>
                </div>
            </div>
        @endif


    </div>

    <!-- Modal -->
    @livewire('modalpago')


    <div class="modal fade" id="modalclientes" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="modalclientesLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalclientesLabel">Clientes Registrados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover dataTableLite" style="vertical-align: middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>TIPO DOC</th>
                                    <th>NRO DOC</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->tipodoc->nombrecorto }}</td>
                                        <td>{{ $cliente->nrodoc }}</td>
                                        <td align="right">
                                            <button class="btn btn-outline-info btn-sm" title="Seleccionar"
                                                wire:click="$set('cliente_id', {{ $cliente->id }})"
                                                data-bs-dismiss="modal"><i class="fas fa-user-check"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>
@section('css')
    <style>
        .table1 {
            border-collapse: collapse;
            width: 100%;
        }

        .table1 th,
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    </style>
@endsection
@section('js')
    <script>
        Livewire.on('obtenerFechas', () => {
            var tabla = $('#tablapedido');
            var fechas = [];
            tabla.find("tbody tr").each(function() {                
                var fecha = $(this).find("td:eq(2) input").val();
                
                fechas.push(fecha);
            });
             Livewire.emit('pasarParamentros',fechas)
        });

    
    </script>
@endsection
