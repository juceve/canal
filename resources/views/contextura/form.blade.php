<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $contextura->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
            is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>