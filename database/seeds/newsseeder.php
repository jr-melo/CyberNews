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
            'title'=> 'Tormenta Laura azota RD',
            'body'=>'Quidem quibusdam repellat voluptatibus. Vel fugiat et adipisci omnis asperiores. Tempora quis quo qui corporis voluptate earum qui. Aliquid magnam ut repudiandae eos. Quia eum est quo. Expedita hic numquam ratione voluptatum ex. Quas deserunt aliquid dolores dolorem eos.Natus fuga ratione quaerat libero nulla quis. Consequatur consequatur omnis possimus amet. Fugiat totam veniam sint mollitia. Aut ut occaecati nulla enim velit. Sapiente rem nobis ut enim consequatur sed quo. Amet est ratione ut sit sunt qui. Atque esse quam quasi dolore assumenda quasi totam.Voluptatem repellat quod et ipsa dolorem asperiores eveniet. Quod placeat sed consequuntur temporibus quis soluta nam. Vel et aut dignissimos praesentium provident veritatis optio. ',
            'Autor'=>'1',
            'category_id' => '4',
            'updatefor'=>'2',
            'created_at' => now(),
            /* 'date'=>now(),*/

        ]);

        DB::table('news')->insert([
            'title'=> 'El baseball invernal se acerca.',
            'body'=> 'Quidem quibusdam repellat voluptatibus. Vel fugiat et adipisci omnis asperiores. Tempora quis quo qui corporis voluptate earum qui. Aliquid magnam ut repudiandae eos. Quia eum est quo. Expedita hic numquam ratione voluptatum ex. Quas deserunt aliquid dolores dolorem eos.Natus fuga ratione quaerat libero nulla quis. Consequatur consequatur omnis possimus amet. Fugiat totam veniam sint mollitia. Aut ut occaecati nulla enim velit. Sapiente rem nobis ut enim consequatur sed quo. Amet est ratione ut sit sunt qui. Atque esse quam quasi dolore assumenda quasi totam.Voluptatem repellat quod et ipsa dolorem asperiores eveniet. Quod placeat sed consequuntur temporibus quis soluta nam. Vel et aut dignissimos praesentium provident veritatis optio. ',
            'Autor'=>'2',
            'category_id' => '1',
            'updatefor'=>'2',
            'created_at' => now(),
            /* 'date'=>now(),*/

        ]);

        DB::table('news')->insert([
            'title'=> 'Ricardo Arjona en Altos de Chabón este Lunes.',
            'body'=>'Quidem quibusdam repellat voluptatibus. Vel fugiat et adipisci omnis asperiores. Tempora quis quo qui corporis voluptate earum qui. Aliquid magnam ut repudiandae eos. Quia eum est quo. Expedita hic numquam ratione voluptatum ex. Quas deserunt aliquid dolores dolorem eos.Natus fuga ratione quaerat libero nulla quis. Consequatur consequatur omnis possimus amet. Fugiat totam veniam sint mollitia. Aut ut occaecati nulla enim velit. Sapiente rem nobis ut enim consequatur sed quo. Amet est ratione ut sit sunt qui. Atque esse quam quasi dolore assumenda quasi totam.Voluptatem repellat quod et ipsa dolorem asperiores eveniet. Quod placeat sed consequuntur temporibus quis soluta nam. Vel et aut dignissimos praesentium provident veritatis optio. ',
            'Autor'=>'3',
            'category_id' => '3',
            'updatefor'=>'2',
            'created_at' => now(),
            /* 'date'=>now(),*/

        ]);

        DB::table('news')->insert([
            'title'=> 'Grandes cambios en la última actualización de Windows 10.',
            'body'=>'Quidem quibusdam repellat voluptatibus. Vel fugiat et adipisci omnis asperiores. Tempora quis quo qui corporis voluptate earum qui. Aliquid magnam ut repudiandae eos. Quia eum est quo. Expedita hic numquam ratione voluptatum ex. Quas deserunt aliquid dolores dolorem eos.Natus fuga ratione quaerat libero nulla quis. Consequatur consequatur omnis possimus amet. Fugiat totam veniam sint mollitia. Aut ut occaecati nulla enim velit. Sapiente rem nobis ut enim consequatur sed quo. Amet est ratione ut sit sunt qui. Atque esse quam quasi dolore assumenda quasi totam.Voluptatem repellat quod et ipsa dolorem asperiores eveniet. Quod placeat sed consequuntur temporibus quis soluta nam. Vel et aut dignissimos praesentium provident veritatis optio. ',
            'Autor'=>'4',
            'category_id' => '2',
            'updatefor'=>'2',
            'created_at' => now(),
            /* 'date'=>now(),*/

        ]);

        $news = factory(App\news::class, 7)->create();
        
    }
}
