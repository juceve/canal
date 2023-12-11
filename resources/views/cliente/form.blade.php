<div class="box box-info padding-1">
    <h5 class="mb-2">
        INFORMACIÓN PERSONAL
    </h5>
    <div class="card mb-4">
        <div class="card-body">
            <div class="box-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('nombre:') }}
                            {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('dirección:') }}
                            {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            <div class="form-group{{ $errors->has('zona_id') ? ' has-error' : '' }}">
                                {!! Form::label('zona_id', 'Zona:') !!}
                                {!! Form::select('zona_id', $zonas, $cliente->zona_id ? $cliente->zona_id : null, [
                                    'id' => 'zona_id',
                                    'class' => 'form-select' . ($errors->has('zona_id') ? ' is-invalid' : ''),
                                    'placeholder' => 'Seleccione una opción:',
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('zona_id') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">


                            <div class="form-group{{ $errors->has('tipodoc_id') ? ' has-error' : '' }}">
                                {!! Form::label('tipodoc_id', 'Tipo Documento:') !!}
                                {!! Form::select('tipodoc_id', $tipodocs, $cliente->tipodoc_id ? $cliente->tipodoc_id : null, [
                                    'id' => 'tipodoc_id',
                                    'class' => 'form-select' . ($errors->has('tipodoc_id') ? ' is-invalid' : ''),
                                    'placeholder' => 'Seleccione una opción:',
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('tipodoc_id') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('Nro. Doc.:') }}
                            {{ Form::text('nrodoc', $cliente->nrodoc, ['class' => 'form-control' . ($errors->has('nrodoc') ? ' is-invalid' : ''), 'placeholder' => 'Nrodoc']) }}
                            {!! $errors->first('nrodoc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('celular:') }}
                            {{ Form::text('celular', $cliente->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('teléfono:') }}
                            {{ Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('email:') }}
                            {{ Form::text('email', $cliente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('Fecha Nacimiento:') }}
                            {{ Form::date('fechanacimiento', $cliente->fechanacimiento, ['class' => 'form-control' . ($errors->has('fechanacimiento') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                            {!! $errors->first('fechanacimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-12 p-2">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <h5 class="mb-2">OBJETIVOS</h5>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                @foreach ($objetivos as $item)
                    <div class="col-12 col-md-4 mb-2">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{ $item->id }}" name="objetivos[]"
                                value="{{ $item->id }}"
                                @foreach ($cliente->detalleobjetivos as $detalle)
                                    @if ($detalle->objetivo_id == $item->id)
                                        checked
                                    @endif @endforeach>
                            <label class="form-check-label" for="{{ $item->id }}">
                                {{ $item->nombre }}
                            </label>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 col-md-4 mb-2">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="otro" name="otro"
                            onchange="javascript:showContent()" @if ($cliente->nObjetivos) checked @endif>
                        <label class="form-check-label" for="otro">
                            OTROS
                        </label>
                    </div>
                </div>

                <div class="col-12 mt-2" id="divObj" @if (!$cliente->nObjetivos) style="display: none;" @endif>
                    <div class="form-group{{ $errors->has('nObjetivos') ? ' has-error' : '' }}">
                        <label class="text-primary" for="nObjetivos">Otros objetivos</label>
                        {!! Form::textarea('nObjetivos', $cliente->nObjetivos, [
                            'class' => 'form-control',
                            'rows' => 3,
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('nObjetivos') }}</small>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @if ($cliente->imagenclientes->count() == 0)
        <h5 class="mb-2">FOTOGRAFIAS</h5>
        <div class="card mb-4">
            <div class="card-body">
                <label>Imagenes:</label>
                <input type="file" class="form-control" name="imagenes[]" accept="image/*" onchange="preview(this)"
                    multiple>
                <div class="preview-area"></div>
            </div>
        </div>
    @endif


    <div class="box-footer mt20">
        <div class="col-12 col-md-6 mb-3 mt-3 d-grid">
            <button type="submit" class="btn btn-primary">GUARDAR <i class="fas fa-save"></i></button>
        </div>
    </div>
</div>
@section('css')
    <style>
        .preview-area {
            display: flex;
            flex-wrap: wrap;
        }

        .preview-area img {
            max-width: 150px;
            max-width: 200px;
            margin: 10px 0 10px;
            object-fit: contain;
        }

        .preview-area img:not(:nth-child(4n)) {
            margin-right: 1.333%;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("divObj");
            check = document.getElementById("otro");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>
@endsection
