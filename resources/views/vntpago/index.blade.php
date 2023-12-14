@extends('layouts.app')

@section('template_title')
    Vntpago
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vntpago') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('vntpagos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Vntventa Id</th>
										<th>Vnttipopago Id</th>
										<th>Tipopago</th>
										<th>Monto</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vntpagos as $vntpago)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $vntpago->vntventa_id }}</td>
											<td>{{ $vntpago->vnttipopago_id }}</td>
											<td>{{ $vntpago->tipopago }}</td>
											<td>{{ $vntpago->monto }}</td>
											<td>{{ $vntpago->status }}</td>

                                            <td>
                                                <form action="{{ route('vntpagos.destroy',$vntpago->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('vntpagos.show',$vntpago->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('vntpagos.edit',$vntpago->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $vntpagos->links() !!}
            </div>
        </div>
    </div>
@endsection
