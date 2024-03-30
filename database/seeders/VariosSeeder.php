<?php

namespace Database\Seeders;

use App\Models\Contextura;
use App\Models\Cuenta;
use App\Models\Genero;
use App\Models\Modalidadservicio;
use App\Models\Modimpresion;
use App\Models\Objetivo;
use App\Models\Tipodoc;
use App\Models\Tiposervicio;
use App\Models\Vntestadopago;
use App\Models\Vnttipopago;
use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Zona::create([
            'nombre' => 'NORTE'
        ]);
        Zona::create([
            'nombre' => 'SUR'
        ]);
        Zona::create([
            'nombre' => 'ESTE'
        ]);
        Zona::create([
            'nombre' => 'OESTE'
        ]);

        Tipodoc::create([
            'nombre' => 'CEDULA IDENTIDAD',
            'nombrecorto' => 'C.I.',
        ]);
        Tipodoc::create([
            'nombre' => 'CEDULA EXTRANJERO',
            'nombrecorto' => 'C.E.',
        ]);
        Tipodoc::create([
            'nombre' => 'NUMERO DE IDENTIFICACION TRIBUTARIA',
            'nombrecorto' => 'NIT',
        ]);
        Tipodoc::create([
            'nombre' => 'PASAPORTE',
            'nombrecorto' => 'PS.',
        ]);

        Objetivo::create([
            'nombre' => 'COMPETIR'
        ]);
        Objetivo::create([
            'nombre' => 'BAJAR DE PESO'
        ]);
        Objetivo::create([
            'nombre' => 'SUBIR DE PESO'
        ]);
        Objetivo::create([
            'nombre' => 'MANTENER EL FISICO'
        ]);
        Objetivo::create([
            'nombre' => 'PASATIEMPO'
        ]);

        // Contextura::create([
        //     'nombre' => 'Ectomorfo',
        // ]);
        // Contextura::create([
        //     'nombre' => 'Endomorfo',
        // ]);
        // Contextura::create([
        //     'nombre' => 'Endomorfo',
        // ]);

        Genero::create([
            'nombre' => 'Masculino',
        ]);
        Genero::create([
            'nombre' => 'Femenino',
        ]);
        Genero::create([
            'nombre' => 'No declarado',
        ]);

        Vntestadopago::create([
            'nombre' => 'POR PAGAR',
            'nombrecorto' => 'PP',
        ]);
        Vntestadopago::create([
            'nombre' => 'PAGO REALIZADO',
            'nombrecorto' => 'PR',
        ]);
        Vntestadopago::create([
            'nombre' => 'PAGO CUOTAS',
            'nombrecorto' => 'PC',
        ]);
        Vntestadopago::create([
            'nombre' => 'PAGO ANULADO',
            'nombrecorto' => 'PA',
        ]);


        Vnttipopago::create([
            'nombre' => 'EFECTIVO',
            'nombrecorto' => 'EF',
            'icon' => 'money-bill-alt',
            'factor' => 1,
        ]);
        Vnttipopago::create([
            'nombre' => 'PAGO QR',
            'nombrecorto' => 'QR',
            'icon' => 'qrcode',
            'factor' => 1,
        ]);
        Vnttipopago::create([
            'nombre' => 'DEPOSITO BANCARIO',
            'nombrecorto' => 'DB',
            'icon' => 'money-check-alt',
            'factor' => 1,
        ]);
        Vnttipopago::create([
            'nombre' => 'GASTO ADMINISTRATIVO',
            'nombrecorto' => 'GA',
            'icon' => 'money-check',
            'factor' => 0,
        ]);

        Cuenta::create([
            'nombre' => 'Compras productos',
            'tipo' => 'EGRESO',
        ]);
        Cuenta::create([
            'nombre' => 'Compras insumos',
            'tipo' => 'EGRESO',
        ]);
        Cuenta::create([
            'nombre' => 'Venta productos',
            'tipo' => 'INGRESO',
        ]);
        Cuenta::create([
            'nombre' => 'Venta suscripcion',
            'tipo' => 'INGRESO',
        ]);

        Modalidadservicio::create([
            'nombre' => 'Dias',
            'descripcion' => 'Descripcion Dias'
        ]);
        Modalidadservicio::create([
            'nombre' => 'Creditos',
            'descripcion' => 'Descripcion Creditos'
        ]);
        Modimpresion::create([
            'nombre' => 'ESTANDAR'
        ]);
        Modimpresion::create([
            'nombre' => 'ESC-POS'
        ]);
    }
}
