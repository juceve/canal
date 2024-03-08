<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
            is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' .
            ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('precio') }}
            {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? '
            is-invalid' : ''), 'placeholder' => 'Precio', 'step'=>'any']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('categoria_id') }}

            {!! Form::select('categoria_id', $categorias, $producto->categoria_id?$producto->categoria_id:null, ['class'
            => 'form-control' .
            ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una Categoria']) !!}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>