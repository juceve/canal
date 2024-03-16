@extends('layouts.app')

@section('template_title')
Información de la Venta
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
                            <strong>Información de la Venta</strong>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('vntventas.index') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>ID:</strong>
                                {{ $vntventa->id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Fecha:</strong>
                                {{ $vntventa->fecha }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Cliente:</strong>
                                {{ $vntventa->cliente }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Importe Bs.:</strong>
                                {{number_format($vntventa->importe,2,'.')}}
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Estado Pago:</strong>
                                {{ $vntventa->vntestadopago->nombre }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Observaciones:</strong>
                                {{ $vntventa->observaciones }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <strong>Usario:</strong>
                                {{ $vntventa->user->name }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group">
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    @if ($vntventa->status)
                                    <span class="badge rounded-pill bg-success">Activo</span>
                                    @else
                                    <span class="badge rounded-pill bg-secondary">Anulado</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-2">DETALLE VENTA</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">PRODUCTO</th>
                                    <th class="text-center">CANT.</th>
                                    <th class="text-end">P. UNIT.</th>
                                    <th class="text-end">SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vntventa->vntdetalleventas as $detalle)
                                <tr>
                                    <td class="text-center">{{$detalle->id}}</td>
                                    <td class="text-center">{{$detalle->detalle}}</td>
                                    <td class="text-center">{{$detalle->cantidad}}</td>
                                    <td class="text-end">{{number_format($detalle->preciounitario,2,'.')}}</td>
                                    <td class="text-end">{{number_format($detalle->subtotal,2,'.')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-info fw-bold">
                                    <td class="text-end" colspan="4">TOTAL</td>
                                    <td class="text-end">{{number_format($vntventa->importe,2,'.')}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection