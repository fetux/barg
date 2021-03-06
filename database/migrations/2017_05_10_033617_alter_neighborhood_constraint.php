<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNeighborhoodConstraint extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properties', function($table)
        {
            $table->integer('barrio_id')->unsigned()->nullable()->change();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('properties', function($table)
        {
            $table->integer('barrio_id')->unsigned()->change();
        });
	}

}
