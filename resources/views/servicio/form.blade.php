<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('Nombre:') }}
                    {{ Form::text('nombre', $servicio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group{{ $errors->has('tiposervicio_id') ? ' has-error' : '' }}">
                    {!! Form::label('tiposervicio_id', 'Tipo Servicio:') !!}
                    {!! Form::select('tiposervicio_id', $tipos, $servicio->tiposervicio_id, [
                        'id' => 'tiposervicio_id',
                        'class' => 'form-select' . ($errors->has('tiposervicio_id') ? ' is-invalid' : ''),
                        'placeholder' => 'Seleccione un opción',
                    ]) !!}
                    <small class="text-danger">{{ $errors->first('tiposervicio_id') }}</small>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('Precio Bs.:') }}
                    {{ Form::number('precio', $servicio->precio, ['step' => '.01', 'class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio Bs.']) }}
                    {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('Cant. Días:') }}
                    {{ Form::number('cantdias', $servicio->cantdias, ['class' => 'form-control' . ($errors->has('cantdias') ? ' is-invalid' : ''), 'placeholder' => 'Cantdias']) }}
                    {!! $errors->first('cantdias', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('Descripción:') }}
                    {{ Form::text('descripcion', $servicio->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Estado:') !!}
                    {!! Form::select('status', ['1' => 'Activo', '0' => 'Inactivo'], $servicio ? $servicio->status : 1, [
                        'id' => 'status',
                        'class' => 'form-select',
                        'placeholder' => 'Seleccione un opción',
                    ]) !!}
                    <small class="text-danger">{{ $errors->first('status') }}</small>
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
    </div>
</div>
