<?php

namespace Database\Seeders;

use App\Models\Contextura;
use App\Models\Genero;
use App\Models\Objetivo;
use App\Models\Tipodoc;
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

        Contextura::create([
            'nombre' => 'Contextura 1',
        ]);
        Contextura::create([
            'nombre' => 'Contextura 2',
        ]);
        Contextura::create([
            'nombre' => 'Contextura 3',
        ]);

        Genero::create([
            'nombre' => 'Masculino',
        ]);
        Genero::create([
            'nombre' => 'Femenino',
        ]);
        Genero::create([
            'nombre' => 'No declarado',
        ]);
    }
}
