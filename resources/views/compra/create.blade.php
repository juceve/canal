@extends('layouts.app')

@section('template_title')
Nueva Compra
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
                            <strong>Nueva Compra</strong>
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
                    {{-- <form method="POST" action="{{ route('compras.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('compra.form')

                    </form> --}}
                    @livewire('registro-compra')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection