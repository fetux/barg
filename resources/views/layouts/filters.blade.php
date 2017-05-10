<span id="filters" data-value=""> </span>
<div id="button-filters" role="tabpanel">
  
  <ul class="nav nav-tabs hidden" role="tablist">
    <li role="presentation" class="active"><a href="#tipo" aria-controls="tipo" role="tab" data-toggle="tab">Go to Tipo</a></li>
    <li role="presentation"><a href="#ambientes" aria-controls="ambientes" role="tab" data-toggle="tab">Go to ambientes</a></li>
    <li role="presentation"><a href="#operacion" aria-controls="operacion" role="tab" data-toggle="tab">Go to operaciones</a></li>
  </ul>
  
  	
	<!-- Tab panes -->
	<div class="tab-content text-center">
		 
		<div role="tabpanel" class="tab-pane fade in active" id="operacion">
			<h5>¿Qu&eacute; operaci&oacute;n esta buscando?</h5>
			@foreach ($operations as $operation)						
				<a href="#tipo" aria-controls="tipo" role="tab" data-toggle="tab" class="btn btn-primary btn-barg" data-value="{{ $operation->id }}">{{ $operation->nombre }}</a>
			@endforeach
		</div>
		<!--
		<div role="tabpanel" class="tab-pane fade" id="provincia">
			<h3>En que provincia?</h3>
			@foreach ($provinces as $province)
			    <a href="#ciudad" aria-controls="ciudad" role="tab" data-toggle="tab" class="btn btn-primary btn-barg" data-value="{{ $province->id }}">{{ $province->nombre }}</a>
			@endforeach
		</div>
		<div role="tabpanel" class="tab-pane fade" id="ciudad">
			<h3>¿En que ciudad?</h3>
			@foreach ($cities as $city)
				<a href="#barrio" aria-controls="barrio" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="{{ $city->id }}">{{ $city->nombre }}</a>
			@endforeach
		</div>
		<div role="tabpanel" class="tab-pane fade" id="barrio">
			<h3>¿En que barrio?</h3>
			@foreach ($neighborhoods as $neighborhood)
				<a href="#tipo" aria-controls="tipo" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="{{ $neighborhood->id }}">{{ $neighborhood->nombre }}</a>
			@endforeach					
		</div> -->
		<div role="tabpanel" class="tab-pane fade" id="tipo">
			<h5>¿Qu&eacute; tipo de propiedad está buscando?</h5>
			@foreach ($types as $type)
				<a href="#ambientes" aria-controls="ambientes" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="{{ $type->id }}">{{ $type->nombre}}</a>
			@endforeach
		</div>
		<div role="tabpanel" class="tab-pane fade" id="ambientes">
			<h5>¿Cu&aacute;ntos ambientes?</h5>
			<a href="#operacion" aria-controls="operacion" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="1">1</a>						
			<a href="#operacion" aria-controls="operacion" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="2">2</a>
			<a href="#operacion" aria-controls="operacion" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="3">3</a>
			<a href="#operacion" aria-controls="operacion" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="4">4</a>
			<a href="#operacion" aria-controls="operacion" role="tab" data-toggle="tab" class="btn btn-primary btn-barg " data-value="5">5</a>
			
		</div>
	</div>

</div>