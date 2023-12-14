@extends('layouts.app')

@section('template_title')
    Editar Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <div class="mb-3">
                <h4 class="mb-3 mb-md-0">Editar Servicio</h4>
            </div>

            <div class="float-right">
                <a href="{{ route('servicios.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="">
            <div class="col-md-12">
               
                <div class="card card-default">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('servicios.update', $servicio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
