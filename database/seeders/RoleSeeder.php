<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Admin']);
        $role1 = Role::create(['name' => 'Operador']);

        Permission::create(['name' => 'home', 'grupo' => 'DASHBOARD', 'descripcion' => 'Ver Inicio'])->assignRole([$role, $role1]);

        Permission::create(['name' => 'users.index', 'grupo' => 'USUARIOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'users.create', 'grupo' => 'USUARIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'users.edit', 'grupo' => 'USUARIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'users.destroy', 'grupo' => 'USUARIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'clientes.index', 'grupo' => 'CLIENTES', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'clientes.create', 'grupo' => 'CLIENTES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'clientes.edit', 'grupo' => 'CLIENTES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'clientes.destroy', 'grupo' => 'CLIENTES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'servicios.index', 'grupo' => 'SERVICIOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'servicios.create', 'grupo' => 'SERVICIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'servicios.edit', 'grupo' => 'SERVICIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'servicios.destroy', 'grupo' => 'SERVICIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'zonas.index', 'grupo' => 'ZONAS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'zonas.create', 'grupo' => 'ZONAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'zonas.edit', 'grupo' => 'ZONAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'zonas.destroy', 'grupo' => 'ZONAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'tipodocs.index', 'grupo' => 'TIPO DOCS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'tipodocs.create', 'grupo' => 'TIPO DOCS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'tipodocs.edit', 'grupo' => 'TIPO DOCS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'tipodocs.destroy', 'grupo' => 'TIPO DOCS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'tiposervicios.index', 'grupo' => 'TIPO SERVICIOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'tiposervicios.create', 'grupo' => 'TIPO SERVICIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'tiposervicios.edit', 'grupo' => 'TIPO SERVICIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'tiposervicios.destroy', 'grupo' => 'TIPO SERVICIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'contexturas.index', 'grupo' => 'CONTEXTURAS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'contexturas.create', 'grupo' => 'CONTEXTURAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'contexturas.edit', 'grupo' => 'CONTEXTURAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'contexturas.destroy', 'grupo' => 'CONTEXTURAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'objetivos.index', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'objetivos.create', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'objetivos.edit', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'objetivos.destroy', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.roles.index',  'grupo' => 'ROLES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.create',  'grupo' => 'ROLES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.edit',  'grupo' => 'ROLES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.destroy',  'grupo' => 'ROLES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'categorias.index',  'grupo' => 'CATEGORIAS PROD.', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'categorias.create',  'grupo' => 'CATEGORIAS PROD.', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'categorias.edit',  'grupo' => 'CATEGORIAS PROD.', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'categorias.destroy',  'grupo' => 'CATEGORIAS PROD.', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'productos.index',  'grupo' => 'PRODUCTOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'productos.create',  'grupo' => 'PRODUCTOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'productos.edit',  'grupo' => 'PRODUCTOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'productos.destroy',  'grupo' => 'PRODUCTOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'compras.index',  'grupo' => 'COMPRAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'compras.create',  'grupo' => 'COMPRAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'compras.edit',  'grupo' => 'COMPRAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'compras.destroy',  'grupo' => 'COMPRAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'pos.index',  'grupo' => 'PUNTO DE VENTA', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'pos.create',  'grupo' => 'PUNTO DE VENTA', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'pos.edit',  'grupo' => 'PUNTO DE VENTA', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'pos.destroy',  'grupo' => 'PUNTO DE VENTA', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'feriados.index',  'grupo' => 'FERIADOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'feriados.create',  'grupo' => 'FERIADOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'feriados.edit',  'grupo' => 'FERIADOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'feriados.destroy',  'grupo' => 'FERIADOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'couches.index',  'grupo' => 'COUCHES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'couches.create',  'grupo' => 'COUCHES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'couches.edit',  'grupo' => 'COUCHES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'couches.destroy',  'grupo' => 'COUCHES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'movimientos.index',  'grupo' => 'MOVIMIENTOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'movimientos.create',  'grupo' => 'MOVIMIENTOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'movimientos.edit',  'grupo' => 'MOVIMIENTOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'movimientos.destroy',  'grupo' => 'MOVIMIENTOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'cuentas.index',  'grupo' => 'CUENTAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'cuentas.create',  'grupo' => 'CUENTAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'cuentas.edit',  'grupo' => 'CUENTAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'cuentas.destroy',  'grupo' => 'CUENTAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'creditos.index',  'grupo' => 'CREDITOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'creditos.create',  'grupo' => 'CREDITOS', 'descripcion' => 'Crear'])->assignRole([$role]);

        Permission::create(['name' => 'rptingresosegresos',  'grupo' => 'REPORTES', 'descripcion' => 'Ingresos - Egresos'])->assignRole([$role]);
    }
}
