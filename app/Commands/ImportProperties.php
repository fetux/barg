<?php namespace App\Commands;

use App\Property;
use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class ImportProperties extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(DB db)
	{
	  $properties = db.connection('mysql2').select('select * from tblpropiedades');
    print_r($properties)
    foreach ($p as $property) {
      $table->provincia_id = null ;
			$table->ciudad_id = null ;
			$table->barrio_id = null ;
			$table->operacion_id = null ;
			$table->tipo_id = null ;
			$table->estado_id = null ;

			$table->ref = null ;
			$table->moneda = null ;
			$table->precio = null ;
			$table->mostrar_precio = null ;
			$table->direccion = null ;
			$table->superficie = null ;
			$table->ambientes = null ;
			$table->cochera = null ;
			$table->amueblado = null ;
			$table->disposicion = null ;
			$table->descripcion = null ;
			$table->destacada = null ;

			$table->nombre_duenio = null ;
			$table->provincia_duenio = null ;
			$table->ciudad_duenio = null ;
			$table->direccion_duenio = null ;
			$table->codpostal_duenio = null ;
			$table->tel1_duenio = null ;
			$table->tel2_duenio = null ;
			$table->tel3_duenio = null ;
			$table->tel4_duenio = null ;
			$table->observaciones_duenio = null ;
			$table->llaves = null ;

			$table->barcode_url = null ;
    }
	}

}
