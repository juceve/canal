<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::text('cliente_id', $datosfisico->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contextura_id') }}
            {{ Form::text('contextura_id', $datosfisico->contextura_id, ['class' => 'form-control' . ($errors->has('contextura_id') ? ' is-invalid' : ''), 'placeholder' => 'Contextura Id']) }}
            {!! $errors->first('contextura_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('peso') }}
            {{ Form::text('peso', $datosfisico->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('altura') }}
            {{ Form::text('altura', $datosfisico->altura, ['class' => 'form-control' . ($errors->has('altura') ? ' is-invalid' : ''), 'placeholder' => 'Altura']) }}
            {!! $errors->first('altura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imc') }}
            {{ Form::text('imc', $datosfisico->imc, ['class' => 'form-control' . ($errors->has('imc') ? ' is-invalid' : ''), 'placeholder' => 'Imc']) }}
            {!! $errors->first('imc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alergias') }}
            {{ Form::text('alergias', $datosfisico->alergias, ['class' => 'form-control' . ($errors->has('alergias') ? ' is-invalid' : ''), 'placeholder' => 'Alergias']) }}
            {!! $errors->first('alergias', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>