@extends('layouts.app')

@section('template_title')
Info Cliente
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <div class="mb-3">
            <h4 class="mb-3 mb-md-0">Información de Cliente</h4>
        </div>

        <div class="float-right">
            <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h6 class="mb-2">Datos Personales</h6>
            <div class="card">
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
                        <div class="col-12 col-md-4 mb-3 d-grid">
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalHistorial">Historial de Suscripciones</button>
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="mb-2 mt-3">Estado Fisico Actual - [<small class="text-secondary"><i>Reg.:
                        {{ $estadofisico->created_at }}</i></small>]</h6>
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-4 col-md-2 mb-3 p-0 m-0">
                            <strong>Altura Mt.:</strong>
                        </div>
                        <div class="col-8 col-md-2 mb-3 p-0 m-0">
                            {{ number_format($estadofisico->altura, 2, ',') }}
                        </div>
                        <div class="col-4 col-md-2 mb-3 p-0 m-0">
                            <strong>Peso Kg.:</strong>
                        </div>
                        <div class="col-8 col-md-2 mb-3 p-0 m-0">
                            {{ number_format($estadofisico->peso, 2, ',') }}
                        </div>
                        <div class="col-4 col-md-2 mb-3 p-0 m-0">
                            <strong>IMC:</strong>
                        </div>
                        <div class="col-8 col-md-2 mb-3 p-0 m-0">
                            {{ number_format($estadofisico->imc, 2, ',') }}
                        </div>
                        <div class="col-4 col-md-2 mb-3 p-0 m-0">
                            <strong>Contextura:</strong>
                        </div>
                        <div class="col-8 col-md-2 mb-3 p-0 m-0">
                            {{ $estadofisico->contextura->nombre }}
                        </div>
                        <div class="col-4 col-md-2 mb-3 p-0 m-0">
                            <strong>Observaciones:</strong>
                        </div>
                        <div class="col-8 col-md-6 mb-3 p-0 m-0">
                            <p>{{ $estadofisico->alergias }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="mb-2 mt-3">Objetivos</h6>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <ul class="">
                                @foreach ($cliente->detalleobjetivos as $objetivo)
                                <li class="mb-2">{{ $objetivo->objetivo->nombre }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-md-6">
                            {{-- <h6 class="mb-3">Otros</h6> --}}
                            <textarea name="otros" id="otros" rows="3" class="form-control bg-white"
                                readonly>{{ $cliente->nObjetivos }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="mb-2 mt-3">Fotografias</h6>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($cliente->imagenclientes as $imagen)
                        <div class="col-12 col-md-4">
                            <a href="#{{ $imagen->id }}">
                                <img src="{{ Storage::url($imagen->url) }}" class="img-thumbnail">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalHistorial" tabindex="-1" aria-labelledby="modalHistorialLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHistorialLabel">Historial de Suscripciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" style="max-height: 400px;">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>Nro.</th>
                                    <th>SERVICIO</th>
                                    <th>INICIO</th>
                                    <th>FINAL</th>
                                    {{-- <th>ESTADO</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente->suscripciones->where('status',1) as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->servicio->nombre}}</td>
                                    <td>{{$item->inicio}}</td>
                                    <td>
                                        @if ($item->final>=date('Y-m-d')) <span class="badge rounded-pill bg-primary">
                                            {{$item->final}}</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">{{$item->final}}</span>
                                        @endif
                                    </td>
                                    {{-- <td>{{$item->status?"ACTIVO":"ANULADO"}}</td> --}}
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    @foreach ($cliente->imagenclientes as $imagen)
    <article class="light-box" id="{{ $imagen->id }}">
        {{-- <a href="#4" class="light-box-next"><i class="bi bi-arrow-left"></i></a> --}}
        <img src="{{ Storage::url($imagen->url) }}">
        {{-- <a href="#2" class="light-box-next"><i class="bi bi-arrow-right"></i></a> --}}
        <a href="#" class="light-box-close">X</a>
    </article>
    @endforeach
    </section>
    @endsection