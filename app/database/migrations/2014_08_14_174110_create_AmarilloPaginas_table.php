<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmarilloPaginasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('AmarilloPaginas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('pagina_actual');
			$table->boolean('terminado');			
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
		Schema::drop('AmarilloPaginas');
	}

}
