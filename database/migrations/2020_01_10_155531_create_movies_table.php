<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string("title");
            $table->string("description");
            $table->string("image");
            $table->date("release_date");
            $table->timestamps("");
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
