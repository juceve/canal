@extends('layouts.app')

@section('template_title')
    Nuevo Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <div class="mb-3">
                <h4 class="mb-3 mb-md-0">Nuevo Servicio</h4>
            </div>

            <div class="float-right">
                <a href="{{ route('servicios.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">              

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('servicios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
