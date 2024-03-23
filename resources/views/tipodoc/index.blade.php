@extends('layouts.app')

@section('template_title')
Tipodoc
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Tipodoc') }}
                        </span>

                        <div class="float-right">
                            @can('tipodocs.create')
                            <a href="{{ route('tipodocs.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Nombrecorto</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipodocs as $tipodoc)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $tipodoc->nombre }}</td>
                                    <td>{{ $tipodoc->nombrecorto }}</td>

                                    <td>
                                        <form action="{{ route('tipodocs.destroy',$tipodoc->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('tipodocs.show',$tipodoc->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                            @can('tipodocs.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('tipodocs.edit',$tipodoc->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('tipodocs.destroy')
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
            {!! $tipodocs->links() !!}
        </div>
    </div>
</div>
@endsection