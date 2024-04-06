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
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">SUSCRIPCIONES DEL AÑO</h6>

                    </div>
                    <div class="row align-items-start">
                        <p class="text-muted tx-13 mb-3 mb-md-0">Historial de Suscripciones activadas durante la Gestión
                            {{date('Y')}}
                        </p>
                    </div>
                    <div id="revenueChart">
                        <canvas id="graficoActivacionSuscripciones" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
    <div class="row mt-3 g-1">
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="card-body" style="font-size: 12px;">
                    @livewire('proxvencimientosusc')
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    @livewire('stocksminimo')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $.ajax({
    url: "/getDataSuscripciones",
    method: 'GET',
    dataType:'json',
    success:function(data){
        const meses = data.meses;
        const cantidades = data.cantidades;    

        const ctx = document.getElementById('graficoActivacionSuscripciones');
        new Chart(ctx, {
        type: 'line',
        data: {
            labels: meses,
            datasets: [{
            label: 'Cant. Activaciones',
            data: cantidades,
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });
    }
    });

    
</script>
@endsection