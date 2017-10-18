<!DOCTYPE html>
<html lang="en">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="">
		    <meta name="author" content="">
		    <link rel="icon" href="http://www.gerardobarg.com.ar/favicon.ico">

		    <title>Inmobiliaria Gerardo E. Barg</title>





		   	@if (Auth::check())
			    <link href="{{asset('css/properties/printadmin.css')}}" rel="stylesheet" media="all">
			@else
			    <!-- Bootstrap core CSS -->
                <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
				<link href="{{asset('css/properties/print.css')}}" rel="stylesheet" media="all">
			@endif
			<link href="{{asset('css/properties/printprop.css')}}" rel="stylesheet" media="all">

	</head>
	<body>
		<div class="container-fluid">
		@if (Auth::check())
      <header>
  		  <h1>{{$property->carteleraT}}</h1>
  		  <img id="banner" src="{{ asset('img/lineas.png') }}">
      </header>

      <main>
        <div class="content left">
          <img class="foto" src="{{ url($property->images[0]->url) }}"/>
          <img class="foto" src="{{ url($property->images[0]->url) }}"/>
          <img class="foto" src="{{ url($property->images[0]->url) }}"/>
        </div>
        <div  class="content right">
          <p>{{ $property->descripcion }}</p>
        </div>
      </main>




      <footer>
        <img id="qr" src="{{ url($property->barcode_url)}}"/>
        <img id="map" src="https://maps.googleapis.com/maps/api/staticmap?zoom=16&size=300x150&maptype=roadmap&markers=color:red%7C{{str_replace(' ','%20',$property->direccion)}}%20Mar%20del%20Plata%20Buenos%20Aires&key=AIzaSyAOzBt0WZNxFn4mk9OVw8zkY2Gi1IU2XJY" />
        <img id="logo" src="{{ asset('img/logo-barg.png') }}"/>
		  </footer>
		@else
			<div class="row">
				<div class="col-xs-12">
					<h1 class="pull-left">{{$property->ref}} - {{$property->barrio->nombre}}</h1>
					@if ($property->mostrar_precio)
						<h1 class="pull-right precio">{{ ($property->moneda) ? 'US$' : '$' }} {{$property->precio}}</h1>
					@else
						<h1 class="label pull-right precio">Consulte precio</h1>
					@endif
				</div>
			</div>
			<div class="row">
				<div class"col-xs-12">
					<img class="separador" src="{{ asset('img/lineas.png') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p>{{ $property->descripcion}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<img class="img-responsive foto" src="{{ url($property->images[0]->url) }}"/>
				</div>
				<div class="col-xs-3">
					<div class="row">
						<div class="col-xs-12">
							<img class="img-responsive foto" src="{{ url($property->images[1]->url) }}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<img class="img-responsive foto" src="{{ url($property->images[2]->url) }}"/>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<img class="foto logo pull-left" src="{{ asset('img/logo-barg.png') }}" height="100"/>
				</div>
				<div class="col-xs-6">
					<p class="datos-oficina text-right">
						Lamadrid 2546 | Mar del Plata
						<br>
						TelFax
						<b>(0223) 4916268 / 9468</b>
						<br>
						info@gerardobarg.com.ar
						http://www.gerardobarg.com
					</p>
				</div>
				<div class="col-xs-2">
					<img class="qr pull-right" src="{{ url($property->barcode_url)}}" height="100"/>
				</div>
			</div>
		@endif
	</div><!--end container -->
	</body>
</html>

