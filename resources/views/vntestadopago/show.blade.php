@extends('layouts.app')

@section('template_title')
    {{ $vntestadopago->name ?? "{{ __('Show') Vntestadopago" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vntestadopago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vntestadopagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $vntestadopago->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrecorto:</strong>
                            {{ $vntestadopago->nombrecorto }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $vntestadopago->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
