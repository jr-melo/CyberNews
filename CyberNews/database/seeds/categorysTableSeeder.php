<?php

use Illuminate\Database\Seeder;

class categorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert([
            'nombre'=>'Deportes',
            'descripcion' => 'Sección de deportes',
        ]);

        DB::table('categorys')->insert([
            'nombre'=>'Tecnología',
            'descripcion' => 'Sección de tecnología',
        ]);

        DB::table('categorys')->insert([
            'nombre'=>'Música',
            'descripcion' => 'Sección de música',
        ]);

        DB::table('categorys')->insert([
            'nombre'=>'Gobierno',
            'descripcion' => 'Sección de gobierno.',
        ]);

        DB::table('categorys')->insert([
            'nombre'=>'Internacionales',
            'descripcion' => 'Sección de internacionales.',
        ]);
        
    }

    
}
