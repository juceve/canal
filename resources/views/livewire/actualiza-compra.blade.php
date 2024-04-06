<div>
    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group mb-3">
                        {{ Form::label('Fecha Compra') }}
                        {{ Form::date('fecha', "", ['class' => 'form-control' . ($errors->has('fecha') ? '
                        is-invalid' :
                        ''), 'placeholder' => 'Fecha', 'wire:model'=>'fecha']) }}


                        {!! $errors->first('fecha', '<div class="invalid-feedback"></div>') !!}
                    </div>
                </div>
                <div class="col-6"></div>
                <hr>
                <h5 class="mb-3">Seleccione los productos de la Compra</h5>
                <div class="col-12 col-md-4">
                    <div class="form-group mb-3" wire:ignore>
                        {{ Form::label('producto') }}

                        {!! Form::select('producto_id', $productos,
                        "",
                        ['class' => 'select2 form-select', 'placeholder' => 'Seleccione un
                        producto', 'id'=>'producto_id',"data-width"=>"100%"]) !!}
                        @error('producto_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group mb-3">
                        {{ Form::label('Cant. Unidades') }}
                        {{ Form::number('cantidad', "", ['class' => 'form-control' .
                        ($errors->has('cantidad')
                        ? ' is-invalid' : ''), 'placeholder' => 'Cantidad', 'wire:model.defer'=>'cantidad']) }}
                        {!! $errors->first('cantidad', '<div class="invalid-feedback"></div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group mb-3">
                        {{ Form::label('precio total') }}
                        {{ Form::number('precio', "", ['class' => 'form-control' . ($errors->has('precio')
                        ? '
                        is-invalid' : ''), 'placeholder' => 'Precio','step'=>'any', 'wire:model.defer'=>'precio']) }}
                        {!! $errors->first('precio', '<div class="invalid-feedback"></div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2 d-grid mb-3">
                    <label class="text-white d-none d-md-block">agregar</label>
                    <button class="btn btn-info" wire:click='agregar'>Agregar</button>
                </div>
            </div>
            <div class="table-responsive mb-3">
                <table class="table table-striped align-middle">
                    <thead class="table-info">
                        <tr class="text-uppercase text-secondary">
                            <td align="center"><strong>ID PROD.</strong></td>
                            <td><strong>Producto</strong></td>
                            <td align="center"><strong>Cantidad</strong></td>
                            <td align="right"><strong>Precio</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arrProductos as $item)
                        @php
                        $i++;
                        @endphp
                        <tr>
                            <td align="center">{{$item[0]}}</td>
                            <td>{{$item[1]}}</td>
                            <td align="center">{{$item[2]}}</td>
                            <td align="right">{{number_format($item[3],2,'.')}}</td>
                            <td align="right">
                                <button class="btn btn-outline-danger btn-sm" title="Eliminar"
                                    wire:click='eliminarItem({{$i-2}})'><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-info">
                            <td colspan="3" align="right"><strong>TOTAL Bs.</strong></td>
                            <td align="right"><strong>{{number_format($total,2,'.')}}</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="form-group mb-3">
                <label for="">Observaciones</label>
                <textarea class="form-control" wire:model.defer="observaciones" rows="2"
                    placeholder="Observaciones de la compra (Opcional)"></textarea>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary" wire:click='actualizar'>Guardar Cambios <i
                        class="fas fa-save"></i></button>
            </div>
        </div>

    </div>
</div>
@section('js')
<script src="{{asset('admin/assets/vendors/select2/select2.min.js')}}"></script>
<script>
    Livewire.on('resetInput',msg =>{
    $('#producto_id').val("").trigger("change.select2");
  })
</script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    });

    $('#producto_id').on('change', function (e) {
                @this.set('producto_id', e.target.value)
            });
</script>
@endsection