@extends('layouts.app')

@section('template_title')
    Compra Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compra Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('compra-productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Producto Id</th>
										<th>Compra Id</th>
										<th>Cantidad</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compraProductos as $compraProducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $compraProducto->producto_id }}</td>
											<td>{{ $compraProducto->compra_id }}</td>
											<td>{{ $compraProducto->cantidad }}</td>
											<td>{{ $compraProducto->precio }}</td>

                                            <td>
                                                <form action="{{ route('compra-productos.destroy',$compraProducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('compra-productos.show',$compraProducto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('compra-productos.edit',$compraProducto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $compraProductos->links() !!}
            </div>
        </div>
    </div>
@endsection
