@extends('layouts.master')

@section('js')

@endsection

@section('css')

@endsection

@section('content')
<div class="page-header">
	<div class="row">
		<div class="col-xs-12">
			
			
				<div style="text-align:center;color:#119ED9;font-weight:bold">
				    <h1>{{strtoupper($property->ref)}}</h1>
        
                    <h4 class="modal-title">El mensaje se env&iacute;o con &eacute;xito!</h4>
    				<p>
    					Muchas gracias!. Nos contactaremos con usted a la brevedad.
    				</p>		    
                    <p><a href="{{url('propiedad/'.$property->id)}}">Volver a la Propiedad</a></p> 
                </div>
		</div>
	</div>
</div>


@Overwrite