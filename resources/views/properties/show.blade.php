@extends('layouts.master')

@section('js')
<script src="{{ asset('js/jquery.fullscreenslides.min.js') }}"></script>
<script src="{{ asset('js/jquery.share.js') }}"></script>
<script>
	$('#social').share({
			networks: ['facebook','twitter','googleplus'],
			orientation: 'vertical',
			affix: 'right center'
		});

	
	
		
		
		$('.image img').fullscreenslides();
		
	/*	
	$('#submitForm').click(function(e){
			
			e.preventDefault();
			
			$.post('http://barg.com.fetux.com/ajax/form-contacto.php',$('#form-contacto').serialize(),function(response){
				
				$('#form-contacto-response').html(response);
				
			});
			
		});
		*/
	
</script>
@endsection

@section('css')
<link href="{{ asset('css/properties/show.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.share.css') }}" rel="stylesheet">
<!--<link href="{{ asset('css/properties/print.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/fullscreenstyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-header">
	<div class="row">
		<div class="col-xs-12">
			
			<h1 class="pull-left">{{strtoupper($property->ref)}}</h1>
		
			@if ($property->mostrar_precio)
			<h1 class="pull-right precio">{{ ($property->moneda) ? 'US$' : '$' }} {{number_format($property->precio,0,',','.')}}</h1>
			@else
			<h1 class="label pull-right precio" >Consulte precio</h1>
			@endif
			
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-sm-12 col-md-6">
			<a id="carousel" class="titulo"></a>
			<!-- Carousel de imágenes del inmueble -->
			<div class="ribbon">
				<?php
					switch($property->estado->nombre) {
						case "Disponible" :
							//echo '<span class="estado label label-success pull-right">Disponible</span>';
							break;
						case "Reservado" :
							echo '<img src="'.url('img/ribbon-reservado.png').'">';
							break;
						case "Alquilado" :
							echo '<img src="'.url('img/ribbon-alquilado.png').'">';
							break;
						case "Vendido" :
							echo '<img src="'.url('img/ribbon-alquilado.png').'">';
							break;
					}
				?>				
			</div>
			
			<div id="carousel-property" class="carousel slide" data-ride="carousel">
				
			
				<?php $i=0 ?>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					@foreach ($property->images as $image)
					<div class="item <?= ($i++ == 0) ? 'active' : '' ?> image">
						<a href="{{url($image->slide_url)}}" rel="gallery">
							<img src="{{url($image->slide_url)}}" width="550" height="300">
						</a>
					</div>
					@endforeach
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-property" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Anterior</span> </a>
				<a class="right carousel-control" href="#carousel-property" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Siguiente</span> </a>
			</div>

		</div>

		<div class="col-sm-12 col-md-6">

			<div role="tabpanel">
				@if(Auth::check())
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#caracteristicas" aria-controls="caracteristicas" role="tab" data-toggle="tab">Caracteristicas</a>
					</li>
					<li role="presentation">
						<a href="#duenio" aria-controls="duenio" role="tab" data-toggle="tab">Datos del due&ntilde;o</a>
					</li>
				</ul>
				@else
				<h3>Caracteristicas</h3>
				@endif
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="caracteristicas">
						<!--<h3 class="text-center"><b>Caracter&iacute;sticas</b></h3>-->
						<table class="table table-responsive">
							<thead>

							</thead>
							<tbody>
								<tr>
									<th>Direcci&oacute;n</th><td>{{$property->direccion}}</td>
								</tr>
								<tr>
									<th>Superficie</th><td>{{$property->superficie}} m2</td>
								</tr>
								<tr>
									<th>Ambientes</th><td>{{$property->ambientes}}</td>
								</tr>
								<tr>
									<th>Cochera</th><td>{{$property->cochera ? 'Sí' : 'No' }}</td>
								</tr>
								<tr>
									<th>Amueblado</th><td>{{$property->amueblado ? 'Sí' : 'No' }}</td>
								</tr>
								<tr>
									<th>Disposici&oacute;n</th><td>{{$property->disposicion}}</td>
								</tr>
							</tbody>
						</table>

					</div>
					@if(Auth::check())
					<div role="tabpanel" class="tab-pane fade" id="duenio">
						<!--<h3 class="text-center"><b>Caracter&iacute;sticas</b></h3>-->
						<table class="table table-responsive">
							<thead>

							</thead>
							<tbody>
								<tr>
									<th>Nombre</th><td>{{$property->nombre_duenio}}</td>
								</tr>
								<tr>
									<th>Provincia</th><td>{{$property->provincia_duenio}}</td>
								</tr>
								<tr>
									<th>Ciudad</th><td>{{$property->ciudad_duenio}}</td>
								</tr>
								<tr>
									<th>Direcci&oacute;n</th><td>{{$property->direccion_duenio}}</td>
								</tr>

								<tr>
									<th>Telefono 1</th><td>{{$property->tel1_duenio}}</td>
								</tr>
								<tr>
									<th>Telefono 2</th><td>{{$property->tel2_duenio}}</td>
								</tr>
								<tr>
									<th>Telefono 3</th><td>{{$property->tel3_duenio}}</td>
								</tr>
								<tr>
									<th>Telefono 4</th><td>{{$property->tel4_duenio}}</td>
								</tr>
								<tr>
									<th>Casillero de llaves</th><td>{{$property->llaves}}</td>
								</tr>
								<tr>
									<th>Observaciones</th><td>{{$property->observaciones_duenio}}</td>
								</tr>
							</tbody>
						</table>

					</div>
					@endif
				</div>

			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<a name="descripcion" class="titulo"></a>
			<!-- <h3 class="text-center"><b>Descripción</b></h3> -->
			<p id="descripcion">
				{{$property->descripcion}}
			</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12 text-center">
			<a id="print-btn" class="btn btn-barg" href="{{url('propiedad/'.$property->id.'/imprimir')}}" target="_blank">IMPRIMIR</a>
		</div>
	</div>

{!! Form::open(array('action'=>'PropertyController@sendContactForm', 'class'=>'form-horizontal')) !!}	
<!--<form class="form-horizontal" id="form-contacto">-->
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<a name="ubicacion" class="titulo"></a>
			<!-- <h3 class="text-center"><b>Ubicación</b></h3>-->
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3142.7677747065636!2d-57.53682500000002!3d-38.02919300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9584ddcc013af0d5%3A0x2e0b7a36af942cd5!2s{{str_replace(' ','+',$property->direccion)}}%2C+Mar+del+Plata%2C+Buenos+Aires!5e0!3m2!1sen!2sar!4v1428542480706"></iframe>
		</div>
		
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<div class="input-group col-xs-10 col-xs-offset-1 ">
					<span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
					<input name="nombre" type="text" class="form-control" placeholder="Nombre Completo" aria-describedby="basic-addon1">
				</div>
			</div>

			<div class="form-group">
				<div class="input-group col-xs-10 col-xs-offset-1">
					<span class="input-group-addon glyphicon glyphicon-envelope" id="basic-addon1"></span>
					<input name="email" type="email" class="form-control" placeholder="Correo Electronico" aria-describedby="basic-addon1">
				</div>
			</div>

			<div class="form-group">
				<div class="input-group col-xs-10 col-xs-offset-1">
					<span class="input-group-addon glyphicon glyphicon-phone" id="basic-addon1"></span>
					<input name="tel" type="text" class="form-control" placeholder="Telefono" aria-describedby="basic-addon1">
				</div>
			</div>
		</div>
	
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<textarea name="msje" class="form-control" rows="5" placeholder="Escriba su consulta por esta Propiedad"></textarea>
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-5">
			<div class="form-group text-center">
				<input type="hidden" name="id" value="{{$property->id}}">
				<input type="hidden" name="propiedad" value="{{$property->ref}}">
				<input type="hidden" name="operacion" value="{{$property->operacion->nombre}}">
				<button id="submitForm" type="submit" class="btn btn-default">
					Enviar
				</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div id="form-contacto-response" class="pull-right"> </div>
		</div>
	</div>
</form>

<div id="social"> </div>

<div id="confirm_delete" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Eliminar Propiedad</h4>
			</div>
			<div class="modal-body text-center">
				<p>
					¿Esta seguro que desea eliminar <b>{{$property->ref}}</b> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					NO
				</button>
				{!! Form::open(array('action'=> array('PropertyController@destroy',$property->id), 'files' => true, 'method' => 'delete','id'=>'form-delete')) !!}
				<button type="submit" class="btn btn-primary">
					SI
				</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@Overwrite