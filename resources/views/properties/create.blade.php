@extends('layouts.master')

@section('css')
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/css/bootstrap-select.min.css" rel="stylesheet">
<link href="{{ asset('css/properties/create.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/create.js') }}"></script>
@endsection

@section('content')



		{!! Form::open(array('action'=>'PropertyController@store', 'files' => true)) !!}

<div class="row">
	<div class="col-xs-12">
		<h3>Nueva Propiedad</h3>
	</div>
</div>
<!--
<div class="row">
	<div class="col-xs-12">


	</div>
</div>
-->
<div class="row">

	<div class="col-xs-12 col-md-4">


		<h5>Datos de la Propiedad</h5>

		<div class="form-group">
		    <label for="provincia" class="control-label">Provincia</label>
		    <select class="selectpicker form-control" id="provincia" name="provincia">
				@foreach ($provinces as $province)
				    <option value="{{ $province->id }}">{{ $province->nombre }}</option>
				@endforeach
			</select>


		</div>
		  <div class="form-group">
		    <label for="ciudad" class="control-label">Ciudad</label>
			    <select class="selectpicker form-control" id="ciudad" name="ciudad">
					@foreach ($cities as $city)
				    	<option value="{{ $city->id }}">{{ $city->nombre }}</option>
					@endforeach
				</select>

		  </div>
		  <div class="form-group">
		    <label for="barrio" class="control-label">Barrio</label>
		    <select class="selectpicker form-control" id="barrio" name="barrio" data-live-search="true"	data-size="6">
			  @foreach ($neighborhoods as $neighborhood)
				    <option value="{{$neighborhood->id}}" data-ciudad="{{$neighborhood->ciudad_id}}">{{$neighborhood->nombre}}</option>
			  @endforeach
			  <option value="0" data-ciudad="3">{{old('barrio')}}</option>
			  <option value="0" data-ciudad="4">--</option>
			  <option value="0" data-ciudad="5">--</option>
			  <option value="0" data-ciudad="6">--</option>
			  <option value="0" data-ciudad="7">--</option>
			  <option value="0" data-ciudad="8">--</option>
			</select>


		  </div>
		  <div class="form-group">
		  	<label for="direccion" class="control-label">Direcci&oacute;n</label>
			<input type="name" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}">
			@if ($errors->first('direccion'))
				<span class="label label-danger error">{{ $errors->first('direccion')}}</span>
			@endif
		  </div>

		  <div class="row">

		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="superficie" class="control-label">Sup. (m<sup>2)</sup></label>
					<input type="name" class="form-control" id="superficie" name="superficie" value="{{old('superficie')}}">
					@if ($errors->first('superficie'))
						<span class="label label-danger error">{{ $errors->first('superficie')}}</span>
					@endif
			  	</div>
		  	</div>

		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="ambientes" class="control-label">Ambientes</label>
					<input type="name" class="form-control" id="ambientes" name="ambientes" value="{{old('ambientes')}}">
					@if ($errors->first('ambientes'))
						<span class="label label-danger error">{{ $errors->first('ambientes')}}</span>
					@endif
				 </div>
		  	</div>

		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="amueblado" class="control-label">Amueblado</label>
				  	<div class="radio">
					  <label>
					    <input type="radio" name="amueblado" id="amueblado1" value="1" @if(old('amueblado') == "1") checked @endif>
					    Si
					  </label>
					  <label>
					    <input type="radio" name="amueblado" id="amueblado0" value="0" @if(old('amueblado') == "0") checked @endif>
					    No
					  </label>
					 </div>
					 @if ($errors->first('amueblado'))
						<span class="label label-danger error">{{ $errors->first('amueblado')}}</span>
					 @endif
				</div>
		  	</div>

		  </div>

		  <div class="row">

		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="cochera" class="control-label">Cochera</label>
			  		<div class="radio">
					  <label>
					    <input type="radio" name="cochera" id="cochera1" value="1" @if(old('cochera') == "1") checked @endif>
					    Si
					  </label>
					  <label>
					    <input type="radio" name="cochera" id="cochera0" value="0" @if(old('cochera') == "0") checked @endif>
					    No
					  </label>
					 </div>
					 @if ($errors->first('cochera'))
						<span class="label label-danger error">{{ $errors->first('cochera')}}</span>
					 @endif
				</div>
		  	</div>

		  	<div class="col-xs-8">
		  		<div class="form-group">
				  	<label for="disposicion" class="control-label">Disposicion</label>
					<input type="name" class="form-control" id="disposicion" name="disposicion" value="{{old('disposicion')}}">
					@if ($errors->first('disposicion'))
						<span class="label label-danger error">{{ $errors->first('disposicion')}}</span>
					@endif
				</div>
		  	</div>

		  </div>

		  <div class="form-group">
			<label for="descripcion" class="control-label">Descripcion</label>
			<textarea class="form-control" rows="4" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
			@if ($errors->first('descripcion'))
				<span class="label label-danger error">{{ $errors->first('descripcion')}}</span>
			@endif
		  </div>

		   <div class="form-group">
		  	<label for="images" class="control-label">Im&aacute;genes (Seleccione al menos 3)</label>
		  	<!--<input type="file" id="imagenes" name="imagenes[]" multiple="true">--->
		  	{!! Form::file('images[]', array('multiple'=>'multiple', 'class'=>'multi with-preview')) !!}
		  </div>
	       @if ($errors->first('images'))
                <span class="label label-danger error">{{ $errors->first('images')}}</span>
            @endif
	</div>
	<div class="col-xs-12 col-md-4">

		<h5>Datos de la Operaci&oacute;n</h5>

		<div class="form-group" >
		  	<label for="operacion" class="control-label">Operacion</label>
		    <select class="selectpicker form-control" id="operacion" name="operacion">
			  @foreach ($operations as $operation)
				    <option value="{{ $operation->id }}">{{ $operation->nombre }}</option>
			  @endforeach
			</select>
		  </div>
		  <div class="form-group" >
		  	<label for="tipo" class="control-label">Tipo</label>
		    <select class="selectpicker form-control" id="tipo" name="tipo">
			  @foreach ($types as $type)
				    <option value="{{ $type->id }}">{{ $type->nombre }}</option>
			  @endforeach
			</select>
		  </div>
		  <div class="form-group">
			<label for="estado" class="control-label">Estado</label>
			    <select class="selectpicker form-control" id="estado" name="estado">
			    	@foreach ($states as $state)
				    	<option value="{{ $state->id }}">{{ $state->nombre }}</option>
			  		@endforeach

				</select>
		  </div>
		  <div class="form-group">
		  	<label for="ref" class="control-label">Referencia</label>
			<input type="name" class="form-control" id="ref" name="ref" value="{{old('ref')}}">
			@if ($errors->first('ref'))
				<span class="label label-danger error">{{ $errors->first('ref')}}</span>
			@endif
		  </div>

		  <div class="row">

		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="moneda" class="control-label">Moneda</label>
					<div class="radio">
					  <label>
					    <input type="radio" name="moneda" id="moneda1" value="1" @if(old('moneda') == "1") checked @endif>
					    US$
					  </label>
					  <label>
					    <input type="radio" name="moneda" id="moneda0" value="0" @if(old('moneda') == "0") checked @endif>
					    $
					  </label>
					 </div>
					@if ($errors->first('moneda'))
						<span class="label label-danger error">{{ $errors->first('moneda')}}</span>
					@endif
				</div>
		  	</div>
		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="precio" class="control-label">Precio</label>
					<input type="name" class="form-control" id="precio" name="precio" value="{{old('precio')}}">
					@if ($errors->first('precio'))
						<span class="label label-danger error">{{ $errors->first('precio')}}</span>
					@endif
				</div>
		  	</div>
		  	<div class="col-xs-4">
		  		<div class="form-group">
				  	<label for="mostrar_precio" class="control-label">Visibile?</label>
					<div class="radio">
					  <label>
					    <input type="radio" name="mostrar_precio" id="mostrar_precio1" value="1" @if(old('mostrar_precio') == "1") checked @endif>
					    Si
					  </label>
					  <label>
					    <input type="radio" name="mostrar_precio" id="mostrar_precio0" value="0" @if(old('mostrar_precio') == "0") checked @endif>
					    No
					  </label>
					</div>
					@if ($errors->first('mostrar_precio'))
						<span class="label label-danger error">{{ $errors->first('mostrar_precio')}}</span>
					@endif
				</div>
		  	</div>

		  </div>







		  <div class="form-group">
		  	<label for="destacada" class="control-label">Destacar esta propiedad?</label>
			<div class="radio">
			  <label>
			    <input type="radio" name="destacada" id="destacada1" value="1" @if(old('destacada') == "1") checked @endif>
			    Si
			  </label>
			  <label>
			    <input type="radio" name="destacada" id="destacada0" value="0" @if(old('destacada') == "0") checked @endif>
			    No
			  </label>
			 </div>
			 @if ($errors->first('destacada'))
				<span class="label label-danger error">{{ $errors->first('destacada')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		  	<label for="carteleraT" class="control-label">Cartelera (T&iacute;tulo)</label>
			<input type="text" class="form-control" id="carteleraT" name="carteleraT" value="{{old('carteleraT')}}" maxlength="28">
			@if ($errors->first('carteleraT'))
				<span class="label label-danger error">{{ $errors->first('carteleraT')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		  	<label for="cartelera1" class="control-label">Cartelera (1er Parrafo)</label>
			<input type="text" class="form-control" id="cartelera1" name="cartelera1" value="{{old('cartelera1')}}" maxlength="60">
			@if ($errors->first('cartelera1'))
				<span class="label label-danger error">{{ $errors->first('cartelera1')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		  	<label for="cartelera2" class="control-label">Cartelera (2do Parrafo)</label>
			<input type="text" class="form-control" id="cartelera2" name="cartelera2" value="{{old('cartelera2')}}" maxlength="60">
			@if ($errors->first('cartelera2'))
				<span class="label label-danger error">{{ $errors->first('cartelera2')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		  	<label for="cartelera3" class="control-label">Cartelera (3er Parrafo)</label>
			<input type="text" class="form-control" id="cartelera3" name="cartelera3" value="{{old('cartelera3')}}" maxlength="60">
			@if ($errors->first('cartelera3'))
				<span class="label label-danger error">{{ $errors->first('cartelera3')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		  	<label for="cartelera4" class="control-label">Cartelera (4to Parrafo)</label>
			<input type="text" class="form-control" id="cartelera4" name="cartelera4" value="{{old('cartelera4')}}" maxlength="45">
			@if ($errors->first('cartelera4'))
				<span class="label label-danger error">{{ $errors->first('cartelera4')}}</span>
			@endif
		  </div>


	</div>
	<div class="col-xs-12 col-md-4">
		<h5>Datos del due&ntilde;o de la Propiedad</h5>
		  <div class="form-group">
		  	<label for="nombre_duenio" class="control-label">Nombre y Apellido</label>
			<input type="name" class="form-control" id="nombre_duenio" name="nombre_duenio" value="{{old('nombre_duenio')}}">
			@if ($errors->first('nombre_duenio'))
				<span class="label label-danger error">{{ $errors->first('nombre_duenio')}}</span>
			@endif
		  </div>
		  <div class="form-group">
		  	<label for="provincia_duenio" class="control-label">Provincia</label>
			<input type="name" class="form-control" id="provincia_duenio" name="provincia_duenio" value="{{old('provincia_duenio')}}">
			@if ($errors->first('provincia_duenio'))
				<span class="label label-danger error">{{ $errors->first('provincia_duenio')}}</span>
			@endif
		  </div>
		  <div class="form-group">
		  	<label for="ciudad_duenio" class="control-label">Ciudad</label>
			<input type="name" class="form-control" id="ciudad_duenio" name="ciudad_duenio" value="{{old('ciudad_duenio')}}">
			@if ($errors->first('ciudad_duenio'))
				<span class="label label-danger error">{{ $errors->first('ciudad_duenio')}}</span>
			@endif
		  </div>
		  <div class="form-group">
		  	<label for="direccion_duenio" class="control-label">Dirección</label>
			<input type="name" class="form-control" id="direccion_duenio" name="direccion_duenio" value="{{old('direccion_duenio')}}">
			@if ($errors->first('direccion_duenio'))
				<span class="label label-danger error">{{ $errors->first('direccion_duenio')}}</span>
			@endif
		  </div>
		 <div class="row">
		 	<div class="col-xs-6">
		 		<div class="form-group">
				  	<label for="codpostal_duenio" class="control-label">Codigo Postal</label>
					<input type="name" class="form-control" id="codpostal_duenio" name="codpostal_duenio" value="{{old('codpostal_duenio')}}">
					@if ($errors->first('codpostal_duenio'))
						<span class="label label-danger error">{{ $errors->first('codpostal_duenio')}}</span>
					@endif
				</div>
		 	</div>
		 	<div class="col-xs-6">
				<div class="form-group">
				  	<label for="llaves" class="control-label">Casillero de llaves</label>
					<input type="name" class="form-control" id="llaves" name="llaves" value="{{old('llaves')}}">
				</div>
		 	</div>
		 </div>


		  <div class="row">
			<div class="col-xs-6">
				<div class="form-group">
				  	<label for="tel1_duenio" class="control-label">Telefono 1</label>
					<input type="name" class="form-control" id="tel1_duenio" name="tel1_duenio" value="{{old('tel1_duenio')}}">
					@if ($errors->first('tel1_duenio'))
						<span class="label label-danger error">{{ $errors->first('tel1_duenio')}}</span>
					@endif
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
				  	<label for="tel2_duenio" class="control-label">Telefono 2</label>
					<input type="name" class="form-control" id="tel2_duenio" name="tel2_duenio" value="{{old('tel2_duenio')}}">
					@if ($errors->first('tel2_duenio'))
						<span class="label label-danger error">{{ $errors->first('tel2_duenio')}}</span>
					@endif
				</div>
			</div>
		  </div>
		  <div class="row">
		  	<div class="col-xs-6">
		  		<div class="form-group">
				  	<label for="tel3_duenio" class="control-label">Telefono 3</label>
					<input type="name" class="form-control" id="tel3_duenio" name="tel3_duenio" value="{{old('tel3_duenio')}}">
				</div>
		  	</div>

		  	<div class="col-xs-6">
		  		<div class="form-group">
				  	<label for="tel4_duenio" class="control-label">Telefono 4</label>
					<input type="name" class="form-control" id="tel4_duenio" name="tel4_duenio" value="{{old('tel4_duenio')}}">
				</div>
		  	</div>
		  </div>

		  <div class="form-group">
			<label for="observaciones_duenio" class="control-label">Observaciones</label>
			<textarea class="form-control" rows="3" id="observaciones_duenio" name="observaciones_duenio">{{old('observaciones_duenio')}}</textarea>
		  </div>
	</div>
</div>

<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<button type="submit" class="btn btn-default btn-block">GUARDAR</button>
	</div>

</div>





</form>

@overwrite
