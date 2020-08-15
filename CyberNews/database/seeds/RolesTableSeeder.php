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
            'name' => 'sysadmin',
            'description' => 'Administrador del sistema.',
        ]);

        DB::table('roles')->insert([
            'name' => 'dbmanager',
            'description' => 'Gestor de Base de Datos.',
        ]);

        DB::table('roles')->insert([
            'name' => 'mng-salesman',
            'description' => 'Gerente de Ventas.',
        ]);

        DB::table('roles')->insert([
            'name' => 'designer',
            'description' => 'Diseñador Principal.',
        ]);
    }
}
