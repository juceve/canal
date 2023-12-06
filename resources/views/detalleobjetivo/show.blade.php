@extends('layouts.app')

@section('template_title')
    {{ $detalleobjetivo->name ?? "{{ __('Show') Detalleobjetivo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalleobjetivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalleobjetivos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $detalleobjetivo->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Objetivo Id:</strong>
                            {{ $detalleobjetivo->objetivo_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
