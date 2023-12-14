@extends('layouts.app')

@section('template_title')
    {{ $vntdetalleventa->name ?? "{{ __('Show') Vntdetalleventa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vntdetalleventa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vntdetalleventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Vntventa Id:</strong>
                            {{ $vntdetalleventa->vntventa_id }}
                        </div>
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            {{ $vntdetalleventa->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $vntdetalleventa->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Preciounitario:</strong>
                            {{ $vntdetalleventa->preciounitario }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $vntdetalleventa->subtotal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
