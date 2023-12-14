<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $vnttipopago->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombrecorto') }}
            {{ Form::text('nombrecorto', $vnttipopago->nombrecorto, ['class' => 'form-control' . ($errors->has('nombrecorto') ? ' is-invalid' : ''), 'placeholder' => 'Nombrecorto']) }}
            {!! $errors->first('nombrecorto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('factor') }}
            {{ Form::text('factor', $vnttipopago->factor, ['class' => 'form-control' . ($errors->has('factor') ? ' is-invalid' : ''), 'placeholder' => 'Factor']) }}
            {!! $errors->first('factor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $vnttipopago->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>