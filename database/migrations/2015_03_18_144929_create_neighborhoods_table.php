<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighborhoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('neighborhoods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('ciudad_id')->unsigned();
			$table->foreign('ciudad_id')->references('id')->on('cities');
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
		Schema::drop('neighborhoods');
	}

}
