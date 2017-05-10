<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarteleraInputsPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properties', function(Blueprint $table)
		{
			$table->string('cartelera1',45);
			$table->string('cartelera2',45);
			$table->string('cartelera3',45);
			$table->string('cartelera4',45);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('properties', function(Blueprint $table)
		{
			 $table->dropColumn(['cartelera1', 'cartelera2', 'cartelera3','cartelera4']);
		});
	}

}
