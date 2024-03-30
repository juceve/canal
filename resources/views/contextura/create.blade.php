@extends('layouts.app')

@section('template_title')
Nueva Contextura
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
                            <strong>Nueva Contextura</strong>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('contexturas.index') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contexturas.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('contextura.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection