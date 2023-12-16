@extends('layouts.app')

@section('template_title')
    Registro de Clientes
@endsection

@section('content')
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <div class="mb-3">
                <h4 class="mb-3 mb-md-0">Registro de Clientes</h4>
            </div>

            <div class="float-right">
                <a href="javascript:history.back()" class="btn btn-primary btn-sm float-right" data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('clientes.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @include('cliente.form')
                </form>
            </div>
        </div>
    </div>
@endsection

