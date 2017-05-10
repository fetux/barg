@extends('layouts.master')

@section('css')

@endsection

@section('js')
<script src="{{ asset('js/users-index.js') }}"></script>
@endsection

@section('content')

<h1 class="pull-left">Listado de Usuarios</h1>
<a class="btn btn-barg pull-right" href="/auth/register">Nuevo usuario</a>
<table id="users" class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>ID</th><th>Direcci&oacute;n de correo electr&oacute;nico</th><th>Nombre</th><th>Nivel de acceso</th><th colspan="2">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $u)
			<tr id="{{$u->id}}">
				<td>{{$u->id}}</td><td class="email">{{$u->email}}</td><td class="name">{{$u->name}}</td><td class="level" data-level="<?=$u->level?>"><?php switch($u->level) : case 0: echo 'Administrador'; break; case 1: echo 'Usuario avanzado'; break; case 2: echo 'Usuario básico'; break; endswitch	;?></td><td><a href="{{ url('usuarios/'.$u->id.'/edit/')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td><td>@if (Auth::user()->id != $u->id) <span data-toggle="modal" data-target="#remove-modal" class="glyphicon glyphicon-remove" aria-hidden="true"></span>@endif</td>
			</tr>
		@endforeach
	</tbody>
</table>

<div id="remove-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar usuario</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro desea eliminar el usuario <span> </span> ?</p>
      </div>
      <div class="modal-footer">
        
       {!! Form::open(array('action'=> array('UserController@destroy',$u->id), 'files' => true, 'method' => 'delete','id'=>'form-delete')) !!}
        	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        	<button type="submit" class="btn btn-primary">Eliminar</button>	
        </form>
        
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="new-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo usuario</h4>
      </div>
      <form id="form-new" method="POST" action="{{ url('/auth/register') }}">
	      <div class="modal-body">
	        <div class="form-group">
			    <label for="email" class="control-label">Correo electr&oacute;nico</label>
			    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
				@if ($errors->first('email'))
					<span class="label label-danger error">{{ $errors->first('email')}}</span>
				@endif
			</div>
			<div class="form-group">
			    <label for="password" class="control-label">Contrase&ntilde;a</label>
			    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
				@if ($errors->first('password'))
					<span class="label label-danger error">{{ $errors->first('password')}}</span>
				@endif
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">Nombre</label>
			    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
				@if ($errors->first('name'))
					<span class="label label-danger error">{{ $errors->first('name')}}</span>
				@endif
			</div>
			  <div class="form-group">
			    <label for="level" class="control-label">Nivel de acceso</label>
				    <select class="form-control" id="ciudad" name="level">
					    	<option value="0">Administrador</option>
					    	<option value="1">Usuario avanzado (Permite crear/editar/eliminar Propiedades)</option>
					    	<option value="2">Usuario b&aacute;sico (Permite crear/editar Propiedades)</option>
					</select>
			  </div>
	      </div>
	      <div class="modal-footer">
	        	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<button type="submit" class="btn btn-primary">Crear</button>	
	      </div>
     </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="edit-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar usuario</h4>
      </div>
      {!! Form::open(array('action'=> array('UserController@update'), 'method' => 'put','id'=>'form-edit')) !!}
	      <div class="modal-body">
	        <div class="form-group">
			    <label for="email" class="control-label">Correo electr&oacute;nico</label>
			    <input type="text" class="form-control" id="email" name="email" value="">
				@if ($errors->first('email'))
					<span class="label label-danger error">{{ $errors->first('email')}}</span>
				@endif
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">Nombre</label>
			    <input type="text" class="form-control" id="name" name="name" value="">
				@if ($errors->first('name'))
					<span class="label label-danger error">{{ $errors->first('name')}}</span>
				@endif
			</div>
			  <div class="form-group">
			    <label for="level" class="control-label">Nivel de acceso</label>
				    <select class="form-control" id="level" name="level">
					    	<option value="0">Administrador</option>
					    	<option value="1">Usuario avanzado (Permite crear/editar/eliminar Propiedades)</option>
					    	<option value="2">Usuario b&aacute;sico (Permite crear/editar Propieddades)</option>
					</select>
			  </div>
	      </div>
	      <div class="modal-footer">
	        	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<button type="submit" class="btn btn-primary">Actualizar</button>	
	      </div>
     </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@overwrite