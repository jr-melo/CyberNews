<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsArticlesTable extends Migration
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
            $table->foreign('Autor')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('field_status')->default(true);
            $table->timestamps();
        });
        
        Schema::create('article', function (Blueprint $table) {

            $table->unsignedBigInteger('newsid');
           
            $table->longText('article');
            $table->foreign('newsid')->references('id')->on('news')->onDelete('cascade');
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
        Schema::dropIfExists('article');
    }
}
