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
            /* $table->unsignedBigInteger('category_id'); */
            $table->unsignedBigInteger('Autor');
            $table->date('date');
            $table->string('title');
            $table->longText('body');
            $table->unsignedBigInteger('updatefor')->nullable();
            $table->boolean('field_status')->default(true);
           
            $table->timestamps();
            

            //Relations
            $table->foreign('Autor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updatefor')->references('id')->on('users')->onDelete('cascade');
            /* $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade'); */
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
