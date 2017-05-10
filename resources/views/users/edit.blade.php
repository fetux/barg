@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<h3>Editar Usuario</h3>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Ups!</strong> Hubo un problema con los datos ingresados.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(array('action'=> array('UserController@update',$user->id), 'class' => 'form-horizontal', 'method' => 'put')) !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $user->name }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo electr&oacute;nico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ $user->email }}">
							</div>
						</div>
						<!--
						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirme contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						-->
						<div class="form-group">
							<label class="col-md-4 control-label">Nivel de acceso</label>
							<div class="col-md-6">
								 <select class="form-control" id="level" name="level">
								    <option value="0" <?= ($user->level == 0) ? 'selected' : '' ?>>Administrador</option>
								    <option value="1" <?= ($user->level == 1) ? 'selected' : '' ?>>Usuario avanzado (Permite crear/editar/eliminar Propiedades)</option>
								    <option value="2" <?= ($user->level == 2) ? 'selected' : '' ?>>Usuario b&aacute;sico (Permite crear/editar Propiedades)</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-default">
									Actualizar
								</button>
							</div>
						</div>
					</form>
				
		</div>
	</div>
</div>
@endsection
