<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meal_name')->nullable(false);
            $table->unsignedInteger('gallery_id'); 
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('gallery')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('meals');
    }
}