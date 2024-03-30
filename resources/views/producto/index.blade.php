@extends('layouts.app')

@section('template_title')
Productos
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Productos</h4>

        <div class="float-right">
            @can('productos.create')
            <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Para Venta</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoria?$producto->categoria->nombre:"NULL" }}</td>
                                    <td>{{ $producto->stocks->first()->cantidad }}</td>
                                    <td>
                                        @if ($producto->pos)
                                        <span class="badge rounded-pill bg-primary">SI</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">NO</span>
                                        @endif
                                    </td>

                                    <td align="right">
                                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('productos.show',$producto->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('productos.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('productos.edit',$producto->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('productos.destroy')
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

        </div>
    </div>
</div>
@endsection