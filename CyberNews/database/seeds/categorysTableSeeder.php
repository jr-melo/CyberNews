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
            'descripcion' => 'seccion de deportes',
        ]);
        $categorys = factory(App\categorys::class, 4)->create();
    }

    
}
