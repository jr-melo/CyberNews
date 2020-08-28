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
            'title'=> 'Laura azota RD',
            'body'=>'LOREMIMPUT',
            'Autor'=>'1',
            'category_id' => '1',
            'updatefor'=>'2',
            'created_at' => now(),
            /* 'date'=>now(),*/

        ]);
        $news = factory(App\news::class, 10)->create();
    }
}
