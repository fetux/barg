<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layouts.assets')
		@section('css')
		@show
		<style>
			#loader{
				position: fixed;
			 	top: 50%;
			  	left: 50%;
			  	/* bring your own prefixes */
			  	transform: translate(-50%, -50%);
			  	z-index:100000;
			  	background-color: #337AB7;
			  	padding:5px;
			  	border-radius:5px;
			  	-moz-border-radius:5px; 
			    -webkit-border-radius: 5px;
			    -khtml-border-radius:5px;
			    box-shadow: 3px 3px 3px gray;
			    width:42px;
			    height:42px;
			    display:none;
			}
		</style>
  	</head>

	<body>
		<span id="loader"><img src="{{url('images/ajax-loader.gif')}}"></span>
		<div id="wrap">
			@include('layouts.header')
			{{--@include('layouts.carousel')--}}
			<div class="container">
				@yield('content')
			</div>  <!-- /container -->
			<div id="push"></div>
		</div>
		@include('layouts.footer')
		@include('layouts.scripts')
		@section('js')
		@show
	</body>
</html> 