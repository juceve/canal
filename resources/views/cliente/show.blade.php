@extends('layouts.app')

@section('template_title')
    Info Cliente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mb-3 mb-md-0">Información de Cliente</h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Detalles
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    {{ $cliente->nombre }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Dirección:</strong>
                                    {{ $cliente->direccion }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Zona:</strong>
                                    {{ $cliente->zona->nombre }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Tipo Documento:</strong>
                                    {{ $cliente->tipodoc->nombre }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Nro. Documento:</strong>
                                    {{ $cliente->nrodoc }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Celular:</strong>
                                    {{ $cliente->celular }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Teléfono:</strong>
                                    {{ $cliente->telefono }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {{ $cliente->email }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Fecha Nacimiento:</strong>
                                    {{ $cliente->fechanacimiento }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">

                            </div>
                        </div>










                    </div>
                </div>
            </div>
        </div>
        </section>
    @endsection
