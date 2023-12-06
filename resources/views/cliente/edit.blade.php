@extends('layouts.app')

@section('template_title')
    Editar Cliente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mb-3 mb-md-0">Editar Cliente</h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Formulario de Edición
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cliente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    @endsection
