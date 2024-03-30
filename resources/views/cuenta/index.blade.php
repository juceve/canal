@extends('layouts.app')

@section('template_title')
Cuentas de Movimientos
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Cuentas de Movimientos</h4>

        <div class="float-right">
            @can('cuentas.create')
            <a href="{{ route('cuentas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                    <th>ID</th>

                                    <th>Nombre</th>
                                    <th>Tipo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuentas as $cuenta)
                                <tr>
                                    <td>{{ $cuenta->id }}</td>

                                    <td>{{ $cuenta->nombre }}</td>
                                    <td>{{ $cuenta->tipo }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('cuentas.destroy',$cuenta->id) }}" method="POST"
                                            onsubmit="return false" class="delete">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('cuentas.show',$cuenta->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('cuentas.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('cuentas.edit',$cuenta->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('cuentas.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
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
            {!! $cuentas->links() !!}
        </div>
    </div>
</div>
@endsection