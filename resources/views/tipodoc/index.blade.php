@extends('layouts.app')

@section('template_title')
Tipos de Documentos
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Tipos de Documentos</h4>

        <div class="float-right">
            @can('tipodocs.create')
            <a href="{{ route('tipodocs.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                    <th>Nombre corto</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipodocs as $tipodoc)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $tipodoc->nombre }}</td>
                                    <td>{{ $tipodoc->nombrecorto }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('tipodocs.destroy',$tipodoc->id) }}" method="POST"
                                            onsubmit="return false" class="delete">
                                            @can('tipodocs.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('tipodocs.edit',$tipodoc->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('tipodocs.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm" title="ELiminar"><i
                                                    class="fa fa-fw fa-trash"></i></button>
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