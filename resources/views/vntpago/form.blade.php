<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('vntventa_id') }}
            {{ Form::text('vntventa_id', $vntpago->vntventa_id, ['class' => 'form-control' . ($errors->has('vntventa_id') ? ' is-invalid' : ''), 'placeholder' => 'Vntventa Id']) }}
            {!! $errors->first('vntventa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vnttipopago_id') }}
            {{ Form::text('vnttipopago_id', $vntpago->vnttipopago_id, ['class' => 'form-control' . ($errors->has('vnttipopago_id') ? ' is-invalid' : ''), 'placeholder' => 'Vnttipopago Id']) }}
            {!! $errors->first('vnttipopago_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipopago') }}
            {{ Form::text('tipopago', $vntpago->tipopago, ['class' => 'form-control' . ($errors->has('tipopago') ? ' is-invalid' : ''), 'placeholder' => 'Tipopago']) }}
            {!! $errors->first('tipopago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $vntpago->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $vntpago->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>