@extends('layouts.app')

@section('template_title')
Listado Suscripciones
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>
            Suscripciones de Clientes
        </h4>

        <div class="float-right">
            @can('pos.create')
            <a href="{{ route('ventas.suscripciones') }}" class="btn btn-primary btn-sm float-right"
                data-placement="left">
                <i class="fas fa-plus"></i> Nuevo
            </a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTableD">
                            <thead class="thead table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Expira</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suscripciones as $suscripcione)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $suscripcione->cliente?$suscripcione->cliente->nombre:"NULL" }}</td>
                                    <td>{{ $suscripcione->servicio?$suscripcione->servicio->nombre:"NULL" }}</td>
                                    <td>
                                        @if ($suscripcione->final < date('Y-m-d')) <span
                                            class="badge rounded-pill bg-danger">{{$suscripcione->final}}</span>
                                            @else
                                            <span class="badge rounded-pill bg-primary">{{$suscripcione->final}}</span>
                                            @endif

                                    </td>
                                    <td>
                                        @if ($suscripcione->status)
                                        <span class="badge rounded-pill bg-info">Activo</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                        @endif
                                    </td>

                                    <td align="right">
                                        <form action="{{ route('suscripciones.destroy',$suscripcione->id) }}"
                                            method="POST" class="anular" onsubmit="return false">
                                            <a class="btn btn-sm btn-outline-primary "
                                                href="{{ route('suscripciones.show',$suscripcione->id) }}"
                                                title="Info"><i class="fa fa-fw fa-eye"></i> </a>
                                            {{-- <a class="btn btn-sm btn-outline-success"
                                                href="{{ route('suscripciones.edit',$suscripcione->id) }}"
                                                title="Editar"><i class="fa fa-fw fa-edit"></i> </a> --}}
                                            @csrf
                                            @method('DELETE')
                                            @can('pos.destroy')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Anular"><i class="fa fa-fw fa-ban"></i> </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection