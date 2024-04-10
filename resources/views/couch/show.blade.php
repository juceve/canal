@extends('layouts.app')

@section('template_title')
Info Couch
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <div class="mb-3">
            <h4 class="mb-3 mb-md-0">Información de Couch</h4>
        </div>

        <div class="float-right">
            <a href="{{ route('couches.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>


    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $couch->nombre }}
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <strong>Cedula:</strong>
                        {{ $couch->cedula }}
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $couch->telefono }}
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $couch->email }}
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        {{ $couch->direccion }}
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        @if ($couch->status )
                        Activo
                        @else
                        Inactivo
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="text-secondary">Suscripcones activas a su cargo</h5>

            <div class="table-responsive mt-2">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>NRO</th>
                            <th>SERVICIO</th>
                            <th>HORARIO</th>
                            <th class="text-center">CANT. ALUMNOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total=0;
                        @endphp
                        @forelse ($couch->suscripcionesactivas() as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->servicio}}</td>
                            <td>{{$item->hora}}</td>
                            <td class="text-center">{{$item->cantidad}}</td>
                        </tr>
                        @php
                        $total +=$item->cantidad;
                        @endphp
                        @empty
                        <tr>
                            <td colspan="4" class="text-center"><i>No se encontraron resultados.</i></td>
                        </tr>
                        @endforelse
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>TOTAL</strong></td>
                            <td class="text-center"><strong>{{$total}}</strong></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>






        </div>
    </div>
</div>
</div>
</section>
@endsection