<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id()->unique();
            //fkcategorias
            $table->unsignedBigInteger('Autor');
            $table->date('date');
            $table->string('title');
            $table->longText('body');
            $table->foreign('Autor')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updatefor')->nullable();
            $table->boolean('field_status')->default(true);
           
            $table->timestamps();
        });
        
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        
    }
}
