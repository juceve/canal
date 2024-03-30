@extends('layouts.app')

@section('template_title')
Compras
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h3>COMPRA DE PRODUCTOS <i class="link-icon" data-feather="shopping-bag"></i></h3>

        <div class="float-right">
            @can('compras.create')
            <a href="{{ route('compras.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                    <th class="text-center">No</th>

                                    <th class="text-center">Fecha</th>
                                    <th>Usuario</th>
                                    <th class="text-end">Importe Bs.</th>
                                    <th class="text-center">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                @php
                                $anulado="";
                                @endphp
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>

                                    <td class="text-center">{{ $compra->fecha }}</td>
                                    <td>{{ $compra->user?$compra->user->name:'NULL' }}</td>
                                    <td class="text-end">{{ number_format(importeCompra($compra->id),2,'.') }}</td>
                                    <td class="text-center">
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
                                            @can('compras.edit')
                                            <a class="btn btn-sm btn-success {{$anulado}}"
                                                href="{{ route('compras.edit',$compra->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @can('compras.destroy')
                                            <button class="btn btn-sm btn-danger {{$anulado}}" title="Anular"><i
                                                    class="fa fa-fw fa-ban"></i></button>
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