@extends('layouts.app')

@section('template_title')
    {{ $couch->name ?? "{{ __('Show') Couch" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Couch</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('couches.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $couch->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $couch->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $couch->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $couch->email }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $couch->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $couch->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
