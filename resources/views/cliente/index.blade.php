@extends('layouts.app')

@section('template_title')
Clientes
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Clientes</h4>

        <div class="float-right">
            @can('clientes.create')
            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Celular</th>
                                    <th>Estado</th>
                                    <th style="width: 10px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    <td>{{ $cliente->celular }}</td>
                                    <td>
                                        @if ($cliente->status)
                                        <span class="badge rounded-pill bg-info">Activo</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                        @endif
                                    </td>
                                    <td align="right">

                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Opciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"
                                                style="z-index: 5000">

                                                <a class="dropdown-item"
                                                    href="{{ route('clientes.show', $cliente->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Info
                                                </a>
                                                @can('clientes.create')
                                                <a class="dropdown-item"
                                                    href="{{ route('licenciascliente', $cliente->id) }}">
                                                    <i class="far fa-calendar-plus"></i> Licencias
                                                </a>
                                                @endcan
                                                @can('clientes.edit')
                                                <a class="dropdown-item"
                                                    href="{{ route('clientes.edit', $cliente->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('datosfisicos', $cliente->id) }}">
                                                    <i class="fas fa-heartbeat"></i> Datos Físicos</a>
                                                <a href="{{ route('fotosclientes', $cliente->id) }}"
                                                    class="dropdown-item"><i class="fas fa-image"></i> Fotografias</a>
                                                <a href="{{ route('clientes.statuschange', $cliente->id) }}"
                                                    class="dropdown-item"><i class="fas fa-rotate"></i>
                                                    Activar/Desac.</a>
                                                @endcan

                                                <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                                    class="delete" onsubmit="return false" method="POST">
                                                    @can('clientes.destroy')
                                                    <button class="dropdown-item">
                                                        <i class="fa-solid fa-trash"></i> Eliminar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete')
                                                            }}</button> --}}
                                                </form>
                                            </div>
                                        </div>

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