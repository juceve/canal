<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>INGRESOS - EGRESOS</title>
    <link rel="stylesheet" href="{{asset('css/bs5.css')}}">
</head>

<body>
    <h4 class="text-center">REPORTE DE INGRESOS Y EGRESOS</h4>
    <p class="text-center"><strong>Desde:</strong>{{$parametros[0]}} <strong>Hasta:</strong>{{$parametros[1]}}</p
        class="text-center">
    <hr>
    <div class="container">
        <h5><strong>INGRESOS</strong></h5>
        <table class="table table-bordered table-sm text-sm">
            <thead>
                <tr class="bg-primary">
                    <td align="center" style="width: 60px;"><strong>ID</strong></td>
                    <td align="center" style="width: 100px;"><strong>FECHA</strong></td>
                    <td><strong>DETALLE</strong></td>
                    <td align="right" style="width: 80px;"><strong>IMPORTE</strong></td>
                </tr>
            </thead>
            <tbody>
                @if ($movimientos->count()>0)
                @foreach ($movimientos->where('tipo','INGRESO') as $item)
                <tr>
                    <td align="center">{{$item->id}}</td>
                    <td align="center">{{$item->fecha}}</td>
                    <td>{{$item->glosa}}</td>
                    <td align="right">{{number_format($item->importe,2,'.')}}</td>
                </tr>
                @endforeach
                <tr class="bg-warning">
                    <td colspan="3" align="right"><strong>TOTAL INGRESOS:</strong></td>
                    <td align="right">
                        <strong>{{number_format($movimientos->where('tipo','INGRESO')->sum('importe'),2,'.')}}</strong>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

        <h5><strong>EGRESOS</strong></h5>
        <table class="table table-bordered table-sm text-sm">
            <thead>
                <tr class="bg-primary">
                    <td align="center" style="width: 60px;"><strong>ID</strong></td>
                    <td align="center" style="width: 100px;"><strong>FECHA</strong></td>
                    <td><strong>DETALLE</strong></td>
                    <td align="right" style="width: 80px;"><strong>IMPORTE</strong></td>
                </tr>
            </thead>
            <tbody>
                @if ($movimientos->count()>0)
                @foreach ($movimientos->where('tipo','EGRESO') as $item)
                <tr>
                    <td align="center">{{$item->id}}</td>
                    <td align="center">{{$item->fecha}}</td>
                    <td>{{$item->glosa}}</td>
                    <td align="right">{{number_format($item->importe,2,'.')}}</td>
                </tr>
                @endforeach
                <tr class="bg-warning">
                    <td colspan="3" align="right"><strong>TOTAL EGRESOS:</strong></td>
                    <td align="right">
                        <strong>{{number_format($movimientos->where('tipo','EGRESO')->sum('importe'),2,'.')}}</strong>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <br>
        @php
        $total = $movimientos->where('tipo','INGRESO')->sum('importe') -
        $movimientos->where('tipo','EGRESO')->sum('importe');
        $color="success";
        if ($total < 0) { $color="danger" ; } @endphp <table class="table table-sm text-sm">
            <tbody>
                <tr>
                    <td align="right" class="bg-{{$color}}"><strong>RESULTADOS:</strong></td>
                    <td align="right" class="bg-{{$color}}" style="width: 80px;"><strong>
                            {{number_format($total,2,'.')}}
                        </strong></td>
                </tr>
            </tbody>
            </table>
    </div>
</body>

</html>