@extends('layouts.app')

@section('template_title')
    {{ $suscripcione->name ?? "{{ __('Show') Suscripcione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Suscripcione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('suscripciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $suscripcione->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio Id:</strong>
                            {{ $suscripcione->servicio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Vntventa Id:</strong>
                            {{ $suscripcione->vntventa_id }}
                        </div>
                        <div class="form-group">
                            <strong>Inicio:</strong>
                            {{ $suscripcione->inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Final:</strong>
                            {{ $suscripcione->final }}
                        </div>
                        <div class="form-group">
                            <strong>Horarioservicio Id:</strong>
                            {{ $suscripcione->horarioservicio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Horario:</strong>
                            {{ $suscripcione->horario }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $suscripcione->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
