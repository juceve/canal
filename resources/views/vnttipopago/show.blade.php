@extends('layouts.app')

@section('template_title')
    {{ $vnttipopago->name ?? "{{ __('Show') Vnttipopago" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vnttipopago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vnttipopagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $vnttipopago->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrecorto:</strong>
                            {{ $vnttipopago->nombrecorto }}
                        </div>
                        <div class="form-group">
                            <strong>Factor:</strong>
                            {{ $vnttipopago->factor }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $vnttipopago->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
