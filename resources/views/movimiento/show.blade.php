@extends('layouts.app')

@section('template_title')
Info Movimiento
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <strong>Info Movimiento</strong>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('movimientos.index') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card-body">

                    <div class="form-group mb-3">
                        <strong>Fecha:</strong>
                        {{ $movimiento->fecha }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Glosa:</strong>
                        {{ $movimiento->glosa }}
                    </div>

                    <div class="form-group mb-3">
                        <strong>Cuenta:</strong>
                        {{ $movimiento->cuenta->nombre }}
                    </div>

                    <div class="form-group mb-3">
                        <strong>Tipo Cuenta:</strong>
                        @if ($movimiento->cuenta)
                        @if ($movimiento->cuenta->tipo=="INGRESO")
                        <span class="badge rounded-pill bg-success">INGRESO <i class="fas fa-arrow-left"></i></span>
                        @else
                        <span class="badge rounded-pill bg-warning text-dark">EGRESO <i
                                class="fas fa-arrow-right"></i></span>
                        @endif
                        @else
                        <span class="badge rounded-pill bg-secondary">NULL</span>
                        @endif

                    </div>

                    <div class="form-group mb-3">
                        <strong>Importe Bs.:</strong>
                        {{ $movimiento->importe }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Usuario:</strong>
                        {{ $movimiento->user?$movimiento->user->name:"NULL" }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Estado:</strong>
                        @if ($movimiento->status)
                        <span class="badge rounded-pill bg-primary">Activo</span>
                        @else
                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection