<div class="sidebar-body">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a href="/home" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
            </a>            
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#seguimientos" role="button"
                aria-expanded="false" aria-controls="seguimientos">
                <i class="link-icon" data-feather="list"></i>                
                <span class="link-title">Suscripciones</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="seguimientos">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('suscripciones.index')}}" class="nav-link">Listado</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ventas" role="button"
                aria-expanded="false" aria-controls="ventas">
                <i class="link-icon" data-feather="shopping-cart"></i>
                <span class="link-title">Ventas</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="ventas">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('ventas.suscli')}}" class="nav-link">Servicios</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- <li class="nav-item">
            <a href="{{route('clientes.index')}}" class="nav-link">
                <i class="link-icon" data-feather="database"></i>
                <span class="link-title">Clientes</span>
            </a>
        </li> --}}
        <li class="nav-item nav-category">SISTEMA</li>
        
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#mantenimiento" role="button"
                aria-expanded="false" aria-controls="mantenimiento">
                <i class="link-icon" data-feather="sliders"></i>
                <span class="link-title">Mantenimiento</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="mantenimiento">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('clientes.index')}}" class="nav-link">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('servicios.index')}}" class="nav-link">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.roles.index')}}" class="nav-link">Roles y Permisos</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#paramentros" role="button"
                aria-expanded="false" aria-controls="paramentros">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">Parametros</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="paramentros">
                <ul class="nav sub-menu">
                    
                    <li class="nav-item">
                        <a href="{{route('zonas.index')}}" class="nav-link">Zonas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tipodocs.index')}}" class="nav-link">Tipo Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('objetivos.index')}}" class="nav-link">Objetivos Clientes</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div>