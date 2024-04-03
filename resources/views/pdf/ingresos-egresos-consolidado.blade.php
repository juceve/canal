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
    <h4 class="text-center">REPORTE CONSOLIDADO DE INGRESOS Y EGRESOS</h4>
    <p class="text-center"><strong>Desde:</strong>{{$parametros[0]}} <strong>Hasta:</strong>{{$parametros[1]}}</p
        class="text-center">
    <hr>
    <div class="container">
        <br>
        <table class="table table-bordered table-striped text-sm">
            <thead>
                <tr class="bg-primary">
                    <td align="center" style="width: 60px;"><strong>ID</strong></td>
                    <td><strong>CUENTA</strong></td>
                    <td align="center" style="width: 100px;"><strong>TIPO CUENTA</strong></td>
                    <td align="center" style="width: 100px;"><strong>CANT. OPER.</strong></td>
                    <td align="right" style="width: 80px;"><strong>IMPORTE</strong></td>
                </tr>
            </thead>
            <tbody>
                @php
                $total =0;
                $ingresos =0;
                $egresos =0;
                @endphp
                @foreach ($movimientos as $item)
                <tr>
                    <td align="center">{{$item->cuenta_id}}</td>
                    <td>{{strtoupper($item->cuenta)}}</td>
                    <td align="center">{{$item->tipo}}</td>
                    <td align="center">{{$item->cantidad}}</td>
                    <td align="right">{{number_format($item->importe,2,'.')}}</td>
                </tr>
                @php
                if ($item->tipo=="INGRESO") {
                $ingresos += $item->importe;
                } else {
                $egresos += $item->importe;
                }

                @endphp
                @endforeach

            </tbody>
        </table>
        <br>
        @php

        $total = $ingresos - $egresos;
        $color="success";
        if ($total < 0) { $color="danger" ; } @endphp <table class="table text-sm">
            <tbody>
                <tr>
                    <td></td>
                    <td align="right" class="bg-info" style="width: 227px;"><strong>TOTAL INGRESOS:</strong></td>
                    <td align="right" class="bg-info" style="width: 80px;"><strong>
                            {{number_format($ingresos,2,'.')}}
                        </strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right" class="bg-warning" style="width: 227px;"><strong>TOTAL EGRESOS:</strong></td>
                    <td align="right" class="bg-warning" style="width: 80px;"><strong>
                            {{number_format($egresos,2,'.')}}
                        </strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right" class="bg-{{$color}}" style="width: 227px;"><strong>RESULTADOS:</strong></td>
                    <td align="right" class="bg-{{$color}}" style="width: 80px;"><strong>
                            {{number_format($total,2,'.')}}
                        </strong></td>
                </tr>
            </tbody>
            </table>
    </div>
</body>

</html>