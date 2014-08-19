<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPreguntaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_pregunta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('preguntas_id');
			$table->boolean('respuesta');
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
		Schema::drop('user_pregunta');
	}

}
