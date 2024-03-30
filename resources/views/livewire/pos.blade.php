<div>
    @section('template_title')
    PUNTO DE VENTA - PRODUCTOS
    @endsection

    <h3 class="mb-3">PUNTO DE VENTA - PRODUCTOS <i class="fas fa-shopping-cart"></i></h3>
    <div class="row">
        <div class="col-12  col-lg-7 mt-3">
            <h5 class="text-secondary">SELECCIÓN DE PRODUCTOS</h5>
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6"><label class="text-secondary">CATEGORIAS</label></div>
                        <div class="col-12 col-sm-6 text-end">
                            <button class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Busqueda Avanzada <i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <nav class="mt-1" wire:ignore>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-vendidos-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-vendidos" type="button" role="tab" aria-controls="nav-vendidos"
                                aria-selected="false">MAS VENDIDOS</button>

                            @forelse ($categorias as $item)
                            <button class="nav-link" id="nav-{{$item->id}}-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-{{$item->id}}" type="button" role="tab"
                                aria-controls="nav-{{$item->id}}"
                                aria-selected="false">{{substr($item->nombre,0,16)}}</button>
                            @empty
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">VACIO</button>
                            @endforelse

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent" wire:ignore>
                        <div class="tab-pane fade show active" id="nav-vendidos" role="tabpanel"
                            aria-labelledby="nav-vendidos-tab" tabindex="0">
                            <div class="row g-2 mt-1">

                                @foreach ($masVendidos as $prod)
                                <div class="col-6 col-sm-4 col-md-4 col-xl-3 d-grid">
                                    <button class="btn btn-outline-info"
                                        wire:click='seleccionarProducto({{$prod->id}})'>
                                        <strong>{{$prod->nombre}} </strong>
                                        <br>
                                        <small class="text-dark">Stock: <strong>{{$prod->stock}}</strong></small>
                                        <br>
                                        <small class="text-dark"><strong>Precio: {{$prod->precio}}
                                                Bs.</strong></small>
                                    </button>
                                </div>
                                @endforeach


                            </div>
                        </div>
                        @forelse ($categorias as $item)
                        <div class="tab-pane fade" id="nav-{{$item->id}}" role="tabpanel"
                            aria-labelledby="nav-{{$item->id}}-tab" tabindex="0">
                            <div class="row g-2 mt-1">
                                @foreach ($item->vwproductos as $prod)
                                <div class="col-6 col-sm-4 col-md-4 col-xl-3 d-grid">
                                    <button class="btn btn-outline-primary"
                                        wire:click='seleccionarProducto({{$prod->id}})'>
                                        <strong>{{$prod->nombre }}</strong>
                                        <br>
                                        <small class="text-warning">Stock: <strong>{{$prod->stock}}</strong></small>
                                        <br>
                                        <small><strong class="text-warning">Precio: {{$prod->precio}}
                                                Bs.</strong></small>
                                    </button>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @empty
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">...</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        {{-- PEDIDO ACTUAL --}}
        <div class="col-12  col-lg-5 mt-3">
            <h5 class="text-secondary">PEDIDO ACTUAL</h5>
            <div class="table-reponsive mt-2">
                <table class="table table-hover" style="vertical-align: middle">
                    <thead class="table-secondary">
                        <tr>
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
                            <td>{{$item[1]}}</td>
                            <td class="text-center">{{$item[2]}}</td>
                            <td class="text-center">{{$item[3]}}</td>
                            <td class="text-end">{{$item[4]}}</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-warning" title="Descontar Cantidad"
                                    wire:click='quitarProducto({{$item[0]}})'><i class="fas fa-minus"></i></button>
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
                <button class="btn btn-success m-1 px-5 py-3" wire:click='procesar'
                    wire:loading.attr="disabled">PROCESAR <i class="fas fa-check"></i></button>
            </div>
            @can('creditos.create')
            <div class="d-flex justify-content-end m-3">
                <button class="btn btn-warning m-1 px-5 py-3" wire:loading.attr="disabled" data-bs-toggle="modal"
                    data-bs-target="#clientes">A CUENTA
                    <i class="fas fa-file-invoice-dollar"></i></button>
            </div>
            @endcan
            @endif

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Busqueda Avanzada</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="search-input search-input-sm position-relative">
                            <input type="search" class="form-control form-control-sm ps-5" placeholder="Buscar Producto"
                                id="search" wire:model.debounce.500ms='search'>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="position-absolute top-50 translate-middle-y search-icon text-secondary"
                                width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    @if ($productos)
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-bordered"
                            style="vertical-align: middle; font-size: 12px">
                            <thead class="table-primary">
                                <th class="text-center" style="width: 40px">ID</th>
                                <th>PRODUCTO</th>
                                <th style="width: 120px">CAT.</th>
                                <th class="text-end" style="width: 70px">PRECIO</th>
                                <th style="width: 50px">Agregar</th>
                            </thead>
                            <tbody>

                                @forelse ($productos as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td>
                                        <p class="text-uppercase">{{$item->nombre}}</p>
                                        <small><strong>Cod.:</strong> {{$item->codbarras}}</small> <br>
                                        <small><strong>Stock:</strong> {{$item->stock}}</small>

                                    </td>
                                    <td>{{$item->categoria}}</td>
                                    <td class="text-end">{{$item->precio}}</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary btn-sm"
                                            wire:click='seleccionarProducto({{$item->id}})' title="Agregar"> <i
                                                class="fas fa-plus"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5"><i>No se encontro ningún producto.</i></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="clientes" tabindex="-1" aria-labelledby="clientesLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="clientesLabel">Clientes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table dataTable w-100">
                            <thead>
                                <tr class="table-primary">
                                    <td>ID</td>
                                    <td>CLIENTE</td>
                                    <td>CELULAR</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($clientes)
                                @foreach ($clientes as $cliente)
                                <tr>

                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->celular}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning " title="Aplicar credito temporal"
                                            onclick="aplicarCredito({{$cliente->id}})" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Aplicar
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
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
    function seleccionar(id){
        @this.set('selTipoID',id);
    }   

</script>
<script>
    focusVenta();

    function focusVenta(){
        var search = document.getElementById('search');
    search.focus();
    }

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
<script>
    Livewire.on('focus',msg=>{
        focusVenta();
    })
</script>

<script>
    function ingresar(value){       
        
        if (document.getElementById('contenttypeo').value == '0') {
            document.getElementById('contenttypeo').value = value;
        } else {              
            document.getElementById('contenttypeo').value += value;
        }
       
    }

    function borrar(){
        document.getElementById('contenttypeo').value = '0';
    }

    function backspace(){
        var display = document.getElementById('contenttypeo').value;  
        display = display.slice(0, -1);
        if (display.length) {
            document.getElementById('contenttypeo').value = display;
        } else {
            document.getElementById('contenttypeo').value = '0';
        }      
        

    } 
</script>

<script>
    function aplicarCredito(id){
        Livewire.emit('acuenta',id);
    }
</script>

@endsection