@extends('layouts.master')

@section('css')
<link href="{{ asset('css/subscribers/index.css') }}" rel="stylesheet">
@endsection

@section('js')

@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<h1 class="pull-left">Listado de Suscriptores</h1>		
	</div>
</div>
<div class="row">
	<a class="btn btn-default pull-left" href="{{url('suscriptores')}}">Todos</a>
	<a class="btn btn-default pull-left" href="{{url('suscriptores/0')}}">General</a>
	<a class="btn btn-default pull-left" href="{{url('suscriptores/1')}}">Alquileres</a>
	<a class="btn btn-default pull-left" href="{{url('/suscriptores/2')}}">Ventas</a>
	<a class="btn btn-default pull-right" href="{{url('suscriptores.csv')}}<?=str_replace('suscriptores', '', Request::path());?>">Descargar CSV</a>	
</div>


<table id="suscriptores" class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>ID</th><th>Direcci&oacute;n de correo electr&oacute;nico</th><th>Newsletter</th><th>Fecha de subscripci&oacute;n</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($subscribers as $s)
			<tr>
				<td>{{$s->id}}</td><td>{{$s->email}}</td><td><?php switch ($s->type) { case 0: echo 'General'; break; case 1: echo 'Alquileres'; break; case 2: echo 'Ventas'; break; case 3: echo 'Temporarios'; break;}?></td><td>{{$s->created_at}}</td><td><span data-toggle="modal" data-target="#remove-modal" class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
			</tr>
		@endforeach
	</tbody>
</table>

<nav class="text-center">
  <ul class="pagination">
  	
    <li <?= ($subscribers->previousPageUrl() == null) ? 'class="disabled"' : '' ?>>
      <a href="<?=$subscribers->previousPageUrl()?>">
        <span aria-hidden="true"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Anterior</span></span>
      </a>
    </li>
    
    <?php for ($i=1; $i <= $subscribers->lastPage(); $i++): ?> 
      
	    <li <?= ($subscribers->currentPage() == $i) ? 'class="active"' : '' ?>>
	      <a href="<?=$subscribers->url($i)?>"><?=$i?> <span class="sr-only"><?=$i?></span></a>
	    </li>
    
    <?php endfor; ?>
    
    <li <?= ($subscribers->nextPageUrl() == null) ? 'class="disabled"' : '' ?>>
      <a href="<?=$subscribers->nextPageUrl()?>">
        <span aria-hidden="true"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Siguiente</span></span>
      </a>
    </li>
    
  </ul>
</nav>


@overwrite