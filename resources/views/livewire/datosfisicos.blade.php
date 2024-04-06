<div>
    @section('template_title')
    Datos Fisicos Cliente
    @endsection
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">
        <div class="mb-3">
            <h4 class="mb-3 mb-md-0">Datos Fisicos de Cliente</h4>
        </div>

        <div class="float-right">
            <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card">

        <div class="card-header bg-info">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    <strong>Cliente: {{$cliente->nombre}}</strong>
                </span>

                <div class="float-right">
                    <button class="btn btn-info btn-sm float-right" data-placement="left" data-bs-toggle="modal"
                        data-bs-target="#nuevo">
                        <i class="fas fa-plus"></i> Datos Nuevos
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive mt-2" wire:ignore>
                <table class="table table-striped table-hover dataTable5D">
                    <thead class="thead table-primary">
                        <tr class="text-uppercase">
                            <th>No</th>
                            <th>Fecha</th>
                            <th>Contextura</th>
                            <th>Peso Kg.</th>
                            <th>Altura Mts.</th>
                            <th>Imc</th>
                            <th>OBSERVACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente->datosfisicos as $datosfisico)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ Str::substr($datosfisico->created_at, 0, 10) }}</td>
                            <td>{{ $datosfisico->contextura->nombre }}</td>
                            <td>{{ $datosfisico->peso }}</td>
                            <td>{{ $datosfisico->altura }}</td>
                            <td>{{ $datosfisico->imc }}</td>
                            <td>{{ $datosfisico->alergias }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="nuevoLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoLabel">Datos Nuevos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">

                                {!! Form::label('peso', 'Peso Kg.:') !!}
                                {!! Form::number('peso', '', [
                                'class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''),
                                'step' => 'any',
                                'placeholder' => 'Peso Kg.',
                                'onkeypress' => 'limpiaIMC()',
                                'wire:model.defer'=>'peso'
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('peso') }}</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group{{ $errors->has('altura') ? ' has-error' : '' }}">
                                {!! Form::label('altura', 'Altura Mts.:') !!}
                                {!! Form::number('altura', '', [
                                'class' => 'form-control' . ($errors->has('altura') ? ' is-invalid' : ''),
                                'step' => 'any',
                                'placeholder' => 'Altura Mts.',
                                'onkeypress' => 'limpiaIMC()',
                                'wire:model.defer'=>'altura'
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('altura') }}</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group{{ $errors->has('imc') ? ' has-error' : '' }}">
                                {!! Form::label('imc', 'IMC:') !!}

                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control {{ $errors->has('imc') ? ' is-invalid' : '' }} bg-white"
                                        placeholder="IMC Autogenerado" name="imc" id="imc" step=".01" value="" readonly>
                                    <button class="btn btn-outline-info" type="button" id="button-addon2"
                                        onclick="generaIMC()">Generar <i class="fas fa-cog"></i></button>
                                </div>
                                <small class="text-danger">{{ $errors->first('imc') }}</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group{{ $errors->has('contextura_id') ? ' has-error' : '' }}">
                                {!! Form::label('contextura_id', 'Contextura:') !!}
                                {!! Form::select('contextura_id', $contexturas,null, [
                                'id' => 'contextura_id',
                                'class' => 'form-select' . ($errors->has('contextura_id') ? ' is-invalid' : ''),
                                'placeholder' => 'Seleccione una opción',
                                'wire:model.defer'=>'contextura_id'
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('contextura_id') }}</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('alergias') ? ' has-error' : '' }}">
                                {!! Form::label('alergias', 'Observaciones:') !!}
                                {!! Form::textarea('alergias', '', [
                                'class' => 'form-control',
                                'rows' => 2,
                                'wire:model.defer'=>'alergias'
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('alergias') }}</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{route('datosfisicos',$cliente->id)}}"><i
                            class="fas fa-ban"></i>
                        Cancelar</a>
                    <button type="button" class="btn btn-primary" wire:click='guardar'>Guardar <i
                            class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    function generaIMC() {
            var peso = document.getElementById('peso').value;
            var altura = document.getElementById('altura').value;
            var imc = peso / Math.pow(altura, 2);
            document.getElementById('imc').value = imc.toFixed(1);
            @this.set('imc',imc);
        }

        function limpiaIMC() {
            document.getElementById('imc').value = "";
        }
        function resetear(){
            document.getElementById('peso').value = "";
            document.getElementById('altura').value = "";
            document.getElementById('contextura_id').value = "";
            document.getElementById('imc').value = "";
            document.getElementById('alergias').value = "";
        }
</script>
@endsection