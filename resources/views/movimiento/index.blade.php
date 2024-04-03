@extends('layouts.app')

@section('template_title')
Movimientos
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Movimientos</h4>

        <div class="float-right">
            @can('movimientos.create')
            <a href="{{ route('movimientos.create') }}" class="btn btn-primary btn-sm float-right"
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
                            <thead class="thead table-info">
                                <tr>
                                    <th class="text-center">No</th>

                                    <th class="text-center">Fecha</th>
                                    <th>Glosa</th>
                                    <th class="text-center">Tipo Cuenta</th>
                                    <th class="text-end">Importe</th>
                                    <th class="text-center">Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movimientos as $movimiento)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>

                                    <td class="text-center">{{ $movimiento->fecha }}</td>
                                    <td>{{ substr($movimiento->glosa,0,30) }}</td>
                                    <td class="text-center">
                                        @if ($movimiento->cuenta)
                                        @if ($movimiento->cuenta->tipo=="INGRESO")
                                        <span class="badge rounded-pill bg-success">INGRESO <i
                                                class="fas fa-arrow-left"></i></span>
                                        @else
                                        <span class="badge rounded-pill bg-warning text-dark">EGRESO <i
                                                class="fas fa-arrow-right"></i></span>
                                        @endif
                                        @else
                                        <span class="badge rounded-pill bg-secondary">NULL</span>
                                        @endif


                                        {{-- {{ $movimiento->cuenta?$movimiento->cuenta->tipo:"NULL" }} --}}
                                    </td>
                                    <td class="text-end">{{ $movimiento->importe }}</td>
                                    <td class="text-center">
                                        @if ($movimiento->status)
                                        <span class="badge rounded-pill bg-primary">Activo</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="{{ route('movimientos.destroy',$movimiento->id) }}" method="POST"
                                            onsubmit="return false" class="delete">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('movimientos.show',$movimiento->id) }}"
                                                title="Ver Info"><i class="fa fa-fw fa-eye"></i></a>
                                            @can('movimientos.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('movimientos.edit',$movimiento->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('movimientos.destroy')
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