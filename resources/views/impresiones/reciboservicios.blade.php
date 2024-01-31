<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTA VENTA</title>

    <link rel="stylesheet" href="../print/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../print/css/bootstrap-theme.min.css">
    <style>
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-xs-6">
            <h2>[NOMBRE EMPRESA]</h2>
            Descripcion servicio <br>
            <strong>Direccion:</strong> Lorem ipsum dolor sit. <br>
            <strong>Telefono:</strong> 1231546
        </div>
        <div class="col-xs-6 text-right">
            <img src="https://www.shutterstock.com/image-vector/crossfit-icon-monochrome-simple-templates-600nw-2143461421.jpg" width="150" alt="">
        </div>
    </div>




    <h3 class="text-center"><u>NOTA DE VENTA</u></h3>
    <div class="row" style="margin-top: 3rem;margin-bottom: 3rem;">
        <div class="col-xs-5">
            <table class="table table-bordered" style="font-size: 12px;">
                <tr>
                    <td>
                        <strong>FECHA: </strong>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>CLIENTE: </strong>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <table class="table table-striped table-bordered" style="font-size: 12px;">
        <thead>
            <tr class="text-center">
                <td>NRO</td>
                <td>DETALLE</td>
                <td>CANT.</td>
                <td>P. UNIT.</td>
                <td>SUBTOTAL</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center" style="width: 60px;">1</td>
                <td>Lorem ipsum ?</td>
                <td align="center" style="width: 100px;">10</td>
                <td align="right" style="width: 100px;">3.00</td>
                <td align="right" style="width: 100px;">30.00</td>
            </tr>
            <tr>
                <td align="center" style="width: 60px;">1</td>
                <td>Lorem ipsum ?</td>
                <td align="center" style="width: 100px;">10</td>
                <td align="right" style="width: 100px;">3.00</td>
                <td align="right" style="width: 100px;">30.00</td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="active">
                <td align="right" colspan="4"><strong>TOTAL:</strong></td>
                <td align="right">60.00</td>
            </tr>
        </tfoot>
    </table>
    <footer>
        <p class="text-center">Gracias por su preferencia!</p>
    </footer>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../print/js/bootstrap.min.js"></script>

    <script>
        // document.addEventListener("DOMContentLoaded", function(event) {
        //     window.print();
        //     setTimeout(function() {
        //         window.close();
        //     }, 3000);
        // });
    </script>

</body>

</html>