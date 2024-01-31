@extends('layouts.app')

@section('template_title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <h4>Servicios</h4>

            <div class="float-right">
                <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                    <i class="fas fa-plus"></i> Nuevo
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="width: 5px;">No</th>

                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>

                                        <th style="width: 10px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $servicio->nombre }}</td>
                                            <td>{{ $servicio->tiposervicio->nombre }}</td>
                                            <td>
                                                @if ($servicio->status)
                                                    <span class="badge rounded-pill bg-info">Activo</span>
                                                @else
                                                    <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('servicios.destroy', $servicio->id) }}"
                                                    method="POST" onsubmit="return false" class="delete">
                                                    <a class="btn btn-sm btn-outline-primary "
                                                        href="{{ route('servicios.show', $servicio->id) }}"
                                                        title="Info"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-outline-info "
                                                        href="{{ route('servicios.horarios', $servicio->id) }}"
                                                        title="Horarios"><i class="fa fa-fw fa-clock"></i></a>
                                                    <a class="btn btn-sm btn-outline-success"
                                                        href="{{ route('servicios.edit', $servicio->id) }}"
                                                        title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash" title="Eliminar"></i></button>
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
