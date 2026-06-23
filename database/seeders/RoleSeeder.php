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

        $permisos = [

        // Beneficiarios
        'beneficiarios.ver',
        'beneficiarios.crear',
        'beneficiarios.editar',
        'beneficiarios.eliminar',

        // Créditos
        'creditos.ver',
        'creditos.crear',
        'creditos.editar',
        'creditos.eliminar',

        // Cuotas
        'cuotas.ver',
        'cuotas.generar',
        'cuotas.editar',
        'cuotas.anular',

        // Pagos
        'pagos.ver',
        'pagos.registrar',
        'pagos.imputar',
        'pagos.anular',

        // Mora
        'mora.ver',
        'mora.gestionar',

        // Campañas
        'campanias.ver',
        'campanias.gestionar',

        // Recupero
        'recupero.ver',
        'recupero.gestionar',

        // Reportes
        'reportes.cartera',
        'reportes.cobranzas',
        'reportes.auditoria',

        // Administración
        'usuarios.ver',
        'usuarios.crear',
        'usuarios.editar',

        'roles.ver',
        'roles.crear',
        'roles.editar',

        'parametros.ver',
        'parametros.editar',
    ];

    foreach ($permisos as $permiso) {
        Permission::firstOrCreate([
            'name' => $permiso,
            'guard_name' => 'web',
        ]);
    }

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

            'reportes.cartera',
            'reportes.cobranzas',
        ]);

        $recupero->syncPermissions([
            'mora.ver',
            'mora.gestionar',

            'recupero.ver',
            'recupero.gestionar',

            'campanias.ver',
            'campanias.gestionar',

            'reportes.cartera',
        ]);

        $auditor->syncPermissions([
            'beneficiarios.ver',
            'creditos.ver',
            'cuotas.ver',
            'pagos.ver',

            'reportes.cartera',
            'reportes.cobranzas',
            'reportes.auditoria',
        ]);

        $admin->syncPermissions(
            Permission::all()
        );
    }
}