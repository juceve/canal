@extends('layouts.app')

@section('template_title')
    {{ $horarioservicio->name ?? "{{ __('Show') Horarioservicio" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Horarioservicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('horarioservicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Servicio Id:</strong>
                            {{ $horarioservicio->servicio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $horarioservicio->hora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
