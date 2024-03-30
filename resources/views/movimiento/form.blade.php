<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('fecha') }}
                    {{ Form::date('fecha', $movimiento->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? '
                    is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('cuenta') }}
                    {!! Form::select('cuenta_id', $cuentas, $movimiento->cuenta_id?$movimiento->cuenta_id:null, ['class'
                    =>
                    'form-select' . ($errors->has('cuenta_id') ?
                    ' is-invalid' : ''), 'placeholder' => 'Seleccione una Cuenta']) !!}

                    {!! $errors->first('cuenta_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            {{ Form::label('glosa') }}
            {{ Form::textarea('glosa', $movimiento->glosa, ['class' => 'form-control' . ($errors->has('glosa') ? '
            is-invalid' : ''), 'rows'=>'3', 'placeholder' => 'Glosa']) }}
            {!! $errors->first('glosa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('importe bs.') }}
                    {{ Form::number('importe', $movimiento->importe, ['class' => 'form-control' .
                    ($errors->has('importe') ? '
                    is-invalid' : ''), 'placeholder' => '0.00','step'=>'any']) }}
                    {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('Estado') }}

                    {!! Form::select('status', ['1'=>'Activo','0'=>'Inactivo'],
                    $movimiento->status?$movimiento->status:1,['class' => 'form-select' .
                    ($errors->has('status') ? '
                    is-invalid' : '')]) !!}
                    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>



        <div class="form-group mb-3 d-none">
            {{ Form::label('model_id') }}
            {{ Form::text('model_id', $movimiento->model_id, ['class' => 'form-control' . ($errors->has('model_id') ? '
            is-invalid' : ''), 'placeholder' => 'Model Id']) }}
            {!! $errors->first('model_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3 d-none">
            {{ Form::label('model_type') }}
            {{ Form::text('model_type', $movimiento->model_type, ['class' => 'form-control' .
            ($errors->has('model_type') ? ' is-invalid' : ''), 'placeholder' => 'Model Type']) }}
            {!! $errors->first('model_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3 d-none">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $movimiento->user_id?$movimiento->user_id:Auth::user()->id, ['class' =>
            'form-control' . ($errors->has('user_id') ? '
            is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>