@extends('layouts.app')

@section('template_title')
Info Producto
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <strong>Info Producto</strong>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group mb-3">
                        <strong>Nombre:</strong>
                        {{ $producto->nombre }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Descripcion:</strong>
                        {{ $producto->descripcion }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Precio:</strong>
                        {{ $producto->precio }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Categoria:</strong>
                        {{ $producto->categoria?$producto->categoria->nombre:"NULL" }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection