@extends('layouts.app')

@section('template_title')
Nueva Zona
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
                            <strong>Nueva Zona</strong>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('zonas.index') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('zonas.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('zona.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection