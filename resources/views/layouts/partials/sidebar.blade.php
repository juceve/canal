<div class="sidebar-body">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        @can('home')
        <li class="nav-item">
            <a href="/home" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
            </a>
        </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ventas" role="button" aria-expanded="false"
                aria-controls="ventas">
                <i class="link-icon" data-feather="shopping-cart"></i>
                <span class="link-title">Ventas</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="ventas">
                <ul class="nav sub-menu">
                    <li class="nav-item nav-category">PRODUCTOS</li>
                    @can('pos.create')
                    <li class="nav-item">
                        <a href="{{ route('pos') }}" class="nav-link">Punto de Venta</a>
                    </li>
                    @endcan
                    @can('pos.index')
                    <li class="nav-item">
                        <a href="{{ route('vntventas.index') }}" class="nav-link">Listado</a>
                    </li>
                    @endcan

                    <li class="nav-item nav-category">SUSCRIPCIONES</li>
                    @can('pos.create')
                    <li class="nav-item">
                        <a href="{{ route('ventas.suscripciones') }}" class="nav-link">Punto de Venta</a>
                    </li>
                    @endcan
                    @can('pos.index')
                    <li class="nav-item">
                        <a href="{{ route('suscripciones.index') }}" class="nav-link">Listado</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @can('creditos.index')
        <li class="nav-item">
            <a href="/admin/creditos" class="nav-link">
                <i class="link-icon" data-feather="archive"></i>
                <span class="link-title">Créditos</span>
            </a>
        </li>
        @endcan
        @can('compras.index')
        <li class="nav-item">
            <a href="/admin/compras" class="nav-link">
                <i class="link-icon" data-feather="shopping-bag"></i>
                <span class="link-title">Compra Productos</span>
            </a>
        </li>
        @endcan

        {{-- <li class="nav-item">
            <a href="{{route('clientes.index')}}" class="nav-link">
                <i class="link-icon" data-feather="database"></i>
                <span class="link-title">Clientes</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#mantenimiento" role="button" aria-expanded="false"
                aria-controls="mantenimiento">
                <i class="link-icon" data-feather="database"></i>
                <span class="link-title">Administrar</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="mantenimiento">
                <ul class="nav sub-menu">
                    @can('movimientos.index')
                    <li class="nav-item">
                        <a href="{{ route('movimientos.index') }}" class="nav-link">Movimientos</a>
                    </li>
                    @endcan
                    @can('clientes.index')
                    <li class="nav-item">
                        <a href="{{ route('clientes.index') }}" class="nav-link">Clientes</a>
                    </li>
                    @endcan

                    @can('servicios.index')
                    <li class="nav-item">
                        <a href="{{ route('servicios.index') }}" class="nav-link">Servicios</a>
                    </li>
                    @endcan
                    @can('productos.index')
                    <li class="nav-item">
                        <a href="{{ route('productos.index') }}" class="nav-link">Productos</a>
                    </li>
                    @endcan
                    @can('couches.index')
                    <li class="nav-item">
                        <a href="{{ route('couches.index') }}" class="nav-link">Couches</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#reportes" role="button" aria-expanded="false"
                aria-controls="reportes">
                <i class="link-icon" data-feather="pie-chart"></i>
                <span class="link-title">Reportes</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="reportes">
                <ul class="nav sub-menu">
                    @can('rptingresosegresos')
                    <li class="nav-item">
                        <a href="{{ route('rptingresosegresos') }}" class="nav-link">Ingresos - Egresos</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">SISTEMA</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#paramentros" role="button" aria-expanded="false"
                aria-controls="paramentros">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">Parametros</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="paramentros">
                <ul class="nav sub-menu">
                    <li class="nav-item nav-category">FUNCIONAL</li>


                    @can('contexturas.index')
                    <li class="nav-item">
                        <a href="{{ route('contexturas.index') }}" class="nav-link">Contexturas fisicas</a>
                    </li>
                    @endcan
                    @can('objetivos.index')
                    <li class="nav-item">
                        <a href="{{ route('objetivos.index') }}" class="nav-link">Objetivos Clientes</a>
                    </li>
                    @endcan


                    <li class="nav-item nav-category">VENTAS</li>
                    @can('tiposervicios.index')
                    <li class="nav-item">
                        <a href="{{ route('tiposervicios.index') }}" class="nav-link">Tipo Servicios</a>
                    </li>
                    @endcan
                    @can('categorias.index')
                    <li class="nav-item">
                        <a href="{{ route('categorias.index') }}" class="nav-link">Categorias Prod.</a>
                    </li>
                    @endcan


                    <li class="nav-item nav-category">SISTEMA</li>
                    @can('users.index')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">Usuarios</a>
                    </li>
                    @endcan
                    @can('admin.roles.index')
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link">Roles y Permisos</a>
                    </li>
                    @endcan
                    @can('cuentas.index')
                    <li class="nav-item">
                        <a href="{{ route('cuentas.index') }}" class="nav-link">Cuentas</a>
                    </li>
                    @endcan
                    @can('feriados.index')

                    <li class="nav-item">
                        <a href="{{ route('feriados.index') }}" class="nav-link">Feriados</a>
                    </li>
                    @endcan
                    @can('tipodocs.index')
                    <li class="nav-item">
                        <a href="{{ route('tipodocs.index') }}" class="nav-link">Tipo Documentos</a>
                    </li>
                    @endcan
                    @can('zonas.index')
                    <li class="nav-item">
                        <a href="{{ route('zonas.index') }}" class="nav-link">Zonas</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>

    </ul>
</div>