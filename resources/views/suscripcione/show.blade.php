@extends('layouts.app')

@section('template_title')
Info Suscripción
@endsection

@section('content')
<section class="content container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Info Suscripción</h4>

        <div class="float-right">
            <a href="{{ route('suscripciones.index') }}" class="btn btn-primary btn-sm float-right"
                data-placement="left">
                <i class="fas fa-arrow-left"></i> Vovler
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">


                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <strong>Cliente:</strong>
                                {{ $suscripcione->cliente?$suscripcione->cliente->nombre:"NULL" }}
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Servicio:</strong>
                                {{ $suscripcione->servicio?$suscripcione->servicio->nombre:"NULL" }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>ID Venta:</strong>
                                {{ $suscripcione->vntventa_id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Inicio:</strong>
                                {{ $suscripcione->inicio }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Final:</strong>
                                @if ($suscripcione->final < date('Y-m-d')) <span class="badge rounded-pill bg-danger">
                                    {{$suscripcione->final}}</span>
                                    @else
                                    <span class="badge rounded-pill bg-primary">{{$suscripcione->final}}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Horario:</strong>
                                {{ $suscripcione->horario }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <strong>Estado:</strong>
                                @if ($suscripcione->status)
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