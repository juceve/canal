<div>
    <h5 class="text-secondary mb-2">ALERTA DE PRODUCTOS</h5>
    <div class="table-responsive" style="font-size: 12px;">
        <table class="table table-striped">
            <thead>
                <tr class="table-danger">
                    <th class="text-center">ID</th>
                    <th>PRODUCTO</th>
                    <th class="text-center">STOCK</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $item)
                <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-danger">{{$item->stock}}</span></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>