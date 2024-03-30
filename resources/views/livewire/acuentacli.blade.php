<div>
    @section('template_title')
    CREDITO CLIENTES
    @endsection

    <h3 class="mb-3">CREDITO CLIENTES <i class="fas fa-hand-holding-usd"></i></h3>
    <div class="row">
        <div class="col-12  col-lg-7 mt-3">
            <h5 class="text-secondary">CUENTAS PENDIENTES DE PAGO</h5>
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive" wire:ignore>
                        <table class="table table-striped dataTable w-100">
                            <thead>
                                <tr class="table-primary">
                                    <td>ID</td>
                                    <td>NOMBRE</td>
                                    <td>IMPORTE</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acuentas as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->importe}}</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-primary"
                                            wire:click='procesar({{$item->id}})'>Procesar <i
                                                class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- PEDIDO ACTUAL --}}
        <div class="col-12  col-lg-5 mt-3">
            <h5 class="text-secondary">DETALLE CREDITO</h5>
            <div class="table-reponsive mt-2">
                <table class="table table-hover table-sm" style="vertical-align: middle;font-size: 12px;">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>PRODUCTO</th>
                            <th class="text-center">PRECIO</th>
                            <th class="text-center">CANT.</th>
                            <th class="text-end">SUBTOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=0;
                        @endphp
                        @forelse ($cart as $item)
                        <tr>
                            <td>{{$item[5]}}</td>
                            <td>{{$item[1]}}</td>
                            <td class="text-center">{{$item[2]}}</td>
                            <td class="text-center">{{$item[3]}}</td>
                            <td class="text-end">{{$item[4]}}</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-danger" title="Eliminar Item"
                                    wire:click='eliminarProducto({{$i}})'><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @empty
                        <tr>
                            <td colspan="5"><i>Sin items seleccionados</i></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <table class="table" style="vertical-align: middle">
                    <tr>
                        <td class="text-end">
                            <h4>TOTAL Bs:</h4>
                        </td>
                        <td class="text-end" style="width: 150px">
                            <span class="form-control fs-4">{{number_format($total,2,'.')}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end">
                            <h5 class="mb-1">Pago:</h5> <br>
                            <h5 class="mt-1">Cambio:</h5>
                        </td>
                        <td style="width: 150px">
                            <input type="number" step="any" id="pagado" value="0"
                                class="form-control fs-5 mb-2 text-end" wire:model='pagado' readonly>
                            <input type="number" step="any" id="cambio" value="0"
                                class="form-control fs-5 mb-2 text-end" wire:model='cambio' readonly>
                        </td>
                    </tr>

                </table>

            </div>
            @if ($total)
            <div class="container-fluid mb-3">
                <h5 class="text-end text-secondary">Cortes de Moneda Bs.</h5>
                <div class="btn-group btn-group-lg w-100" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary fs-6"
                        wire:click='reiniciaCalculo()'>0</button>
                    <button type="button" class="btn btn-outline-success fs-6" wire:click='calcularCambio(5)'>5</button>
                    <button type="button" class="btn btn-outline-success fs-6" wire:click='calcularCambio(10)'>
                        10</button>
                    <button type="button" class="btn btn-outline-success fs-6" wire:click='calcularCambio(20)'>
                        20</button>
                    <button type="button" class="btn btn-outline-success fs-6" wire:click='calcularCambio(50)'>
                        50</button>
                    <button type="button" class="btn btn-outline-success fs-6" wire:click='calcularCambio(100)'>
                        100</button>
                    <button type="button" class="btn btn-outline-success fs-6" wire:click='calcularCambio(200)'>
                        200</button>
                    <button type="button" class="btn btn-outline-primary fs-6"
                        wire:click='calcularCambio(0)'>Exacto</button>
                </div>
            </div>
            <div class="container-fluid">
                <h5 class="text-end text-secondary">Tipo de Pago</h5>
                <div class="d-flex justify-content-end">
                    <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group"
                        wire:ignore.self>

                        @foreach ($tipopagos as $tipo)
                        <input type="radio" class="btn-check" name="btnradio" id="rb{{$tipo->id}}" value="{{$tipo->id}}"
                            autocomplete="off" wire:model='selTipoID'>
                        <label class="btn btn-outline-info" for="rb{{$tipo->id}}" title="{{$tipo->nombre}}">
                            @if ($tipo->icon)
                            <i class="fas fa-{{$tipo->icon}}"></i>
                            @endif
                            {{$tipo->nombrecorto}}</label>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end m-3">

                <a href="{{route('pos')}}" class="btn btn-secondary m-1 px-5 py-3"><i class="fas fa-ban"></i>
                    CANCELAR</a>
                <button class="btn btn-success m-1 px-5 py-3" wire:click='finalizar'
                    wire:loading.attr="disabled">PROCESAR <i class="fas fa-check"></i></button>
            </div>

            @endif

        </div>
    </div>
</div>
@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var body = document.body;
    function ejecutarSiEsGrande() {
        if (window.innerWidth > 991) {
            
            body.classList.add('sidebar-folded');
        }else{
            body.classList.remove('sidebar-folded');
        }
    }
        ejecutarSiEsGrande();
        window.addEventListener('resize', ejecutarSiEsGrande);
    });
</script>
@endsection