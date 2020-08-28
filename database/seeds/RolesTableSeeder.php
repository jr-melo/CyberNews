<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rolname' => 'sysadmin',
            'description' => 'Administrador del sistema.',
        ]);

        DB::table('roles')->insert([
            'rolname' => 'dbmanager',
            'description' => 'Gestor de Base de Datos.',
        ]);

        DB::table('roles')->insert([
            'rolname' => 'guest',
            'description' => 'visitante',
        ]);

        DB::table('roles')->insert([
            'rolname' => 'designer',
            'description' => 'Diseñador Principal.',
        ]);
    }
}
