<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration 
{
	public function up()
	{
		Schema::create('pets', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->double('longittude')->default(11900.18740)->index();
            $table->double('latitude')->defualt(3338.99867)->index();
            $table->text('describtion');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('pets');
	}
}
