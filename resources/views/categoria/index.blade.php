@extends('layouts.app')

@section('template_title')
Categorias de Producto
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Categorias de Producto</h4>

        <div class="float-right">
            <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $categoria->nombre }}</td>

                                    <td align="right">
                                        <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('categorias.show',$categoria->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('categorias.edit',$categoria->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                    class="fa fa-fw fa-trash"></i></button>
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