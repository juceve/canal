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

        Permission::create(['name' => 'objetivos.index', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'objetivos.create', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'objetivos.edit', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'objetivos.destroy', 'grupo' => 'OBJETIVOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.roles.index',  'grupo' => 'ROLES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.create',  'grupo' => 'ROLES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.edit',  'grupo' => 'ROLES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.destroy',  'grupo' => 'ROLES', 'descripcion' => 'Eliminar'])->assignRole([$role]);
    }
}
