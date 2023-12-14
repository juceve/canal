@extends('layouts.app')

@section('template_title')
    Vntventa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vntventa') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('vntventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>User Id</th>
										<th>Fecha</th>
										<th>Cliente</th>
										<th>Cliente Id</th>
										<th>Servicio Id</th>
										<th>Importe</th>
										<th>Observaciones</th>
										<th>Vntestadopago Id</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vntventas as $vntventa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $vntventa->user_id }}</td>
											<td>{{ $vntventa->fecha }}</td>
											<td>{{ $vntventa->cliente }}</td>
											<td>{{ $vntventa->cliente_id }}</td>
											<td>{{ $vntventa->servicio_id }}</td>
											<td>{{ $vntventa->importe }}</td>
											<td>{{ $vntventa->observaciones }}</td>
											<td>{{ $vntventa->vntestadopago_id }}</td>
											<td>{{ $vntventa->status }}</td>

                                            <td>
                                                <form action="{{ route('vntventas.destroy',$vntventa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('vntventas.show',$vntventa->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('vntventas.edit',$vntventa->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $vntventas->links() !!}
            </div>
        </div>
    </div>
@endsection
