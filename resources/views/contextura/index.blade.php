@extends('layouts.app')

@section('template_title')
Contexturas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Contexturas') }}
                        </span>

                        <div class="float-right">
                            @can('contexturas.create')
                            <a href="{{ route('contexturas.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan
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
                                @foreach ($contexturas as $contextura)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $contextura->nombre }}</td>

                                    <td>
                                        <form action="{{ route('contexturas.destroy',$contextura->id) }}" method="POST"
                                            class="delete" onsubmit="return false">

                                            @can('contexturas.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('contexturas.edit',$contextura->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('contexturas.destroy')
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
            {!! $contexturas->links() !!}
        </div>
    </div>
</div>
@endsection