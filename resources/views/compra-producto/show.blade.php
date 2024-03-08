@extends('layouts.app')

@section('template_title')
    {{ $compraProducto->name ?? "{{ __('Show') Compra Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('compra-productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $compraProducto->producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Compra Id:</strong>
                            {{ $compraProducto->compra_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $compraProducto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $compraProducto->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
