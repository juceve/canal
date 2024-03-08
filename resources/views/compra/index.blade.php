@extends('layouts.app')

@section('template_title')
Compras
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Compras</h4>

        <div class="float-right">
            <a href="{{ route('compras.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-plus"></i> Nuevo
            </a>
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

                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                @php
                                $anulado="";
                                @endphp
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $compra->fecha }}</td>
                                    <td>{{ $compra->user?$compra->user->name:'NULL' }}</td>
                                    <td>
                                        @if ($compra->estado)
                                        <span class="badge rounded-pill bg-primary">Activo</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Anulado</span>
                                        @php
                                        $anulado="disabled";
                                        @endphp
                                        @endif
                                    </td>

                                    <td align="right">

                                        {{-- <form action="{{ route('compras.destroy',$compra->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                    class="fa fa-fw fa-trash"></i></button>
                                        </form> --}}
                                        <form action="{{ route('compras.anular',$compra->id) }}" method="POST"
                                            class="anular" onsubmit="return false">
                                            @csrf
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('compras.show',$compra->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success {{$anulado}}"
                                                href="{{ route('compras.edit',$compra->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger {{$anulado}}" title="Anular"><i
                                                    class="fa fa-fw fa-ban"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $compras->links() !!}
        </div>
    </div>
</div>
@endsection