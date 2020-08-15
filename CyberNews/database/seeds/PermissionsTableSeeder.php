<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'crear',
            'description' => 'Crear registros en el sistema.',
        ]);

        DB::table('permissions')->insert([
            'name' => 'editar',
            'description' => 'Editar registros en el sistema.',
        ]);

        DB::table('permissions')->insert([
            'name' => 'borrar',
            'description' => 'Eliminar registros en el sistema.',
        ]);
    }
}
