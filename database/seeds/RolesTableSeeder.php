<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Administrador
        Role::create([
            'name'      => 'Administrador',
            'slug'      => 'administrador',
            'description'=> 'Persona con control total',
            'special'   => 'all-access',
        ]);

        //Postulante
        Role::create([
            'name'      => 'Postulante',
            'slug'      => 'postulante',
            'description'=> 'Persona con control de postulante',
        ]);
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '22',
            'role_id'=> '2',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '28',
            'role_id'=> '2',
        ));

        //Secretaria
        Role::create([
            'name'      => 'Secretaria',
            'slug'      => 'secretaria',
            'description'=> 'Persona con control de secretaria',
        ]);
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '16',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '17',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '18',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '19',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '20',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '21',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '23',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '24',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '25',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '26',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '27',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '32',
            'role_id'=> '3',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '33',
            'role_id'=> '3',
        ));

        //Comisionario
        Role::create([
            'name'      => 'Comisionario',
            'slug'      => 'comisionario',
            'description'=> 'Persona con control de comisionario',
        ]);
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '16',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '20',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '25',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '26',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '27',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '29',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '30',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '31',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '32',
            'role_id'=> '4',
        ));
        \DB::table('permission_role')->insert(array(
            'permission_id'    => '33',
            'role_id'=> '4',
        ));
    }
}
