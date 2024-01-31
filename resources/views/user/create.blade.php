@extends('layouts.app')

@section('template_title')
    Nuevo Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-6 align-middle">
                                <span style="height: 100%; vertical-align: middle">Nuevo Usuario</span>
                            </div>
                            <div class="col-6 text-end">
                                <a href="javascript:history.back()" class="btn btn-info btn-sm"><i
                                        class="fas fa-arrow-left"></i> Volver</a>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
