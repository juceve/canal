@extends('layouts.app')

@section('template_title')
Tipo Servicios
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Tipo Servicios</h4>

        <div class="float-right">
            @can('tiposervicios.create')
            <a href="{{ route('tiposervicios.create') }}" class="btn btn-primary btn-sm float-right"
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
                        <table class="table table-striped table-hover dataTableD text-uppercase">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiposervicios as $tiposervicio)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $tiposervicio->nombre }}</td>

                                    <td>
                                        <form action="{{ route('tiposervicios.destroy',$tiposervicio->id) }}"
                                            method="POST" class="delete" onsubmit="return false">

                                            @can('tiposervicios.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('tiposervicios.edit',$tiposervicio->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('tiposervicios.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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