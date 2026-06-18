<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

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
            'creditos.refinanciar',

            // Cuotas
            'cuotas.ver',
            'cuotas.generar',
            'cuotas.recalcular',

            // Pagos
            'pagos.ver',
            'pagos.registrar',
            'pagos.imputar',
            'pagos.anular',

            // Mora
            'mora.ver',
            'mora.gestionar',

            // Recupero
            'recupero.ver',
            'recupero.gestionar',

            // Reportes
            'reportes.ver',
            'reportes.exportar',

            // Administración
            'usuarios.ver',
            'usuarios.crear',
            'usuarios.editar',
            'usuarios.eliminar',

            'roles.ver',
            'roles.crear',
            'roles.editar',
            'roles.eliminar',

            // Configuración
            'configuracion.ver',
            'configuracion.editar',
        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);

        }
    }
}