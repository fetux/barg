<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use DNS2D;
use PDF;
use Auth;

use App\Property;
use App\Province;
use App\City;
use App\Neighborhood;
use App\Operation;
use App\PropertyType;
use App\PropertyState;
use App\PropertyImage;
use App\Subscriber;


class PropertyController extends Controller {




	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//$prom_properties = Property::where('destacada','=',1)->get();

		$provinces = Province::all();
		$cities = City::all();
		$neighborhoods = Neighborhood::all();
		$operations = Operation::all();
		$types = PropertyType::all();



		return view('properties.index')
			//->withPromProperties($prom_properties)
			->withProvinces($provinces)
			->withCities($cities)
			->withNeighborhoods($neighborhoods)
			->withOperations($operations)
			->withTypes($types);
	}

	public function printView($p=NULL)
	{
		if($p!=NULL)
        {
            $property = Property::find($p);
            //if (Auth::check())
            //    return PDF::loadView('properties.print', compact('property'))->setPaper('a4')->setOrientation('landscape')->stream('salida.pdf');

            return view('properties.print')->withProperty($property);
        }


	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{



		$provinces = Province::all();
		$cities = City::all();
		$neighborhoods = Neighborhood::all();
		/*
		try{
			$client = new \SoapClient("http://gisdesa.mardelplata.gob.ar/opendata/ws.php?wsdl");
			$neighbors = $client->__soapCall('barrios',array('token'=>'wwfe345gQ3ed5T67g4Dase45F6fer'));

			$nn = array();

			sort($nn);

			foreach($neighbors as $b)

				$nn[] = $b->descripcion;

			sort($nn);
			foreach ($nn as $value) {
				echo "Neighborhood::create(['nombre' => '".$value."' , 'ciudad_id' => 1]);\n";
			}
		}
		catch(Exception $e){
			var_dump($e->getMessage());
		}
		*/
		$operations = Operation::all();
		$types = PropertyType::all();
		$states = PropertyState::all();


		return view('properties.create')->withProvinces($provinces)->withCities($cities)->withNeighborhoods($neighborhoods)->withOperations($operations)->withTypes($types)->withStates($states);
	}

	public function subscribe(Request $request)
	{

		$messages = [
		    'required' => 'Obligatorio.',
		    'email.unique' => 'Ya existe esta dirección de correo electrónico en nuestra base de datos.',
		];

		$v = Validator::make($request->all(), [
			'email' => 'required|unique:subscribers',
	    ],$messages);

		if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())->withInput();
	    }

		$subscriber = new Subscriber;
		$subscriber->email = $request->input('email');
		$subscriber->type = 0;
		$subscriber->save();

		return redirect('/suscripcion_enviada');


	}

	public function viewSubscribers($newsletter = -1, $ipp = 15){

		switch ($newsletter){
			case -1:
				$subscribers = \App\Subscriber::paginate($ipp);
				break;
			case 0:
				$subscribers = \App\Subscriber::where('type', '=', 0)->paginate($ipp);
				break;
			case 1:
				$subscribers = \App\Subscriber::where('type', '=', 1)->paginate($ipp);
				break;
			case 2:
				$subscribers = \App\Subscriber::where('type', '=', 2)->paginate($ipp);
				break;
		}

		return view('subscribers.index')->withSubscribers($subscribers);

	}

	public function downloadSubscribers($newsletter = -1){

		switch ($newsletter){
			case -1:
				$subscribers = Subscriber::all();
				break;
			case 0:
				$subscribers = Subscriber::where('type', '=', 0)->get();
				break;
			case 1:
				$subscribers = Subscriber::where('type', '=', 1)->get();
				break;
			case 2:
				$subscribers = Subscriber::where('type', '=', 2)->get();
				break;
			default:
				$subscribers = array();
				break;
		}

		$i = 0;
		foreach($subscribers as $s){
			if (count($subscribers) != ++$i)
				echo $s->email.',';
			else {
				echo $s->email;
			}
		}

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$messages = [
		    'required' => 'Obligatorio.',
		    'ref.unique' => 'Ya existe una Propiedad con esa Referencia.',
		    'max' => 'Máx: :max',
		    'images.min' => 'Debe seleccionar al menos 3 imágenes'
		];

		$v = Validator::make($request->all(), [
			'provincia' => 'required',
			'ciudad' => 'required',
			'barrio' => 'required',
			'direccion' => 'required',
			'superficie' => 'required',
	        'ambientes' => 'required',
	        'cochera' => 'required',
	        'amueblado' => 'required',
	        'disposicion' => 'required',
	        'descripcion' => 'required',
	    	'images' => 'required|array|min:3',

			'operacion' => 'required',
			'tipo' => 'required',
			'estado' => 'required',
	        'ref' => 'required|unique:properties|max:255',
	        'moneda' => 'required',
	        'precio' => 'required',
	        'mostrar_precio' => 'required',
	        'destacada' => 'required|max:45',

	        'carteleraT' => 'max:28',
	        'cartelera1' => 'max:90',
	        'cartelera2' => 'max:90',
	        'cartelera3' => 'max:90',
	        'cartelera4' => 'max:90',


			'nombre_duenio' => 'required',
			'provincia_duenio' => 'required',
			'ciudad_duenio' => 'required',
			'codpostal_duenio' => 'required',
	    ],$messages);

		if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())->withInput();
	    }

		$property = new Property;

		$property->provincia_id = $request->input('provincia');
		$property->ciudad_id = $request->input('ciudad');
		$property->barrio_id = $request->input('barrio') == 0 ? NULL :  $request->input('barrio');
		$property->direccion = $request->input('direccion');
		$property->operacion_id = $request->input('operacion');
		$property->tipo_id = $request->input('tipo');
		$property->estado_id = $request->input('estado');
		$property->ref = $request->input('ref');
		$property->moneda = $request->input('moneda');
		$property->precio = $request->input('precio');
		$property->mostrar_precio = $request->input('mostrar_precio');
		$property->superficie = $request->input('superficie');
		$property->ambientes = $request->input('ambientes');
		$property->cochera = $request->input('cochera');
		$property->amueblado = $request->input('amueblado');
		$property->disposicion = $request->input('disposicion');
		$property->descripcion = $request->input('descripcion');
		$property->destacada = $request->input('destacada');

		$property->carteleraT = $request->input('carteleraT');
		$property->cartelera1 = $request->input('cartelera1');
		$property->cartelera2 = $request->input('cartelera2');
		$property->cartelera3 = $request->input('cartelera3');
		$property->cartelera4 = $request->input('cartelera4');


		$property->nombre_duenio = $request->input('nombre_duenio');
		$property->provincia_duenio = $request->input('provincia_duenio');
		$property->ciudad_duenio = $request->input('ciudad_duenio');
		$property->direccion_duenio = $request->input('direccion_duenio');
		$property->codpostal_duenio = $request->input('codpostal_duenio');
		$property->tel1_duenio= $request->input('tel1_duenio');
		$property->tel2_duenio = $request->input('tel2_duenio');
		$property->tel3_duenio = $request->input('tel3_duenio');
		$property->tel4_duenio = $request->input('tel4_duenio');
		$property->observaciones_duenio = $request->input('observaciones_duenio');
		$property->llaves = $request->input('llaves');



		$images = $this->saveImagesFromInput($request,$files = $request->file('images'),$property->ref);


		$property->save();
		$property->images()->saveMany($images);

		// $property->barcode_url = DNS2D::getBarcodePNGPath("http://www.gerardobarg.com/propiedad/".$property->id, "QRCODE");

		$property->save(); // To update barcode_url

		return redirect('propiedad/'.$property->id);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,$s = NULL)
	{
		// Muestra la ficha de una propiedad especifica

		$p = Property::find($id);

		if ($p != NULL){
			if($s == 'mensaje_enviado') {
				return view('properties.show')->withProperty($p)->withStatus('mensaje_enviado');
			}
			else {
				return view('properties.show')->withProperty($p);
			}
		} else {
			return view('properties.404');
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$p = Property::find($id);

		if ($p != NULL){

			$provinces = Province::all();
			$cities = City::all();
			$neighborhoods = Neighborhood::all();
			/*
			try{
				$client = new \SoapClient("http://gisdesa.mardelplata.gob.ar/opendata/ws.php?wsdl");
				$neighborhoods = $client->__soapCall('barrios',array('token'=>'wwfe345gQ3ed5T67g4Dase45F6fer'));
				//foreach($neighborhoods as $b)
				//	var_dump($b);
			}
			catch(Exception $e){
				var_dump($e->getMessage());
			}
			*/
			$operations = Operation::all();
			$types = PropertyType::all();
			$states = PropertyState::all();

			return view('properties.edit')->withProvinces($provinces)->withCities($cities)->withNeighborhoods($neighborhoods)->withOperations($operations)->withTypes($types)->withStates($states)->withProperty($p);
		} else {
			return view('properties.404');
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//
		$property = Property::find($id);

		if ($property != NULL){

			$messages = [
			    'required' => 'Obligatorio.',
			    'ref.unique' => 'Ya existe una Propiedad con esa Referencia.',
			    'max' => 'Máx: :max'
			];

			$v = Validator::make($request->all(), [
				'provincia' => 'required',
				'ciudad' => 'required',
				'barrio' => 'required',
				'direccion' => 'required',
				'superficie' => 'required',
		        'ambientes' => 'required',
		        'cochera' => 'required',
		        'amueblado' => 'required',
		        'disposicion' => 'required',
		        'descripcion' => 'required',
		    	//'images' => 'required|array',

				'operacion' => 'required',
				'tipo' => 'required',
				'estado' => 'required',
		        //'ref' => 'required|max:255',
		        'moneda' => 'required',
		        'precio' => 'required',
		        'mostrar_precio' => 'required',
		        'destacada' => 'required',

		        'carteleraT' => 'max:28',
		        'cartelera1' => 'max:90',
		        'cartelera2' => 'max:90',
		        'cartelera3' => 'max:90',
		        'cartelera4' => 'max:90',

				'nombre_duenio' => 'required',
				'provincia_duenio' => 'required',
				'ciudad_duenio' => 'required',
				'codpostal_duenio' => 'required',
		    ],$messages);

			if ($v->fails())
		    {
		        return redirect()->back()->withErrors($v->errors())->withInput();
		    }


			$property->provincia_id = $request->input('provincia');
			$property->ciudad_id = $request->input('ciudad');
			$property->barrio_id = $request->input('barrio') == 0 ? NULL :  $request->input('barrio');
			$property->direccion = $request->input('direccion');
			$property->operacion_id = $request->input('operacion');
			$property->tipo_id = $request->input('tipo');
			$property->estado_id = $request->input('estado');
			//$property->ref = $request->input('ref');
			$property->moneda = $request->input('moneda');
			$property->precio = $request->input('precio');
			$property->mostrar_precio = $request->input('mostrar_precio');
			$property->superficie = $request->input('superficie');
			$property->ambientes = $request->input('ambientes');
			$property->cochera = $request->input('cochera');
			$property->amueblado = $request->input('amueblado');
			$property->disposicion = $request->input('disposicion');
			$property->descripcion = $request->input('descripcion');
			$property->destacada = $request->input('destacada');

			$property->carteleraT = $request->input('carteleraT');
			$property->cartelera1 = $request->input('cartelera1');
			$property->cartelera2 = $request->input('cartelera2');
			$property->cartelera3 = $request->input('cartelera3');
			$property->cartelera4 = $request->input('cartelera4');

			$property->nombre_duenio = $request->input('nombre_duenio');
			$property->provincia_duenio = $request->input('provincia_duenio');
			$property->ciudad_duenio = $request->input('ciudad_duenio');
			$property->direccion_duenio = $request->input('direccion_duenio');
			$property->codpostal_duenio = $request->input('codpostal_duenio');
			$property->tel1_duenio= $request->input('tel1_duenio');
			$property->tel2_duenio = $request->input('tel2_duenio');
			$property->tel3_duenio = $request->input('tel3_duenio');
			$property->tel4_duenio = $request->input('tel4_duenio');
			$property->observaciones_duenio = $request->input('observaciones_duenio');
			$property->llaves = $request->input('llaves');


			// Handle images update
			$toUploadImages = $request->file('images');
			if (!empty($toUploadImages) && $toUploadImages[0] != NULL){
			    $this->deleteImageFiles($property->id,$property->ref);
			    $images = $this->saveImagesFromInput($request,$request->file('images'),$property->ref);
                $property->images()->saveMany($images);
			}

			$property->save();

			return redirect('propiedad/'.$property->id);

		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		$p = Property::find($id);

		if ($p != NULL){

			$destinationPath = 'uploads/properties-images/'.str_replace('/', '-', str_replace(' ', '-',$p->ref));
			exec("rm -rf ".$destinationPath);
			foreach ($p->images() as $image){
				$image->property()->dissociate();
				$image->save();
			}
			$p->delete();
		}

		return redirect('/');
	}

	public function paginate($ipp = 3, $where = NULL)
	{
		if ($where == NULL)
		{
			$properties =  Property::paginate($ipp);

		}
		else {

			$where = explode('-',$where);

			switch (count($where)) {

				case 1: // Operacion
					$properties = Property::where('operacion_id', '=', $where[0])->paginate($ipp);
					break;

				/*
				case 2: // Provincia
					$properties = Property::where('operacion_id', '=', $where[0])
											->where('provincia_id', '=', $where[1])
											->paginate($ipp);
					break;
				case 3: // Ciudad
					$properties = Property::where('operacion_id', '=', $where[0])
											->where('provincia_id', '=', $where[1])
											->where('ciudad_id', '=', $where[2])
											->paginate($ipp);
					break;
				case 4: // Barrio
					$properties = Property::where('operacion_id', '=', $where[0])
											->where('provincia_id', '=', $where[1])
											->where('ciudad_id', '=', $where[2])
											->where('barrio_id', '=', $where[3])
											->paginate($ipp);
					break;
				 *
				 *
				 */
				case 2: // Tipo de propiedad
					$properties = Property::where('operacion_id', '=', $where[0])
											//->where('provincia_id', '=', $where[1])
											//->where('ciudad_id', '=', $where[2])
											//->where('barrio_id', '=', $where[3])
											->where('tipo_id', '=', isset($where[1]) ? $where[1] : '%')
											->paginate($ipp);
					break;
				case 3: // Cantidad de ambientes

				    if (isset($where[2]) && $where[2] == 5) {
				        $properties = Property::where('operacion_id', '=', $where[0])
                                                //->where('provincia_id', '=', $where[1])
                                                //->where('ciudad_id', '=', $where[2])
                                                //->where('barrio_id', '=', $where[3])
                                                ->where('tipo_id', '=', $where[1])
                                                ->where('ambientes', '>=', 5)
                                                ->paginate($ipp);
				    }
                    else {
                        $properties = Property::where('operacion_id', '=', $where[0])
                                                //->where('provincia_id', '=', $where[1])
                                                //->where('ciudad_id', '=', $where[2])
                                                //->where('barrio_id', '=', $where[3])
                                                ->where('tipo_id', '=', $where[1])
                                                ->where('ambientes', '=', isset($where[2]) ? $where[2] : '%')
                                                ->paginate($ipp);
                    }
					break;

			}

		}

		$properties->load("provincia","ciudad","barrio","operacion","tipo","estado","images");
		return $properties;
	}


	public function sendContactForm(Request $request)
	{

		$messages = [
		    'required' => 'Obligatorio.',
		];

		$v = Validator::make($request->all(), [
			'email' => 'required|unique:subscribers'
		],$messages);

		if (!$v->fails())
	    {
	        switch ($request->input('operacion')) {
				case 'ALQUILER':
					$operacion = 1;
					break;
				case 'VENTA':
					$operacion = 2;
					break;
				case 'ALQUILER TEMPORARIO':
					$operacion = 3;
				default:
					$operacion = 0;
					break;
			}

			$subscriber = new Subscriber;
			$subscriber->email = $request->input('email');
			$subscriber->type = $operacion;
			$subscriber->save();
	    }

		$v = Validator::make($request->all(), [
			'email' => 'required',
			'nombre' => 'required',
			'msje' => 'required',
	    ],$messages);

		if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v)->withInput();
	    }

		$fecha = date("d-M-y H:i");
		  $mymail = "info@gerardobarg.com.ar";
		$subject = "Nuevo Contacto desde Barg.com";


		$contenido = "Consulta por la Propiedad: " . $request->input('propiedad');;
		$contenido .= "-------- \n";
		$contenido .= "-------- \n";
		$contenido .= "Datos: \n";
		$contenido .= "-------- \n";
		$contenido .= "\n";
		$contenido .= "Nombre: " .$request->input('nombre'). "\n";
		$contenido .= "\n";
		$contenido .= "Correo electronico: " .$request->input('email'). "\n";
		$contenido .= "\n";
		$contenido .= "Telefono: " .$request->input('tel'). "\n";
		$contenido .= "\n";

		$contenido .= "Mensaje: \n";
		$contenido .= "---------- \n";
		$contenido .= $request->input('msje'). "\n";
		$contenido .= "\n";
		$contenido .= "Enviado el ".$fecha." desde el sitio web";

		$header = "From: ".$request->input('email')."\n";
        $header .= "Reply-To: ".$request->input('email')."\n";
		$header .= "X-Mailer: PHP/".phpversion()."\n";
		$header .= "Mime-Version: 1.0\n";
		$header .= "Content-Type: text/plain";
	    mail($mymail, $subject, utf8_decode($contenido) ,$header);


		return redirect('/propiedad/'.$request->input('id').'/mensaje_enviado');


	}

    public function showContactMessage($propertyId)
    {
        $p = Property::find($propertyId);
        return view('properties.message_sent')->withProperty($p);
    }

    public function showSuscriptionMessage()
    {
        return view('properties.suscription_sent');
    }

    private function saveImagesFromInput($request,$files,$ref)
    {

        $images = array();
        $i=0;

        $destinationPath = 'uploads/properties-images/'.str_replace('/', '-', str_replace(' ', '-',$ref));
        mkdir(public_path($destinationPath));
        mkdir($destinationPath.'/slideshow-550-300/');
        mkdir($destinationPath.'/thumbs-160-120/');
        mkdir($destinationPath.'/thumbs-330-140/');
        foreach($files as $file) {


                $filename = str_replace('/', '-', str_replace(' ', '-',$ref)).'-'.++$i.'.'.$file->getClientOriginalExtension();
                $upload_success = $file->move(public_path($destinationPath), $filename);



                $url0 = $destinationPath.'/slideshow-550-300/'.'slide-'.$filename;
                $thumbpath0 = public_path($url0);
                Image::make(public_path($destinationPath.'/'.$filename))->widen(550)->crop(550, 300)->save($thumbpath0);


                $url1 = $destinationPath.'/thumbs-160-120/'.'thumb-'.$filename;
                $thumbpath1 = public_path($url1);
                Image::make(public_path($destinationPath.'/'.$filename))->widen(160)->crop(160, 120)->save($thumbpath1);


                $url2 = $destinationPath.'/thumbs-330-140/'.'thumb-'.$filename;
                $thumbpath2 = public_path($url2);
                Image::make(public_path($destinationPath.'/'.$filename))->widen(330)->crop(330, 140)->save($thumbpath2);

                $images[] = new PropertyImage(['url' => $destinationPath.'/'.$filename , 'slide_url' => $url0 ,'thumb_url' => $url1 , 'thumb2_url' => $url2]);
        }

        return $images;
    }

    private function deleteImageFiles($propertyId,$ref)
    {
       $imagesPath = 'uploads/properties-images/'.str_replace('/', '-', str_replace(' ', '-',$ref));

       if(is_dir($imagesPath)){
           exec("rm -rf ".public_path($imagesPath));
           PropertyImage::where('property_id', '=', $propertyId)->delete();
       }


    }

}
