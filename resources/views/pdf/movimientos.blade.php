<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MOVIMIENTOS</title>
    <link rel="stylesheet" href="{{asset('css/bs5.css')}}">
</head>

<body>
    <h4 class="text-center">REPORTE DE MOVIMIENTOS</h4>
    <p class="text-center"><small><strong>Desde:</strong>{{$parametros[0]}}
            <strong>Hasta:</strong>{{$parametros[1]}}</small></p class="text-center">
    <hr>
    <div class="container">
        <table class="table table-striped table-bordered table-sm text-uppercase "
            style="vertical-align: middle;font-size: 11px; ">
            <thead class="thead table-info">
                <tr>
                    <th class="text-center">No</th>

                    <th class="text-center">Fecha</th>
                    <th align="left">Glosa</th>
                    <th align="left">Cuenta</th>
                    <th align="left">Tipo</th>
                    <th align="right">Importe</th>
                    <th class="text-center">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>

                    <td class="text-center">{{ $movimiento->fecha }}</td>
                    <td>{{ strtoupper($movimiento->glosa) }}</td>
                    <td>
                        {{strtoupper($movimiento->cuenta)}}
                    </td>
                    <td>
                        {{$movimiento->tipo}}
                    </td>
                    <td align="right">{{ number_format($movimiento->importe,2,'.') }}</td>
                    <td class="text-center">
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
    </div>
</body>

</html>