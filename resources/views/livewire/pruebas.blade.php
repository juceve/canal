<div>
    @section('template_title')
        PRUEBAS
    @endsection
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>PRUEBAS</h4>

        <div class="float-right">
            {{-- <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-plus"></i> Nuevo
            </a> --}}
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12 col-md-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-2 text-secondary"><strong>SELECCIÓN DE CLIENTE:</strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm bg-white"
                                    placeholder="Seleccione un cliente" wire:model='cliente_nombre' readonly>
                                <button class="btn btn-info btn-sm" type="button" id="button-addon2"
                                    title="Buscar Clientes" data-bs-toggle="modal" data-bs-target="#modalclientes"><i
                                        class="fas fa-search"></i></button>
                                <button class="btn btn-primary btn-sm" type="button" id="button-addon2"
                                    title="Nuevo Cliente" data-bs-toggle="modal" data-bs-target="#modalNuevo"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                            @error('cliente_nombre')
                                <small class="text-danger">El campo Cliente es requerido.</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="servicios-tab" data-bs-toggle="tab"
                                        data-bs-target="#servicios-tab-pane" type="button" role="tab"
                                        aria-controls="servicios-tab-pane" aria-selected="true"><i
                                            class="fas fa-boxes"></i> Servicios</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="promociones-tab" data-bs-toggle="tab"
                                        data-bs-target="#promociones-tab-pane" type="button" role="tab"
                                        aria-controls="promociones-tab-pane" aria-selected="false"><i
                                            class="fas fa-star"></i> Promociones</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="servicios-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="content mt-3">
                                        <label class="mb-2 text-secondary"><strong>SERVICIOS
                                                DISPONIBLES:</strong></label>
                                        <div class="table-responsive overflow-hidde">
                                            <table class="table table-bordered table-hover dataTable"
                                                style="width: 100%">
                                                <thead>
                                                    <tr class="table-info">
                                                        <td class="text-secondary"><strong>ID</strong></td>
                                                        <td class="text-secondary"><strong>DETALLE</strong></td>
                                                        <td class="text-secondary"><strong></strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($servicios as $servicio)
                                                        <tr>
                                                            <td>{{ $servicio->id }}</td>
                                                            <td>
                                                                <strong>{{ strtoupper($servicio->nombre) }}</strong><br>
                                                                <small class="text-secondary"><strong>Cant. Dias:
                                                                    </strong>{{ $servicio->cantdias }} - <strong>Precio
                                                                        Bs:
                                                                    </strong>{{ number_format($servicio->precio, 2, ',') }}</small><br>

                                                            </td>
                                                            <td align="right">
                                                                <button class="btn btn-sm btn-outline-success"
                                                                    title="Agregar" data-bs-toggle="modal"
                                                                    data-bs-target="#modalAgregar"
                                                                    wire:click="$set('selServicio','{{ $servicio->id }}')">Agregar
                                                                    <i class="fas fa-cart-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="promociones-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <h5>PROMOCIONES</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-5 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text-secondary"><strong>PEDIDO ACTUAL</strong></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="modalAgregarLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarLabel">Datos Adicionales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row mb-3">
                            <div class="col-6">Fecha inicio:</div>
                            <div class="col-6">
                                <input type="date" class="form-control" wire:model='selFecha'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">Horario:</div>
                            <div class="col-6">
                                <select name="" id="" class="form-select" wire:model='selHorario'>
                                    <option value="">--:--</option>
                                    @if ($servicioAg)
                                        @foreach ($servicioAg->horarioservicio as $item)
                                            <option value="{{ $item->id }}">{{ $item->hora }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fas fa-ban"></i>
                        Cancelar</button>
                    <button type="button" class="btn btn-primary">Agregar <i
                            class="fas fa-chevron-circle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('body_class')
    {{-- class="sidebar-folded" --}}
@endsection
@section('js')
    <script src="{{ asset('admin/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/inputmask.js') }}"></script>
    <script>
        var anchoVentana = window.innerWidth
        window.onresize = function() {
            anchoVentana = window.innerWidth;
            verificarAncho();
        };

        function verificarAncho() {
            if (anchoVentana >= 992) {
                document.body.classList.add('sidebar-folded');
            } else {
                document.body.classList.remove('sidebar-folded');
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            verificarAncho();
            var table = $('.table1').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'Todos']
                ]
            })
        });
    </script>
@endsection
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
@endsection
