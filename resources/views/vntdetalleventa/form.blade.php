<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('vntventa_id') }}
            {{ Form::text('vntventa_id', $vntdetalleventa->vntventa_id, ['class' => 'form-control' . ($errors->has('vntventa_id') ? ' is-invalid' : ''), 'placeholder' => 'Vntventa Id']) }}
            {!! $errors->first('vntventa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detalle') }}
            {{ Form::text('detalle', $vntdetalleventa->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'Detalle']) }}
            {!! $errors->first('detalle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $vntdetalleventa->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('preciounitario') }}
            {{ Form::text('preciounitario', $vntdetalleventa->preciounitario, ['class' => 'form-control' . ($errors->has('preciounitario') ? ' is-invalid' : ''), 'placeholder' => 'Preciounitario']) }}
            {!! $errors->first('preciounitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subtotal') }}
            {{ Form::text('subtotal', $vntdetalleventa->subtotal, ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>