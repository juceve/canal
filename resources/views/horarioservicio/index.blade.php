@extends('layouts.app')

@section('template_title')
    Horarioservicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Horarioservicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('horarioservicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Servicio Id</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horarioservicios as $horarioservicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $horarioservicio->servicio_id }}</td>
											<td>{{ $horarioservicio->hora }}</td>

                                            <td>
                                                <form action="{{ route('horarioservicios.destroy',$horarioservicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('horarioservicios.show',$horarioservicio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('horarioservicios.edit',$horarioservicio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $horarioservicios->links() !!}
            </div>
        </div>
    </div>
@endsection
