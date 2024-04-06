@extends('layouts.app')

@section('template_title')
Info Compra
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
                            <strong>Info Compra</strong>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('compras.index') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group mb-3">
                        <strong>Fecha:</strong>
                        {{ $compra->fecha }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Usuario:</strong>
                        {{ $compra->user?$compra->user->name:"NULL" }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Estado:</strong>
                        @if ($compra->estado)
                        <span class="badge rounded-pill bg-primary">Activo</span>
                        @else
                        <span class="badge rounded-pill bg-secondary">Anulado</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Observaciones:</strong>
                        {{$compra->movimiento($compra->id)?$compra->movimiento($compra->id)->observaciones:"N/A"}}
                    </div>
                    <hr>

                    <h5 class="mb-2">Detalle de la Compra</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th class="text-center">ID PROD.</th>
                                <th>PRODUCTO</th>
                                <th class="text-center">CANTIDAD</th>
                                <th class="text-end">PRECIO Bs.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total =0;
                            @endphp
                            @forelse ($compra->compraProductos as $item)
                            <tr>
                                <td class="text-center">{{$item->producto_id?$item->producto_id:"NULL"}}</td>
                                <td>{{$item->nombreproducto}}</td>
                                <td class="text-center">{{$item->cantidad}}</td>
                                <td class="text-end">{{$item->precio}}</td>
                            </tr>
                            @php
                            $total+=$item->precio;
                            @endphp
                            @empty
                            <tr>
                                <td colspan="4" align="center"><i>No existen productos.</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-info">
                            <td align="right" colspan="3"><strong>TOTAL Bs.</strong></td>
                            <td align="right"><strong>{{number_format($total,2,'.')}}</strong></td>
                        </tfoot>
                    </table>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection