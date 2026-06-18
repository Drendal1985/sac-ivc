<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
        ->forgetCachedPermissions();

        /*Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Operador',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Supervisor',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Recupero',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Auditor',
            'guard_name' => 'web'
        ]);*/

        $admin = Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web'
        ]);

        $operador = Role::firstOrCreate([
            'name' => 'Operador',
            'guard_name' => 'web'
        ]);

        $supervisor = Role::firstOrCreate([
            'name' => 'Supervisor',
            'guard_name' => 'web'
        ]);

        $recupero = Role::firstOrCreate([
            'name' => 'Recupero',
            'guard_name' => 'web'
        ]);

        $auditor = Role::firstOrCreate([
            'name' => 'Auditor',
            'guard_name' => 'web'
        ]);

        $admin->syncPermissions(
            Permission::all()
        );

        $operador->syncPermissions([
            'beneficiarios.ver',
            'beneficiarios.crear',
            'beneficiarios.editar',

            'creditos.ver',
            'creditos.crear',
            'creditos.editar',

            'cuotas.ver',

            'pagos.ver',
            'pagos.registrar',
            'pagos.imputar',
        ]);

        $supervisor->syncPermissions([
            'beneficiarios.ver',
            'creditos.ver',
            'cuotas.ver',
            'pagos.ver',
            'mora.ver',
            'reportes.ver',
        ]);

        $recupero->syncPermissions([
            'mora.ver',
            'mora.gestionar',

            'recupero.ver',
            'recupero.gestionar',

            'reportes.ver',
        ]);

        $auditor->syncPermissions([
            'beneficiarios.ver',
            'creditos.ver',
            'cuotas.ver',
            'pagos.ver',
            'reportes.ver',
        ]);
    }
}