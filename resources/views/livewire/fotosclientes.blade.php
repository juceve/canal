<div>
    @section('template_title')
        Fotografias de Cliente
    @endsection


    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

            <div class="mb-2">
                <h4 class="mb-3 mb-md-0">Fotografias de Clientes</h4>
            </div>

            <div class="float-right">
                <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-secondary">{{$cliente->nombre}}</h4>
                        <hr>
                        <h6>Imágenes Registradas</h6>
                        <div class="table-responsive">
                            <table class="table table-hover" style="vertical-align: middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Preview</th>
                                        <th>Nombre</th>
                                        <th style="width: 10px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($imagenes as $imagen)
                                        @php
                                            $name = explode('/', $imagen->url);
                                        @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {{-- <img src="{{Storage::url($imagen->url)}}"> --}}

                                                <a href="#{{ $imagen->id }}">
                                                    <img src="{{ Storage::url($imagen->url) }}" class="img-thumbnail">
                                                </a>
                                            </td>
                                            <td>{{ $name[1] }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger" title="Eliminar"
                                                    onclick="eliminar({{ $imagen->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @foreach ($imagenes as $imagen)
                            <article class="light-box" id="{{ $imagen->id }}">
                                {{-- <a href="#4" class="light-box-next"><i class="bi bi-arrow-left"></i></a> --}}
                                <img src="{{ Storage::url($imagen->url) }}">
                                {{-- <a href="#2" class="light-box-next"><i class="bi bi-arrow-right"></i></a> --}}
                                <a href="#" class="light-box-close">X</a>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h6 class="mb-2">Nuevas Imágenes</h6>
                        <input type="file" class="form-control" name="imagenes[]" accept="image/*"
                            onchange="preview(this)" multiple wire:model='files'>
                        <div class="preview-area" wire:ignore></div>
                        @if ($files)
                            <button class="btn btn-info mt-3 col-12 col-md-6" wire:click='registrar'>
                                <i class="fas fa-save">
                                </i>
                                Registrar
                            </button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        function eliminar(id) {
            Swal.fire({
                title: "Eliminar Imagen",
                text: "Esta seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#6571ff",
                cancelButtonColor: "#ff3366",
                confirmButtonText: "Sí, continuar",
                cancelButtonText: "No, cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit("deleteFile", id);
                    // window.livewire.emit('deleteFile');
                }
            });
        }
    </script>
@endsection
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
