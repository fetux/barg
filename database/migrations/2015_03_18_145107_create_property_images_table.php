<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('property_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('property_id')->unsigned();
			$table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');;
			$table->string('url');
			$table->string('slide_url');
			$table->string('thumb_url');
			$table->string('thumb2_url');
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
		Schema::drop('property_images');
	}

}
