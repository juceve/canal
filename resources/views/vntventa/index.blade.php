@extends('layouts.app')

@section('template_title')
Venta de Productos
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Venta de Productos</h4>

        <div class="float-right">
            @can('pos.create')
            <a href="{{ route('pos') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-plus"></i> Nuevo
            </a>
            @endcan
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    @livewire('listadoventas')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection