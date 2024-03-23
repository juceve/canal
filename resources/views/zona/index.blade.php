@extends('layouts.app')

@section('template_title')
Zona
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Zona') }}
                        </span>

                        <div class="float-right">
                            @can('zonas.create')
                            <a href="{{ route('zonas.create') }}" class="btn btn-primary btn-sm float-right"
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
                                @foreach ($zonas as $zona)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $zona->nombre }}</td>

                                    <td>
                                        <form action="{{ route('zonas.destroy',$zona->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('zonas.show',$zona->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                            @can('zonas.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('zonas.edit',$zona->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('zonas.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
            {!! $zonas->links() !!}
        </div>
    </div>
</div>
@endsection