@extends('layouts.app')

@section('template_title')
Zonas
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Zonas</h4>

        <div class="float-right">
            @can('zonas.create')
            <a href="{{ route('zonas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                @foreach ($zonas as $zona)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $zona->nombre }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('zonas.destroy',$zona->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            @can('zonas.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('zonas.edit',$zona->id) }}"
                                                title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('zonas.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                    class="fa fa-fw fa-trash"></i> </button>
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