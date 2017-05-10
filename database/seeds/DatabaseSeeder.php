<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Property;
use App\Neighborhood;
use App\City;
use App\Province;
use App\Operation;
use App\PropertyType;
use App\PropertyState;
use App\User;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('UserTableSeeder');
		$this->call('ProvinceTableSeeder');
		$this->call('CityTableSeeder');
		
		$this->call('NeighborhoodTableSeeder');
		
		
		$this->call('OperationTableSeeder');
		$this->call('PropertyTypeTableSeeder');
		$this->call('PropertyStateTableSeeder');
		
		//$this->call('PropertyTableSeeder');
	}

}



class UserTableSeeder extends Seeder {
    
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'Rodrigo Barg',
            'email' => 'rodrigobarg@gmail.com',
            'password' => Hash::make('rodrigo')
        ]);
    }
    
}


class NeighborhoodTableSeeder extends Seeder {
		
	public function run()
    {
        DB::table('neighborhoods')->delete();
		
		Neighborhood::create(['nombre' => 'AEROPARQUE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ALFAR' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'AMEGHINO FLORENTINO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'AREA CENTRO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ARROYO CHAPADMALAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'AUTODROMO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'BATAN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'BOSQUE ALEGRE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'BOSQUE GRANDE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'BOSQUE PERALTA RAMOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CAMET FELIX U.' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CAMINO A NECOCHEA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CARIBE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CERRITO SUR' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CERRITO Y SAN SALVADOR' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'COLINA ALEGRE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'COLINAS DE PERALTA RAMOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'COLONIA BARRAGAN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CONSTITUCION' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'CORONEL DORREGO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DE LA PLAZA FORTUNATO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DE LAS HERASJUAN GREGORIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DEL PUERTO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DIVINO ROSTRO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DON BOSCO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DON EMILIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'DOS DE ABRIL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL BOQUERON' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL COLMENAR' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL GAUCHO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL JARDIN DE PERALTA RAMOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL JARDIN DE STELLA MARIS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL MARQUESADO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL MARTILLO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'EL PROGRESO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ESTACION CAMET' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ESTACION CHAPADMALAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ESTACION NORTE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ESTACION TERMINAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ESTRADA JOSE MANUEL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'FARO NORTE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'FRAY LUIS BELTRAN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'FUNES Y SAN LORENZO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'GENERAL BELGRANO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'GENERAL PUEYRREDON' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'GENERAL ROCA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'GENERAL SAN MARTIN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'HIPODROMO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'JOSE HERNANDEZ' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'JURAMENTO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LA FLORIDA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LA GERMANA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LA GLORIA DE LA PEREGRINA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LA HERRADURA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LA PEREGRINA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LA PERLA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LAS AMERICAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LAS AVENIDAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LAS CANTERAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LAS LILAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LAS MARGARITAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LAS RETAMAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LEANDRO N. ALEM' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LIBERTAD' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOMAS DE BATAN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOMAS DE STELLA MARIS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOMAS DEL GOLF' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOPEZ DE GOMARA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOS ACANTILADOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOS ANDES' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOS PINARES' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOS TILOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'LOS TRONCOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'MALVINAS ARGENTINAS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'NEWBERY JORGE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'NUEVA POMPEYA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'NUEVE DE JULIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'NUEVO GOLF' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE CAMET' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE EL CASAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE HERMOSO Y VALLE HERMOSO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE INDEPENDENCIA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE INDUSTRIAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE LURO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE MONTEMAR-EL GROSELLAR' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PARQUE PALERMO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PERALTA RAMOS OESTE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PINOS DE ANCHORENA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PLAYA CHAPADMALAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PLAYA GRANDE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PLAYA LOS LOBOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PLAYA SERENA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PLAZA PERALTA RAMOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PRIMERA JUNTA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'PUNTA MOGOTES' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'QUEBRADAS DE PERALTA RAMOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'REGIONAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'RIVADAVIA BERNARDINO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ROLDAN BELISARIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'RUMENCO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN ANTONIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN CARLOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN CAYETANO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN EDUARDO DE CHAPADMALAL' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN EDUARDO DEL MAR' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN JACINTO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN JORGE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN JOSE' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN JUAN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SAN PATRICIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANCHEZ FLORENCIO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANTA CELINA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANTA MONICA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANTA PAULA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANTA RITA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANTA ROSA DE LIMA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SANTA ROSA DEL MAR DE PERALTA RAMOS' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SARMIENTO DOMINGO FAUSTINO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'SIERRA DE LOS PADRES' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'TERMAS  HUINCO' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'VILLA LOURDES' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'VILLA PRIMERA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'VILLA SERRANA' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'VIRGEN DE LUJAN' , 'ciudad_id' => 1]);
		Neighborhood::create(['nombre' => 'ZACAGNINI JOSE MANUEL' , 'ciudad_id' => 1]);
        Neighborhood::create(['nombre' => 'CHAUVIN' , 'ciudad_id' => 1]);
        Neighborhood::create(['nombre' => 'TERMINAL NUEVA' , 'ciudad_id' => 1]);
        Neighborhood::create(['nombre' => 'TERMINAL VIEJA' , 'ciudad_id' => 1]);
        Neighborhood::create(['nombre' => 'ARENAS DEL SUR' , 'ciudad_id' => 1]);
        
        
		
		Neighborhood::create(['nombre' => 'AGRONOMÍA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'ALMAGRO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'BALVANERA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'BARRACAS' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'BELGRANO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'BOEDO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'CABALLITO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'CHACARITA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'COGHLAN' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'COLEGIALES' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'CONSTITUCIÓN' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'FLORES' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'FLORESTA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'LA BOCA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'LA PATERNAL' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'LINIERS' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'MATADEROS' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'MONTE CASTRO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'MONTSERRAT' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'NUEVA POMPEYA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'NUÑEZ' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'PALERMO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'PARQUE AVELLANEDA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'PARQUE CHACABUCO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'PARQUE CHAS' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'PARQUE PATRICIOS' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'PUERTO MADERO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'RECOLETA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'RETIRO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'SAAVEDRA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'SAN CRISTÓBAL' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'SAN NICOLÁS' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'SAN TELMO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VERSALLES' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA CRESPO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA DEVOTO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA GENERAL MITRE' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA LUGANO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA LURO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA ORTÚZAR' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA PUEYRREDÓN' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA REAL' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA RIACHUELO' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA SANTA RITA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA SOLDATI' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA URQUIZA' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VILLA DEL PARQUE' , 'ciudad_id' => 2]);
		Neighborhood::create(['nombre' => 'VÉLEZ SARSFIELD' , 'ciudad_id' => 2]);	

        
    }
			
	
}


class CityTableSeeder extends Seeder {
		
		public function run()
    {
        DB::table('cities')->delete();

        City::create(['nombre' => 'MAR DEL PLATA' , 'provincia_id' => 1]);
		City::create(['nombre' => 'CAPITAL FEDERAL' , 'provincia_id' => 1]);
		City::create(['nombre' => 'NECOCHEA' , 'provincia_id' => 1]);
		City::create(['nombre' => 'MIRAMAR' , 'provincia_id' => 1]);
		City::create(['nombre' => 'PINAMAR' , 'provincia_id' => 1]);
		City::create(['nombre' => 'CARILO' , 'provincia_id' => 1]);
		City::create(['nombre' => 'MAR DE LAS PAMPAS' , 'provincia_id' => 1]);
		City::create(['nombre' => 'MAR DE AJÓ' , 'provincia_id' => 1]);
    }
}



class ProvinceTableSeeder extends Seeder {
		
		public function run()
    {
        DB::table('provinces')->delete();

        Province::create(['nombre' => 'BUENOS AIRES']);
    }
}

class OperationTableSeeder extends Seeder {
		
		public function run()
    {
        DB::table('operations')->delete();

        Operation::create(['nombre' => 'ALQUILER']);
		Operation::create(['nombre' => 'ALQUILER TEMPORARIO']);
		Operation::create(['nombre' => 'VENTA']);
	}
}

class PropertyTypeTableSeeder extends Seeder {
		
		public function run()
    {
        DB::table('property_types')->delete();

        PropertyType::create(['nombre' => 'DEPARTAMENTO']);
		PropertyType::create(['nombre' => 'CHALET']);
		PropertyType::create(['nombre' => 'PH-DUPLEX']);
		PropertyType::create(['nombre' => 'LOTE']);
		PropertyType::create(['nombre' => 'GALPÓN']);
		PropertyType::create(['nombre' => 'LOCALES']);
		PropertyType::create(['nombre' => 'OFICINAS']);
		PropertyType::create(['nombre' => 'FONDO DE COMERCIO']);
		PropertyType::create(['nombre' => 'COCHERA']);
		PropertyType::create(['nombre' => 'OTROS']);
	}
}

class PropertyStateTableSeeder extends Seeder {
		
		public function run()
    {
        DB::table('property_states')->delete();

        PropertyState::create(['nombre' => 'DISPONIBLE']);
		PropertyState::create(['nombre' => 'RESERVADO']);
		PropertyState::create(['nombre' => 'ALQUILADO']);
		PropertyState::create(['nombre' => 'VENDIDO']);
	}
}