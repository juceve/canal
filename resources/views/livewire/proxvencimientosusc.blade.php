<div>
    <h5 class="text-secondary">SUSCRIPCIONES PRÓXIMAS A VENCERSE</h5>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-primary text-white">
                    <td>Nro.</td>
                    <td>CLIENTE</td>
                    <td>SUSCRIPCIÓN</td>
                    <td>EXPIRA</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @forelse ($suscripciones as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->cliente?$item->cliente->nombre:"NULL"}}</td>
                    <td>{{$item->servicio?$item->servicio->nombre:"NULL"}}</td>
                    <td>
                        <span class="badge rounded-pill bg-danger">{{$item->final}}</span>

                    </td>
                    <td></td>
                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center">
                        <i>No se encontraron resultados.</i>
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>