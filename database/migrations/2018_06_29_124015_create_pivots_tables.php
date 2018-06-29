<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('meal_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });

         Schema::create('ingredient_meal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->unsigned();
            $table->integer('meal_id')->unsigned();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->foreign('meal_id')->references('id')->on('meals');
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
        Schema::dropIfExists('meal_tag');
        Schema::dropIfExists('ingredient_meal');
    }
}
