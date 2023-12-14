@extends('layouts.app')

@section('template_title')
    {{ $vntpago->name ?? "{{ __('Show') Vntpago" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vntpago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vntpagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Vntventa Id:</strong>
                            {{ $vntpago->vntventa_id }}
                        </div>
                        <div class="form-group">
                            <strong>Vnttipopago Id:</strong>
                            {{ $vntpago->vnttipopago_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipopago:</strong>
                            {{ $vntpago->tipopago }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $vntpago->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $vntpago->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
