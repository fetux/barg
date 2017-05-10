<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subscribers', function(Blueprint $table)
		{
			//
			$table->integer('type')->unisgned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subscribers', function(Blueprint $table)
		{
			//
			  $table->dropColumn('type');
		});
	}

}
