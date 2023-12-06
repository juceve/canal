@extends('layouts.app')

@section('template_title')
    Detalleobjetivo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalleobjetivo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalleobjetivos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                                        
										<th>Cliente Id</th>
										<th>Objetivo Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleobjetivos as $detalleobjetivo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detalleobjetivo->cliente_id }}</td>
											<td>{{ $detalleobjetivo->objetivo_id }}</td>

                                            <td>
                                                <form action="{{ route('detalleobjetivos.destroy',$detalleobjetivo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalleobjetivos.show',$detalleobjetivo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalleobjetivos.edit',$detalleobjetivo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detalleobjetivos->links() !!}
            </div>
        </div>
    </div>
@endsection
