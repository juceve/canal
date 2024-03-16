@extends('layouts.app')

@section('template_title')
VENTAS
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>VENTAS</h4>

        <div class="float-right">
            <a href="{{ route('pos') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-plus"></i> Nuevo
            </a>
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