@extends('layouts.app')

@section('template_title')
    Datosfisico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Datosfisico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('datosfisicos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Contextura Id</th>
										<th>Peso</th>
										<th>Altura</th>
										<th>Imc</th>
										<th>Alergias</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datosfisicos as $datosfisico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosfisico->cliente_id }}</td>
											<td>{{ $datosfisico->contextura_id }}</td>
											<td>{{ $datosfisico->peso }}</td>
											<td>{{ $datosfisico->altura }}</td>
											<td>{{ $datosfisico->imc }}</td>
											<td>{{ $datosfisico->alergias }}</td>

                                            <td>
                                                <form action="{{ route('datosfisicos.destroy',$datosfisico->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('datosfisicos.show',$datosfisico->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datosfisicos.edit',$datosfisico->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $datosfisicos->links() !!}
            </div>
        </div>
    </div>
@endsection
