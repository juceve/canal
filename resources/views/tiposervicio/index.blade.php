@extends('layouts.app')

@section('template_title')
Tipo Servicios
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Tipo Servicios
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tiposervicios.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiposervicios as $tiposervicio)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $tiposervicio->nombre }}</td>

                                    <td>
                                        <form action="{{ route('tiposervicios.destroy',$tiposervicio->id) }}"
                                            method="POST" class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('tiposervicios.show',$tiposervicio->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Info</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('tiposervicios.edit',$tiposervicio->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $tiposervicios->links() !!}
        </div>
    </div>
</div>
@endsection