@extends('layouts.app')

@section('template_title')
    {{ $vntventa->name ?? "{{ __('Show') Vntventa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vntventa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vntventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $vntventa->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $vntventa->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $vntventa->cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $vntventa->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio Id:</strong>
                            {{ $vntventa->servicio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Importe:</strong>
                            {{ $vntventa->importe }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $vntventa->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Vntestadopago Id:</strong>
                            {{ $vntventa->vntestadopago_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $vntventa->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
