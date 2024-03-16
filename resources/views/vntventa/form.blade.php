<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group d-none">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $vntventa->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? '
            is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mb-3">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $vntventa->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid'
            : ''), 'placeholder' => 'Fecha','readonly']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('cliente') }}
            {{ Form::text('cliente', $vntventa->cliente, ['class' => 'form-control' . ($errors->has('cliente') ? '
            is-invalid' : ''), 'placeholder' => 'Cliente']) }}
            {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('cliente_id') }}
            {{ Form::text('cliente_id', $vntventa->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id')
            ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('servicio_id') }}
            {{ Form::text('servicio_id', $vntventa->servicio_id, ['class' => 'form-control' .
            ($errors->has('servicio_id') ? ' is-invalid' : ''), 'placeholder' => 'Servicio Id']) }}
            {!! $errors->first('servicio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('importe') }}
            {{ Form::text('importe', $vntventa->importe, ['class' => 'form-control' . ($errors->has('importe') ? '
            is-invalid' : ''), 'placeholder' => 'Importe']) }}
            {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $vntventa->observaciones, ['class' => 'form-control' .
            ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('vntestadopago_id') }}
            {{ Form::text('vntestadopago_id', $vntventa->vntestadopago_id, ['class' => 'form-control' .
            ($errors->has('vntestadopago_id') ? ' is-invalid' : ''), 'placeholder' => 'Vntestadopago Id']) }}
            {!! $errors->first('vntestadopago_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('status') }}
            {{-- {{ Form::text('status', $vntventa->status, ['class' => 'form-control' . ($errors->has('status') ? '
            is-invalid' : ''), 'placeholder' => 'Status']) }} --}}
            {!! Form::select('status', ["1"=>"Activo","0"=>"Anulado"],$vntventa->status?$vntventa->status:0, ['class' =>
            'form-control' . ($errors->has('status') ? 'is-invalid' : '')]) !!}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>