<?php

use Illuminate\Database\Seeder;

class newsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'id'=>1,
            'Autor'=>'1',
            /* 'category_id' => 1, */
            'title'=> 'Laura azota RD',
            'body'=>'LOREMIMPUT',
            'updatefor'=>2,
            'date'=>now(),


        ]);
        $news = factory(App\news::class, 10)->create();
    }
}
