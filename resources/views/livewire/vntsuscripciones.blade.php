<div>
  @section('template_title')
  PUNTO DE VENTA - SUSCRIPCIONES
  @endsection
  <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

    <div class="mb-2">
      <h3 class="mb-3 mb-md-0">PUNTO DE VENTA - SUSCRIPCIONES <i class="fas fa-calendar-check"></i></h3>
    </div>

  </div>
  <div class="content">
    <div class="row">
      <div class="col-12 col-md-6 p-1">
        <div class="card mb-2">
          <div class="card-body">

            <div class="form-group">
              <label class="mb-2 text-secondary"><strong>SELECCIÓN DE CLIENTE:</strong></label>
              <div class="input-group">
                <input type="text" class="form-control bg-white" placeholder="Seleccione un cliente"
                  wire:model='cliente_nombre' readonly>
                @if ($cliente_id)
                <button class="btn btn-outline-warning " type="button" id="button-addon3" title="Limpiar Cliente"
                  wire:click='limpiarCliente'><i class="fas fa-times"></i></button>
                @endif

                <button class="btn btn-outline-info" type="button" id="button-addon2" title="Buscar Clientes"
                  data-bs-toggle="modal" data-bs-target="#modalclientes"><i class="fas fa-search"></i></button>
                <a href="{{ route('clientes.create') }}" class="btn btn-outline-primary" title="Nuevo Cliente"><i
                    class="fas fa-plus"></i></a>
              </div>
              @error('cliente_nombre')
              <small class="text-danger">El campo Cliente es requerido.</small>
              @enderror
            </div>
          </div>
        </div>
        @if ($cliente_id)
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="servicios-tab" data-bs-toggle="tab"
                    data-bs-target="#servicios-tab-pane" type="button" role="tab" aria-controls="servicios-tab-pane"
                    aria-selected="true"><i class="fas fa-boxes"></i>
                    Servicios</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="promociones-tab" data-bs-toggle="tab"
                    data-bs-target="#promociones-tab-pane" type="button" role="tab" aria-controls="promociones-tab-pane"
                    aria-selected="false"><i class="fas fa-star"></i> Promociones</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="servicios-tab-pane" role="tabpanel"
                  aria-labelledby="home-tab" tabindex="0">
                  <div class="content mt-3">
                    <label class="mb-3 text-secondary"><strong>SERVICIOS
                        DISPONIBLES:</strong></label>
                    <div class="table-responsive overflow-hidde" wire:ignore>
                      <table class="table table-striped table-hover dataTable1" style="width: 100%">
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
                              <small class="text-secondary"><strong>{{
                                  $servicio->modalidadservicio->nombre }}:
                                </strong>{{ $servicio->creditos }} -
                                <strong>Precio
                                  Bs:
                                </strong>{{ number_format($servicio->precio, 2, ',')
                                }}</small><br>

                            </td>
                            <td align="right">
                              <button class="btn btn-sm btn-outline-success" title="Agregar" data-bs-toggle="modal"
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
                <div class="tab-pane fade" id="promociones-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                  tabindex="0">
                  <h5>PROMOCIONES</h5>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endif


      </div>


      <div class="col-12 col-md-6 p-1">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label class="text-secondary mb-2"><strong>PEDIDO ACTUAL</strong></label>
              <div class="table-responsive">
                @if ($pedido)
                <table class="table table-hover p-0" style="vertical-align: middle">
                  <thead class="table-primary">
                    <tr>
                      <td class="text-secondary fw-bold text-center" style="widtd: 10px;">
                        Nro.
                      </td>
                      <td class="text-secondary fw-bold">SERVICIO</td>
                      <td class="text-secondary fw-bold text-center">CANT</td>
                      <td class="text-secondary fw-bold text-end">SubTotal Bs.</td>
                      <td class="text-secondary fw-bold" style="width: 10px;"></td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $c = 0;
                    @endphp
                    @foreach ($pedido as $item)
                    <tr>
                      <td class="text-center">{{ $c + 1 }}</td>
                      <td>
                        <strong>{{ $item[0]['nombre'] }}</strong> <br>
                        <small>
                          <strong>Inicio: </strong> {{ $item[1] }} <br>
                          <strong>Horario: </strong> {{ $item[2][1] }}
                        </small>
                      </td>
                      <td class="text-center">
                        {{ intval($item[3]) }}
                      </td>
                      <td class="text-end">
                        {{ number_format($item[0]['precio'] * intval($item[3]), 2, ',') }}
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-danger" title="Eliminar" wire:click='eliminar({{ $c }})'>
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                    @php
                    $c++;
                    @endphp
                    @endforeach

                  </tbody>
                  <tfoot class="table-success">
                    <tr>
                      <td class="text-end fw-bold" colspan="3">TOTAL Bs:</td>
                      <td class="text-end fw-bold">{{ number_format($totalPedido, 2, ',') }}
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
                @else
                <span class="form-control" style="background-color: #e9e9e977">
                  Sin items
                </span>
                @endif
              </div>
            </div>
          </div>
        </div>
        @if ($pedido)
        <div class="row mt-3">
          <div class="col-12 col-md-4"></div>
          <div class="col-12 col-md-4 d-grid">
            <a href="{{ route('ventas.suscripciones') }}" class="btn btn-secondary py-2">
              <h4><i class="fas fa-ban"></i> Cancelar</h4>
            </a>
          </div>
          <div class="col-12 col-md-4 d-grid">
            <button class="btn btn-primary py-2" wire:click='pasarParamentros' data-bs-toggle="modal"
              data-bs-target="#modalPago">
              <h4><i class="fas fa-cash-register"></i> Procesar</h4>
            </button>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalAgregar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalAgregarLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarLabel">Datos Adicionales</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row mb-3">
              <div class="col-6">Cantidad:</div>
              <div class="col-6">
                <input type="number" class="form-control" wire:model='selCantidad'>
                @error('selCantidad')
                <small class="text-danger">El campo Cantidad es requerido</small>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">Fecha inicio:</div>
              <div class="col-6">
                <input type="date" class="form-control" wire:model='selFecha'>
                @error('selFecha')
                <small class="text-danger">El campo Fecha Inicio es requerido</small>
                @enderror
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
                @error('selHorario')
                <small class="text-danger">El campo Horario es requerido</small>
                @enderror
              </div>
            </div>
            @if ($couch)
            <div class="row mb-3">
              <div class="col-6">Couch:</div>
              <div class="col-6">
                <input type="text" class="form-control" wire:model='couch' readonly>
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-ban"></i>
            Cancelar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='agregaPedido'>
            Agregar
            <i class="fas fa-cart-plus"></i>
          </button>
        </div>
      </div>
    </div>
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
                      wire:click="$set('cliente_id', {{ $cliente->id }})" data-bs-dismiss="modal"><i
                        class="fas fa-user-check"></i></button>
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
@endsection
@section('js')
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
            var table = $('.dataTable1').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20],
                    [5, 10, 20]
                ],
                "paging": true,
                "ordering": true,
                "info": false
            })
        });
</script>
@endsection