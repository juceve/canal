<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $couch->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid'
            : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('cedula') }}
            {{ Form::text('cedula', $couch->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid'
            : ''), 'placeholder' => 'Cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $couch->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? '
            is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('email') }}
            {{ Form::text('email', $couch->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' :
            ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $couch->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? '
            is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('Estado') }}

            {!! Form::select('status', ["1"=>"Activo","0"=>"Inactivo"], $couch->status?$couch->status:"1", ['class' =>
            'form-control' . ($errors->has('status') ? ' is-invalid'
            : ''), 'placeholder' => 'Seleccione un Estado'])
            !!}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>