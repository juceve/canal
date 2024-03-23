@extends('layouts.app')

@section('template_title')
Objetivo
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Objetivo') }}
                        </span>

                        <div class="float-right">
                            @can('objetivos.create')
                            <a href="{{ route('objetivos.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($objetivos as $objetivo)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $objetivo->nombre }}</td>

                                    <td>
                                        <form action="{{ route('objetivos.destroy',$objetivo->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('objetivos.show',$objetivo->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Ver</a>
                                            @can('objetivos.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('objetivos.edit',$objetivo->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> Editar</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('objetivos.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> Eliminar</button>
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
            {!! $objetivos->links() !!}
        </div>
    </div>
</div>
@endsection