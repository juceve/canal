@extends('layouts.app')
@section('template_title')
Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="text-primary"><span class="text-secondary">ROM CROSS TRAINING </span><i class="fas fa-dumbbell"></i>
        </h3>
        <small class="text-primary"><strong> App v1.0 </strong></small>
    </div>

    <hr>
    <div class="row mt-3">
        <div class="col-12 col-xl-7">
            <div class="card">
                <div class="card-body">
                    @livewire('proxvencimientosusc')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection