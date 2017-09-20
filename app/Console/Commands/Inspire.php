<?php namespace App\Console\Commands;

use App\Property;
use DB;
use Illuminate\Console\Command;

class Inspire extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'import';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import Properties';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{

		$properties = DB::connection('mysql_old')->select('select * from tblpropiedades');
    // print_r($properties);
    foreach ($properties as $p) {
      $property = new Property;
      $property->provincia_id = 1 ;
			$property->ciudad_id = 1 ;
			$property->barrio_id = 1 ;
			$property->operacion_id = 1 ;
			$property->tipo_id = 1 ;
			$property->estado_id = 1 ;

			$property->ref = $p->tipo . ' ' . $p->calles + '-' + $p->id_propiedad;
			$property->moneda = ($p->moneda == 'U$S') ? 1 : 0;
			$property->precio = $p->valor ;
			$property->mostrar_precio = 1 ;
			$property->direccion = $p->ubicacionpropiedad;
			$property->superficie = substr($p->supcubierta,0,-2);
			$property->ambientes = $p->ambientes ;
			$property->cochera = ($p->cochera != '') ? 1 : 0;
			$property->amueblado = ($p->muebles != 'No') ? 1 : 0;
			$property->disposicion = $p->disposicion ;
			// $property->descripcion = null ;
			// $property->destacada = null ;

			$property->nombre_duenio = $p->propietario ;
			$property->provincia_duenio = $p->provincia ;
			$property->ciudad_duenio = $p->localidad ;
			$property->direccion_duenio = $p->domicilio ;
			$property->codpostal_duenio = $p->codpostal ;
			$property->tel1_duenio = $p->telpar ;
			$property->tel2_duenio = $p->telcel ;
			$property->tel3_duenio = $p->telcom ;
			// $property->tel4_duenio = null ;
			// $property->observaciones_duenio = null ;
			// $property->llaves = null ;

			// $property->barcode_url = null ;
      $property->save();
      print($property->ref . "agregada.\n");
    }
	}

}
