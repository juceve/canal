@extends('layouts.app')

@section('template_title')
    Clientes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mb-3 mb-md-0">Clientes</h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Registros
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Nuevo <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>


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
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="z-index: 5000">

                                                        <a class="dropdown-item"
                                                            href="{{ route('clientes.show', $cliente->id) }}">
                                                            <i class="fa fa-fw fa-eye"></i> Info
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('clientes.edit', $cliente->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Editar</a>
                                                        <a href="{{ route('clientes.statuschange', $cliente->id) }}"
                                                            class="dropdown-item"><i class="fas fa-rotate"></i> Cambiar Estado</a>
                                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" class="delete" onsubmit="return false"
                                                            method="POST">
                                                            <button class="dropdown-item">
                                                                <i class="fa-solid fa-trash"></i> Eliminar</a>

                                                                @csrf
                                                                @method('DELETE')
                                                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button> --}}
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-- <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('clientes.show', $cliente->id) }}"
                                                        title="Ver info"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('clientes.edit', $cliente->id) }}" title="Editar"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('clientes.statuschange', $cliente->id) }}" title="Cambiar Estado"><i
                                                            class="fa fa-fw fa-rotate"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Eliminar"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form> --}}
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
