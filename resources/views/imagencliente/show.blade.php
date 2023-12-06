@extends('layouts.app')

@section('template_title')
    {{ $imagencliente->name ?? "{{ __('Show') Imagencliente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Imagencliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imagenclientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $imagencliente->url }}
                        </div>
                        <div class="form-group">
                            <strong>Extension:</strong>
                            {{ $imagencliente->extension }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $imagencliente->cliente_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
