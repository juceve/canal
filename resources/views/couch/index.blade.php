@extends('layouts.app')

@section('template_title')
Couches
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Couches</h4>

        <div class="float-right">
            @can('couches.create')
            <a href="{{ route('couches.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($couches as $couch)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $couch->nombre }}</td>
                                    <td>{{ $couch->telefono }}</td>
                                    <td>{{ $couch->email }}</td>
                                    <td>
                                        @if ($couch->status)
                                        <span class="badge rounded-pill bg-primary">Activo</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="{{ route('couches.destroy',$couch->id) }}" method="POST"
                                            onsubmit="return false" class="delete">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('couches.show',$couch->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('couches.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('couches.edit',$couch->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('couches.destroy')
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
            {!! $couches->links() !!}
        </div>
    </div>
</div>
@endsection