<div>
    @section('template_title')
    Servicio
    @endsection

    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <h4>Horarios - Servicios</h4>

            <div class="float-right">
                <a href="{{ route('servicios.index') }}" class="btn btn-primary btn-sm float-right"
                    data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{ $servicio->nombre }}
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Hora</label>
                            <div class="row ">
                                <div class="col-12 col-md-3 p-1">
                                    <input type="time" class="form-control" wire:model="hora" autofocus
                                        wire:keydown.enter="agregar" />
                                    @error('hora')
                                    <small class="text-danger">El campo Hora es requerido</small>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3 p-1">
                                    <select class="form-select" wire:model='selCouch'>
                                        <option value="">Seleccione un Couch</option>
                                        @foreach ($couches as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach

                                    </select>
                                    @error('selCouch')
                                    <small class="text-danger">El campo Couch es requerido</small>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-2 p-1 d-grid">
                                    <button class="btn btn-primary" wire:click='agregar'><i class="fas fa-plus"></i>
                                        Agregar</button>
                                </div>
                            </div>


                        </div>

                        <h6>Horarios registrados:</h6>
                        <div class="table-responsive mt-2">
                            <table class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <td>NRO</td>
                                        <td>HORA</td>
                                        <td>COUCH</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($horarios)
                                    @foreach ($horarios as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->hora }}</td>
                                        <td>{{ $item->couch?$item->couch->nombre:"NULL" }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-danger" title="Eliminar"
                                                wire:click='eliminar({{ $item->id }})'><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>