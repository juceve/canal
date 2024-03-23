<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-3">
            {{ Form::label('Mes - Día') }}
            {{ Form::text('mesdia', $feriado->mesdia, ['class' => 'form-control' . ($errors->has('mesdia') ? '
            is-invalid' : ''), 'placeholder' => 'MM-DD']) }}
            {!! $errors->first('mesdia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            <label>Gestión <small><i>(Coloque 0 si es un feriado repetitivo todos los años)</i></small></label>
            {{ Form::text('gestion', $feriado->gestion, ['class' => 'form-control' . ($errors->has('gestion') ? '
            is-invalid' : ''), 'placeholder' => 'YYYY']) }}
            {!! $errors->first('gestion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $feriado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
            is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>