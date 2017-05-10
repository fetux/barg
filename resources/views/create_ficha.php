<?php
echo 'Hola';
?>
	<!--<?php include 'header.php' ?>-
	
	<form class="form-horizontal">
		  <div class="form-group">
		    <div class="col-sm-2">
		    </div>
		  	 	<div class="col-sm-12 col-md-2">
					<label for="inputEmail3" class="control-label">Provincia</label>
				    <select class="form-control" name="provincia">
					  <option value="1">Buenos Aires</option>
					</select>
				</div>
				<div class="col-sm-12 col-md-2">
					<label for="inputEmail3" class="control-label">Ciudad</label>
				    <select class="form-control" name="ciudad">
					  <option value="1">Mar del Plata</option>
					  <option value="2">Capital Federal</option>
					  <option value="3">Necochea</option>
					  <option value="4">Miramar</option>
					  <option value="5">Pinamar</option>
					  <option value="6">Mar de las Pampas</option>
					  <option value="7">Mar de Ajó</option>
					</select>
				</div>
			    <div class="col-sm-12 col-md-2">
					<label for="inputEmail3" class="control-label">Barrio</label>
				    <select class="form-control" name="barrio">
					  <option value="1">Alem</option>
					  <option value="2">Puerto</option>
					  <option value="3">Los Troncos</option>
					  <option value="4">La Perla</option>
					  <option value="5">Pompeya</option>
					</select>
				</div>
			</div>
			<div class="form-group">
			    <div class="col-sm-2">
		    	</div>
			    <div class="col-sm-2">
					<label for="inputEmail3" class="control-label">Operacion</label>
				    <select class="form-control" name="operacion">
					  <option value="1">Alquiler</option>
					  <option value="2">Alquiler Temporario</option>
					  <option value="3">Venta</option>
					</select>
				</div>
			    <div class="col-sm-2">
					<label for="inputEmail3" class="control-label">Tipo</label>
				    <select class="form-control" name="tipo">
					  <option value="1">Departamento</option>
					  <option value="2">Casa</option>
					  <option value="3">Chalet</option>
					  <option value="4">Oficina</option>
					  <option value="5">Campo</option>
					  <option value="6">Duplex</option>
					  <option value="7">Triplex</option>
					</select>
				</div>
			    <div class="col-sm-2">
					<label for="inputEmail3" class="control-label">Estado</label>
				    <select class="form-control" name="estado">
				    	<option value="1">Disponible</option>
					  	<option value="2">Reservado</option>
					  	<option value="3">Alquilado</option>
					  	<option value="4">Vendido</option>
					</select>
				</div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-2">
		    </div>				    
		    <div class="col-sm-3">
		    	<label for="inputEmail3" class="control-label">Ref.</label>
		      <input type="name" class="form-control" name="ref">
		    </div>
		    <div class="col-sm-1">
		    	<label for="inputEmail3" class="control-label">Precio</label>
		      <input type="name" class="form-control" name="precio">
		    </div>
		    <div class="col-sm-1">
		    	<label for="inputEmail3" class="control-label">Superficie</label>
		      <input type="name" class="form-control" name="superficie">
		    </div>
		    <div class="col-sm-1">
		    	<label for="inputEmail3" class="control-label">Ambientes</label>
		      <input type="name" class="form-control" name="ambientes">
		    </div>
		  </div>
		  <div class="form-group">
		  	<div class="col-sm-2" >
		  	</div>
		    <div class="col-sm-1" >
		  		<label for="inputEmail3" class="control-label">Cochera</label>
			  	<div class="radio" name="cochera">
				  <label>
				    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
				    Si
				  </label>
				  <label>
				    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				    No
				  </label>
				 </div>
			</div>
		    <div class="col-sm-1" >
		  		<label for="inputEmail3" class="control-label">Amueblado</label>
			  	<div class="radio" name="amueblado">
				  <label>
				    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
				    Si
				  </label>
				  <label>
				    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				    No
				  </label>
				 </div>
			</div>
		    <div class="col-sm-2">
		    	<label for="inputEmail3" class="control-label">Disposicion</label>
		      <input type="name" class="form-control" name="disposicion">
		    </div>
		    <div class="col-sm-2">
		    	<label for="inputEmail3" class="control-label">Descripcion</label>
		      	<textarea class="form-control" rows="1" name="descripcion"></textarea>
		    </div>			    
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Guardar</button>
		    </div>
		  </div>		  
	</form>
        		
<!--<?php include 'footer.php' ?>-->