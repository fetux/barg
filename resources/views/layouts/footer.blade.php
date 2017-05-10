<footer>
	<div class="container">
	@if(Auth::check())
		<div class="row">
			<div class="col-xs-12">
				<p style="margin-top:40px" class="text-center">Departamento Inmobiliario G. Barg - Administración</p>
			</div>
		</div>
	@else
	
		<div class="row">
			<div class="col-xs-12 col-md-4">
			    <div id="weather"> </div>
			</div>
			<div class="col-xs-12 col-md-4 text-center">
				<div class="row">
					<div class="col-xs-12">
						<h2 style="font-size: 20px">Subscribase a nuestras novedades</h2>
					</div>
				</div>
				<div class="row">
					{!! Form::open(array('action'=>'PropertyController@subscribe', 'class'=>'form-inline')) !!}
					<!--<form class="form-inline">-->
					  <div class="form-group">
					    <input name="email" type="email" class="form-control" id="email" placeholder="Ingrese su correo electrónico">
					  </div>
					  
					  <button type="submit" class="btn btn-default">OK</button>
					</form>
				</div>
				
			</div>
			<div class="col-xs-12 col-md-4"> 
                <div id="currency"> </div>    
			</div>
		</div>
	@endif
	</div>
</footer>