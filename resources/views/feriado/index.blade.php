@extends('layouts.app')

@section('template_title')
Feriados
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Feriados</h4>

        <div class="float-right">
            @can('feriados.create')
            <a href="{{ route('feriados.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Mes-Día</th>
                                    <th>Gestion</th>
                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feriados as $feriado)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $feriado->mesdia }}</td>
                                    <td>{{ $feriado->gestion }}</td>
                                    <td>{{ $feriado->nombre }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('feriados.destroy',$feriado->id) }}" method="POST"
                                            onsubmit="return false" class="delete">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('feriados.show',$feriado->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('feriados.create')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('feriados.edit',$feriado->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('feriados.destroy')
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
            {{-- {!! $feriados->links() !!} --}}
        </div>
    </div>
</div>
@endsection