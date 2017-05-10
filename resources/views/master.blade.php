<!DOCTYPE html>
<html lang="en">
	<head>
		
		@section('css')
		@show
		@include('layouts.assets')
		
  	</head>

	<body>

		@include('layouts.header')
	
		<div class="container">
			@yield('content')
		</div>  <!-- /container -->
	
		@include('layouts.footer')
		@include('layouts.scripts')

	</body>
</html> 