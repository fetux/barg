<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSizeCarteleraInputsPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properties', function(Blueprint $table)
		{
			$table->string('cartelera1',60)->change();
			$table->string('cartelera2',60)->change();
			$table->string('cartelera3',60)->change();
			$table->string('cartelera4',60)->change();
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
			$table->string('cartelera1',45)->change();
			$table->string('cartelera2',45)->change();
			$table->string('cartelera3',45)->change();
			$table->string('cartelera4',45)->change();
		});
	}

}
