<header>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top visible-xs-block visible-sm-block">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url()}}">
          	<img class="pull-left" src="{{ asset('img/logo-header.png') }}" alt="Inmobiliaria Gerardo E. Barg" height="40">
          	<span class="hidden-xs">Gerardo E. Barg</span>
          </a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right ">
          	@if (Auth::check())
          	<li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Auth::user()->name}}<span class="caret"></span></a>
          		<ul class="dropdown-menu" role="menu">
          			
          			@if (isset($property->id))
	          			<li><a href="{{url('propiedad/'.$property->id.'/edit')}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Propiedad</a></li>
	          			@if (Auth::user()->getLevel() < 2)
	          				<li><a href="#" data-toggle="modal" data-target="#confirm_delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar Propiedad</a></li>
	          			@endif
	          			<!--<li><a href="{{url('propiedad/'.$property->id.'/imprimir')}}"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Propiedad</a></li>-->
	          			<li class="divider"></li>
          			@endif
          			<li><a href="{{url('propiedad/crear')}}"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Nueva Propiedad</a></li>
					@if (Auth::user()->getLevel() == 0)          			
          			<li class="divider"></li>
          			<li><a href="{{url('suscriptores')}}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Suscriptores</a></li>
          			<li><a href="{{url('/usuarios')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
          			@endif
          			<li class="divider"></li>
          			<li><a href="{{url('auth/logout')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</a></li>		
          		</ul>
          	</li>
          	
          	@else
          	<li><a href="{{url('auth/login')}}"><img src="{{ asset('img/login.png') }}" height="20"/>Acceso</a></li>
          	@endif
          </ul>
          
        </div><!--/.nav-collapse -->
        
      </div>
      
    
    </nav>    
    
    
    
    <!-- Fixed navbar for DESKTOP-->
    <nav id="navbar-desktop" class="navbar navbar-default navbar-fixed-top visible-md-block visible-lg-block">
      <div class="container">
      	<div class="row">
      		<div class="col-md-4">
      			<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          	
		          	
		          	
		          <a class="navbar-brand" href="{{url()}}">
		          	<img id="logo-desktop" class="pull-left" src="{{ asset('img/logo-header.png') }}" alt="Inmobiliaria Gerardo E. Barg" height="80">
		          	<span id="site-title" class="hidden-xs">Gerardo E. Barg</span>
		          </a>
		        </div>		
      		</div>
      		<div class="col-md-5">
      			@if (Route::current()->getUri() == "/")
      				@include('layouts.filters')	
				@endif
      		</div>
      		<div class="col-md-3">
      			@if (Auth::check())
				<div id="navbar" class="navbar-collapse collapse">
          
		          <ul class="nav navbar-nav navbar-right ">
		          	
		          	<li class="dropdown">
		          		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Auth::user()->name}}<span class="caret"></span></a>
		          		<ul class="dropdown-menu" role="menu">
		          			@if (isset($property->id))
			          			<li><a href="{{url('propiedad/'.$property->id.'/edit')}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Propiedad</a></li>
			          			@if (Auth::user()->getLevel() < 2)
			          				<li><a href="#" data-toggle="modal" data-target="#confirm_delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar Propiedad</a></li>
			          			@endif
			          			<li><a href="{{url('propiedad/'.$property->id.'/imprimir')}}" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Propiedad</a></li>
			          			<li class="divider"></li>
		          			@endif
		          			<li><a href="{{url('propiedad/crear')}}"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Nueva Propiedad</a></li>
							@if (Auth::user()->getLevel() == 0)          			
		          			<li class="divider"></li>
		          			<li><a href="{{url('suscriptores')}}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Suscriptores</a></li>
		          			<li><a href="{{url('/usuarios')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
		          			@endif
		          			<li class="divider"></li>
		          			<li><a href="{{url('auth/logout')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</a></li>		
		          		</ul>
		          	</li>
		          </ul>
		        </div><!--/.nav-collapse -->
		        @else
		          <p class="datos-oficina text-right">
			    	Lamadrid 2546 | Mar del Plata<br />
			    	TelFax <b>(0223) 4916268 / 9468</b><br />
			    	info@gerardobarg.com.ar
			      </p>
		          
		          <a class="pull-right btn-login" href="{{url('auth/login')}}"><img src="{{ asset('img/login.png') }}" height="20"/>Acceso</a>
		        @endif
		          
		          
		              			
      		</div>
      	</div>
        
      </div>
      
    
    </nav>
    
    
    
    
    
    
</header>