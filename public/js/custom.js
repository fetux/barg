$(function(){
	$(document).ajaxStart(function() {
		//$('#wrap').fadeTo('fast',0.2,function(){
			$('#loader').fadeIn();	
		//});
		
		
	});
	
	$(document).ajaxStop(function(){
		$('#loader').fadeOut(function(){
			//$('#wrap').fadeTo('fast',1);	
		});
		
	});
	
	
	
});
