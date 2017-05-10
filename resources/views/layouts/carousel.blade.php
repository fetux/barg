@if (isset($prom_properties) && count($prom_properties) > 0)
<div class="row-fluid">
	<div class="col-xs-12">
		<div class="ribbon prom"><img src="img/ribbon-oportunidad.png"></div>
		<div id="carousel-prom" class="carousel slide" data-ride="carousel">
	  		<!-- Indicators --
			<ol class="carousel-indicators">
				@for ($i = 0; $i < count($prom_properties); $i++)
				<li data-target="#carousel-prom" data-slide-to="{{$i}}" class="{{ ($i == 0) ? 'active' : '' }}"></li>
				@endfor
			</ol>-->
			
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				
				@for ($i = 0; $i < count($prom_properties); $i++)
				<a class="item {{ ($i == 0) ? 'active' : ''}}" href="{{url('/propiedad/'.$prom_properties[$i]->id)}}">
					
					<div class="row">
						<div class="col-xs-12">
							<h3 class="text-center">{{strtoupper($prom_properties[$i]->ref)}}</h3>						
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-7 col-md-offset-1 text-center">
							<img class="photo" src="{{(string)Image::make($prom_properties[$i]->images[0]->slide_url)->encode('data-url')}}">
						</div>
						<div class="col-xs-12 col-md-4">
							<ul class="checklist">
								@if($prom_properties[$i]->mostrar_precio)
								<li><span>Precio: {{ ($prom_properties[$i]->moneda) ? 'US$' : '$' }} {{$prom_properties[$i]->precio}}</span></li>
								@endif
								<li><span>Superficie: {{$prom_properties[$i]->superficie}} m2</span></li>
								<li><span>Ambientes: {{$prom_properties[$i]->ambientes}}</span></li>
								<li><span>Cochera: {{$prom_properties[$i]->cochera ? 'Si' : 'No'}}</span></li>
								<li><span>Amueblado: {{$prom_properties[$i]->amueblado? 'Si' : 'No'}}</span></li>
							</ul>
						</div>
					</div>
					
				  	<!-- <div class="carousel-caption">
				    {{$prom_properties[$i]->descripcion}}
					</div>-->
				
				</a>
				@endfor
				<!--
				<div class="item">
			  		<div class="carousel-caption">
			    		
			  		</div>
				</div>
				<div class="item">
			  		<div class="carousel-caption">
			    		
			  		</div>
				</div>
				-->
			</div>
			
			  <!-- Controls -->
			<a class="left carousel-control" href="#carousel-prom" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="right carousel-control" href="#carousel-prom" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Siguiente</span>
			</a>
		</div>
	</div>
</div>	
@endif
