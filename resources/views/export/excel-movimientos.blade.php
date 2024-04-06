<table>
    <tr>
        <td colspan="7" align="center">LISTADO DE MOVIMIENTOS</td>
    </tr>
    <tr>
        <td colspan="7">Desde: {{$fechaI}}</td>
    </tr>
    <tr>
        <td colspan="7">Hasta: {{$fechaF}}</td>
    </tr>
    <tr>
        <td colspan="7"></td>
    </tr>
    <thead>
        <tr>
            <th>No</th>

            <th>Fecha</th>
            <th>Glosa</th>
            <th>Cuenta</th>
            <th>Tipo</th>
            <th>Importe</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movimientos as $movimiento)
        <tr>
            <td>{{ ++$i }}</td>

            <td>{{ $movimiento->fecha }}</td>
            <td>{{ $movimiento->glosa }}</td>
            <td>
                {{$movimiento->cuenta}}
            </td>
            <td>
                {{$movimiento->tipo}}
            </td>
            <td>{{ $movimiento->importe }}</td>
            <td>
                @if ($movimiento->status)
                ACTIVO
                @else
                ANULADO
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>