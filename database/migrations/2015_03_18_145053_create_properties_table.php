<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('provincia_id')->unsigned();
			$table->foreign('provincia_id')->references('id')->on('provinces');
			$table->integer('ciudad_id')->unsigned();
			$table->foreign('ciudad_id')->references('id')->on('cities');
			$table->integer('barrio_id')->unsigned();
			$table->foreign('barrio_id')->references('id')->on('neighborhoods');
			$table->integer('operacion_id')->unsigned();
			$table->foreign('operacion_id')->references('id')->on('operations');
			$table->integer('tipo_id')->unsigned();
			$table->foreign('tipo_id')->references('id')->on('property_types');
			$table->integer('estado_id')->unsigned();
			$table->foreign('estado_id')->references('id')->on('property_states');
			
			$table->string('ref')->unique();
			$table->boolean('moneda');
			$table->mediumInteger('precio')->unsigned();
			$table->boolean('mostrar_precio');
			$table->string('direccion');
			$table->tinyInteger('superficie')->unsigned();
			$table->tinyInteger('ambientes')->unsigned();
			$table->boolean('cochera');
			$table->boolean('amueblado');
			$table->string('disposicion');
			$table->string('descripcion',600);
			$table->boolean('destacada');
			
			$table->string('nombre_duenio');
			$table->string('provincia_duenio');
			$table->string('ciudad_duenio');
			$table->string('direccion_duenio');
			$table->string('codpostal_duenio');
			$table->string('tel1_duenio');
			$table->string('tel2_duenio');
			$table->string('tel3_duenio');
			$table->string('tel4_duenio');
			$table->string('observaciones_duenio',600);
			$table->integer('llaves')->unsigned();
			
			$table->string('barcode_url');
			
			//$table->softDeletes();
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
		Schema::drop('properties');
	}

}
