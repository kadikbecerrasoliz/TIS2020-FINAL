<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Rol
        Permission::create([
            'name'  => 'Ver Lista de Roles',
            'slug'  => 'roles.index',
            'description'  => 'Lista todos los roles del sistema',
        ]);
        Permission::create([
            'name'  => 'Crear Roles',
            'slug'  => 'roles.create',
            'description'  => 'Crear y Guardar roles en el sistema',
        ]);
        Permission::create([
            'name'  => 'Editar roles',
            'slug'  => 'roles.edit',
            'description'  => 'Editar los roles del sistema',
        ]);
        Permission::create([
            'name'  => 'Eliminar roles',
            'slug'  => 'roles.destroy',
            'description'  => 'Eliminar los roles del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de Roles',
            'slug'  => 'roles.show',
            'description'  => 'Ver perfil todos los roles del sistema',
        ]);

        //Usuario
        Permission::create([
            'name'  => 'Ver Lista de Usuarios',
            'slug'  => 'users.index',
            'description'  => 'Lista todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'  => 'Crear Usuarios',
            'slug'  => 'users.create',
            'description'  => 'Crear y Guardar usuarios en el sistema',
        ]);
        Permission::create([
            'name'  => 'Editar Usuarios',
            'slug'  => 'users.edit',
            'description'  => 'Editar los usuarios del sistema',
        ]);
        Permission::create([
            'name'  => 'Eliminar Usuarios',
            'slug'  => 'users.destroy',
            'description'  => 'Eliminar los usuarios del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de Usuarios',
            'slug'  => 'users.show',
            'description'  => 'Ver perfil todos los usuarios del sistema',
        ]);

        //Materias
        Permission::create([
            'name'  => 'Ver Lista de Materias',
            'slug'  => 'materias.index',
            'description'  => 'Lista todos las Materias del sistema',
        ]);
        Permission::create([
            'name'  => 'Crear Materias',
            'slug'  => 'materias.create',
            'description'  => 'Crear y Guardar Materias en el sistema',
        ]);
        Permission::create([
            'name'  => 'Editar Materias',
            'slug'  => 'materias.edit',
            'description'  => 'Editar las Materias del sistema',
        ]);
        Permission::create([
            'name'  => 'Eliminar Materias',
            'slug'  => 'materias.destroy',
            'description'  => 'Eliminar las Materias del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de Materias',
            'slug'  => 'materias.show',
            'description'  => 'Ver perfil todas las Materias del sistema',
        ]);

        //Convocatoria
        Permission::create([
            'name'  => 'Ver Lista de Convocatorias',
            'slug'  => 'convocatorias.index',
            'description'  => 'Lista todos las convocatorias del sistema',
        ]);
        Permission::create([
            'name'  => 'Crear Convocatorias',
            'slug'  => 'convocatorias.create',
            'description'  => 'Crear y Guardar roles en el sistema',
        ]);
        Permission::create([
            'name'  => 'Editar Convocatorias',
            'slug'  => 'convocatorias.edit',
            'description'  => 'Editar las convocatorias del sistema',
        ]);
        Permission::create([
            'name'  => 'Eliminar Convocatorias',
            'slug'  => 'convocatorias.destroy',
            'description'  => 'Eliminar las convocatorias del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de Convocatorias',
            'slug'  => 'convocatorias.show',
            'description'  => 'Ver perfil todas las convocatorias del sistema',
        ]);

        //Solicitud
        Permission::create([
            'name'  => 'Ver Lista de Solicitud',
            'slug'  => 'solicituds.index',
            'description'  => 'Lista todos las Solicitud del sistema',
        ]);
        Permission::create([
            'name'  => 'Madar Solicitud',
            'slug'  => 'solicituds.create',
            'description'  => 'Crear y Guardar Solicitud en el sistema',
        ]);
        Permission::create([
            'name'  => 'Aceptar o Rechazar Solicitud',
            'slug'  => 'solicituds.edit',
            'description'  => 'Editar las Solicitud del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de Solicitud',
            'slug'  => 'solicituds.show',
            'description'  => 'Ver perfil todas las Solicitud del sistema',
        ]);

        //Postulacion
        Permission::create([
            'name'  => 'Ver Lista de Postulacion',
            'slug'  => 'postulations.index',
            'description'  => 'Lista todos las Postulacion del sistema',
        ]);
        Permission::create([
            'name'  => 'Eliminar Postulacion',
            'slug'  => 'postulations.destroy',
            'description'  => 'Eliminar las Postulacion del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de Postulacion',
            'slug'  => 'postulations.show',
            'description'  => 'Ver perfil todas las Postulacion del sistema',
        ]);

        //Postulante
        Permission::create([
            'name'  => 'Ver Rol Postulante',
            'slug'  => 'postulantes.index',
            'description'  => 'Lista todas las opciones del postulante',
        ]);

        //Comisionario
        Permission::create([
            'name'  => 'Ver Calificacion de certificados.',
            'slug'  => 'meritos.certificados.calificar',
            'description'  => 'Lista los meritos para calificar certificados',
        ]);

        Permission::create([
            'name'  => 'Ver certificado.',
            'slug'  => 'certificados.show',
            'description'  => 'Ver certificado',
        ]);

        Permission::create([
            'name'  => 'Editar certificado.',
            'slug'  => 'certificados.edit',
            'description'  => 'Editar certificado del postulante',
        ]);

        Permission::create([
            'name'  => 'Mostrar archivos.',
            'slug'  => 'archivos.show',
            'description'  => 'Mostrar archivos del postulante',
        ]);

        Permission::create([
            'name'  => 'Editar archivos.',
            'slug'  => 'archivos.edit',
            'description'  => 'Editar archivos del postulante',
        ]);

        //Tematicas
        Permission::create([
            'name'  => 'Ver Lista de tematicas',
            'slug'  => 'tematicas.index',
            'description'  => 'Lista todos las tematicas del sistema',
        ]);
        Permission::create([
            'name'  => 'Crear tematicas',
            'slug'  => 'tematicas.create',
            'description'  => 'Crear y Guardar tematicas en el sistema',
        ]);
        Permission::create([
            'name'  => 'Editar tematicas',
            'slug'  => 'tematicas.edit',
            'description'  => 'Editar las tematicas del sistema',
        ]);
        Permission::create([
            'name'  => 'Eliminar tematicas',
            'slug'  => 'tematicas.destroy',
            'description'  => 'Eliminar las tematicas del sistema',
        ]);
        Permission::create([
            'name'  => 'Ver Perfil de tematicas',
            'slug'  => 'tematicas.show',
            'description'  => 'Ver perfil todas las tematicas del sistema',
        ]);
    }
}
