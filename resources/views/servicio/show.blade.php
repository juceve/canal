@extends('layouts.app')

@section('template_title')
    Info Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <h4>Información de Servicio</h4>

            <div class="float-right">
                <a href="{{ route('servicios.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    {{ $servicio->nombre }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Precio Bs.:</strong>
                                    {{ $servicio->precio }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Modalidad:</strong>
                                    {{ $servicio->modalidadservicio->nombre }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Cantidad:</strong>
                                    {{ $servicio->creditos }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Descripcion:</strong>
                                    {{ $servicio->descripcion }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Tipo:</strong>
                                    {{ $servicio->tiposervicio->nombre }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    @if ($servicio->status)
                                        <span class="badge rounded-pill bg-info">Activo</span>
                                    @else
                                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                    @endif
                                </div>
                            </div>
                        </div>







                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
