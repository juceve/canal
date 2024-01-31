<div>
    <div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="modalPagoLabel">PROCESAR PAGO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('cliente') ? ' has-error' : '' }} mb-3">
                        {!! Form::label('cliente', 'CLIENTE:') !!}
                        {!! Form::text('cliente', '', ['class' => 'form-control', 'required' => 'required','wire:model'=>'cliente']) !!}
                        <small class="text-danger">{{ $errors->first('cliente') }}</small>
                        @error('cliente')
                            <small class="text-danger">El campo Cliente es requerido</small>
                        @enderror
                    </div>

                    <div class="form-group{{ $errors->has('vnttipopago_id') ? ' has-error' : '' }} mb-3">
                        {!! Form::label('vnttipopago_id', 'TIPO PAGO:') !!}
                        {!! Form::select('vnttipopago_id', $tipopagos, null, [
                            'id' => 'vnttipopago_id',
                            'class' => 'form-select',
                            'required' => 'required',
                            'wire:model' => 'tipopago',
                            'placeholder' => 'SELECCIONE UN TIPO',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('vnttipopago_id') }}</small>
                        @error('tipopago')
                            <small class="text-danger">El campo Tipo Pago es requerido</small>
                        @enderror
                    </div>

                    <div class="form-group{{ $errors->has('importe') ? ' has-error' : '' }} mb-3">
                        {!! Form::label('importe', 'IMPORTE Bs.:') !!}
                        {!! Form::number('importe', $importe, ['class' => 'form-control', 'required' => 'required', 'readonly']) !!}
                        <small class="text-danger">{{ $errors->first('importe') }}</small>
                        @error('importe')
                            <small class="text-danger">El campo Importe es requerido</small>
                        @enderror
                    </div>

                    <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }} mb-3">
                        {!! Form::label('observaciones', 'OBSERVACIONES:') !!}
                        {!! Form::text('observaciones', $observaciones, ['class' => 'form-control', 'required' => 'required','wire:model' => 'observaciones']) !!}
                        <small class="text-danger">{{ $errors->first('observaciones') }}</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-ban"></i>
                        Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click='procesar'>Registrar <i
                            class="fas fa-cash-register"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    Livewire.on('impservicios',data=>{            
        window.open('../../impresiones/reciboservicios.php?data='+data, "_blank");
    })
</script>
@endsection