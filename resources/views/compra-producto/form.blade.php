<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('producto_id') }}
            {{ Form::text('producto_id', $compraProducto->producto_id, ['class' => 'form-control' .
            ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto Id']) }}
            {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('compra_id') }}
            {{ Form::text('compra_id', $compraProducto->compra_id, ['class' => 'form-control' .
            ($errors->has('compra_id') ? ' is-invalid' : ''), 'placeholder' => 'Compra Id']) }}
            {!! $errors->first('compra_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $compraProducto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad')
            ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $compraProducto->precio, ['class' => 'form-control' . ($errors->has('precio') ? '
            is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>