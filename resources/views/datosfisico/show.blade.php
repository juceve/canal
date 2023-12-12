@extends('layouts.app')

@section('template_title')
    {{ $datosfisico->name ?? "{{ __('Show') Datosfisico" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Datosfisico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('datosfisicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $datosfisico->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Contextura Id:</strong>
                            {{ $datosfisico->contextura_id }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $datosfisico->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Altura:</strong>
                            {{ $datosfisico->altura }}
                        </div>
                        <div class="form-group">
                            <strong>Imc:</strong>
                            {{ $datosfisico->imc }}
                        </div>
                        <div class="form-group">
                            <strong>Alergias:</strong>
                            {{ $datosfisico->alergias }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
