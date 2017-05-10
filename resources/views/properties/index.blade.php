@extends('layouts.master')

@section('css')
<link href="{{ asset('css/properties/index.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="{{ asset('js/properties-index.js') }}"	></script>
@endsection

@section('content')

	
<div class="row hidden-md hidden-lg">
	<div class="col-xs-12">

		@include('layouts.filters')
					
	</div>
</div>

<div id="properties" class="row">
	
	
	
</div>
<div id="notfound" class="row hidden">
	<p >No se encontraron propiedades</p>
	<p><a id="reset" href="#">Reiniciar b&uacute;squeda</a></p>	
</div>

<div class="row">
	<div class="col-xs-12 text-center chevrons">
		<!-- ACA VA EL PAGINADOR -->
	</div>
</div>
<img class="casa pull-right hidden-xs hidden-sm" src="{{ asset('img/casaSola.png') }}" alt="Casa">
@overwrite