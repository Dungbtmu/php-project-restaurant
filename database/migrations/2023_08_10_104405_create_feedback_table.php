<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
public function up()
{
Schema::create('feedback', function (Blueprint $table) {
    $table->id();
    $table->string('name')->nullable();
    $table->string('email')->nullable();
    $table->string('message')->nullable();
    $table->timestamps();
    });
}

public function down()
{
Schema::dropIfExists('feedback');
}
}